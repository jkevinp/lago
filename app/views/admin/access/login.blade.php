@extends('layout.template')

@section('content')
<div class="col-lg-8 col-lg-offset-2 bg-white-0">
 <!-- Header -->
    <div class="intro-header1">
        <div class="" style="height:50vh;">
            <div class="row" style="margin-top:100px !important">
              <div class="col-md-6 col-md-offset-3">
                    <div class="intro-message">
                      <h3 class="text-center"><i class="fa fa-sign-in"></i> User's Login</h3>
            {{ Form::Open(array('route' => 'cpanel.account.auth' ,  
              'method' => 'post' , 
              'class' => 'form-horizontal dynamic-form'))
            }}
              
              <div class="form-group">
                  <div class="col-sm-12">
                    {{Form::text('username',null,array(
                  'placeholder' => 'Username/E-mail Address',
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
                      <a class="btn btn-success btn-lg" href="{{URL::action('account.register')}}">Join Now!</a>
                      </div>
                      <div class="btn-group" role="group">
                      <a class="btn btn-danger btn-lg" href="{{URL::action('account.forgot')}}">Forgot Password</a>
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