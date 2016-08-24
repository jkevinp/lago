<?php
use Carbon\Carbon ;
use Sunrock\Interfaces\AccountRepository as AccountsRepo;
use Sunrock\Interfaces\BookingRepository as BookingRepo;
use Sunrock\Interfaces\BookingDetailsRepository as BookingDetailsRepo;
use Sunrock\Interfaces\MailsRepository as MailsRepo;
use Sunrock\Interfaces\ProductRepository as ProductRepo;
use Sunrock\Interfaces\TransactionRepository as trepo;
use Sunrock\Interfaces\SaleRepository as srepo;
class BookingController extends BaseController  {
	public function __construct(srepo $s,trepo $t ,ProductRepo $product,MailsRepo $mails, AccountsRepo $account , BookingRepo $booking , BookingDetailsRepo $bookingdetails)
	{
		$this->product = $product;
		$this->account = $account;
		$this->booking = $booking;
		$this->bookingdetails = $bookingdetails;
		$this->mails = $mails;
		$this->transaction = $t;
		$this->sale = $s;

	}
	public function AddItem(){
		$input = Input::all();
		$date_info = Session::get('date_info');
		$rules = array('quantity' => 'required' , 'productname' => 'required');
		$val =  Validator::make($input , $rules);
		if($val->fails())return Redirect::back()->withErrors($val->messages());
		 //Check if the Product is still avaiable
		$match = $this->product->getAvailableNew(['start' => $date_info['datetime_start'], 'end' => $date_info['datetime_end']])->first() ->where('id' , '=' , $input['productid']);
		if(empty($match))return Redirect::route('book.index')->withErrors('The Product is already reserved.');
		else
		{
			SessionController::BookingSession('additem', $input);		
			Session::put('totalFee' ,$this->computeFee(Session::get('items')));
			$this->bookingdetails->deleteTemporary(Session::getToken());
			$this->bookingdetails->create(Session::get('items'), Session::get('date_info') ,Session::getToken() ,1);
			Helpers::flash('Added '.$input['productname'].' to Reservations List');
			return Redirect::back();
		}
	}
	public function RemoveAllItems(){
		$this->bookingdetails->deleteTemporary(Session::getToken());
		Session::flush();
		Session::put('flash_message' ,'Session has been reset.');
		return Redirect::intended('/');
	}
	public function DeleteItems($key){
		$item = Session::pull('items');
		if(is_array($item)){
			unset($item[$key]);
			$item = array_values($item);
			Session::put('items' , $item);
		}
		Helpers::flash('Item has been removed.');
		Session::put('totalFee' ,$this->computeFee(Session::get('items')));
		$this->bookingdetails->deleteTemporary(Session::getToken());
		$this->bookingdetails->create(Session::get('items'), Session::get('date_info') ,Session::getToken(),1);
		return Redirect::back();
	}
	public function computeFee($arr){
		$price =0;
		$divider = 0;
		if(Session::get('date_info')['modeofstay'] == "day") $divider = 9;
		else if(Session::get('date_info')['modeofstay'] == "night")$divider = 9;
		else $divider = 20;

		   $totalCapacity  = 0;
           $roomcounter = 0;
 		   foreach (Session::get('items') as $i){
                if(isset($i['paxmax'])){ 
                    $totalCapacity += $i['paxmax'] * $i['quantity'];
                        if($i['paxmax'] != 0 && $i['type'] == 2)$roomcounter += 1; 
                }
            }

			$price = 0;
			foreach (Session::get('items') as $key => $value) {
				$price += $value['price'] * $value['quantity'];
			}

		Session::put('originalFee', $price);

		return  number_format($price, 2, '.', '');
	}

	public function getAvailableRooms(){
		$input = Input::all();
		$d = Carbon::now('Asia/Manila');
		$date_info = ['start' => $d, 'end' => $d];
		$rooms = $this->product->getAvailableReservables($date_info);
		$rooms->totalCount = $rooms->count();
		return View::make('admin.booking.booking-available')->withProducts($rooms);
	}

	public function index(){ //create
		$input = Input::all();
		if(Session::has('date_info')){
				$date_info = Session::get('date_info');
				$rooms = $this->product->getAvailableNew(['start' => $date_info['datetime_start'], 'end' => $date_info['datetime_end']]);
				if(isset($input['type'])){
					$rooms = $this->product->getAvailableNew(['start' => $date_info['datetime_start'], 'end' => $date_info['datetime_end']], $input['type']);
				}

				

			$rooms->totalCount = $rooms->count();

			foreach ($rooms as $room){
				if(Files::find($room->fileid) == null) $room->attr = 0;
				else $room->attr = Files::find($room->fileid);		
			}
			return View::make('default.booking.bookingproductlist')->withRooms($rooms);
		}
		else{
			return Redirect::intended('/#booknow')->withErrors('Please Specify the required informations.');
		}
	}

