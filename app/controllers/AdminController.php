<?php
use Sunrock\Interfaces\TransactionRepository as trepo;
use Sunrock\Interfaces\MailsRepository as mrepo;
use Sunrock\Interfaces\AccountRepository as arepo;
use Sunrock\Interfaces\CouponRepository as crepo;
use Sunrock\Interfaces\BookingRepository as brepo;
use Sunrock\Interfaces\BookingDetailsRepository as bdrepo;
use Sunrock\Interfaces\ProductRepository as prepo;
use Sunrock\Interfaces\FileRepository as frepo;
use Sunrock\Interfaces\ProductTypeRepository as ptrepo;
use Sunrock\Interfaces\SaleRepository as s;
class AdminController extends \BaseController 
{
	public function __construct(s $s,ptrepo $ptrepo, frepo $frepo ,trepo $trepo  , mrepo $mrepo, arepo $arepo,crepo $crepo , brepo $brepo ,bdrepo $bdrepo,prepo $prepo )
	{
		$this->file = $frepo;
		$this->transaction = $trepo;
		$this->mail = $mrepo;
		$this->account = $arepo;
		$this->coupon = $crepo;
		$this->booking = $brepo;
		$this->bookingdetail = $bdrepo;
		$this->product = $prepo;
		$this->producttype = $ptrepo;
		$this->sale = $s;
	}

