@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> {{$title}} 
                              <span class="badge">
                                @if(count($transactions) == 0)
                                  No records found
                                  @else
                                    {{count($transactions)}} record found.
                                @endif
                              </span>
                            </h4>
	                  	  	  <hr>
                              <thead>
                                <tr>
                                  <th>Discount</th>
                                  <th><i class="fa fa-bullhorn"></i> Booking ID</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Name</th>
                                  <th><i class="fa fa-bookmark"></i> Total Bill</th>
                                  <th><i class="fa fa-bookmark"></i> Discounted Bill</th>
                                  
                                  <th><i class="fa fa-bookmark"></i> Downpayment</th>
                                  <th><i class="fa fa-bookmark"></i> Balance</th>
                                  <th><i class="fa fa-bookmark"> </i> Deposit/transaction Code</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Actions</th>
                                  <th></th>
                              </tr>
                              </thead>
                              	
                              @foreach($transactions as $transaction)
                              <tbody>
                              <tr>
                              	  <td>
                              	  	@if($transaction['couponcode'])
                              	  		<i class="fa fa-check"></i>{{$transaction['couponcode']}}
                              	  	@else
                              	  		<i clas="fa fa-remove"></i>N/A
                              	  	@endif
                              	  </td>
                                  <td>{{$transaction['bookingid']}}</a></td>
                                  <td class="hidden-phone">{{$transaction->account->fullname()}}</td>
                                  <td>{{number_format($transaction['totalbill'],2)}}</td>
                                  <td>
                                    @if($transaction['discountedbill'])
                                    {{number_format($transaction['discountedbill'],2)}}
                                    @else
                                      0.00
                                    @endif

                                  </td>
                                  <td>{{number_format($transaction['downpayment'],2)}}</td>
                                  <td>
                                    @if($transaction['paymenttype'] == "full")
                                      0.00
                                    @else
                                      {{number_format(($transaction['downpayment'] /2),2)}}
                                    @endif
                                  </td>
                                  <td>{{$transaction['codeprovided']}}</td>
                                  <td><span class="label label-info label-mini">{{$transaction['status']}}</span></td>
                                  <td>
                                    <button data-msg="{{$transaction['notes']}}" class="btn btn-theme02 btn-xs"><i class="fa fa-book">

                                    </i> View</button>
                                  	 @if($transaction['status'] == 'created')
                                      <a id="confirm" class="confirm btn btn-success btn-xs" data-href="{{URL::action('cpanel.transaction.confirm' ,array('id' => $transaction['id'] , 'status' => 'confirmed' ,'bookingid' => $transaction['bookingid']))}}">
                                        <i class="fa fa-check"></i>Approve</a>
                                      <a id="reject"  class="reject btn btn-danger btn-xs"  data-href="{{URL::action('cpanel.transaction.reject' ,array('id' => $transaction['id'] , 'status' => 'rejected' ,'bookingid' => $transaction['bookingid']))}}">
                                       <i class="fa fa-remove"></i>Reject
                                      </a>
                                   @endif
                                   @if($transaction['status'] == 'confirmed')
                                   <a id="reject"  class="reject btn btn-warning btn-xs"  data-href="{{URL::action('cpanel.transaction.reject' ,array('id' => $transaction['id'] , 'status' => 'rejected' ,'bookingid' => $transaction['bookingid']))}}">
                                       <i class="fa fa-remove"></i>Cancel
                                      </a>
                                       
                                       @endif
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


@stop

@section('script')
<script type="text/javascript">
   $('td').on('click', 'button', function(e) {
    var notes = '<h3>Client Notes</h3><hr/>' +$(this).attr('data-msg');
       bootbox.alert(notes, function() {
      }); 
  });  
   $('td').on('click', 'a.confirm', function(e) {
    var href = $(this).attr('data-href');
       bootbox.confirm("<h3>Changing reservation status</h3><hr/>Confirm reservation?", function(result) {
          if(result)
            document.location = href;
      }); 
  });  
    $('td').on('click', 'a.reject', function(e) {
    var href = $(this).attr('data-href');
       bootbox.prompt("<h3>Changing reservation status to rejected/cancelled.</h3><hr/>Are you sure you want to reject or cancel the reservation? <br/><font color='red'>Please specify the reason of rejection.</font>", function(result) {
          if(result)
            document.location = href + '/' + result;
          else
            bootbox.alert('Please enter a valid reason to reject or cancel the reservation.');
      }); 

       $('td').on('click', 'a.reject', function(e) {
    var href = $(this).attr('data-href');
       bootbox.prompt("<h3>Changing reservation status to cancelled.</h3><hr/>Are you sure you want to reject reservation? <br/><font color='red'>Please specify the reason of rejection.</font>", function(result) {
          if(result)
            document.location = href + '/' + result;
          else
            bootbox.alert('Please enter a valid reason to cancel the reservation.');
      });
      }); 
  });  
  function msg()
  {
       
  }
</script>
@stop
