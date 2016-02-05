<?php
namespace Sunrock\Repositories;
use Booking;
use Sunrock\Interfaces\BookingRepository;
use Helpers;
use Carbon\Carbon;
use DB;
class EloquentBookingRepository implements BookingRepository
{
	private $page = 6;

	public function all(){
		return Booking::all();
	}
	public function getObject(){
		return new Booking();
	}

	public function find($id){
		return Booking::where('bookingid', '=' ,$id);
	}
	public function changeStatus($id,$status)
	{
		$booking = Booking::where('bookingid', '=' , $id)->first();
		date_default_timezone_set('Asia/Manila');
		if($booking)
		{
			if($status == 3)//checkin
			{
				$booking->time_checkin= date('Y-m-d G:i:s');
			}
			else if($status == 4){
				$booking->time_checkout = date('Y-m-d G:i:s');
			}
			$booking->active = $status;
			$booking->save();
			return $booking;
		}
		return false;
	}

	public function paginate(){
		return Booking::paginate($this->page);
	}
	public function create($input)
	{
		$id = $this->generateBookingId();
		$booking = new Booking();
		$booking->bookingid = $id;
		$booking->bookingreferenceid = $this->generateBookingReference($input['Firstname'] , $input['Lastname']);
		$booking->bookingstart = Helpers::ConvertToSimpleDate($input['start']);
		$booking->bookingend = Helpers::ConvertToSimpleDate($input['end']);
		$booking->totalduration = $this->countDays($booking->bookingstart , $booking->bookingend);
		$booking->account_id = $input['id'];
		$booking->active =  0;
		$booking->fee = $input['fee'];
		$booking->bookingmode = $input['bookingmode'];
		$booking->paymenttype = $input['paymenttype'];
		$booking->confirmationcode = $input['booking_confirmation_code'];
		$temp = $booking;
		$booking->save();
		$temp->bookingid = $id;
		return $temp;
	}
	public function countDays($date1, $date2)
	{
		 $now = strtotime($date1);
	     $your_date = strtotime($date2);
	     $datediff = abs($now - $your_date);
	     return floor($datediff/(60*60*24)) + 1;
	}
	public function getStartingToday()
	{
		$time = Carbon::today('Asia/Manila');
		return Booking::where('bookingstart', '=' , $time );
	}
	public  function getEndingToday()
	{
		$time = Carbon::today('Asia/Manila');
		return Booking::where('bookingend', '=' , $time );
	}
	public function getNotAttended()
	{
		$time = Carbon::today('Asia/Manila');
		return Booking::where('bookingstart', '<=' , $time )->where('bookingend', '>=' , $time);
	}

	public function generateBookingId()
	{
		$micro_date = microtime();
		$date_array = explode(" ",$micro_date);
		$date = date("YmdHis",$date_array[1]);
		return str_random(3).$date;
	}
	public function generateBookingReference($firstname, $lastname)
	{
		return $firstname[0].$lastname[0].str_random(5);
	}
	public function search($keyword)
	{
		/*$booking =DB::table('booking')
        ->join('account', function($join) use ($keyword)
        {
            $join->on('booking.account_id', '=', 'account.id')
           		 ->where('account.id' ,'=', 'booking.account_id')
                 ->orWhere('firstname', 'LIKE', "%$keyword%")
                 ->orWhere('lastName', 'LIKE', "%$keyword%")
                 ->orWhere('middleName', 'LIKE', "%$keyword%");
        });*/
		$booking =  Booking::select('*')->whereExists(function($q) use ($keyword)
		{
			$q->select(DB::raw('*'))
			->from('account')
			->whereRaw("
						account.id = booking.account_id and
									account.lastName LIKE '$keyword%'
								 ");
		});
		return $booking;
	}
}