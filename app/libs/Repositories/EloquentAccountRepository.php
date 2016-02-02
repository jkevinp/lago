<?php
namespace Sunrock\Repositories;
use Account;
use Sunrock\Interfaces\AccountRepository;
use Hash;
use Helpers;

class EloquentAccountRepository implements AccountRepository
{
	private $page = 6;
	public function all(){
		return Account::all();
	}

	public function find($id){
		return Account::find($id);
	}

	public function paginate(){
		return Account::paginate($this->page);
	}
	public function create($input ,$userGroup ,$active)
	{
				$id = $this->generateAccountId();
				$account = new Account();
				$account->id = $id;
				$account->title = $input['Title'];
				$account->firstname = $input['Firstname'];
				$account->middleName = $input['Middlename']; 
				$account->lastName = $input['Lastname'];
				$account->email = $input['Email'];
				$account->contactnumber  = $input['ContactNumber'];
				$account->username = $input['Email'];
				$account->password = $input['password'];
				$account->usergroupid = $userGroup;
				$account->confirmationcode = $input['confirmation_code'];
				$account->active = $active;
				if($input['Title'] =='MR')
					$account->gender = 'male';
				else
					$account->gender ='female';
				$temp = $account;
				$account->save();
				$temp->id = $id;
		return $temp;
	}
	public function edit($id,$input,$userGroup)
	{
		$account = $this->find($id);
		$account->title = $input['Title'];
		$account->firstname = $input['Firstname'];
		$account->middleName = $input['Middlename']; 
		$account->lastName = $input['Lastname'];
		$account->email = $input['Email'];
		$account->contactnumber  = $input['ContactNumber'];
		$account->username = $input['Email'];
		$account->usergroupid = $userGroup;
		if($input['Title'] =='MR')
			$account->gender = 'male';
		else
			$account->gender ='female';
		$temp = $account;
		if($account->save())
			return $account->id;
		else 
			return false;
	}
	public function search($keyword)
	{
		$matches = [
					'username', 
					'email'  ,
					'firstname'  ,
					'lastName'  ,
					'middleName' ,
					'id'
				];

		$ctr =0;
		foreach ($matches as $match)
		{
			if($ctr == 0 ) $accounts = Account::where($match , 'LIKE' , "%$keyword%");
			else $accounts = Account::orWhere($match , 'LIKE' , "%$keyword%");
			$ctr ++;
		}
		return $accounts;
	}
	public function findByEmail($email)
	{
		return Account::where('email', '=', $email);
	}
	public function findByEmailCode($email ,$code)
	{
		return Account::where('email', '=' ,$email)->where('confirmationcode' ,'=', $code);
	}
	public function findByCode( $code)
	{
		return Account::where('confirmationcode' ,'=', $code);
	}
	public function changeStatus($account)
	{
		if($account->active === 0)$account->active=1;
		else $account->active = 0;
		$account->save();
	}
	public function Lock($account){
		$account->attempt = 0;
		$account->active = 2;
		$account->save();
	}
	public function updatePassword($account,$oldPassword ,$newPassword)
	{
		if($account->password == $oldPassword)
		{
			$account->password = Hash::make($newPassword);
			$account->active =1;
			$account->save();
			return $account;
		}
		else
		{
			return false;
		}
	}
	public function generateAccountId()
	{
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("Ym",$date_array[1]);
		$date = $date.rand(0, 1000000).str_random(6);
		return $date;
	}
}