	public function SetInfo(){

			Session::pull('originalFee');
			Session::pull('date_info');
			Session::pull('totalFee');
			Session::pull('account_info');
			$input = Input::all();
			$rules = [
						'start' => 'required',
						'end' => 'required',
						'email' => 'required|email',
						'timeofday' => 'required',
						'lenofstay' => 'required',
						'modeofstay' => 'required'
					];
	    	$validator =Validator::make($input, $rules);
	    	if($validator->fails())return Redirect::back()->withErrors("Please fill all fields.")->withInput($input);
			else 
			{
				//set the date on session
				if($input['timeofday'] == '0' || $input['lenofstay'] == '0')return Redirect::route('static.reservenow')->withErrors('Please select the schedule of reservation')->withInput($input);

				SessionController::BookingSession('setinfo' , $input);
				Session::put('totalFee' ,$this->computeFee(Session::get('items')));
				if(isset($input['route'] ))return  Redirect::route($input['route']);
				return Redirect::route('book.index');
			}
	}

	public function create(){	
		return View::make('default.booking.create');
	}
	public function store(){
		//Define the rules for the booking form validation
		$rules = ['Title' => 'required' , 'Firstname' => 'required|min:1', 'Lastname' => 'required|min:1', 'Middlename' => 'required|min:1','ContactNumber' => 'required','Email' => 'required|email','Email2' => 'required|same:Email'];
		//get All Input from from
		$input = Input::all();
		//Set a error message for each type of validation error
		$messages = ['required' => 'The :attribute field is required.','same'  => 'The :others must match.'];
		//create the validation
		$val = Validator::make($input, $rules, $messages);
		//check validation
		if($val->fails())return Redirect::back()->withErrors($val->messages())->withInput($input);	//If validation fails..
		//Check if items has expired
		$check = $this->bookingdetails->findByBookingRefid(Session::getToken())->get()->count();
		if($check === 0)
		{
			Session::flush();
			return Redirect::to('/')->withErrors('Your Session has expired or no pools/huts/rooms/cottages selected. Cannot proceed to book a reservation.');
		}
		//if validation succeed, create a new booking information
		$input['password'] = $input['Firstname'][0].$input['Lastname'].str_random(3);
		$check_account = $this->account->findByEmail($input['Email'])->first();
		if($check_account)
		$input['confirmation_code'] = $check_account->confirmationcode;
		else
		$input['confirmation_code'] = str_random(10).'k'.str_random(5).'e'.str_random(15);
		$input['booking_confirmation_code'] = str_random(10).'p'.str_random(5).'e'.str_random(15);
		//create an account
		$count = $this->account->findByEmail($input['Email'])->count();
		if($count == 0)$account = $this->account->create($input, 2, 0);
		else $account = $this->account->findByEmail($input['Email'])->first();
		
		$input['start'] = Session::get('date_info')['start'];
		$input['end'] = Session::get('date_info')['end'];
		$input['paymenttype'] = $input['paymenttype'];
		$input['bookingmode'] = Session::get('date_info')['modeofstay'];
		$input['fee'] = Session::get('totalFee');
		$input['id'] = $account->id;

		$input['bookingtype'] = "online";
		if(isset($input['paymentmode']))
				if($input['paymentmode'] == "cashier"){
					$input['bookingtype'] = "walkin";
				}

		$booking = $this->booking->create($input);

		$input['bookingid'] = $booking->bookingid;
		if($booking) 
		{
				$arows = $this->bookingdetails->changeTemporaryStatus($this->bookingdetails->findByBookingRefid(Session::getToken())->get(), 0);
				$this->bookingdetails->updateBookingReference(Session::getToken(), $input['bookingid']);
				if(!isset($input['paymentmode']))Session::flush();
				Event::fire('book.store' , array($input,$count));
				Session::put('flash_message', 'Your reservation has been saved. Please check your email to continue');
				
				if(isset($input['paymentmode']))
				if($input['paymentmode'] == "cashier"){
					$b = $this->booking->find($input['bookingid'])->first();
					$bb= $this->booking->find($input['bookingid'])->first();
					$bb->active = 1;
					$bb->save();
 
					$result = $this->transaction->create($account, $b, $input['_token'], $input['paymentmode'] ,'Auto generated from walk-in.', 'cashier'.$this->sale->generateId(), null);
					$result->bankname = "N/A";
					$result->save();
					return Redirect::route('cpanel.transaction.confirm' , [
						'id' => $result->id , 
						'status' => 'confirmed' ,
						'bookingid' => $input['bookingid']
						]);
				}
				return Redirect::to('/');
		}
		
	}

