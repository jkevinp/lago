@extends('layout.user-dashboard')

@section('content')
<div class='row'>
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-clock-o fa-fw"></i>
                        @if(isset($title))
                            {{$title}}
                            <span class="badge"> {{count($booking)}}</span>
                        @endif
                    </h3>
                            </div>
                <div class="box-body">
                    <div class="list-group">
                        @if(count($booking) == 0)
                            <div class="alert alert-info">No records found.</div>
                        @endif  
                        @foreach ($booking as $book)
                        <span class="list-group-item">
                            <div class="btn-group pull-right" role="group" aria-label="...">
                                @if($book['active'] == 0)
                                    <a href="{{URL::route('account.show' , ['action' => 'transaction' , 'param' => $book['bookingid']])}}" class="btn btn-success"><i class="glyphicon glyphicon-shopping-cart"></i> Pay</a>
                                @else 
                                    <a href="{{URL::route('account.show' , ['action' => 'transaction' , 'param' => $book['bookingid']])}}" class="btn btn-success disabled"><i class="glyphicon glyphicon-shopping-cart"></i> Pay</a>
                                @endif
                                 <a href="{{URL::route('account.show' , ['action' => 'bookingdetails' , 'param' => $book['bookingid']])}}" class="btn btn-primary"><i class="glyphicon glyphicon-info-sign"></i> View Details</a>
                                @if($book['active'] == 2)
                                       <a href="{{URL::route('book.rebook' ,['id' => $book['bookingid']])}}" class="btn btn-info"><i class="fa fa-fw fa-calendar"></i> Rebook</a>
                                @endif
                            </div>
                            <ul>
                                <li><i class="fa fa-fw fa-calendar"></i>Booking Id: {{$book['bookingid']}}
                                    <span class="badge">
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
                                        </span>
                                </li>
                                <li>Booking Reference Id: {{$book['bookingreferenceid']}}</li>
                                <li>Start date: {{$book['bookingstart']}}</li>
                                <li>End date: {{$book['bookingend']}}</li>
                            </ul>
                        </span>
                        @endforeach
                    </div>
               
             </div>
              <div class="box-footer">
                    <a href="#" class="pull-right">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                </div>
        </div>
    </div>
</div>
            <!-- /.row -->
@stop