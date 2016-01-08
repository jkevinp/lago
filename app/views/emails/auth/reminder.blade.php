@extends('layout.email')
@section('salutations')
Dear {{$Firstname}} {{$Middlename}} {{$Lastname}},
@stop
@section('content')
<hr>
You have requested a password reset.<br/>
<b>Login Id</b>: {{$email}} <br/>
To change your password, please click the Link below<br/>
{{HTML::link(URL::action('account.reset', ['code' => $confirmation_code]))}}<br/>
<hr>

@stop