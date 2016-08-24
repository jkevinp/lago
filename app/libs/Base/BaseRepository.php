<?php namespace App\Repositories;
use DB;
use Carbon\Carbon;
abstract class BaseRepository {

	protected $model;
	public $paginate = 3;

	public function getscope($scope , $param){
    array_unshift($param, $this);
    return call_user_func_array([$this->model, $scope], $param) ?: $this;
	}


	public function lists($details=[]){
		if(array_key_exists("order_by", $details)){
			if($details['order_by'] == 'desc'){
				$order_by = 'desc';
			}else{
				$order_by = 'asc';
			}
		}else{
			$order_by = 'asc';
		}

		$records = $this -> model;
		if(array_key_exists('search', $details))$records = $records->where($details['search']);
		//if(array_key_exists('like', $details)) $records = $records->where()
		if(array_key_exists('order_by_column', $details))  $records = $records->orderBy($details['order_by_column'] , $order_by);
		if(array_key_exists('skip', $details))$records = $records->skip($details['skip']);
		if(array_key_exists('take', $details))$records = $records->take($details['take']);
		$records=  $records -> get();

		return $records;
	}
	public function details($params){
		$details = $this -> model -> where($params) -> first();
		return $details;
	}
	public function update($item_id, $fields){
		$current_data = $this -> model -> where ('id', $item_id) -> first();

		foreach ($fields as $key => $value) {
			$current_data -> {$key} = $value;
		}
		return $current_data -> save();
	}
	public function create($fields){
		$create_data = new $this -> model;
		foreach ($fields as $key => $value) {	
		if(in_array($key, $this->model->getFillable()))
			$create_data -> {$key} = $value;
		}
		return $create_data -> save();
	}

	public function focreate($fields){
		$create_data = $this->model->firstOrCreate($fields);
		foreach ($fields as $key => $value) {	
		if(in_array($key, $this->model->getFillable()))
			$create_data -> {$key} = $value;
		}
		return $create_data -> save();
	}

	public function delete($id){
		$this -> getById($id) -> delete();
	}
	public function getById($id){
		return $this -> model -> findOrFail($id);
	}
	public function advanceSearch($data){
		return $this->model->where($data)->get();
	}

	public function ilike($array){

		$except = 	array_key_exists('except' , $array) ?  $array['except'] : [];
		$with = 	array_key_exists('with' , $array) ?  $array['with'] : false;
		$order =	array_key_exists('order' , $array) ?  $array['order'] : false;
		$search =   array_key_exists('search', $array) ? $array['search'] : "";
		$dates  =   array_key_exists('dates', $array) ? $array['dates'] : false;
		$dateQuery = array_key_exists('dateQuery', $array) ? $array['dateQuery'] : "";
		$isTimestamp = array_key_exists('isTimeStamp', $array) ? $array['isTimeStamp'] : false;

		return $this->like($search, $with , $dates, $order , $except, $dateQuery, $isTimestamp );
	}



	public function like($search , $with = [] ,$dates = false , $order = false , $except = [], $dateQuery = "" , $isTimestamp = false , $additionalFields = []){
		$fields = $this->model->searchable;

		$q = $this->model;
		$fillable =  $q->getFillable();
		$x = 0;
		foreach ($fields as $field) {
			if(!in_array($field, $except)){
				if(in_array($field, $fillable)){
					if($x == 0)$q->where($field , "LIKE" , '%'.$search.'%');
					else $q->orWhere($field , "LIKE" , '%'.$search.'%');
					$x++;
				}
			}
		}

		if(is_array($dates) && count($dates)){
			$dateList = $q->getDates();
			if($dateQuery == "")$dateQuery = "created_at";
			if(in_array('created_at', $dateList))$dateQuery = "created_at";
			else if(in_array('created_on', $dateList))$dateQuery = "created_on";
			else {
				if(count($dateList)) $dateQuery = $dateList[0];
				else $dateQuery = "";
			}
			
			if(isset($dates['startdate'])) $d1 =(new Carbon($dates['startdate']))->startOfDay();

			if(isset($dates['enddate'])) $d2 =(new Carbon($dates['enddate']))->endOfDay();

			if(!$isTimestamp){
				if(isset($dates['startdate']))$q =  $q->where($dateQuery, ">=" , $dates['startdate']);
				if(isset($dates['enddate']))  $q =  $q-> where($dateQuery ,"<=" ,$dates['enddate']);
			}else {

				if(isset($dates['startdate']))$q =  $q->where($dateQuery, ">=" ,$d1->timestamp);
				if(isset($dates['enddate']))  $q =  $q->where($dateQuery ,"<=" ,$d2->timestamp);
			}
		}

		
		if(is_array($with) && count($with)){
			foreach ($with as $key=>$tables) {
				$q = $q->with($tables);
			}
		}
		$q = $q->select('*'.implode(',', array_filter($additionalFields)));

		if(is_array($additionalFields) && count($additionalFields)){
			foreach ($additionalFields as $key=>$scope) {
				$q = $q->{$scope}();
			}
		}
		
		if($order){
			if(is_array($order))$q = $q->orderBy($order[0] , $order[1]);
			else $q= $q->orderBy($order);
		}
		return $q;
	}
	public function getTableName(){
		return $this->model->getTable();
	}

