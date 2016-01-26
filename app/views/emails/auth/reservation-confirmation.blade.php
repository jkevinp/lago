@extends('layout.email')
@section('salutations')
Dear {{$Firstname}} {{$Middlename}} {{$Lastname}},
@stop
@section('content')
Thank you for booking with us.<br/>
Please follow the instructions carefully to confirm your reservation.
<br/>
<br/>Your Booking id is {{$bookingid}}.
<br/>{{HTML::link(URL::to('account/manualauth').'/'.$authid.'/'.$confirmation_code,'Pay Now!')}}
<br/>To confirm your reservation, you have to pay <u>P
	@if($paymenttype == 'half')
		{{$fee * 0.5}}
	@elseif($paymenttype =='full')
		{{$fee}}
	@endif
</u> through paypal or via bank deposit.
<br/><br/> To pay via bank, deposit the required bill to any of the following banks nationwide.
<br/>
<br/>
Bank of the Philippines<br/>
Account Number: 3410-0000-74<br/><br/>
Account branch: BPI tanay<br/>
<strong>Account Name: D' One Resort and Restaurant</strong>
<br/>
<b>Please indicate at the comment box what bank you deposit/payed the bill.</b>
<br/>
<br/>To pay via paypal, Login your paypal and send a payment to manuelburce@yahoo.com
<br/><hr>
<b>Once, we've received/confirmed your payment. The reservation will be confirmed and activated.</b>
<br/>You can pay the remaining fee once you've arrived in our resort.
@stop