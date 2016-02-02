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
 			<div class="panel panel-warning">
 				<div class="panel-heading">
      			Rebook Reservation
 				</div>
 				<div class="panel-body">
          <div class="alert alert-info">
            <li>Some products/rooms/cottages may not be available during rebooking process.</li>
            <li>If the product/room/cottage you reserved is not available anymore, You are allowed to take any product that has lesser price 
            than your reserved product.</li>
            <li>Changing of product/room/cottage with lower prices will have no additional fee, but fee will still remain regardless of price of the replaced item.</li>
            <li>You are only allowed to rebook two(2) times.</li>
            <li>By proceeding, you are agreeing to our terms and condition. No refunds will be entertained.</li>
          </div>
          {{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'book.rebook3'])}}
          {{Form::hidden('count', count($conflict))}}
          <legend>> Booking Information</legend>
          <div class="row">
            <div class="col-md-4">
              New Arrival Date:
            </div>
            <div class="col-md-7">
              <input type="text" readonly value="{{$bookingInfo['start']}}" class="form-control" name="date_start">
             </div>
          </div>
           <div class="row">
            <div class="col-md-4">
              New Departure Date:
            </div>
            <div class="col-md-7">
              <input type="text" readonly value="{{$bookingInfo['end']}}" class="form-control" name="date_end">
             </div>
          </div>
           <div class="row">
            <div class="col-md-4">
              Booking Id: 
            </div>
            <div class="col-md-7">
              <input type="text" readonly value="{{$bookingInfo['bookingid']}}" class="form-control" name="bookingid">
            </div>
          </div>
       
              <input type="hidden" readonly value="{{$bookingInfo['lenofstay']}} " class="form-control" name="lenofstay">
    
          <div class="row">
            <div class="col-md-4">
              Time of day:
            </div>
            <div class="col-md-7">
              <input type="text" readonly value="{{$bookingInfo['timeofday']}}:00" class="form-control" name="timeofday">
            </div>
          </div>
           <legend>> Change Item</legend>

          <div class="row">
            <div class="col-md-12">
                <table class="table table-responsive table-bordered">
                  <thead>
                    <tr>
                      <th>Reserved Product</th>
                      <th>Replace With</th>
                    </tr>
                  </thead>  
                  <tbody>
                  <?php $ctr =0;?>
                  @foreach($conflict as $c)
                      <tr>

                        <td>
                          {{$c['conflict']['productname']}}
                          {{Form::hidden('item'.$ctr, $c['conflict']['id']);}}
                        </td>
                        <td> 
                          <select name="replace{{$ctr}}" class="form-control">
                         
                            @foreach($c['replacement'] as $r)
                              <option value="{{$r['id']}}">{{$r['productname']}}</option>
                            @endforeach
                          </select>
                        </td>
                      </tr>
                    <?php $ctr++;?>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
          <div class="btn-group btn-group-justified " role="group">
            <div class="btn-group" role="group">{{Form::submit('Rebook' , ['class' => 'btn btn-primary'])}}</div>
            <div class="btn-group" role='group'>{{Form::reset('Reset'   , ['class' => 'btn btn-default'])}}</div>
          
          {{Form::close()}}
        </div>
        </div>
          </div>
        </div>
 			</div>
 		</div>
@stop