	public function with($tables) {
		$data =  $this->model;
		if(is_array($tables) && count($tables)){
			foreach ($tables as $key => $value) {
				$data = $data->with($value);
			}
		}else if(!is_array($tables) && count($tables)) {
			$data= $data->with($tables);
		}
		return $data;
	}
	public function all(){
		return $this->model->all();
	}
	public function take($query){
		return $query->take($this->paginate);
	}
	public function getModel(){
		return $this->model;
	}
	public function clean(){
		if(!empty($value))
		{
			$value = $this->fix_page($value);
			$value = $this->strip_html_tags($value);
			$bad1 = array("=", "/","\"","`","~","'","$","%","#","?","+"); // acceptable string
			foreach($bad1 as $a){ $value = str_replace($a,"\\".$a,$value); }
			$input = strtolower($value);
			$bad2 = array(";","<", ">",".exe",".sh","drop","delete","truncate",); // prohibited string 
			foreach($bad2 as $b){  if(strpos($input,$b) !== false)  { $flag = true; break; } } if($flag == true){ $value = ''; } 
		}
		else{
			$value = '';
		}
		return $value;
	}
	public function strip_html_tags($value){
        $value = preg_replace(
            array(
                // Remove invisible content
                '@<head[^>]*?>.*?</head>@siu',
                '@<style[^>]*?>.*?</style>@siu',
                '@<script[^>]*?.*?</script>@siu',
                '@<object[^>]*?.*?</object>@siu',
                '@<embed[^>]*?.*?</embed>@siu',
                '@<applet[^>]*?.*?</applet>@siu',
                '@<noframes[^>]*?.*?</noframes>@siu',
                '@<noscript[^>]*?.*?</noscript>@siu',
                '@<noembed[^>]*?.*?</noembed>@siu'
            ),
            array(
                '', '', '', '', '', '', '', '', ''), $value );

        return strip_tags( $value);
    }
    public function fix_page($value){
        $value = htmlspecialchars(trim($value));
        if (get_magic_quotes_gpc())
            $value = stripslashes($value);
        return $value;
    }
    public function doCurl(){
    	$response = curl_exec($ch);
		$code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		curl_close($ch);

		if($code !== 200){
			if($code == 400){

			}
		}
		//InvalidArguementException
		//NotFoundException
		//PermissionException
    }
    public function updateBalance($input){
    	$username = $input['username'];
    	$reference = $input['reference'];
    	$amount = $input['amount'];
    	$actionx = $input['actionx'];
    	$notes= isset($input['notes']) ? $input['notes'] : ''; 
    	$t =  array($username, $reference,$amount,$actionx,$notes);
		return DB::select('call update_balance_trans(?,?,?,?,?)',$t);
	}
	

}
/*
DECLARE EXIT HANDLER FOR SQLWARNING 
  BEGIN
  rollback;
  SIGNAL SQLSTATE VALUE '45000' SET MESSAGE_TEXT = 'NEGATIVE BALANCE ATTEMP'; 
  END;
  */
