@extends('layout.admin-dashboard')

@section('content')
@include('admin.form.search')
	<div class="row mt">
		<div class ="col-md-12">
			<div class="content-panel">
				@include('admin.tables.booking-checkout-list')
			</div>
		</div>
	</div>
@stop

@section('script')
<script type="text/javascript">
   $('td').on('click', 'a.addHours', function(e) {
    var href = $(this).attr('data-href');
    var msg= "";  
       bootbox.prompt("Add hours to reservation.", function(result) {                
    if (result !== null) {                                             
      if(!isNaN(result) && result > 0)
      {
          if(result > 24)
          {
            bootbox.alert('Add hours must not be greater than 24 hours');
          }
          else
          {
              document.location = href + "/" + result;
          }   
      }
      else
      {
        bootbox.alert('Please enter a valid number!');
      }                        
  }
});
      
  });

  $('td').on('click', 'a.checkout', function(e) {
     var href = $(this).attr('data-href');
     bootbox.confirm("Check Out current session? "   , function(result) 
       {
          if(result)
          {
            document.location = href;
          }
      }); 
});  
</script>
@stop
