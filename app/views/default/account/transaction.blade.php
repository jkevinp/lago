@extends('layout.user-dashboard')


@section('content')
<ul class="nav nav-tabs  nav-justified">
  <li role="presentation" id="libank" ><a href="#" id="bank">Bank</a></li>
  <li role="presentation" id="lipaypal"><a href="#" id="paypal">Paypal</a></li>
</ul>
<?php $bookArray = array();?>
@foreach($booking as $book)
    <?php 
        $bookArray[$book['bookingstart'].' ~ '.$book['bookingend']] = [$book['bookingid'] => $book['bookingid']];
    ?>
@endforeach

<div class="row" id="tab-bank" >
    <div id="body">
       {{Form::open(['route' => 'transaction.pay', 'method' => 'post'])}}
           <hr/>
            <div class="col-md-12">
                <div class="alert alert-info">
                    {{Form::hidden('token' , Session::getToken())}}
                    <p><b>We accept Bank deposits via BPI.</b></p>
                    <p>Select the <u>Reservation ID</u> of the reservation you wish to pay then enter the reference/booking code that you received from the bank/paypal.</p>
                    <p>Our staff will verify if the payment has been made. After verification, the reservation will be confirmed.</p>
                    <p>For any notes or instruction, please specify at notes field.</p>
                </div>
            </div>
           
            <table class="table table-responsive" style="width:80%" align="Center">
            <tr>
                <td width="10%">Booking ID:</td>
                <td  width="90%" >  {{ Form::select('bookingId', $bookArray , null , array('class' => 'padded-text form-control '))}}</td>
            </tr>
            <tr>
                <td width="10%">Payment Mode:</td>
                <td  width="90%" ><input type="text" readonly name="paymentmode" value="bank" class="padded-text form-control"></td> 
            </tr>
            <tr>
                <td>Bank Deposit/Transaction Code:</td>
                <td> {{Form::text('code' , '', array('class' => 'padded-text','placeholder' => 'Example: 123ABC'))}}</td>
            </tr>
            <tr>
                <td>Discount Coupon:(Disabled)</td>
                <td> {{Form::text('coupon' , '', array('class' => 'padded-text','placeholder' => 'Example: Sun201312', 'disabled' => 'true'))}}</td>
            </tr>
            <tr>
                <td colspan=2  width=100%>
                {{ Form::textarea('notes', null, ['class' => 'form-control','size' => '300x10' ,'style' => 'resize:none;witdh:100%;height:300px', 'placeholder' => 'Notes or message to the staff. Indicate what bank did you used.']) }}
                </td>
            </tr>
            <tr>
                <td width=50%>{{Form::submit('Send Payment Request', ['class' => 'btn btn-primary' , 'style' => 'width:100%'])}}</td>
                <td width=50%>{{Form::reset('Reset',['class' => 'btn btn-default' ,'style' => 'width:100%'])}}</td>
            </tr>
            </table>
            {{Form::close()}}
    </div>
</div>
    
