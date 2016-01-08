@extends('layout.email')
@section('salutations')
Dear {{$Firstname}} {{$Middlename}} {{$Lastname}},
@stop
@section('content')
Thank you for booking with us.<br/>
Your payment request has been verified.
If you chose 50% downpayment, you will be asked to pay your remaining balance upon checking-in.

@stop