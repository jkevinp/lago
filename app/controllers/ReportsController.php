<?php
use Carbon\Carbon;
class ReportsController extends \BaseController 
{
	public function charts()
	{
		//if (Request::ajax()) 
	//	{

			$json = Booking::all();	
			return 	Response::json($json);
	//	}else{
			//echo 'Oooopppsss! What are you trying to do? Only Accessible via ajax request!';
		//}
	}
	public function reservations($days)
	{
		$range = Carbon::now()->subDays($days);
	  	$stats = DB::table('booking')
	    ->where('created_at', '>=', $range)
	    ->groupBy('date')
	    ->orderBy('date', 'ASC')
	    ->get([
	      DB::raw('Date(created_at) as date'),
	      DB::raw('COUNT(*) as value')
	    ]);
	    return $stats;

	}
	public function reservationss($days)
	{
		$range = Carbon::now()->subDays($days);
	  	$stats = DB::table('booking')
	    ->where('created_at', '>=', $range)
	    ->groupBy('date')
	    ->orderBy('date', 'ASC')
	    ->get([
	      DB::raw('Date(created_at) as date'),
	      DB::raw('COUNT(*) as value')
	    ]);
	    return $stats;

	}

}