	public function signin(){
		Session::flush();
		$input = Input::all();
		$login_rules= array('username' => 'required' , 'password' => 'required');
		$val = Validator::make($input, $login_rules);
		if($val->fails())
			return Redirect::Back()->withErrors($val->messages());
		else
		{
			if(Auth::attempt(['usergroupid' => 1 ,'email' => $input['username'] , 'password' => $input['password'], 'active' => '1']))
			{
				SessionController::flash('Welcome back!');
				return Redirect::intended(route('cpanel.dashboard'));
			}

			else if(Auth::attempt(['usergroupid' => 2 ,'email' => $input['username'] , 'password' => $input['password'], 'active' => '1']))
			{
				SessionController::flash('Welcome back!');

				return Redirect::intended(route('account.dashboard'));
			}
			else if(Auth::attempt(['usergroupid' => 3 ,'email' => $input['username'] , 'password' => $input['password'], 'active' => '1'])){
				SessionController::flash('Welcome back Staff!');
				return Redirect::intended(route('cpanel.dashboard'));
			}
			else
			{
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
		SessionController::flash('Successfully Logged out! Come again!');
		return Redirect::route('cpanel.account.login');
	}

	public function login(){
		return View::make('admin.access.login');
	}

	public function dashboard(){
		$reservations['start'] = $this->booking->getStartingToday()->statusIsConfirmed()->get();
		$reservations['start']->each(function($detail)
		{
				$detail->acc = $this->account->find($detail->account_id);
		});		
			
		$reservations['end'] = $this->booking->getEndingToday()->statusIsConfirmed()->get();
		$reservations['end']->each(function($detail)
		{
				$detail->acc = $this->account->find($detail->account_id);
		});		
		$reservations['notattended'] = $this->booking->getNotAttended()->statusIsConfirmed()->get();
		$reservations['notattended']->each(function($detail)
		{
				$detail->acc = $this->account->find($detail->account_id);
		});		
		return View::make('admin.dashboard.dashboard')
		->withMails($this->mail->all())
		->with('pendingTransaction' ,$this->transaction->findByStatus('created')->get())
		->withReservations($reservations);
	}

	public function show($action, $params, $field = null, $order = null){
		$actions = ['reports','cashier', 'walkin', 'session' ,'file','product', 'bookingdetails', 'transaction', 'account' ,'message' ,'viewmessage','viewaccount' ,'coupon' , 'booking'];
		if(in_array($action, $actions))
		{
			$view = null;
			switch($action)
			{
				case "transaction":
					if($params =='all') $transaction = $this->transaction->all();
					elseif($params >= 0 && $params <=5) $transaction = $this->transaction->findByStatus($params)->get();
					else $transaction = $this->transaction->find($params)->get();
					$view = View::make('admin.transaction.transaction-list')
						->withTitle('View transaction')
						->withTransactions($transaction);
				break;
				case 'account':
					$accounts = $this->account->all();
					$view= View::make('admin.account.account-list')
					->withTitle('View Accounts')
					->withAccounts($accounts);
				break;
				case 'message':
					$mails = $this->mail->all();
					$view= View::make('admin.message.message-list')
					->withTitle('All messages')
					->withMails($mails);
				break;
				case 'viewmessage':
					$mail = $this->mail->find($params);
					if($mail)
					$view= View::make('admin.message.message-view')
					->withTitle('View Message')
					->withMail($mail);
					else 
						return Redirect::to(route('cpanel.dashboard'))->withErrors('Could not find message');
				break;
				case 'viewaccount':
					$account = $this->account->find($params);
					$view= View::make('admin.account.account-view')
					->withTitle('View Account')
					->withAccount($account)
					->withBookings($account->booking)
					->withTransactions($account->transaction);
				break;
				case 'coupon':
					switch ($params) {
						case 'all':
							$coupons = $this->coupon->all();
							$view= View::make('admin.coupon.coupon-list')
							->withTitle('View Coupons')
							->withCoupons($coupons);
						break;
					}
				break;
				case 'booking':
					$bookings = $this->booking->all();
					$view= View::make('admin.booking.booking-list')
					->withTitle('View Reservations')
					->withBookings($bookings);
				break;
				case 'bookingdetails':
					$details = $this->bookingdetail->getByRefId($params)->get();
					$details->each(function($detail)
					{
					 	$detail->image = $this->bookingdetail->getMedia($detail->productid);
					});
					$booking = $this->booking->find($params)->first();
					$view= View::make('admin.booking.bookingdetails-view')
						->withTitle('Booking Details')
						->withAction('Booking Details')
						->withDetails($details)
						->withBooking($booking);
				break;
				case 'product':
				$products = $this->product->all();
				$products->each(function($product){$product->image = $this->bookingdetail->getMedia($product->id);});
				$view= View::make('admin.product.product-list')
						->withProducts($products)
						->withTitle('View Products');
				break;
				case 'file':
					$file = $this->file->find($params);
					$view= View::make('admin.file.file-view')
					->withFile($file);
				break;
				case 'session':
				if($params == 'checkin')
				{
					$bookings = $this->booking->getStartingToday()->statusIsConfirmed()->get();
					$bookings->each(function($detail)
					{
						$detail->detail = $this->account->find($detail->account_id);
						$detail->transaction = $this->transaction->findByBookingId($detail->bookingid)->first();
						
					});
					$view = View::make('admin.booking.booking-checkin-list')
					->withTitle('Check In<br> <h6>Search lastname</h6>')
					->withBookings($bookings)
					->withRoute('bookingcheckin');
				}
				else if($params == 'checkout')
				{
					$bookings = $this->booking->getObject()->statusIsOnSession()->get();
					$bookings->each(function($detail)
					{
						$detail->detail = $this->account->find($detail->account_id);

					});
					$view = View::make('admin.booking.booking-checkout-list')
					->withTitle('Check Out <br> <h6>Search lastname</h6>')
					->withBookings($bookings)
					->withRoute('bookingcheckout');
				}
				break;
				case 'walkin':
					if($params == '1'){
						$view = View::make('admin.walkin.walkin-setinfo');
					}
				break;
				case 'cashier':
				if($params =='pay')
				{
					$rooms = $this->product->getObject()->where('producttypeid' , '>' ,2)->where('producttypeid' , '<' , 5)->paginate(6);
					$rooms->totalCount = $rooms->count();
					foreach ($rooms as $room)
					{
						if(Files::find($room->fileid) == null) $room->attr = 0;
						else $room->attr = Files::find($room->fileid);		
					}
					$view = View::make('admin.cashier.cashier-product')->withRooms($rooms);
				}
				break;
				case 'reports':
					$producttype = ProductType::all()->lists('producttypename' , 'id');
					$view = View::make('admin.reports.report-list')->with(compact('producttype'));
				break;
			}
			$view->withMails($this->mail->all())->with('pendingTransaction' ,$this->transaction->findByStatus('created')->get());
			return $view;
		}
		else
		{
			return Redirect::to(route('cpanel.dashboard'))->withErrors('Invalid Url');
		}
	}

	public function create($action){
		$actions = ['transaction', 'account' ,'message' ,'viewmessage', 'coupon' ,'product' , 'file'];
		if(in_array($action, $actions))
		{
			$view = null;
			switch($action)
			{
				case 'coupon':
					$view=  View::make('admin.coupon.coupon-create')
							->withTitle('Create new coupon');
				break;
				case 'account':
					$view = View::make('admin.account.account-create')
							->withTitle('Create new Account');
				break;
				case 'product':
					$fileList = $this->file->all()->toArray();
					$files = [];
					$productTypeList = $this->producttype->all()->toArray();
					foreach($fileList as $file)
						$files['file id: '.$file['id']] = [$file['id'] => $file['imagename']];

					foreach($productTypeList as $file)$productType['Product Type id: '.$file['id']] = [$file['id'] => $file['producttypename']];
                    $view = View::make('admin.product.product-create')
							->withTitle('Create new Product')
							->withFiles($files)
							->with('productType',$productType);
				break;
				case 'file':
					$view = View::make('admin.file.file-create');
				break;
				case 'message':
					$view = View::make('admin.message.message-create')
						->withUser(Auth::user());
				break;
			}
			$view->withMails($this->mail->all())->with('pendingTransaction' ,$this->transaction->findByStatus('created')->get());
			return $view;
		}
		else return Redirect::to(route('cpanel.dashboard'))->withErrors('Invalid Url');
	}

	public function edit($action, $params){
		$actions = ['transaction', 'account' ,'message' ,'viewmessage', 'coupon' ,'product'];
		if(in_array($action, $actions))
		{
			switch($action)
			{
				case 'coupon':
					$coupon = $this->coupon->find($params);
					if($coupon)
					return View::make('admin.coupon.coupon-edit')
							->withTitle('Edit coupon '.$coupon->id)
							->withCoupon($coupon);
					else return Redirect::to(route('cpanel.dashboard'))->withErrors('Coupon not found!');
				break;
				case 'account':
					$account = $this->account->find($params);
					if($account)
					return View::make('admin.account.account-edit')
							->withTitle('Edit account '.$account->id)
							->withAccount($account);
					else return Redirect::to(route('cpanel.dashboard'))->withErrors('Account not found!');
				break;
				case 'product':
					$product = $this->product->find($params);
					$fileList = $this->file->all()->toArray();
					$productTypeList = $this->producttype->all()->toArray();
					foreach($fileList as $file)$files['file id: '.$file['id']] = [$file['id'] => $file['imagename']];
					foreach($productTypeList as $file)$productType['Product Type id: '.$file['id']] = [$file['id'] => $file['producttypename']];
					if($product)
						return View::make('admin.product.product-edit')
						->withTitle('Edit Product '.$product->id)
						->withProduct($product)
						->withFiles($files)
						->with('productType',$productType);
					else return Redirect::to(route('cpanel.dashboard'))->withErrors('Product not found!');
				break;
			}
		}
		else
		{
			return Redirect::to(route('cpanel.dashboard'))->withErrors('Invalid Url');
		}
	}

	public function search($action, $param){
		$actions = ['search','transaction', 'account' ,'message' ,'coupon', 'bookingcheckin'];
		if(in_array($action, $actions)){
			$view = null;
			$view = View::make('admin.search.search');
			$view->withRoute($action);
			$view->withTitle(' Search '.ucfirst($action).'s');
			$view->withMails($this->mail->all())->with('pendingTransaction' ,$this->transaction->findByStatus('created')->get());
			return $view;
		}
		else 
			return Redirect::back()->withErrors('Invalid URL');
	}

	public function showResults(){
		$actions = ['search','transaction', 'account' ,'message' ,'coupon' ,'bookingcheckin' ,'bookingcheckout'];
		$input = Input::all();
		if(empty($input['keyword']) || !isset($input['route']))return Redirect::back()->withErrors('Keyword required!');
		if(in_array($input['route'], $actions)){
			$view =  View::make('admin.search.result')
				->withTitle('Search results.')
				->withTable($input['route']);

			switch($input['route'])
			{
				case 'account':
					$accounts = $this->account->search($input['keyword'])->get();
					$view->withAccounts($accounts);
				break;
				case 'coupon':
					$coupons = $this->coupon->search($input['keyword'])->get();
					$view->withCoupons($coupons);
				break;
				case 'bookingcheckin':
					$bookings = $this->booking->search($input['keyword'])->where('booking.active', '=' , '2')->get();
					$bookings->each(function($detail)
					{
						$detail->detail = $this->account->find($detail->account_id);
					});
					$view->withBookings($bookings);
				break;
				case 'bookingcheckout':
					$bookings = $this->booking->search($input['keyword'])->where('booking.active', '=' , '3')->get();
					$bookings->each(function($detail)
					{
						$detail->detail = $this->account->find($detail->account_id);
					});
					$view->withBookings($bookings);
				break;		
			}
			$view->withRoute($input['route']);
			return $view;
		}
		else 
			return Redirect::back()->withErrors('Invalid URL');
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
						'children' =>'required|integer|between:0,1000',
						'adult' => 'required|integer|between:0,1000',
						'modeofstay' => 'required'
					];
			if(empty($input['adult']))$input['adult']=0;

	    	$validator =Validator::make($input, $rules);

	    	if($input['children'] + $input['adult'] <= 2)return Redirect::back()->withErrors("Minimun of 3 guest per reservation.");
	    	
	    	if($validator->fails())
				return Redirect::back()->withErrors("Please fill all fields")->withInput($input);
			else 
			{
				//set the date on session
				if($input['timeofday'] == '0' || $input['lenofstay'] == '0')return Redirect::route('static.reservenow')->withErrors('Please select the schedule of reservation')->withInput($input);
				if($input['adult'] == '0' &&  $input['children'] == '0')return Redirect::route('static.reservenow')->withErrors('Number of persons for resort admission is required.')->withInput($input);
				SessionController::BookingSession('setinfo' , $input);
				Session::put('admin-checkout' , 1);
				Session::put('totalFee' ,$this->computeFee(Session::get('items')));
				if(isset($input['route'] ))return  Redirect::route($input['route']);
				return Redirect::route('book.index');
			}
	}
	public function store(){
		$input = Input::all();
		$login_rules= array('username' => 'required' , 'password' => 'required');
		$val = Validator::make($input, $login_rules);
		if($val->fails())
		{
			return Redirect::Back()->withErrors($val->messages());
		}else
		{
			//change to hash::make
			$params = ['username' => $input['username'] , 'password' => $input['password']];
			$auth = Account::where($params)->count();
			if ($auth)
			{
				return Redirect::Back()->withErrors('Login Success');
			}
			return Redirect::Back()->withErrors('Invalid Credentials');
		}
	}
	public function showProducts(){
		$input = Input::all();
		if(Session::has('date_info')){
					$date_info = Session::get('date_info');
					$rooms = $this->product->getAvailable(['start' => $date_info['datetime_start'], 'end' => $date_info['datetime_end']]);
					$total = $date_info['children'] + $date_info['adult'];
					if(isset($input['type'])){
						if($input['type'] == 'recommended'){
						$rooms = $this->product->getAvailable(['start' => $date_info['datetime_start'], 'end' => $date_info['datetime_end']] , $total);
						}
						else if ($input['type'] == 'max'){
							$rooms = $this->product->getAvailable(['start' => $date_info['datetime_start'], 'end' => $date_info['datetime_end']] ,1, $total);
					}
					}
					$rooms->totalCount = $rooms->count();
					foreach ($rooms as $room)
					{
						if(Files::find($room->fileid) == null) $room->attr = 0;
						else $room->attr = Files::find($room->fileid);		
					}
					return View::make('admin.walkin.walkin-products')->withRooms($rooms);
		}
		else
		{
			return Redirect::intended('cpanel.dashboard')->withErrors('Please Specify the required informations.');
		}
	}
	public function AddItem(){
		$input = Input::all();
		$date_info = Session::get('date_info');
		$rules = array('quantity' => 'required' , 'productname' => 'required' );
		$val =  Validator::make($input , $rules);
	
		if($val->fails())return Redirect::back()->withErrors($val->messages());
		 //Check if the Product is still avaiable
		$match = $this->product->getAvailableAddOns(['productquantity' , '>=' , $input['quantity']])
				->first()
				->where('id' , '=' , $input['productid'])->get();
		if(count($match) <= 0)return Redirect::back()->withErrors('The Product is already reserved.');
		else
		{
			SessionController::BookingSession('additem', $input);		
			Session::put('totalFee' ,$this->computeFee(Session::get('items')));
			Helpers::flash('Added '.$input['productname'].' to Reservations List');
			return Redirect::back();
		}
	}
	public function checkout(){
		//create new transaction for this
		//CHECK THE CASHIER TRANSACTION :PARAM :BANKS
		$id = $this->sale->generateId();

		$t = new Transactions();
		$t->account_id = "N/A";
		$t->bookingid = "N/A";
		$t->modeofpayment = "cashier";
		$t->codeprovided = 'cashier'.$this->sale->generateId();
		$t->bankname= "N/A";
		$t->downpayment = 0;
		$t->payeremail = "N/A";
		$t->status= "fullypaid";
		$t->notes = "Auto Generated from sales";
		$t->totalbill = 0;
		$t->paymenttype = "full";
		$t->modeofpayment = "cashier";
		$t->save();
		$totalbill = 0;

		
		foreach (Session::get('items') as $item) {
			$product = $this->product->find($item['productid']);
			//$this->sale->create($id, $product->id, $item['quantity'], $p, Session::getToken(),'addons');
			$price  = $item['price'];
			Sales::create([
					'id' => $this->sale->generateId(),
					'transactionid' => $t->id,
					'productid' => $product->id,
					'productquantity' => $item['quantity'],
					'productprice' => $price,
					'totalprice' => $price * $item['quantity'],
					'type' => 'addons',
					'bookingid' => 'N/A',
					'cartid' => $id
				]);
			$totalbill += $price * $item['quantity'];

		}	
		$t->totalbill = $totalbill;
		$t->save();

		$this->RemoveAllItems();
		$url = URL::action('pdf.invoice', ['cartid' => $id]);
		$url ="<a href='".$url."' target='_blank' class='btn btn-primary'>Print</a>";
		$msg ='Sales Record saved.<hr>'.$url;
		SessionController::flash($msg);
		return Redirect::back();

	}
	public function RemoveAllItems()
	{
		Session::forget('items');
		Session::put('flash_message' ,'Cart has been cleared.');
		return Redirect::back();
	}
	public function DeleteItems($key)
	{
		$item = Session::pull('items');
		if(is_array($item))
		{
			unset($item[$key]);
			$item = array_values($item);
			Session::put('items' , $item);
		}
		Helpers::flash('Item has been removed.');
		Session::put('totalFee' ,$this->computeFee(Session::get('items')));
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
                              if($i['paxmax'] != 0)
                              $roomcounter += 1; 
                            }
            }

   			$guest = Session::get('date_info')['adult'] + Session::get('date_info')['children'];
            $forced = $roomcounter * 10;
            $remaining = $guest - $forced;
            $excess = $guest - $totalCapacity;
	         if($excess > 0)
			{
				$products = Session::pull('items');

				foreach ($products as $key => $value) {
					if($value['product'] == "Room Excess Fee")
						unset($products[$key]);
			//$item = array_values($item);
				}
				$products = array_values($products);

				$product = Product::where("productname" , "Room Excess Fee")->first();
				array_push($products, array(
								'productid' => $product->id,
								'product' => $product->productname , 
								'quantity' => $excess,
								'description' => $product->productdesc,
								'totalquantity' => 'unlimited',
								'type' => 'Admission',
								'price' => $product->getPriceByMode(Session::get('date_info')['modeofstay']),
								'image' => URL::asset('default/img-uploads').'/adult.jpg',
								'removable' => false
							));
				
				Session::put('items' , $products);
			}
			$price = 0;
			foreach (Session::get('items') as $key => $value) {
				$price += $value['price'] * $value['quantity'];
			}

		Session::put('originalFee', $price);

		return  number_format($price, 2, '.', '');
	}


}
