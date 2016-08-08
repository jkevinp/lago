@extends('layout.template')

@section('header')

@stop

@section('content')
 
 <div class="col-lg-8 col-lg-offset-2 ">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
  <div class="carousel-inner" role="listbox">
    <div class="item active">
     	<div class="" style="min-height:100%;">
            <div class="row">
                <div class="col-lg-10 col-lg-offset-1" >
                    	<legend align="center">
                            <br/>
                            <p>Please read the terms of agreement before proceeding.</p>
                            
                        <h3>Terms of Service and Condition.</h3>
                        </legend>
                  
                            <p>Initial 50% downpayment is needed to verify your reservation.</li>
                            <p>No refund policy</li>
                            <p>Please be reminded that you can upgrade your room once your initial reservation payment is confirmed in our system.</li>
                            <p>Downgrading of rooms are also possible but there is no deduction on the original room price you reserved prior to the changes.</li>
                            <p>All rooms changes are subject on availability.</li>
                    
                        <hr/>

                        <h5 align='center'><p id="helper">Proceeding After <span id="time"> </span> seconds</p></h5>   
                          
                        <div style="width:100%" class="form-group">
                            <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                                <div class="btn-group" role="group">
                                       <a href="#" class="btn btn-block btn-default " id="btn_next">
                                            <i class="fa fa-check fa-fw" ></i>Proceed</a>
                                </a>
                                  
                                    <br>
                                </div>
                                <div class="btn-group" role="group">
                                <a href="{{route('book.index' , ['type' => 4])}}" class="btn btn-default padded-text5 ">
                                            <i class="" ></i> Avail Additional Services</a>
                                </div>
                            </div>
                        </div>

                         
                </div>
            </div>
        </div>
    </div>
    <div class="item">
        <div class="" style="height:100%">
            <div class="row">
                <div class="col-md-10 col-md-offset-1" align="">
                    <br/>
                        <h3>Booking Information</h3>
                        <hr class="intro-divider" align='left'>
                      
                        @if((Session::get('account_info')))
                        <div class="alert alert-success" align='center'>
                            We have found that you have already booked with us. We filled the details form automatically for your convience.
                        </div>
                        @else 
                        <div class="alert alert-warning" align='center'>
                            The Email-Address you used cannot be found on our database.
                            Please Fill up the form below.
                        </div>
                        @endif
                        {{Form::open(array('route' => 'book.store' ,'id' => 'formx'))}}
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Title:</label>
                                </div>
                                <div class='col-md-7'>
                                {{
                                Form::select('Title', 
                                            array('MR' => 'Mr',
                                                'MRS' => 'Mrs',
                                                'MS' => 'Ms'),  
                                      isset(Session::get('account_info')['title']) ? Session::get('account_info')['title'] : 'MR',
                                        array('class' => 'form-control'));
                                }}
                                </div>
                            </div>
                        </div>
                        
                         <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Firstname:</label>
                                </div>
                                <div class='col-md-7'>
                        {{Form::text('Firstname', isset(Session::get('account_info')['firstname']) ? Session::get('account_info')['firstname'] : '' , 
                                    array('class' => 'form-control text-only',
                                        'placeholder' => 'First Name',

                                        ))
                        }}
                                </div>
                            </div>
                        </div>
                         <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Middle Name:</label>
                                </div>
                                <div class='col-md-7'>
                        {{Form::text('Middlename',  isset(Session::get('account_info')['middleName']) ? Session::get('account_info')['middleName'] : '', 
                                    array('class' => 'form-control text-only',
                                        'placeholder' => 'Middle Name',

                                        ))
                        }}
                                </div>
                            </div>
                        </div>
                         <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Lastname:</label>
                                </div>
                                <div class='col-md-7'>
                        {{Form::text('Lastname', isset(Session::get('account_info')['lastName']) ? Session::get('account_info')['lastName'] : '' , 
                                    array('class' => 'form-control text-only',
                                        'placeholder' => 'Last Name',

                                        ))
                        }}
                                </div>
                            </div>
                        </div>
                         <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Contact number:</label>
                                </div>
                                <div class='col-md-7'>
                        {{Form::text('ContactNumber' ,isset(Session::get('account_info')['contactnumber']) ? Session::get('account_info')['contactnumber'] : '',
                                        array(
                                            'class' => 'form-control',
                                            'placeholder'=> 'Contact Number',
                                            'id' => 'cno'
                                            )
                                        )

                        }}
                                </div>
                            </div>
                        </div>
                         <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Email-Address</label>
                                </div>
                                <div class='col-md-7'>
                      
                        {{Form::text('Email' ,isset(Session::get('account_info')['email']) ? Session::get('account_info')['email'] : Session::get('email'),
                                        array(
                                            'class' => 'form-control',
                                            'placeholder'=> 'E-mail Address',
                                            
                                            )
                                        )

                        }}
                                </div>
                            </div>
                        </div>
                        <div class='form-group'>
                            <div class='row'>
                                <div class='col-md-3'>
                                    <label>Confirm Email-Address</label>
                                </div>
                                <div class='col-md-7'>                        
                        {{Form::text('Email2' ,isset(Session::get('account_info')['email']) ? Session::get('account_info')['email'] : Session::get('email'),
                                        array(
                                            'class' => 'form-control',
                                            'placeholder'=> 'Confirm E-mail Address',
                                            
                                            )
                                        )

                        }}
                                </div>
                            </div>
                        </div>


                        <div style="width:100%" class="form-group">
                            <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                                <div class="btn-group" role="group">
                                    <a href="#" class="btn btn-primary btn-lg padded-text5 " id="btn_next1">
                                    <span class="network-name">Next</span>
                                </a>
                                  
                                    <br>
                                </div>
                                <div class="btn-group" role="group">
                                    {{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg padded-text5')) }}
                                </div>
                            </div>
                        </div>
                     
                        
                    </div>
            </div>
        </div>
    </div>
    <!-- Summary -->
     <div class="item">
        <div class="container" style="height:100%">
            <div class="row">
                <div class="col-lg-12" align="center">
                    <br/>
                        <h3>Summary and Payment Option</h3>
                        <div class="alert alert-success">
                           Please review your reservation before proceeding.
                        </div>
                        <div class="col-md-10 col-md-offset-1" >

                                @if((Session::get('admin-checkout')))
                                <div class='row'>
                                 <div class='col-md-6'> <h5>Please select type of payment.</h5></div>
                                  <div class='col-md-6'>
                                  {{Form::select('paymentmode', array('bank' => 'Bank','cashier' => 'Cashier'),'bank',array('class' => 'form-control' , 'id' => 'select-modeofpayment'));
                                   
                                }}
                                 </div>
                                  </div>
                                @endif



                        <div class='row'>
                               
                            
                                <div class='col-md-6'> <h5>Please select mode of payment.</h5></div>
                                <div class='col-md-6'>   {{
                                Form::select('paymenttype', 
                                                array('half' => '50% downpayment','full' => 'Full payment'),'half',array('class' => 'form-control' , 'id' => 'select-mode'));
                            }}
                          </div>
                            </div>
                           
                            @if((Session::get('items')))
                            <table class="table table-responsive table-hover table-bordered ">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Unit Price</th>
                                    <th>Price</th>
                                </tr>
                           
                            @foreach (Session::get('items') as $i)
                                <tr>
                                    <td align="left">{{$i['product']}}</td>
                                    <td align="right">{{$i['quantity']}}</td>
                                    <td align="right">{{Helpers::ToNumber($i['price'])}}</td>
                                    <td align="right">{{Helpers::ToNumber($i['price'] * $i['quantity'])}}</td>
                                </tr>
                            @endforeach
                            <tr> 
                                    <td></td>
                                    <td></td>
                                    <td>Sub-total:</td>
                                    <td align="right"><b>{{Helpers::ToNumber(Session::get('originalFee'))}}</b></td>
                            </tr>
                            <!-- <tr> 
                                    <td></td>
                                    <td></td>
                                    <td>Tax({{AppConfig::getTax() * 100;}}%): </td>
                                    <td align="right"><b>{{Helpers::ToNumber(Session::get('originalFee')  * (AppConfig::getTax()))}} </b></td>
                            </tr> -->
                            <tr> 
                                    <td></td>
                                    <td></td>
                                    <td>Total Bill:</td>
                                    <td align="right"><b>{{Helpers::ToNumber(Session::get('totalFee'))}}</b></td>
                            </tr>
                             <tr> 
                                    <td></td>
                                    <td></td>
                                    <td>Deposit Amount: </td>
                                    <td align="right"><b class="deposit_amount" data-fullamount="{{Session::get('totalFee')}}">{{Helpers::ToNumber(Session::get('totalFee')/2) }}</b></td>
                            </tr>
                             </table>
                        </div>
                              @endif
                        <br/>
                        <div style="width:50%">
                            <div class="btn-group btn-group-justified" role="group" aria-label="..." >
                                <div class="btn-group" role="group">
                                    {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-lg padded-text5' ,'id' => 'go')) }}
                                    <br>
                                </div>
                               <!--  <div class="btn-group" role="group">
                                    {{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg padded-text5')) }}
                                </div> -->
                            </div>
                        </div>
                        {{ Form::close() }}
                        
                    </div>
            </div>
        </div>
    </div>
  </div>

  <!-- Controls -->

  <a style="display:none;" class="left carousel-control" id="back" href="#carousel-example-generic" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a style="display:none;" class="right carousel-control" href="#carousel-example-generic" id="next" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</p>
@stop

@section('script')

    <script type="text/javascript">
    function formatNumber(number)
{
    number = number.toFixed(2) + '';
    x = number.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

    $(document).ready(function(){
        $('#select-mode').on('change' , function(e){
            if($(this).val() == "full"){
                var full = parseFloat($('.deposit_amount').data('fullamount'));
                $('.deposit_amount').html(formatNumber(full));
            }else{
                var half = parseFloat($('.deposit_amount').data('fullamount')) /2;
                $('.deposit_amount').html(formatNumber(half));
            }
            //;
        });

    var result = false;
        $('#formx').submit(function(e){
            if(result == false){
                e.preventDefault();
                bootbox.confirm('<h3>Reservation Confirmation!</h3><hr/>You have selected ' + $('#select-mode').val() + ' payment mode.', function(r){
                    if(r){
                        $('#go').attr('disabled' ,true);
                        result = r;
                        $('#formx').submit();
                    }
                });
            }else{
            
            } 
        });
         $('.carousel').carousel('pause');
         $('#next').prop('disabled', true);
         $('#back').prop('disabled', true);
         $('#btn_next').prop('disabled', true);
        var time =1;
        var total = 2;
        var proc = setInterval(function() {
            time +=1;
            if(time > total -1){
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
        $('#btn_next1').click(function(){
            $('#next').click();
        });

        $('#select-modeofpayment').on('change', function(e){
            var _value=  $(this).val();
            if(_value == "bank"){
              $('#select-mode').html('<option value="half" selected="selected">50% downpayment</option><option value="full">Full payment</option>');

            }else{
                $('#select-mode').html('<option value="full">Full payment</option>');
              
            }
            $('#select-mode').change();
            console.log(_value);
        });
        
    });
    </script>

<script src="{{URL::asset('default')}}/js/reservation.js"></script>
@stop
-