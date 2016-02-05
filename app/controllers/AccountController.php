<?php

use Sunrock\Interfaces\AccountRepository as AccountRepository;
use Sunrock\Interfaces\BookingDetailsRepository;
use Sunrock\Interfaces\TransactionRepository as Trepo;
class AccountController extends \BaseController 
{
	public function __construct(AccountRepository $account , BookingDetailsRepository $bookingdetails, Trepo $trepo)
	{	
		$this->transactions = $trepo;
		$this->account = $account;
		$this->bookingdetails = $bookingdetails;
	}
	public function manualauth($id ,$token)
	{
		$user = $this->account->find($id);
		if(!$user) return Redirect::to('/')->withErrors('Request Failed: Invalid Account!');	
		if($user->confirmationcode != $token) return Redirect::to('/')->withErrors('Request Failed: Invalid Token.');
		if($user->active == 0)return Redirect::to('/')->withErrors('Request Failed: Please activate your account. Please check your Email account.');
		Auth::login($user);	
		return Redirect::intended(route('account.dashboard'));
	}
	public function index(){}
	public function dashboard()
	{
		$booking = Auth::user()->booking;
		$countAll = Auth::user()->booking->count();
		$countPending =Auth::user()->booking()->where('active', '=', '0')->count();
		$countPaid = Auth::user()->booking()->where('active', '=', '1')->count();
		$countConfirmed = Auth::user()->booking()->where('active' , '=' ,'2')->count();
		$countOnSession =  Auth::user()->booking()->where('active' , '=' ,'3')->count();
		$countPast =Auth::user()->booking()->where('active', '=', '4')->count();
		$countExpired =Auth::user()->booking()->where('active', '=', '5')->count();
		$countRejected =Auth::user()->booking()->where('active', '=', '6')->count();
		return View::make('default.account.dashboard-home')
					->withBooking($booking)
					->withTitle('My Reservation.')
					->withPending($countPending)
					->withPaid($countPaid)
					->withConfirmed($countConfirmed)
					->withActive($countOnSession)
					->withPast($countPast)
					->withExpired($countExpired)
					->withRejected($countRejected)
					->withTotal($countAll);
	}
	public function login(){
		return View::make('default.account.login');
	}
	public function signin(){
		$input = Input::all();
		$rules = array('username' => 'required','password' => 'required');
		$val  = Validator::make($input, $rules);
		if($val->fails()){
			return Redirect::back()->withInput($input)->withErrors($val->messages());
		}
		else{
			if(Auth::attempt(array('email' => $input['username'], 'password' => $input['password'],'active' => '1')))
				return Redirect::intended(route('account.dashboard'));
			else{
				if($find = $this->account->findByEmail($input['username'])->first()){
					if($find){
						$find->attempt += 1;
						$find->save();
						if($find->attempt >= 3){
							$this->account->Lock($find);
							Event::fire('account.sendForgot', [$find]);
							return Redirect::back()->withInput($input)->withErrors("Account Locked: Please check your E-mail.");
						}
					}
				}
				return Redirect::back()->withInput($input)->withErrors("Please check your login credentials or check if your account is activated and not locked.");
			}
		}
	}
	public function logout(){
		Auth::logout();
		Session::put('flash_message' ,'Successfully Logged out! Come again!');
		return Redirect::route('account.login');
	}
	public function activate(){
		$rules = array('password' => 'required|min:6','password1' => 'required|min:6|same:password');
		$messages = array('same' => 'The :attribute must match','required' => 'The :attribute is required.');
		$val = Validator::make(Input::all(), $rules , $messages);
		if($val->fails())
			return Redirect::back()->withInput()->withErrors($val->messages()->first());
		else
		{	
			$account = $this->account->findByEmailCode(Input::get('email') , Input::get('code'))->first();
			if($account){
				$this->account->changeStatus($account);
				$account = $this->account->updatePassword($account, $account->password, Input::get('password'));
				SessionController::flash('The account has been activated.');
				return Redirect::to('/');
			}
			else{
				return Redirect::to('/')->withErrors('Change Password Failed!');
			}
		}

	}
	public function manualactivation($email, $code){
			$account = $this->account->findByEmailCode($email ,$code)->first();
			if($account){
				$account->password = Hash::make($account->lastName);
				$account->save();
				$account = $this->account->findByEmailCode($email ,$code)->first();
			
				$this->account->changeStatus($account);
				SessionController::flash('Your account has been activated. <br/> Default password set to lastname: <u>'.$account->lastName .'</u>');
				return Redirect::back();
			}
			else{
				return Redirect::to('/')->withErrors('Change Password Failed!');
			}
	}
	public function search(){
		$input = Input::all();
		if(empty($input['keyword']))return Redirect::back()->withErrors('Keyword required!');
		$accounts = $this->account->search($input['keyword'])->get();
		return Redirect::to(route('cpanel.search' ,['action' => 'search' ,'param' => 'result']))->withAccounts($accounts);
	}
	public function updateProfile(){
		return View::make('default.account.account-update')
			->withAccount(Auth::user());
	}
	public function getProfile(){
		$account = Auth::user();
		$countAll = Auth::user()->booking->count();
		$countPending =Auth::user()->booking()->where('active', '=', '0')->count();
		$countPaid = Auth::user()->booking()->where('active', '=', '1')->count();
		$countConfirmed = Auth::user()->booking()->where('active' , '=' ,'2')->count();
		$countOnSession =  Auth::user()->booking()->where('active' , '=' ,'3')->count();
		$countPast =Auth::user()->booking()->where('active', '=', '4')->count();
		$countExpired =Auth::user()->booking()->where('active', '=', '5')->count();
		$countRejected =Auth::user()->booking()->where('active', '=', '6')->count();
		return View::make('default.account.profile')
				->withAccount($account)
				->withTitle('My Profile')
				->withPending($countPending)
					->withPaid($countPaid)
					->withConfirmed($countConfirmed)
					->withActive($countOnSession)
					->withPast($countPast)
					->withExpired($countExpired)
					->withRejected($countRejected)
					->withTotal($countAll)
				->withAction('Profile > View');

	}
	public function settings(){
		return View::make('default.account.settings');
	}
	public function verify($code){
		$query = ['confirmationcode' => $code];
		$account = Account::where($query)->first();
		if($account)
		{
			if($account->active === 0)
			{
				return View::Make('default.account.verify')->withAccount($account)->withCode($code);
			}
			else
			{
				Session::put('flash_message', "The account you're trying to activate is already activated or does not exist.");
				return Redirect::to('/');
			}
		}
		else
		{
			return Redirect::to('/')->withErrors('The account could not be activated: Invalid Confirmation Code/Account');
		}
	}
	public function store()
	{
		//public function create($account, $booking, $token, $mode ,$notes)

	}
	public function show($action , $param ,$addparam = false){
		$actions = ['reservation', 'messages' ,'transaction' ,'bookingdetails'];
		$action = strtolower($action);
		$param = strtolower($param);
		if(in_array($action, $actions))
		{
			switch($action)
			{
				case "bookingdetails":
					$details= $this->bookingdetails->getByRefId($param)->get();
					$details->each(function($detail)
					{
					 	$detail->image = $this->bookingdetails->getMedia($detail->productid);
					});
					$booking = Auth::user()->booking()->where('bookingid' , '=', $param)->first();
					return View::make('default.account.bookingdetails')
						->withTitle('Booking Details')
						->withAction('Booking Details')
						->withDetails($details)
						->withBooking($booking)
						;
				break;
				case "reservation":
					if($param == 'all'){
						$book = Auth::user()->booking;
					}
					else{
						$param = ['active' => $param];
						$book = Auth::user()->booking()->where($param)->get();
					}
					return View::make('default.account.dashboard')->withBooking($book)->withTitle('Reservations')->withAction($action);	
				break;
				case "messages":
					switch($param){
						case "create":
							return View::make('default.account.sendmessage')->withAction($action)
							->withUser(Auth::user());
						break;
						default:
							$messages = Auth::user()->mails()->CreatedDescending()->get();
							return View::make('default.account.messages')->withMessages($messages)->withTitle('Messages')->withAction($action);
						break;
					}
				break;
				case "transaction":
					switch ($param) {
						case 'pay':
							$booking = Auth::user()->booking()->where('active' ,'=','0')->get();
							return View::make('default.account.transaction')
							->withTitle('Transaction')
							->withAction($action.'>'.$param)
							->withBooking($booking)
							;
						break;
					
						case 'all':
							if($param === 'all')
							{
								$transactions = Auth::user()->transaction;
							//var_dump(DB::getQueryLog());
							return View::make('default.account.transaction-list')
							->withTitle('Transaction')
							->withTransactions($transactions)
							->withAction($action);
							}
						break;
						default:
							$match = ['bookingid' => $param , 'active' => 0 , 'account_id' => Auth::id()];
							$count =  Auth::user()->booking()->where($match)->count();
							$booking = Auth::user()->booking()->where($match)->get();
							if($count !== 0)
							{
								return View::make('default.account.transaction')
								->withBooking($booking);
							}
							else
							{
								return Redirect::route('account.show', ['action' => 'transaction' , 'param' => 'all'])->withErrors('The reservation you want to pay might be missing or is being processed.');
							}
						break;
					}
				break;
			}
		}
		else
		{
			return Redirect::route('account.dashboard')->withErrors('The url is invalid.');
		}
		
	}
	public function registrationForm()
	{
		return View::make('default.account.account-create');
	}
	public function forgot()
	{
		return View::make('default.account.password-reset');
	}
	public function sendForgot()
	{
		$input = Input::all();
		$rules = ['email' => 'required|email|exists:account,email'];
		$val = Validator::make($input, $rules);
		if($val->fails())return Redirect::back()->withErrors($val->messages());
		$account = $this->account->findByEmail($input['email'])->first();
		Event::fire('account.sendForgot', [$account]);
	}
	public function passwordResetForm($code)
	{
		
		$account = $this->account->findByCode($code)->where('active' ,'=' ,'1')
					->orWhere('active' , '=', 2)
					->first();
		if($account)
		{
			return View::make('default.account.account-resetpassword')->withAccount($account)->withCode($account->confirmationcode);
		}
		else
		{
			return Redirect::to('/')->withErrors('The request could not be completed: Invalid Confirmation Code or Account not activated.');
		}
	}
	public function changePassword()
	{
		$rules = array('password' => 'required|min:6','password1' => 'required|min:6|same:password');
		$messages = array('same' => 'The :attribute must match','required' => 'The :attribute is required.');
		$val = Validator::make(Input::all(), $rules , $messages);
		if($val->fails())
			return Redirect::back()->withInput()->withErrors($val->messages()->first());
		else
		{	
			$account = $this->account->findByEmailCode(Input::get('email') , Input::get('code'))->first();
			$account = $this->account->updatePassword($account, $account->password, Input::get('password'));
			if($account)
			{
				SessionController::flash('New password has been saved');
				return Redirect::to(route('account.login'));
			}
			else
			{
				return Redirect::to('/')->withErrors('Change Password Failed!');
			}
		}
	}
	public function create()
	{
		$rules = ['Title' => 'required' , 'Firstname' => 'required|min:1', 'Lastname' => 'required|min:1', 'Middlename' => 'required|min:1','ContactNumber' => 'required','Email' => 'required|unique:account|email','Email2' => 'required|same:Email'];
		//get All Input from from
		$input = Input::all();
		//Set a error message for each type of validation error
		$messages = ['required' => 'The :attribute field is required.','same'  => 'The :others must match.'];
		//create the validation
		$val = Validator::make($input, $rules, $messages);
		//check validation
		if($val->fails())return Redirect::back()->withErrors($val->messages())->withInput($input);	//If validation fails..
		$input['password'] = $input['Firstname'][0].$input['Lastname'].str_random(3);
		$input['confirmation_code'] = str_random(10).'k'.str_random(5).'e'.str_random(15);
		if(isset($input['active']))$active = 1;
		else $active = 0;
		$account = $this->account->create($input, $input['usergroup'],$active);
		if($account)
		{
			Event::fire('account.create', [$account]);
			SessionController::flash('Account Successfully created. Please check your E-mail address Inbox or Spam to continue.<br/>Account id:'.$account->id);
			
			return Redirect::to('/');
		}
		return Redirect::back()->withErrors('Could not create account!');
	}