<div class="row" id="tab-paypal">
    <div id="paypal-mode">
        <br/>
        <div class="col-md-6 col-md-offset-3">
            <legend>Please Select One</legend>
            <a href="#" id="mode1" class="btn btn-lg btn-danger" style="width:100%">I haven't paid yet.</a> <br/>
            <a href="#" id="mode2" class="btn btn-lg btn-success" style="width:100%">I got my Paypal Transaction ID!</a>
            <br/><br/><br/><br/><br/><br/>
        </div>
    </div>
    <div id="body-pay" class="">
        <hr/>
      <div class="col-md-12">
            <div class="alert alert-info">
                    <p><b>We accept payments via paypal.</b></p>
                    <p>To pay via paypal, first create a payment using paypal.</p>
                    <p>Once, payment is done. Copy and enter the transaction ID provided by paypal upon payment.</p>
                    <p>Select the <u>Reservation ID</u> of the reservation you wish to pay then enter the reference/booking code that you received from the bank/paypal.</p>
                    <p>Our staff will verify if the payment has been made. After verification, the reservation will be confirmed.</p>
                    <p>For any notes or instruction, please specify at notes field.</p>
            </div>
        </div>
        {{Form::open(['route' => 'transaction.pay', 'method' => 'post'])}}
        {{Form::hidden('token' , Session::getToken())}}
        <table class="table table-responsive" style="width:80%" align="Center">
            <tr>
                <td width="10%">Booking ID:</td>
                <td  width="90%">
                    {{Form::select('bookingId', $bookArray , null , 
                        array('class' => 'padded-text form-control' ,'id' => 'bookingid-select'))
                    }}
                </td>
            </tr>
            <tr>
                <td width="10%">Payment Mode:</td>
                <td  width="90%" ><input type="text" readonly name="paymentmode" value="paypal" class="padded-text form-control"></td> 
            </tr>
            <tr>
                <td>Paypal Reference Code/Transaction ID:</td>
                <td> {{Form::text('code' , '', array('class' => 'padded-text','placeholder' => 'Example: 123ABC'))}}</td>
            </tr>
            <tr>
                <td>Discount Coupon:(Disabled)</td>
                <td> {{Form::text('coupon' , '', array('class' => 'padded-text','placeholder' => 'Example: Sun201312', 'disabled' => 'true'))}}</td>
            </tr>
            <tr>
                <td colspan=2  width=100%>
                {{ Form::textarea('notes', null, ['class' => 'form-control','size' => '300x10' ,'style' => 'resize:none;witdh:100%;height:300px', 'placeholder' => 'Notes or message to the staff(optional)']) }}
                </td>
            </tr>
            <tr>
                <td width=50%>{{Form::submit('Send Payment Request', ['class' => 'btn btn-primary' , 'style' => 'width:100%'])}}</td>
                <td width=50%>{{Form::reset('Reset',['class' => 'btn btn-default' ,'style' => 'width:100%'])}}</td>
            </tr>
        </table>
        {{Form::close()}}
      
    </div>
    <div id="body-redirect" class="col-md-12">
        <hr/>
        <div class='alert alert-info'>
            <p>Select the reservation you want to pay. Upon selection, details of the reservation will be show. Please check the details carefully.</p>
            <p>This form will only redirect you to paypal for your safety, after the transaction is done. Copy the transaction id provided by paypal and send a payment request by selecting 'I got my paypal transaction ID'</p>
        </div>
        <div class='row'>
            <div class='col-md-4'>Booking ID:</div>
            <div class='col-md-8'>  
                <select class='form-control' id='select-bookingid'>
                    <option value="0" >Select a reservation.</option>
                    @foreach($booking as $book)
                    <option data-arrival="{{$book['bookingstart']}}" data-departure="{{$book['bookingend']}}" value="{{$book['bookingid']}}" data-paymentmode="{{$book['paymenttype']}}" data-totalBill="{{$book['fee']}}">{{$book['bookingid']}}</option> 
                    @endforeach
                </select>
            </div>
        </div>
        <div class='row'>
            <div class='col-md-4'>Payment Mode:</div>
            <div class='col-md-8'><input type='text'  id='book-paymentmode' class='form-control' readonly></div>
        </div>
        <div class='row'>
            <div class='col-md-4'>Total Bill:</div>
            <div class='col-md-8'><input type='text' readonly id='book-totalbill' class='form-control'></div>
        </div>
        <div class='row'>
            <div class='col-md-4'>Downpayment:</div>
            <div class='col-md-8'><input type='text' readonly id='book-downpayment' class='form-control'></div>
        </div>
        <div class='row'>
            <div class='col-md-4'>Arrival:</div>
            <div class='col-md-8'><input type='text' readonly id='book-arrival' class='form-control'></div>
        </div>
        <div class='row'>
            <div class='col-md-4'>Departure:</div>
            <div class='col-md-8'><input type='text' readonly id='book-departure' class='form-control'></div>
        </div>
        <div > 
            <form name="_xclick" action="https://www.paypal.com/ph/cgi-bin/webscr" method="post" id="form-paypal" target="_blank">
            <input type="hidden" name="cmd" value="_xclick">
            <input type="hidden" name="business" value="{{AppConfig::getPaypalEmail();}}">
            <input type="hidden" name="currency_code" value="{{AppConfig::getCurrencyCode();}}">
            <input type="hidden" name="amount" value="" id="amount">
            <input type="hidden" name="item_name" value="Reservation Payment" id='item'>
            <div class='row'>
                <div class='col-md-8 col-md-offset-4'>
                    <br/>
                    <div class='btn-group btn-justified'>
                         <input type="submit" width='100%' border="0"  class="btn btn-primary"  name="submit" value="Generate Paypal Payment" id="submit-paypal"> 
                    </div>
                </div>
            </div>
           
            </form>
        </div>
    </div>
