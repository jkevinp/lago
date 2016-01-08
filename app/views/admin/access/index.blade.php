@extends('layout.template')

@section('header')


@stop


@section('content')

 <!-- Header -->
    <div class="intro-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                     	<h3><i class="glyphicon glyphicon-fire"></i>Control Panel Login</h3>
						{{Form::Open(
							array(  
							'method' => 'post' , 
							'class' => 'form-horizontal'))
						}}
							
							<div class="form-group">
							    <div class="col-sm-12">
							      {{Form::text('username',null,array(
									'placeholder' => 'username',
									'class' => 'form-control'
									))}}
							    </div>
							</div>
							<div class="form-group">
							    <div class="col-sm-12">
							    	{{ 
							    		Form::password('password',array('maxlength'=>25,
							    						'id'=>'password',
							    						'class'=>'form-control',
							    						'placeholder'=>'Password',
							    						'title'=>'password',
							    						'style' => 'height:34px'
							    		))
							    	}}  
							    </div>
							</div>
							
							
							<div class="intro-content" align="center">
								<div class="btn-group btn-group-justified" role="group" aria-label="...">
									  <div class="btn-group" role="group">
									   {{ Form::submit('Login', array('class' => 'btn btn-primary btn-lg ')) }}
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



@stop