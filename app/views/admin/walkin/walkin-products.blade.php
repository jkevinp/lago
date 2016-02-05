@extends('layout.admin-dashboard')

@section('script')
<script type="text/javascript">
    AddActiveClass(new URI((''+document.location)).search(true).type , 'All');
</script>
@stop

@section('content')
	<br/><br/><br/><br/>
        <div class="container">
            <legend>
            <h1>Select Rooms and services</h1>
            <div>

            </div>
            </legend>
            
             <div class="row">
                <div class="col-sm-3" style="">
                     <ul class="nav nav-list nav-stacked">
                        <li class="nav-header">Search Options</li>
                        <li role="presentation" id="Others"><a href="{{Request::url()}}?type=free">Any</a></li>
                        <li role="presentation" id="Cottages"><a href="{{Request::url()}}?type=max">Recommended</a></li>
                    </ul>
                    <hr>
                       <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#reservationModal" data-whatever=""><i class="fa fa-github fa-fw"></i> Reservation List</a>
                </div>
                <div class="col-md-7" style=" border-left:1px solid #e5e5e5" > 
                    @if(count($rooms) === 0)
                        <div class="alert alert-warning"> 
                            No Items for the selected category.
                        </div>
                    @else
                    <div class="alert alert-success"> 
                        {{$rooms->totalCount}} records found.
                    </div>
                        @foreach($rooms as $room)
                        {{Form::open(array('action' => 'book.addItem' , 'method' => 'post'))}}
                        <div class="col-md-6">
                            <div class="thumbnail">
                                <a data-lightbox="image-1"class="example-image-link" data-title="{{$room['productname']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}" >
                                    <img src="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}" style="height:200px;"  class="example-image img-responsive"/>
                                </a>
                                    <div class="caption">

                                        <h4 class="text-primary">{{$room['productname']}}</h4>
                                        {{Form::hidden('image', URL::asset("default/img-uploads").'/'.$room['attr']['imagename'])}}
                                        {{Form::hidden('productid', $room['id'])}}
                                        {{Form::hidden('productname', $room['productname'])}}
                                        {{Form::hidden('producttotalqty', $room['productquantity'])}}
                                        {{Form::hidden('productdescription', $room['productdesc'])}}
                                        {{Form::hidden('producttype', $room->producttype['producttypename'])}}
                                        {{Form::hidden('price', $room['productprice'])}}
                                        <p>Category : {{$room->producttype['producttypename']}}</p>
                                         <p>Min Capacity: {{$room['paxmin']}}</p>
                                        <p>Max Capacity: {{$room['paxmax']}}</p>
                                        <p>Price: PHP {{$room['productprice']}} / 12 hours</p>
                                        <p>{{$room['roomdesc']}}</p>

                                        <p class="text-success text-center">Booking Information</p>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1">Quantity</span>
                                                {{Form::number('quantity', 1 ,array( 'min' =>'1' , 'max' => ($room['productquantity'] - $room->reservedqty) ,'class' => 'form-control', 'style' => 'height:50px' , 'placeholder' => 'Quantity?','readonly' => 'true'))}}
                                                </div>
                                                <br/>
                                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                    <div class="btn-group" role="group">
                                                         {{Form::submit('Add Reservation',array('class' => 'btn btn-primary '))}}
                                                    </div>
                                                </div>
                                           </div>
                            </div>
                       
                        </div>
                        {{Form::close()}}
                    @endforeach
                    @endif

                </div>

            </div>
           <!-- /.Row -->
        </div>
        <div align="right" >

            <?php
                $qs = array_keys(Input::all());
                                $appends = array();
                                foreach ($qs as $key) 
                                {
                                    if($key !='page')
                                    $rooms->appends(array($key => Input::get($key)));
                                }
                           ?>
                          {{$rooms->links()}}  
                       </div>
        <!-- /.container -->

@stop