	public function GetLastAccount(){
		$account = Account::orderby('created_at', 'desc')->first();
		return $account;
	}

	public function countDays($date1, $date2){
		 $now = strtotime($date1);
	     $your_date = strtotime($date2);
	     $datediff = abs($now - $your_date);
	     return floor($datediff/(60*60*24)) + 1;
	}

	public function GenerateBookingId(){
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("YmdHis",$date_array[1]);
		return str_random(3).$date;
	}

	public function ConvertDate($source){
			$date = new DateTime($source);
			return $date->format('Y-m-d'); // 31-07-2012
	}
	//Checkin check out or change status
	public function changeStatus($id , $status , $fullypaid = false , $isCheckout = false , $money = false){
		if($isCheckout)//checkout 
		{
			$find = $this->booking->find($id)->first();
			$sid = $this->sale->generateId();
			$transaction = $this->transaction->findByBookingId($id)->first();
			$bookingdetails = $this->bookingdetails->getByRefId($transaction->bookingid)->get();
			$c = BookingDetails::where('bookingreferenceid','=',$transaction->bookingid)
					->where('temporary' , '=',2)
					->get()
					->count();

			if(!$money && ($transaction->status  != "fullypaid" || $c >=1)){
					Session::put('parr' , []);
				$reservation = $this->booking->find($id)->first();
				if($transaction->paymenttype == "half"){
					//pay remaining balance
					switch($transaction->paymenttype){
						case 'half':
							$coeff = 0.5;
						break;
						case 'full':
							$coeff = 1;
						break;
					}//end of switch
					//creates sale if have remaiming balance
					$bookingdetails->each(function($detail) use ($sid,$coeff, $transaction,$reservation ){
							switch ($reservation->bookingmode) {
								case 'day':
									$detail->productprice  =$this->product->find($detail->productid)->productprice;
								break;
								case 'night':
									$detail->productprice  =$this->product->find($detail->productid)->nightproductprice;
								break;
								default:
									$detail->productprice  =$this->product->find($detail->productid)->overnightproductprice;
								break;

							}
							if($detail->temporary != 2){

								$detail->productprice = $detail->productprice * $coeff;
								Session::push('parr' , $detail);

							
							}
						});
				}//END HALF
				if($c >= 1){
					$bookingdetails->each(function($detail) use ($sid, $transaction,$reservation){
							switch ($reservation->bookingmode) {
								case 'day':
									$detail->productprice  =$this->product->find($detail->productid)->productprice;
								break;
								case 'night':
									$detail->productprice  =$this->product->find($detail->productid)->nightproductprice;
								break;
								default:
									$detail->productprice  =$this->product->find($detail->productid)->overnightproductprice;
								break;

							}
							if($detail->temporary == 2 && $detail->extensionhours >= 1){
								$detail->productprice = $this->product->find($detail->productid)->extensionproductprice * $detail->extensionhours;
							}

							if($detail->temporary== 2){
								$p = $detail->productprice;
								Session::push('parr' , $detail);
							}
								
						});
				}
				return View::make('admin.cashier.cashier-checkout')
				->with('route' , route('book.changeStatus' ,['id' => $id , 'status' => $status ,'fullypaid' =>'false' , 'isCheckout' => 'true']))
				->with('bookingdetails' , Session::pull('parr'))->with('transaction' , $transaction);
			}
			
			if($transaction->status  != "fullypaid" || $c >=1)
			{

				$reservation = $this->booking->find($id)->first();
				if($transaction->paymenttype == "half"){
					//pay remaining balance
					switch($transaction->paymenttype){
						case 'half':
							$coeff = 0.5;
						break;
						case 'full':
							$coeff = 1;
						break;
					}//end of switch
					//creates sale if have remaiming balance
					$bookingdetails->each(function($detail) use ($sid,$coeff, $transaction,$reservation ){
							switch ($reservation->bookingmode) {
								case 'day':
									$detail->productprice  =$this->product->find($detail->productid)->productprice;
								break;
								case 'night':
									$detail->productprice  =$this->product->find($detail->productid)->nightproductprice;
								break;
								default:
									$detail->productprice  =$this->product->find($detail->productid)->overnightproductprice;
								break;

							}
							if($detail->temporary != 2){

								$p = $detail->productprice * $coeff;
								$this->sale->create($sid,$detail->productid,$detail->quantity, $p, $transaction->id, 'reservation-'.$transaction->paymenttype);
						
							}
						});
				}//END HALF
				if($c >= 1){
					$bookingdetails->each(function($detail) use ($sid, $transaction,$reservation ){
							switch ($reservation->bookingmode) {
								case 'day':
									$detail->productprice  =$this->product->find($detail->productid)->productprice;
								break;
								case 'night':
									$detail->productprice  =$this->product->find($detail->productid)->nightproductprice;
								break;
								default:
									$detail->productprice  =$this->product->find($detail->productid)->overnightproductprice;
								break;

							}
							if($detail->temporary == 2 && $detail->extensionhours >= 1){
								$detail->productprice = $this->product->find($detail->productid)->extensionproductprice * $detail->extensionhours;
							}

							if($detail->temporary== 2){

								$p = $detail->productprice;
								$this->sale->create($sid,$detail->productid,$detail->quantity, $p, $transaction->id, 'reservation-'.$transaction->paymenttype);
							}
						});
				}
			
				$check = $this->transaction->changeStatus($transaction->id, 'fullypaid');//change transaction status to fully paid
				if($check){
					if($transaction->paymenttype == "half" || $c >= 1){
						//make this receipt 
						$url = URL::action('pdf.receipt', ['cartid' => $sid]);
						$url ="<a href='".$url."' target='_blank' class='btn btn-primary'>Print</a>";
						$msg ='<hr>'.$url;
					}else $msg = "";
					SessionController::flash('The reservation status has been updated'.$msg);
				}else{
					return Redirect::route('cpanel.dashboard')->withErrors('An error has occured while changing the transaction status!');
				}
			}//end for half reservations
			if($find){
				$affectedrows = $this->booking->changeStatus( $find->bookingid, $status);
				if($affectedrows){
					$bd = $find->bookingdetails()->get();
					$bd->each(function($bookingdetails){
						$bookingdetails->delete();
					});
					if(isset($msg))
					SessionController::flash('The session has been checked-out'.$msg);
					else  SessionController::flash('The session has been checked-out');
					return Redirect::route('cpanel.dashboard');
				}else{
					return Redirect::route('cpanel.dashboard')->withErrors('An error has occured while changing the reservation status!');
				}
			}
			else return Redirect::route('cpanel.dashboard')->withErrors('An error has occured. No Reservation with the id provided was found!');
		
		}else{
			//checkin
			$find = $this->booking->find($id)->first();
			if($find)
			{
				$affectedrows = $this->booking->changeStatus( $find->bookingid, $status);//change status to checked in
				if($affectedrows){
					SessionController::flash('Successfully Checked-in');
					return Redirect::route('cpanel.dashboard');
				}else return Redirect::route('cpanel.dashboard')->withErrors('An error has occured while changing the reservation status!');
					
			}else{
				return Redirect::route('cpanel.dashboard')->withErrors('Could not find reservation to check-in.');
			}
		}	
	}