	public function edit()
	{
		$rules = ['id' => 'required', 'Title' => 'required' , 'Firstname' => 'required|min:1', 'Lastname' => 'required|min:1', 'Middlename' => 'required|min:1','ContactNumber' => 'required','Email' => 'required|email'];
		//get All Input from from
		$input = Input::all();
		//Set a error message for each type of validation error
		$messages = ['required' => 'The :attribute field is required.','same'  => 'The :others must match.'];
		//create the validation
		$val = Validator::make($input, $rules, $messages);
		//check validation
		if($val->fails())return Redirect::back()->withErrors($val->messages())->withInput($input);	//If validation fails..
		$find = $this->account->find($input['id']);
		if($find)
		{
			$account = $this->account->edit($find->id, $input , $input['usergroup']);
			if($account)
			{
				SessionController::flash('Account Successfully Saved. <br/>Account id:'.$account);
				return Redirect::back();
			}else return Redirect::back()->withErrors('Account could not be edited!');
		}
		return Redirect::back()->withErrors('Account not found!');
	
	}
}

/*
		$matchThese = ['field' => 'value', 'another_field' => 'another_value', ...];
		// if you need another group of wheres as an alternative:
		$orThere = ['yet_another_field' => 'yet_another_value', ...];
		Then:
		$results = User::where($matchThese)->get();
		// with another group
		$results = User::where($matchThese)
		    ->orWhere($orThere)
		    ->get();*/