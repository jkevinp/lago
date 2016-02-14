@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                  
                      <div class="form-panel">
                      <h3>> Checkout </h3>
                      	<div class="row">
                      		<div class="col-md-10 col-md-offset-1">
	                      	
	                      </div>
                      	</div>
                      	<hr>
                        <table class="table table-hover table-bordered" style="text-align:center;">
                        <tr>
                            <th>Qty</th>
                             <th>Unit </th>
                            <th>Article</th>

                            <th>Unit Price</th>
                        </tr>
                        <?php $t = 0;?>
                        @foreach($bookingdetails as $b)
                        <tr>
                            <td>{{$b->quantity}}</td>
                            <td>{{number_format($b->productprice  ,2)}}</td>
                            <td>{{$b->productname}}</td>
                            <td>{{number_format($b->productprice * $b->quantity ,2)}}</td>
                            <?php $t += $b->productprice * $b->quantity ; ?>
                        </tr>

                        @endforeach
                        </table>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Total Amount: </label>
                              <div class="col-sm-2 col-sm-offset-10">
                                  {{Form::text('ContactNumber' ,number_format($t,2),['style'=> 'text-align:right;', 'class' => 'form-control' , 'disabled' => true])}}
                              </div>
                         </div>
                        
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Amount: </label>
                              <div class="col-sm-2 col-sm-offset-10">
                                  {{Form::number('ContactNumber' ,$t,['style'=> 'text-align:right;','class' => 'form-control' ,'min' => $t  ,'id' => 'amt'])}}
                              </div>
                         </div>
                           <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Change: </label>
                              <div class="col-sm-2 col-sm-offset-10">
                                  {{Form::number('ContactNumber' ,0,['style'=> 'text-align:right;','class' => 'form-control' ,'id' => 'amt_change'])}}
                              </div>
                         </div>
                         <br/>  <br/>  <br/>  <br/>
                         <br/><br/><br/><br/><br/>
                        <br/>
                   
                      	
						    <div class="btn-group btn-group-justified" role=""> 
						    	<div class="btn-group" role="group">
						     		<a href="#" id="submit" data-href="{{$route}}"  class="btn btn-primary" data-min="{{$t}}"/>Submit</a>
						  		</div>  	
						  
						    </div>  
                      </div><!-- /form-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->



@stop


@section('script')
<script type="text/javascript">
function isLetter(myString){
  console.log(myString);
if (myString.match(/^[a-zA-Z\s]*$/)) { 
    return true;
  }
  return false;
}
$('#amt').on('change', function(e){
  $('#amt_change').val($(this).val() - $('#submit').data('min'));
});

$('#submit').click(function(e){
  if($('#amt').val() >= $(this).data('min')){
    var href = $(this).data('href');
    bootbox.confirm("Press okay to continue."   , function(result) {

          if(result){
            document.location = href + "/" +$('#amount').val();
          }
      }); 
  }else{
    bootbox.alert("Amount must be greater than total amount.");
  }

});

    $('.text-only').keypress(function(e){
        var letter = String.fromCharCode(e.which);
       if(!isLetter(letter))e.preventDefault();
    });
</script>
@stop