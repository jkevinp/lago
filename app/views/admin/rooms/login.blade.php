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
							array('routes' => 'cpanel.login.auth' ,  
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
							<ul class="list-inline intro-social-buttons">
                            <li>
                            	<table class="table-responsive">
                                	<tr>
                                		<td>
                                			{{ Form::submit('Loginnn', array('class' => 'btn btn-primary btn-lg ')) }}
                                		</td>
                                		<td>


                                		</td>
                                		<td> 
    											{{ Form::reset('Reseddt', array('class' => 'btn btn-default btn-lg')) }}
                                		</td>
                                	</tr>
                                </table>
                                
                            </li>
                            <li>
                            </li>
                        </ul>
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