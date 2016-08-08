@extends('layout.template')
@section('content')
<div class="bg-white-0 col-lg-8 col-lg-offset-2">
	<br/>
	<div class="col-md-4 col-md-offset-4">
		<legend class="text-center">Reset Account</legend>
		
		{{Form::open(array('route' => 'account.changePassword', 'method' => 'post', 'class' =>'dynamic-form'))}}
		<div class="form-group form-group-sm">
		{{Form::hidden('code' , $code)}}
		{{Form::hidden('email' , $account->email)}}
		{{Form::text('Email-Address',$account->email, array('class' => 'form-control padded-text disabled input-lg' ,'disabled' => 'true' ,'style' =>'color:black'))}} <br/>
		{{Form::password('password', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Enter A new password'))}}
		{{Form::password('password1', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Confirm new password'))}}
		</div>
		<div class="btn-group btn-group-justified" role=""> 
				<div class="btn-group" role="group">{{Form::submit('Submit' ,['class' => 'btn-lg btn btn-primary'])}}</div>  	
				<div class="btn-group" role="group">{{Form::reset('Reset' ,['class' => 'btn-lg btn btn-default'])}}</div>
			</div>  
			{{Form::close()}}
					</div>
	</div>
</div>

@stop