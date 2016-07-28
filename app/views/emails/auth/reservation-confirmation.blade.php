@extends('layout.email')
@section('salutations')
Dear {{$Firstname}} {{$Middlename}} {{$Lastname}},
@stop
@section('content')
Thank you for booking with us.<br/>
Please follow the instructions carefully to confirm your reservation.<br/>
<br/>Your Booking id is {{$bookingid}}.
<br/>{{HTML::link(URL::to('account/manualauth').'/'.$authid.'/'.$confirmation_code,'Pay Now!')}}
<br/>To confirm your reservation, you have to pay <u>₱
	@if($paymenttype == 'half'){{number_format($fee * 0.5 ,2)}}
	@elseif($paymenttype =='full'){{number_format($fee,2)}}
	@endif
</u> through bank deposit.
<br/><br/> To pay via bank, deposit the required bill to any of the following banks nationwide.
<br/>
<br/>
Bank of the Philippines<br/>
Account Number: 3410-0000-74<br/><br/>
Account branch: BPI<br/>
<strong>Account Name: {{APP_NAME}}</strong>
<br/>
<b>Please indicate at the comment box what bank you deposit/payed the bill.</b>
<br/>
<br/><hr>
<h3>INSTRUCTIONS:</h3><br/>
1.	After paying, kindly login to your account at the website (<a href="http://www..com/account/login">Login</a>).<br/>
2.	Click the “Pay” button and then fill-up the form provided for “Reference Number / Deposit Code” <br/>
3.	Lastly, click the “Confirmation” button.<br/>

<br/>
<br/>
<br/>
<hr>
<h3>Terms of Service and Condition.</h3><br/>
<p>Initial 50% downpayment is needed to verify your reservation.</li><br/>
<p>No refund policy</li><br/>
<p>Please be reminded that you can upgrade your room once your initial reservation payment is confirmed in our system.</li><br/>
<p>Downgrading of rooms are also possible but there is no deduction on the original room price you reserved prior to the changes.</li><br/>
<p>All rooms changes are subject on availability.</li><br/>


@stop