	public function extend($id , $hours){
		$sid = $this->sale->generateId();
		$details = $this->bookingdetails->getByRefId($id)->get();
		$err = 0;
		foreach ($details as $detail){//First loop to check schedule
			if($err == 0){
				$product = $this->product->find($detail->productid);
				if($product->producttypeid <= 2 || $product->producttypeid >= 5){
					$date['start'] = $detail->bookingend->addSeconds(1);
					$date['end'] = $detail->bookingend->addHours($hours)->addSeconds(-1);
					$check = $this->product->check($date, $detail->productid)->get();
					if($check->count() > 0){
						$err++;
						break;
					}
				}
			}
		}
		if($err > 0){
			return Redirect::back()->withErrors('Some rooms you want to extend is already unavailable.');
		}else{
			foreach ($details as $detail){//Second loop to rewrite
				$product = $this->product->find($detail->productid);
				if($product->producttypeid <= 2 || $product->producttypeid >= 5){
					$date['start'] = $detail->bookingend->addSeconds(1);
					$date['end'] = $detail->bookingend->addHours($hours)->addSeconds(-1);
					$check = $this->product->check($date, $detail->productid)->get();
					$booking = $this->booking->find($id)->first();
					$booking->bookingend = $date['end'];
					$detail->bookingend = $date['end'];
					$detail->temporary = 2;
					$detail->extensionhours = $detail->extensionhours + $hours;
					$booking->save(); 
					$detail->save();


					// $this->sale->create($sid, 
					// 				$product->id,
					// 				$detail->quantity,
					// 				($product->extensionproductprice) * $hours, 
					// 				$booking->transaction->id,
					// 				'extend'
					// 				);		
				}
			}
			
			// $url = URL::action('pdf.invoice', ['cartid' => $sid]);
			// $url ="<a href='".$url."' target='_blank' class='btn btn-primary'>Print</a>";
			// $msg ="<hr>".$url;
			SessionController::flash("Reservation has been extended");
			return Redirect::back();
		}
	}
	public function rebook($id){
		$booking = $this->booking->find($id)->first();
		if($booking){
			$details =$booking->bookingdetails()->first();
			$lenofstay = $this->diffdatehours($details->bookingstart, $details->bookingend);
			
			$view= View::make('default.booking.rebook')->withBooking($booking)->withLen($lenofstay);
			return $view;
		}else{
			return Redirect::to(route('account.show', ['action' =>'reservation' , 'param' =>2]))->withErrors('Could not found Booking Entry');
		}
	}
	public function rebook2(){
		$i = Input::all();
		$r = ['start' => 'required', 'end' => 'required','timeofday' => 'required','lenofstay' => 'required' ,'bookingid' => 'required'];
		$val = Validator::make($i,$r);
		if($val->fails()){
			return Redirect::to(route('account.show', ['action' =>'reservation' , 'param' =>2]))->withErrors($val->messages());
		}
		$b['start'] = $i['start'];
		$b['end'] = $i['end'];
		$b['timeofday'] = $i['timeofday'];
		$b['lenofstay'] = $i['lenofstay'];
		$b['bookingid'] = $i['bookingid'];
		$b['modeofstay'] = $i['modeofstay'];

		$conflict = [];
		$details = $this->bookingdetails->getByRefId($i['bookingid'])->get();
		foreach ($details as $detail){
			$product = $this->product->find($detail->productid);
			if($product->producttypeid <= 2 || $product->producttypeid >= 5){
					$i['start'] = new Carbon($i['start']);
					$i['start'] =$i['start']->addHours($i['timeofday'])->addSeconds(1);
					$i['end'] = new Carbon($i['start']);
					$i['end'] = $i['end']->addHours($i['lenofstay'] * 24)->addSeconds(-1);
					$check = $this->product->check($i, $detail->productid)->get();
					if($check->count() == 0){//If the item is not reserved for the date selected
						$replacement = $this->product->getObject()
							->where('producttypeid' , '=', $product->producttypeid)
							->where('productprice', '<=' , $product->productprice)
							->get();
						array_push($conflict, array('conflict' => $detail, 'replacement' => $replacement));
						
					}else{//IF the item is reserved for the date selected
						$listprodtaken = $this->product->check($i, $detail->productid)->get()->lists('productid');
						//dd($listprodtaken);
						$replacement = $this->product->getObject()
							->where('producttypeid' , '=', $product->producttypeid)
							->where('productprice', '<=' , $product->productprice)
							->where('id' , '<>' , $product->id)
							->whereNotIn('id', $listprodtaken)
							->get();
						if(count($replacement) == 0)	return Redirect::to(route('account.show', ['action' =>'reservation' , 'param' =>2]))->withErrors('Some items cannot be rebook/replaced, Please select another date');
						array_push($conflict, array('conflict' => $detail, 'replacement' => $replacement));
					}
				}
		}
		$i['start'] =$i['start']->addSeconds(-1);
		$i['end'] = $i['end']->addSeconds(1);

		return View::make('default.booking.rebook2')->withConflict($conflict)->with('bookingInfo',$b);
	}
	public function rebook3(){

		$i = Input::all();
		$r = ['count'=> 'required' , 'bookingid' => 'required' , 'date_start' => 'required', 'date_end' =>'required', 'lenofstay'
		=> 'required' , 'timeofday' =>'required'];
		$v = Validator::make($i,$r);
		if($v->fails()){
			die('Some data that must not be shown has been altered!');
		}
		$count = $i['count'];
		for($x =0; $x < $count; $x++){
			$r['replace'.$x] = 'required|';
			$r['item'.$x] = 'required';
			for($y = 0; $y < $count;$y++){
				if($y != $x)
				$r['replace'.$x] .= 'different:replace'.$y;
			}
		}
		$m = ['different' => 'Replacement Item must not be the same'];
		$v = Validator::make($i,$r, $m);
		if($v->fails())return Redirect::to(route('account.show', ['action' =>'reservation' , 'param' =>2]))->withErrors($v->messages()->first());
		for($x =0; $x < $count; $x++){
			$product = $this->product->find($i['replace'.$x]);
			$this->bookingdetails->changeRoom( $i['item'.$x],$product , [
																		'start' => $i['date_start'],
																		'end' => $i['date_end'],
																		'lenofstay' => $i['lenofstay'],
																		'timeofday' => $i['timeofday']
																		]);
		}
		//Edit booking entry
		$booking = $this->booking->find($i['bookingid'])->first();
		$booking->bookingstart = Helpers::ConvertToSimpleDate($i['date_start']);
		$booking->bookingend = Helpers::ConvertToSimpleDate($i['date_end']);
	//	$booking->time = ''.explode(':', $i['timeofday'])[0].'';
		$booking->save();

		$mailsController =  App::make('MailsController');
    	$mailsController->mail->create(
                    [
                      'sendername' => 'System',
                      'senderemail' => SiteContents::where('title' ,'email')->first()->value,
                      'receiveremail' => SiteContents::where('title' ,'email')->first()->value,
                      'receivername' => 'System',
                      'subject' => 'Rebook Notification',
                      'message' => 'A reservation was re-booked.<br/> Booking id: '.$booking->bookingid.'<br/>Re-booked by: '.$booking->account->fullname(),
                      'status' => 5
                    ]
                  );
		return Redirect::to(route('account.show', ['action' =>'reservation' , 'param' =>2]))->with('flash_message','Reservation has been rebooked.');
		
		
	}
	public function diffdatehours($start,$end){
		$start = new Carbon($start);
		$end = new Carbon($end);
		$d = $end->diff($start);
		$n= $d->h;
		$n += $d->days * 24;
		return $n;
	}
	public function addOnSessionItems($bookingid){
		 $products = Session::pull('items');
         if($products){
         foreach ($products as $key => $value) {
                    if($value['product'] == "Room Excess Fee")
                        unset($products[$key]);
         }
                $products = array_values($products);
                Session::put('items' , $products);
                }

		$booking = Booking::find($bookingid);
		
		if($bookingid){
			$rooms = $this->product->getObject()->where('producttypeid' , '>' ,2)->where('producttypeid' , '<' , 5)->paginate(6);
			$rooms->totalCount = $rooms->count();
			foreach ($rooms as $room)
			{
				if(Files::find($room->fileid) == null) $room->attr = 0;
				else $room->attr = Files::find($room->fileid);		
			}
			return View::make('admin.cashier.cashier-addsessionitems')->withRooms($rooms)->withBooking($booking);
		}
		else die("Invalid reservation.");
				
	}
	public function checkoutaddsessionitems($bookingid){

		$booking = Booking::find($bookingid);
		$bookingdetails = $this->bookingdetails->findByBookingRefid($bookingid)->first();
	
		
		if($bookingid){
			$items = Session::pull('items');
			if(count($items) == 0)die("Invalid session.");
			foreach ($items as $i) {
				$bd = new BookingDetails();
				$bd->bookingstart = $bookingdetails->bookingstart;
				$bd->bookingend = $bookingdetails->bookingend;
				$bd->productid = $i['productid'];
				$bd->productname = $i['product'];
				$bd->quantity = $i['quantity'];
				$bd->bookingreferenceid = $bookingid;
				$bd->temporary = 2;//additional item flag for checkout
				$bd->time = $bookingdetails->time;
				$bd->save();
			}
			return Redirect::back()->with('flash_message' , "Items Added to reservation.");
		}
		else die("Invalid reservation.");

	}

	
}
	//available	
					//create new booking
					//create new transaction
					//create new booking details
					/*$d = Booking::join('account' , function($j) use ($id, $date){
						$j->on('booking.account_id' , '=', 'account.id');

					})->where('bookingid' , '=' , $id)->first();
					$b['Firstname'] = $d->firstname;
					$b['start'] = $date['start'];
					$b['end'] = $date['end'];
					$b['Lastname']  = $d->lastName;
					$b['id'] = $d->account_id;
					$b['paymenttype'] = 'full';*/