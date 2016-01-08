@extends('layout.user-dashboard')
				

@section('content')
				<div class='row'>
                 	<div class="col-lg-12">
                        <div class="panel panel-info ">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-user fa-fw"></i>
                                    @if(isset($title))
                                        {{$title}}
                                    @endif
                                </h3>
                            </div>

                               <!-- Reservation -->
                          <div class="panel-body ">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-red">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">{{$pending}}</div>
                                                        <div><h6>Awaiting Payment Reservations</h6></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">
                                                           {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => '0']), 'View Details')}}
                                                   
                                                    </span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                      <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">{{$confirmed}}</div>
                                                        <div><h6>Confirmed Reservations</h6></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">
                                                           {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => '1']), 'View Details')}}
                                                   </span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                     <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-green">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">{{$active}}</div>
                                                        <div><h6>On-Session/Active Reservations</h6></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">
                                                           {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => '2']), 'View Details')}}
                                                    </span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                     </div>

                                    <div class="row">

                                     <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-yellow">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">{{$past}}</div>
                                                        <div><h6>Past Reservations</h6></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">
                                                        {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => '3']), 'View Details')}}
                                                    </span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-bluish">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">{{$expired}}</div>
                                                        <div><h6>Expired Reservations</h6></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">
                                                        {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => '4']), 'View Details')}}
                                                    </span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel panel-amet">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-3">
                                                        <i class="fa fa-clock-o fa-2x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">{{$rejected}}</div>
                                                        <div><h6>Rejected Reservations</h6></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#">
                                                <div class="panel-footer">
                                                    <span class="pull-left">
                                                        {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => '5']), 'View Details')}}
                                                    </span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                      </div>

			                	<!-- Information Panel -->
                                <div class="list-group">
                                	<span class="list-group-item">
                                		Account ID: {{$account['id']}} <br/>
                                		Name: {{$account['firstname']}} {{$account['middleName']}} {{$account['lastName']}}<br/>
                                		Email-Address: {{$account['email']}}<br/>
                                		Contact Number: {{$account['contactnumber']}}
                                    </span>
                                </div>
                              
                                 <div class="text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    {{HTML::linkRoute('account.updateProfile', 'Update Profile')}}
                                </div>
                                  <div class="text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                   
                                    {{HTML::linkRoute('account.reset', 'Change Password' , $account['confirmationcode'])}}
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
@stop
