@extends('layout.template')

@section('header')

@stop

@section('content')
 
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
  <!-- Indicators 
    <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    </ol>
    -->
  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
        <div class="container" style="height:80%">
            <div class="row">
                <div class="col-lg-12">
                        <legend align="center">
                            <br/>
                            <p>Please read the terms of agreement before proceeding.</p>
                            <h5><p id="helper">Proceeding After <span id="time"> </span> seconds</p>
                            </h5>
                            <ul class="list-inline intro-social-buttons">
                            <li>
                                <a href="#" class="btn btn-default " id="btn_next">
                                    <i class="fa fa-twitter fa-fw" ></i> 
                                    <span class="network-name">Proceed</span>
                                </a>
                            </li>
                            
                        </ul>
                            <textarea style="width:70%; height:60%" class="padded-next">
                            Sunrock Terms of Service
                            1.
                        </textarea>
                        </legend>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="container" style="height:80%">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <br/>
                        <h3>Account registration</h3>
                        <h5>Please fill the following Fields.</h5>
                        <hr class="intro-divider">
                        {{Form::open(array('route' => 'account.create'))}}
                        {{
                            Form::select('Title', 
                                            array('MR' => 'Mr',
                                                'MRS' => 'Mrs',
                                                'MS' => 'Ms'),  
                                      isset(Session::get('account_info')['title']) ? Session::get('account_info')['title'] : 'MR',
                                        array('class' => 'padded-text5'));
                        }}
                        {{Form::text('Firstname', isset(Session::get('account_info')['firstname']) ? Session::get('account_info')['firstname'] : '' , 
                                    array('class' => 'padded-text5',
                                        'placeholder' => 'First Name'
                                        ))
                        }}
                        {{Form::hidden('active' , 0)}}
                        {{Form::hidden('usergroup' ,2)}}
                        {{Form::text('Middlename',  isset(Session::get('account_info')['middleName']) ? Session::get('account_info')['middleName'] : '', 
                                    array('class' => 'padded-text5',
                                        'placeholder' => 'Middle Name'
                                        ))
                        }}
                        {{Form::text('Lastname', isset(Session::get('account_info')['lastName']) ? Session::get('account_info')['lastName'] : '' , 
                                    array('class' => 'padded-text5',
                                        'placeholder' => 'Last Name'
                                        ))
                        }}
                        {{Form::text('ContactNumber' ,isset(Session::get('account_info')['contactnumber']) ? Session::get('account_info')['contactnumber'] : '',
                                        array(
                                            'class' => 'padded-text5',
                                            'placeholder'=> 'Contact Number',
                                            'id' => 'cno'
                                            )
                                        )

                        }}
                      
                        {{Form::text('Email' ,isset(Session::get('account_info')['email']) ? Session::get('account_info')['email'] : Session::get('email'),
                                        array(
                                            'class' => 'padded-text5',
                                            'placeholder'=> 'E-mail Address',
                                            
                                            )
                                        )

                        }}
                        {{Form::text('Email2' ,isset(Session::get('account_info')['email']) ? Session::get('account_info')['email'] : Session::get('email'),
                                        array(
                                            'class' => 'padded-text5',
                                            'placeholder'=> 'Confirm E-mail Address',
                                            
                                            )
                                        )

                        }}

                        <br/>
                        <div style="width:50%">
                            <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                                <div class="btn-group" role="group">
                                    {{ Form::submit('Register', array('class' => 'btn btn-primary btn-lg padded-text5')) }}
                                    <br>
                                </div>
                                <div class="btn-group" role="group">
                                    {{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg padded-text5')) }}
                                </div>
                            </div>
                        </div>
                        {{ Form::close() }}
                        
                    </div>
            </div>
        </div>
    </div>
 
  </div>

  <!-- Controls -->

  <a class="left carousel-control" id="back" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" id="next" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@stop

@section('script')
    <script type="text/javascript">
    $(document).ready(function(){
         $('.carousel').carousel('pause');
         $('#next').prop('disabled', true);
         $('#back').prop('disabled', true);
         $('#btn_next').prop('disabled', true);
        var time =1;
        var total = 2;
        var proc = setInterval(function() {
            time +=1;
            if(time > total -1)
            {
                $('#next').prop('disabled', false);
                 $('#back').prop('disabled', false);
                clearInterval(proc);
                $('#btn_next').removeClass('btn-default').addClass('btn-primary');             
                $('#helper').html('By Clicking Proceed You are agreeing to our terms and conditions.');
                
            }
            $('#time').text(total - time);
        }, 1000);
        $('#btn_next').click(function(){
            $('#next').click();
        });
        
    });
    </script>

<script src="{{URL::asset('default')}}/js/reservation.js"></script>
@stop

-