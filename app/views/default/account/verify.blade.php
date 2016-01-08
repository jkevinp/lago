@extends('layout.template')
@extends('layout.form-horizontal')
@section('content')

	@section('form-title')
		Account Activation
	@stop
	@section('form-help')
		To complete account verification process, set a new password for your account.
	@stop
	@section('form-content')
		{{Form::open(array('route' => 'account.activate', 'method' => 'post'))}}
		<div class="form-group form-group-sm">
		{{Form::hidden('code' , $code)}}
		{{Form::hidden('email' , $account->email)}}
		{{Form::text('Email-Address',$account->email, array('class' => 'padded-text disabled input-lg' ,'disabled' => 'true' ,'style' =>'color:black'))}} <br/>
		{{Form::password('password', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Enter A new password'))}}
		{{Form::password('password1', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Confirm new password'))}}
		</div>
	@stop

@stop