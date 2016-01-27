@extends('layout.template')
@section('content')
<div class="row content">
	<div class="col-md-10 col-md-offset-1">
		<legend class="text-center">Reset Account</legend>
		
		{{Form::open(array('route' => 'account.changePassword', 'method' => 'post'))}}
		<div class="form-group form-group-sm">
		{{Form::hidden('code' , $code)}}
		{{Form::hidden('email' , $account->email)}}
		{{Form::text('Email-Address',$account->email, array('class' => 'form-control padded-text disabled input-lg' ,'disabled' => 'true' ,'style' =>'color:black'))}} <br/>
		{{Form::password('password', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Enter A new password'))}}
		{{Form::password('password1', array('class' => 'form-control padded-text input-lg', 'placeholder' => 'Confirm new password'))}}
		</div>
		<div class="btn-group btn-group-justified" role=""> 
				<div class="btn-group" role="group">{{Form::submit('Submit' ,['class' => 'btn btn-primary'])}}</div>  	
				<div class="btn-group" role="group">{{Form::reset('Reset' ,['class' => 'btn btn-default'])}}</div>
			</div>  
			{{Form::close()}}
					</div>
	</div>
</div>

@stop