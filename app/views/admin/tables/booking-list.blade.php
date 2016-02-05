                        <div class="row mt content-panel">
                              <div class="col-md-12">
                                      <table class="table table-striped table-advance table-hover">
                                        <h4><i class="fa fa-angle-right"></i> All Reservations
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
                                              <th><i class="fa fa-bullhorn"></i> Booking ID</th>
                                              <th class="hidden-phone"><i class="fa fa-question-circle"></i> Full Name</th>
                                              <th><i class="fa fa-bookmark"></i> Date start</th>
                                              <th><i class="fa fa-bookmark"></i> Date end</th>
                                              <th><i class="fa fa-bookmark"></i> Check-in Time</th>
                                              <th><i class="fa fa-bookmark"></i> Check-out Time</th>
                                              <th><i class=" fa fa-edit"></i> Status</th>
                                              <th><i class="fa fa-book"></i>Remarks</th>
                                              <th><i class=" fa fa-edit"></i> Actions</th>
                                              <th></th>
                                          </tr>
                                          </thead>
                                          @foreach($bookings as $booking)
                                          <tbody>
                                          <tr>
                                              <td><a href="#">{{$booking['bookingid']}}</a></td>
                                              <td class="hidden-phone">{{$booking->account->fullname()}}</td>
                                              <td>{{$booking['bookingstart']}}</td>
                                              <td>{{$booking['bookingend']}}</td>
                                              <td>
                                                @if($booking['active'] >= 3)
                                                {{$booking['time_checkin']}}
                                                @else
                                                N/A
                                                @endif

                                              </td>
                                              <td>@if($booking['active'] >= 4)
                                                {{$booking['time_checkout']}}
                                                @else
                                                N/A
                                                @endif</td>
                                              <td><span class="label label-info label-mini">
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
                                              </span></td>
                                              <td>
                                                {{$booking['notes']}}
                                              </td>
                                              <td>
                                                  <a href="{{URL::action('cpanel.show', ['action' => 'bookingdetails' , 'param' => $booking['bookingid']])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i> View </button>
                                              </td>

                                          </tr>
                                          @endforeach
                                          </tbody>
                                      </table>
                              </div><!-- /col-md-12 -->
                          </div><!-- /row -->