@extends('layout.user-dashboard')

@section('content')
 

	<div class="row">
		<div class="col-md-12">
 			<div class="box">
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
                      Rejected/Cancelled
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
	 						@if($booking->paymenttype == "full")
	 						{{$booking->fee}}<font color="red">(May change if coupon applied.)</font>
	 						@else
	 						{{($booking->fee * 0.50)}} 
	 						@endif
	 					</div>
 					</div>
 				</div>
 			</div>
 		</div>
	</div>
<div class="row">
 @foreach($details as $bookingdetails)		
  		<div class="col-md-4">
  			<div class="box ">
			  	<div class="box-header">
			  		Product: {{$bookingdetails->productname}}
			  	</div>


			  	<div class="box-body">
					<table class="table table-responsive" >
				   		<tr>
				   			<td>Reserved Quantity: </td>
				   			<td>{{$bookingdetails->quantity}}</td>
				   		</tr>
					</table>
				</div>
				<div class="box-footer">

					<a data-lightbox="image-1" class="example-image-link"  data-title="{{$bookingdetails->productname}}" href="{{URL::asset('default/img-uploads')}}/{{$bookingdetails->image}}" >
			    			<img width="250px" style="margin-left:auto !important;margin-right:auto !important;" height="150px" src="{{URL::asset('default/img-uploads')}}/{{$bookingdetails->image}}"  class="img-thumbnail"/>
						</a>
				</div>
			</div>
  		</div>

@endforeach

	</div>
@stop
