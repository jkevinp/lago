                        <div class="row mt">
                              <div class="col-md-12">
                                      <table class="table table-striped table-advance table-hover">
                                        <h4><i class="fa fa-angle-right"></i> Reservations
                                          <span class="badge">
                                            @if(count($bookings) == 0)
                                              No records found
                                              @else
                                                {{count($bookings)}} record found.
                                            @endif
                                          </span>
                                        </h4>
                                        <hr>
                                          <thead>
                                            <tr>
                                             <th><i class="fa fa-bookmark"></i> Full name</th>
                                              <th><i class="fa fa-bullhorn"></i> Booking ID</th>
                                              <th><i class="fa fa-bullhorn"></i> Payment Type</th>
                                              <th><i class="fa fa-bullhorn"></i> Balance</th>
                                              <th><i class="fa fa-bookmark"></i> Date start</th>
                                              <th><i class="fa fa-bookmark"></i> Date end</th>
                                              <th><i class=" fa fa-edit"></i> Status</th>
                                              <th><i class=" fa fa-edit"></i> Actions</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          @foreach($bookings as $booking)
                                          <tbody>
                                          <tr>
                                            <?php $ctr =1;?>
                                            <td><a href="#">
                                              {{($booking['detail']->firstname)}} {{($booking['detail']->middleName)}} {{($booking['detail']->lastName)}}
                                            </a></td>
                                              <td>{{$booking['bookingid']}}</td>
                                              <td>{{$booking['paymenttype']}}</td>
                                              <td>
                                                @if($booking['paymenttype'] == "full")
                                                  0.00
                                                @else
                                                  {{number_format($booking['fee'] /2,2)}}
                                                @endif

                                              </td>
                                              <td>{{$booking['bookingstart']}}</td>
                                              <td>{{$booking['bookingend']}}</td>
                                              <td><span class="label label-info label-mini">
                                                @if(isset($booking))
                                                  @if($booking['active'] == 0)
                                                      Awaiting Payment
                                                  @elseif($booking['active'] == 1)
                                                      Waiting Payment Confirmation
                                                  @elseif($booking['active'] == 2)
                                                      Paid/Confirmed
                                                  @elseif($booking['active'] == 3)
                                                      On Session/Checked-in
                                                  @elseif($booking['active'] == 4)
                                                      Past/Checked-out
                                                  @elseif($booking['active'] == 5)
                                                      Expired
                                                  @elseif($booking['active'] == 6)
                                                    Rejected
                                                  @endif
                                                  @if($booking['transaction'])
                                                    @if($booking['transaction']->paymenttype =='half')
                                                        With Balance
                                                    @else
                                                  @endif
                                              @endif
                                              @endif
                                              </span></td>
                                              <td>
                                                  <a href="{{URL::action('cpanel.show', ['action' => 'bookingdetails' , 'param' => $booking['bookingid']])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> View</button></a>
                                                  @if($booking['active'] == 2 && $booking['transaction'])
                                                    <a id="confirm{{$ctr}}" data-payment="{{$booking['transaction']->paymenttype}}" data-status="{{$booking['transaction']->status}}" data-totalbill ="{{$booking['transaction']->totalbill}}" data-downpayment="{{$booking['transaction']->downpayment}}" data-id= "{{$booking['transaction']->id}}"data-href="{{URL::action('book.changeStatus' ,['id' => $booking['bookingid'] , 'status' => '3'])}}">
                                                      <button class="btn btn-success btn-xs">
                                                      <i class="fa fa-check"></i> Check in</button></a>
                                                  @elseif($booking['active'] == 3)
                                                  @endif
                                              </td>
                                          </tr>
                                          {{form::hidden('ctr' , $ctr)}}
                                          <?php $ctr++;?>
                                          @endforeach
                                          </tbody>
                                      </table>
                              </div><!-- /col-md-12 -->
                          </div><!-- /row -->