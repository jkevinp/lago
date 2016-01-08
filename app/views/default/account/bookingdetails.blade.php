@extends('layout.user-dashboard')

@section('content')
 
<div class="container">
	<div class="row">
		<div class="col-md-10">
 			<div class="panel panel-info">
 				<div class="panel-heading">
 					Booking Details 
 					<span class="badge">
 					 @if($booking['active'] == 0)
                                                    Awaiting Payment
                                                @elseif($booking['active'] == 1)
                                                    Waiting Payment Confirmation
                                                @elseif($booking['active'] == 2)
                                                    Paid/Confirmed
                                                @elseif($booking['active'] == 3)
                                                    On Session/Checked-in
                                                @elseif($booking['active'] == 4)
                                                    Past/Checked-out
                                                @elseif($booking['active'] == 5)
                                                    Expired
                                                @elseif($booking['active'] == 6)
                                                  Rejected
                                                @endif						
 					</span>
 				</div>
 				<div class="panel-body">
 					<div class="row">
	 					<div class="col-md-3">
	 						Booking ID:
	 					</div>
	 					<div class="col-md-3">
	 						{{$booking->bookingid}}
	 					</div>
 					</div>
 					<div class="row">
	 					<div class="col-md-3">
	 						Start Date:
	 					</div>
	 					<div class="col-md-3">
	 						{{$booking->bookingstart}}
	 					</div>
 					</div>
 					<div class="row">
	 					<div class="col-md-3">
	 						End Date:
	 					</div>
	 					<div class="col-md-3">
	 						{{$booking->bookingend}}
	 					</div>
 					</div>

 					<div class="row">
	 					<div class="col-md-3">
	 						Total Bill:
	 					</div>
	 					<div class="col-md-3">
	 						{{$booking->fee}}
	 					</div>
 					</div>
 					<div class="row">
	 					<div class="col-md-3">
	 						Downpayment:
	 					</div>
	 					<div class="col-md-4">
	 						{{($booking->fee * 0.50)}} <font color="red">(May change if coupon applied.)</font>
	 					</div>
 					</div>
 				</div>
 			</div>
 		</div>
	</div>
</div>

 @foreach($details as $bookingdetails)	
 <div class="container">
	<div class="row">
  		<div class="col-md-6" style=" border-right: 2px dashed #333;">
  			<div class="panel panel-default">
			  	<div class="panel-heading">
			  		Product: {{$bookingdetails->productname}}
			  	</div>

			  	<div class="panel-body">
					<table class="table table-responsive" data-height="299">
				   		<tr>
				   			<td>Product ID:</td>
				   			<td> {{$bookingdetails->productid}}</td>
				   		</tr>
				   		<tr>
				   			<td>Reserved Quantity: </td>
				   			<td>{{$bookingdetails->quantity}}</td>
				   		</tr>
					</table>
				</div>
			</div>
  		</div>
  		<div class="col-md-4" style="">
  			<div class="panel panel-default">
			  	<div class="panel-heading">
			  		Product Preview
			  	</div>
			  	<div class="panel-body">
					<a data-lightbox="image-1" class="example-image-link" data-title="{{$bookingdetails->productname}}" href="{{URL::asset('default/img-uploads')}}/{{$bookingdetails->image}}" >
			    			<img width="150px" height="150px" src="{{URL::asset('default/img-uploads')}}/{{$bookingdetails->image}}"  class="img-thumbnail"/>
						</a>
					</div>
			</div>
		</div>
	</div>
</div>
@endforeach
@stop