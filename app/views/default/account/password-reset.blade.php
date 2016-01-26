@extends('layout.template')

@section('header')


@stop


@section('content')
<div class="row content">
 <!-- Header -->
    <div class="intro-header1">
        <div class="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                     	<h3><i class="glyphicon glyphicon-fire"></i>Password Reset</h3>
                     	<div class="alert alert-info">
                     		Enter your Email Address and request a password request.
                     	</div>
						{{Form::Open(
							array('route' => 'account.sendForgot' ,  
							'method' => 'post' , 
							'class' => 'form-horizontal'))
						}}
							
							<div class="form-group">
							    <div class="col-sm-12">
							      {{Form::text('email',null,array(
									'placeholder' => 'E-mail Address',
									'class' => 'form-control'
									))}}
							    </div>
							</div>
							
							<div class="intro-content" align="center">
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									  <div class="btn-group" role="group">
									   {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-lg ')) }}
									  </div>
									  <div class="btn-group" role="group">
									    	{{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg')) }}
									  </div>
									</div>
							</div>

			{{Form::close()}}
                        
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
</div>


@stop