@extends('layout.admin-dashboard')

@section('content')

			
          <!--Booking today-->
           <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Reservations Today
                  <span class="badge badge-theme ">
                    {{count($reservations['start'])}} reservations found
                  </span>
                </h4>
                  <div class="panel-body">
                    <div  class="col-sm-12" >
                        <table class="table table-bordered">
                          <thead>
                            <tr> 
                                <th>Full Name</th>
                              <th>Booking id</th>
                              <th>Account id</th>
                              <th>Arrival</th>
                              <th>Departure</th>
                            </tr>
                          </thead>
                            <tbody>
                            @foreach($reservations['start'] as $start)
                            <tr>
                               <td>{{$start->acc['firstname']}} {{$start->acc['middleName']}} {{$start->acc['lastName']}}</td>
                              <td> {{$start['bookingid']}}</td>
                              <td> {{$start['account_id']}}</td>
                              <td> {{$start['bookingstart']}}</td>
                              <td> {{$start['bookingend']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>
                  </div>
              </div>
            </div>
          </div>
          <!--Booking today-->
           <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Reservations Not Attended
                  <span class="badge badge-success">
                    {{count($reservations['notattended'])}} reservations found
                  </span>
                </h4>
                  <div class="panel-body">
                    <div  class="col-sm-12" >
                        <table class="table table-bordered">
                          <thead>
                            <tr> 
                              <th>Full Name</th>
                              <th>Booking id</th>
                              <th>Account id</th>
                              <th>Arrival</th>
                              <th>Departure</th>
                            </tr>
                          </thead>
                            <tbody>
                            @foreach($reservations['notattended'] as $start)
                            <tr>
                              <td>{{$start->acc['firstname']}} {{$start->acc['middleName']}} {{$start->acc['lastName']}}</td>
                              <td>{{$start['bookingid']}} </td>
                              <td>{{$start['account_id']}}</td>
                              <td>{{$start['bookingstart']}}</td>
                              <td>{{$start['bookingend']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>
                  </div>
              </div>
            </div>
          </div>
          <!--Booking Ending today-->
           <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>Reservations Ending Today
                  <span class="badge">
                  {{count($reservations['end'])}} reservations found
                  </span>
                </h4>
                  <div class="panel-body">
                    <div  class="col-sm-12">
                        <table class="table table-bordered">
                          <thead>
                            <tr> 
                              <th>Full Name</th>
                              <th>Booking id</th>
                              <th>Account id</th>
                              <th>Arrival</th>
                              <th>Departure</th>
                            </tr>
                          </thead>
                            <tbody>
                            @foreach($reservations['end'] as $end)
                            <tr>
                               <td>{{$start->acc['firstname']}} {{$start->acc['middleName']}} {{$start->acc['lastName']}}</td>
                              <td> {{$end['bookingid']}}</td>
                              <td> {{$end['account_id']}}</td>
                              <td> {{$end['bookingstart']}}</td>
                              <td> {{$end['bookingend']}}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                     </div>
                  </div>
              </div>
            </div>
          </div>
          <!--Charts -->
       
           <div class="row mt">
            <div class="col-md-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Reservations Created within past 7 days</h4>
                  <div class="panel-body">
                    <div  class="col-sm-6" style='width:100%'>
                      <div id="bar-chart-week" ></div>
                     </div>
                  </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Reservations Created within past 30 days</h4>
                  <div class="panel-body">
                    <div class="col-sm-6" style='width:100%'>
                        <div id="bar-chart" ></div>
                     </div>
                    </div>
              </div>
            </div>
          </div>
          <div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Reservations Created within past 1 year</h4>
                  <div class="panel-body">
                    <div  class="col-sm-6" style='width:100%'>
                      <div id="bar-chart-year" ></div>
                     </div>
                  </div>
              </div>
            </div>
          </div>
@stop

@section('script')
	<link rel="stylesheet" href="{{URL::asset('default')}}/css/morris.css">
    <script type="text/javascript" src="{{URL::asset('default')}}/js/raphael.js"></script>
	<script type="text/javascript" src="{{URL::asset('default')}}/js/morris.min.js" ></script>
	<script type="text/javascript" src="{{URL::asset('default')}}/ajax/charts.js"></script>
@stop