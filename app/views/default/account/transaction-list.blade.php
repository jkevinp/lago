@extends('layout.user-dashboard')

@section('content')
<div class='row'>
    <div class="col-lg-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><i class="fa fa-clock-o fa-fw"></i>
                        @if(isset($title))
                            {{$title}}
                            <span class="badge"> {{count($transactions)}} </span>
                        @endif
                    </h3>
                            </div>
                <div class="box-body">
                    <div class="list-group">
                        @if(count($transactions) == 0)
                            <div class="alert alert-info">No records found.</div>
                        @endif  
                        @foreach ($transactions as $book)
                        <span class="list-group-item">
                            <div class="btn-group pull-right" role="group" aria-label="...">
                                <a href="{{URL::route('account.show' , ['action' => 'bookingdetails' , 'param' => $book['bookingid']])}}" class="btn btn-primary"><i class="glyphicon glyphicon-info-sign"></i> View Details</a>
                                <a type="" class="btn btn-danger"><i class="glyphicon glyphicon-remove"></i> Cancel</a>
                            </div>
                            <ul type="square">
                                <li><i class="fa fa-fw fa-calendar"></i>Booking Id: {{$book['bookingid']}}
                                	<span class="badge">
                                		{{$book['status']}}
                                	</span>
                                </li>
                                <li>Transaction ID: {{$book['id']}}</li>
                                <li>Date Created: {{$book['created_at']}}</li>
                                <li>Mode of Payment: {{$book['modeofpayment']}}</li>
                                <li>Code: {{$book['codeprovided']}}</li>
                                <li>Email: {{$book['payeremail']}}</li>
                                <li>Total Bill: {{$book['totalbill']}}</li>
                                <li>Downpayment:  {{$book['downpayment']}}</li>
                                <li>Coupon code: 
                                    @if($book['couponcode'])
                                        {{$book['couponcode']}}
                                    @else 
                                        None
                                    @endif
                                </li>

                                 @if($book['couponcode'])
                                 <li> Discounted Bill: {{$book['discountedbill']}}</li>
                                 @endif

                            </ul>
                        </span>
                        @endforeach
                    </div>
                <div class="text-right">
                    <a href="{{URL::action('account.show', ['action' => 'transaction' , 'param' => 'pay'])}}"> Pay Reservations   <i class="fa fa-arrow-circle-right"></i></a>
                </div>
             </div>
        </div>
    </div>
</div>
@stop