</div>


@stop

@section('script')
<script type="text/javascript">
$('#submit-paypal').click(function(e){
    $('#paypal').click(); 
});
$('#submit-paypal').fadeOut();
$('#select-bookingid').on('change', function(e){
        var value =  $(this).val();
        var t = $("#select-bookingid option:selected" );
        $('#book-downpayment').val('');
        $('#book-totalbill').val('');
        $('#book-paymentmode').val('');
        $('#book-departure').val('');
        $('#book-arrival').val('');
        $('#amount').val('');
        $('#item').val('Reservation Payment');
       $('#submit-paypal').fadeOut();
       if(value == 0){
            bootbox.alert('<h3>I need an ID!</h3><hr/>Please select a valid Booking ID');
       }else{
            if(isNaN(t.attr('data-totalBill'))){
                bootbox.confirm('Fee is not valid. Cannot continue, Please contact admin.' , function(res){
                    if(res){
                         document.location = '/';
                    }
                });   
            }else{
                var downpayment = t.attr('data-totalBill');
                if(t.attr('data-paymentmode') == 'full'){
                    
                }else if(t.attr('data-paymentmode') == 'half'){
                    downpayment = t.attr('data-totalBill') * 0.50;
                }
                downpayment = parseFloat(downpayment).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
                $('#book-paymentmode').val((t.attr('data-paymentmode').toUpperCase()) + ' payment');
                $('#book-totalbill').val((t.attr('data-totalBill').toUpperCase()));
                $('#book-downpayment').val(downpayment);
                $('#book-departure').val((t.attr('data-departure').toUpperCase()));
                $('#book-arrival').val((t.attr('data-arrival').toUpperCase()));
                $('#item').val('Reservation Payment[' + value + ']');
                 $('#amount').val(downpayment);
                 $('#submit-paypal').fadeIn();
            }
       }
});

$('#mode1').click(function(e){
    $('#paypal-mode').fadeOut('fast');
    $('#body-redirect').fadeIn('slow');
});
$('#mode2').click(function(e){
    $('#paypal-mode').fadeOut('fast');
    $('#body-pay').fadeIn('slow');

});

$('#libank').addClass('active');
$('#tab-paypal').fadeOut();
$('#body-pay').fadeOut();
$('#body-redirect').fadeOut();
$('#paypal').click(function(e){
    e.preventDefault();
    $('#libank').removeClass('active');
    $('#lipaypal').removeClass('active');
    $('#lipaypal').addClass('active');
    $('#tab-bank').fadeOut();
    $('#tab-paypal').fadeIn();
    $('#paypal-mode').fadeIn();
    $('#body-pay').fadeOut();
    $('#body-redirect').fadeOut();
});
$('#bank').click(function(e){
    $('#libank').removeClass('active');
    $('#lipaypal').removeClass('active');
    $('#libank').addClass('active');
    $('#tab-paypal').fadeOut();
    $('#tab-bank').fadeIn();

});

</script>       
@stop