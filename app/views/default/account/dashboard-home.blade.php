@extends('layout.user-dashboard')

URLS EDIT
@section('content')
				<div class='row'>
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>
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
                                <div class="text-right">
                                    <i class="fa fa-arrow-circle-right"></i>
                                    
                                    {{HTML::link(URL::route('account.show' ,['action' => 'reservation' , 'param' => 'all']), 'View All Reservations')}}
                                </div>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                    @if($booking)
                                	@foreach ($booking as $book)
                                    <span class="list-group-item">
                                         <div class="btn-group pull-right" role="group" aria-label="...">
                                @if($book['active'] == 0)
                                    <a href="{{URL::route('account.show' , ['action' => 'transaction' , 'param' => $book['bookingid']])}}" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Pay</a>
                                @else 
                                    <a href="{{URL::route('account.show' , ['action' => 'transaction' , 'param' => $book['bookingid']])}}" class="btn btn-success disabled"><i class="glyphicon glyphicon-shopping-cart"></i> Pay</a>
                                @endif
                                 <a href="{{URL::route('account.show' , ['action' => 'bookingdetails' , 'param' => $book['bookingid']])}}" class="btn btn-primary"><i class="glyphicon glyphicon-info-sign"></i> View Details</a>
                            </div>
                                       <ul>
                                            <li><i class="fa fa-fw fa-calendar"></i>Booking Id: {{$book['bookingid']}} <span class="badge">
                                             @if($book['active'] == 0)
                                                    Awaiting Payment
                                                @elseif($book['active'] == 1)
                                                    Waiting Payment Confirmation
                                                @elseif($book['active'] == 2)
                                                    Paid/Confirmed
                                                @elseif($book['active'] == 3)
                                                    On Session/Checked-in
                                                @elseif($book['active'] == 4)
                                                    Past/Checked-out
                                                @elseif($book['active'] == 5)
                                                    Expired
                                                @elseif($book['active'] == 6)
                                                  Rejected
                                                @endif
                                        </span></li>
                                            <li>Booking Reference Id: {{$book['bookingreferenceid']}}</li>
                                            <li>Start date: {{$book['bookingstart']}}</li>
                                            <li>End date: {{$book['bookingend']}}</li>
                                    	</ul>
                                    </span>
                                    @endforeach
                                    @endif
                                </div>
                                
                            </div>
                        </div>
                    </div>
            </div>
@stop