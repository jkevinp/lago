@extends('layout.user-dashboard')
@section('header')
<link rel="stylesheet" type="text/css" media="all"
      href="{{URL::asset('default')}}/js/ui/jquery-ui.min.css"  />
@stop
@section('script')
   <script src="{{URL::asset('default')}}/js/rebook.js"></script>
@stop
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-11">
 			<div class="panel panel-info">
 				<div class="panel-heading">
 					Booking Details 
 				</div>
 				{{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'book.rebook2'])}}
                <div class="panel-body">
 					<div class="row">
	 					<div class="col-md-4">
	 						Booking ID:
	 					</div>
	 					<div class="col-md-8">
	 						{{Form::hidden('bookingid',$booking['bookingid'])}}
	 						{{Form::text('',$booking['bookingid'],['class' => 'form-control', 'readonly' => 'true'])}}
	 					</div>
 					</div>
 					<div class="row">
	 					<div class="col-md-4">
	 						Arrival:
	 					</div>
	 					<div class="col-md-8">
	 						{{Form::text('',$booking['bookingstart'],['class' => 'form-control', 'readonly' => 'true'])}}
	 					</div>
 					</div>
 					<div class="row">
            <div class="col-md-4">
              Departure:
            </div>
            <div class="col-md-8">
              {{Form::text('',$booking['bookingend'],['class' => 'form-control', 'readonly' => 'true'])}}
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              Mode:
            </div>
            <div class="col-md-8">
              {{Form::text('modeofstay',(str_replace('2', '' ,str_replace('1','',$booking['bookingmode']))),['class' => 'form-control', 'readonly' => 'true'])}}
            </div>
          </div>
 					
 				</div>
				<div class="row mt">
                  <div class="col-md-12">
                      <div class="form-panel">
                        <hr>
                        <div class="form-group">
                           	<label class="col-sm-2 col-sm-2 control-label">Start Date</label>
                              	<div class="col-sm-10">
                                  	<input autocomplete="off"  type="text" id="date_start" name="start" value= "{{$booking['bookingstart']}}" class="form-control" placeholder="Start Date">    
                             	</div>
                        </div>
                        <div class="form-group" id="custom">

                              <label class="col-sm-2 col-sm-2 control-label">Session Options:</label>
                              <div class="col-sm-5">
                                   <select class="form-control" name="timeofday" id="timeofday">

                                    <option value="0"  selected disabled="true">Start</option>
                                    @if($booking['bookingmode'] == "day")
                                    <option value="8"  mode="day"        id='morning'>Day          [8:00am-5:00pm]</option>
                                    @elseif($booking['bookingmode'] == "night")
                                    <option value="19" mode="night"      id='evening'>Night        [7:00pm-4:00am]</option>
                                    @elseif($booking['bookingmode'] == "overnight1")

                                    <option value="8"  mode="overnight1" id='overnight1'>Overnight [8:00am-4:00am]</option>
                                    @else

                                    <option value="19" mode="overnight2" id='overnight2'>Overnight [7:00pm-5:00pm]</option>

                                    @endif
                                   


                                  </select>
                              </div>
                              <div class="col-sm-5">
                                <select class="form-control" name="lenofstay" id="lenofstay" disabled>
                                  <option value="0">Length of stay</option>
                                  <option value="{{$len/24}}">{{$len}} Hours.</option>
                                </select>
                              </div>
                        </div>
                         <div class="form-group">
                             <label class="col-sm-2 col-sm-2 control-label">End Date</label>
                             <div class="col-sm-10">
                                @if(Session::get('date_info'))
                                <input  autocomplete="off" disabled type="text" value="{{Session::get('date_info')['end']}}" id="date_end"  class="form-control" name="end"  placeholder="End Date">
                                @else
                                <input  autocomplete="off"  disabled type="text" id="date_end" name="end" class="form-control" placeholder="End Date">
                                @endif
                              </div>
                         </div>
                <div class="btn-group btn-group-justified" role=""> 
                  <div class="btn-group" role="group">
                    {{Form::submit('Check' ,['class' => 'btn btn-primary' , 'id' => 'btn_submit_date'])}} 
                  </div>    
                <div class="btn-group" role="group">
                  {{Form::reset('Reset' ,['class' => 'btn btn-default'])}} 
               </div>
                </div>  
                    {{Form::close()}}
                      </div><!-- /form-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->




 			</div>
 		</div>
 	</div>
</div>
@stop

