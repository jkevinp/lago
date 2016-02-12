@extends('layout.admin-dashboard')

@section('content')
@include('admin.form.search')
	<div class="row mt">
		<div class ="col-md-12">
			<div class="content-panel">
				@include('admin.tables.booking-checkin-list')
			</div>
		</div>
	</div>
@stop

@section('script')
<script type="text/javascript">
 $('td').on('click', 'a', function(e) {
   var href = $(this).attr('data-href');
    var paymenttype = $(this).attr('data-payment');
    var status = $(this).attr('data-status');
    var totalbill  = $(this).attr('data-totalbill');
    var downpayment = $(this).attr('data-downpayment');
    var balance = totalbill - downpayment;
    var msg= "";
    var makeFullyPaid = false;
    if(paymenttype == "half" && status == 'confirmed') {
      msg = "Outstanding balance found! <br/><span style='color:red;'>PHP: " + formatNumber(balance) + "</span><br/> Please ask the customer to pay the balance during checkout. <br/> Press 'Ok' to continue.. ";
      makeFullyPaid = $(this).attr('data-id');
    }
       bootbox.confirm("Check in this reservation? " + msg  , function(result) 
       {
          if(result)
          {
            if(makeFullyPaid) href = href + "/" +makeFullyPaid;
            document.location = href;
          }
      }); 
}); 
</script>
@stop
