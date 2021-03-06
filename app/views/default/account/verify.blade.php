@extends('layout.template')
@section('content')
<div class="row">
	<div class="col-md-4 col-md-offset-4">
		<legend class="text-center">Account Activation</legend>
			<div class="form-group">
			{{Form::open(array('route' => 'account.activate', 'method' => 'post'))}}
			{{Form::hidden('code' , $code)}}
			{{Form::hidden('email' , $account->email)}}
			{{Form::text('Email-Address',$account->email, array('class' => 'padded-text form-control disabled input-lg' ,'disabled' => 'true' ,'style' =>'color:black'))}} <br/>
			{{Form::password('password', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Enter A new password'))}}
			{{Form::password('password1', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Confirm new password'))}}
			<br/>
			<div class="btn-group btn-group-justified" role=""> 
				<div class="btn-group" role="group">{{Form::submit('Activate' ,['class' => ' btn-lg btn btn-primary'])}}</div>  	
				<div class="btn-group" role="group">{{Form::reset('Reset' ,['class' => 'btn btn-lg  btn-default'])}}</div>
			</div>  
			{{Form::close()}}
		</div>
	</div>
</div>
@stop