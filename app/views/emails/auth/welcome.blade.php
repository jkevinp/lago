@extends('layout.email')
@section('salutations')
Dear {{$Firstname}} {{$Middlename}} {{$Lastname}},
@stop
@section('content')
<hr>
We have generated an account for you to monitor your reservations and payments.<br/>
<b>Login Id</b>: {{$email}} <br/>
To Activate your account automatically, please click the Link below<br/>
{{HTML::link(URL::to('account/verify/' .$confirmation_code))}}<br/>
<hr>

@stop