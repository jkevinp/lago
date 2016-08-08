@extends('layout.template')

@section('header')

@stop

@section('content')
<div class="col-lg-8 col-lg-offset-2 bg-white-0">
                <div class="col-md-6 col-md-offset-3" align="center">
                    <br/>
                        <h3>Register Account</h3>
                        <h5>Please fill the following Fields.</h5>
                        <hr class="intro-divider">
                        {{Form::open(array('route' => 'account.create' , 'class' => 'dynamic-form', 'method' => 'post'))}}
                        {{
                            Form::select('Title', 
                                            array('MR' => 'Mr',
                                                'MRS' => 'Mrs',
                                                'MS' => 'Ms'),  
                                      isset(Session::get('account_info')['title']) ? Session::get('account_info')['title'] : 'MR',
                                        array('class' => 'padded-text5 form-control'));
                        }}
                        {{Form::text('Firstname', isset(Session::get('account_info')['firstname']) ? Session::get('account_info')['firstname'] : '' , 
                                    array('class' => 'padded-text5 form-control',
                                        'placeholder' => 'First Name'
                                        ))
                        }}
                        {{Form::hidden('active' , 0)}}
                        {{Form::hidden('usergroup' ,2)}}
                        {{Form::text('Middlename',  isset(Session::get('account_info')['middleName']) ? Session::get('account_info')['middleName'] : '', 
                                    array('class' => 'padded-text5 form-control',
                                        'placeholder' => 'Middle Name'
                                        ))
                        }}
                        {{Form::text('Lastname', isset(Session::get('account_info')['lastName']) ? Session::get('account_info')['lastName'] : '' , 
                                    array('class' => 'padded-text5 form-control',
                                        'placeholder' => 'Last Name'
                                        ))
                        }}
                        {{Form::text('ContactNumber' ,isset(Session::get('account_info')['contactnumber']) ? Session::get('account_info')['contactnumber'] : '',
                                        array(
                                            'class' => 'padded-text5 form-control',
                                            'placeholder'=> 'Contact Number',
                                            'id' => 'cno'
                                            )
                                        )

                        }}
                      
                        {{Form::text('Email' ,isset(Session::get('account_info')['email']) ? Session::get('account_info')['email'] : Session::get('email'),
                                        array(
                                            'class' => 'padded-text5 form-control',
                                            'placeholder'=> 'E-mail Address',
                                            
                                            )
                                        )

                        }}
                        {{Form::text('Email2' ,isset(Session::get('account_info')['email']) ? Session::get('account_info')['email'] : Session::get('email'),
                                        array(
                                            'class' => 'padded-text5 form-control',
                                            'placeholder'=> 'Confirm E-mail Address',
                                            
                                            )
                                        )

                        }}

                        <br/>
                        <div style="width:50%">
                            <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                                <div class="btn-group" role="group">
                                    {{ Form::submit('Register', array('class' => 'btn btn-primary btn-lg padded-text5 ')) }}
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