
				<div class="row mt">
                  <div class="col-md-12">
                      
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i>Transactions1
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
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Account ID</th>
                                  <th><i class="fa fa-bookmark"></i> Total Bill</th>
                                  <th><i class="fa fa-bookmark"></i> Discounted Bill</th>
                                  <th><i class="fa fa-bookmark"></i> Downpayment</th>
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
                              	  		<i clas="fa fa-remove"></i>
                              	  	@endif
                              	  </td>
                                  <td><a href="basic_table.html#">{{$transaction['bookingid']}}</a></td>
                                  <td class="hidden-phone">{{$transaction['account_id']}}</td>
                                  <td>{{$transaction['totalbill']}}</td>
                                  <td>{{$transaction['discountedbill']}}</td>
                                  <td>{{$transaction['downpayment']}}</td>
                                  <td><span class="label label-info label-mini">{{$transaction['status']}}</span></td>
                                  <td>
                                  	  <button class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> View</button>
                                       <a href="{{URL::action('cpanel.transaction.confirm' ,array('id' => $transaction['id'] , 'status' => 'confirmed' ,'bookingid' => $transaction['bookingid']))}}">
                                        <button class="btn btn-success btn-xs"><i class="fa fa-check"></i>Approve 
                                        </button>
                                      </a>
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i>Edit</button>
                                      <button class="btn btn-danger btn-xs"><i class="fa fa-remove "></i>Reject</button>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


