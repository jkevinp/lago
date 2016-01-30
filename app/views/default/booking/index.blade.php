@extends('layout.template')

@section('script')
<script type="text/javascript">
    AddActiveClass(new URI((''+document.location)).search(true).type , 'All');
</script>
@stop

@section('content')
	
        <div class="row content">
            <legend>
            <h1> > Select Rooms and services</h1>
            </legend>
            
             <div class="row">
                <div class="col-md-3" style="">
                     <ul class="nav nav-list nav-stacked">
                        <li class="nav-header" style="color:#00b356;font-weight:bold;">By Capacity</li>
                            <li role="presentation" id="Others"><a href="{{Request::url()}}?type=free">Any</a></li>
                            <li role="presentation" id="Cottages"><a href="{{Request::url()}}?type=recommended">Recommended</a></li>
                            <li role="presentation" id="Cottages"><a href="{{Request::url()}}?type=max">One - Total</a></li>
                    </ul>
                </div>
                <div class="col-md-8" style=" border-left:1px solid #e5e5e5" > 
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
                                    @if(File::exists(public_path('default/img-uploads/'.$room['attr']['imagename'])))
                                        <img src="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}"  style="width:400px;height:300px;"  class="example-image img-responsive"/>
                                    @else
                                        <img src="{{URL::asset('media/photos/default-image.png')}}"  style="width:400px;height:300px;"  class="example-image img-responsive"/>
                                    @endif

                                </a>
                                    <div class="caption">

                                        <h4 class="text-primary">{{$room['productname']}}</h4>
                                        {{Form::hidden('image', URL::asset("default/img-uploads").'/'.$room['attr']['imagename'])}}
                                        {{Form::hidden('productid', $room['id'])}}
                                        {{Form::hidden('productname', $room['productname'])}}
                                        {{Form::hidden('producttotalqty', $room['productquantity'])}}
                                        {{Form::hidden('productdescription', $room['productdesc'])}}
                                        {{Form::hidden('producttype', $room->producttype['producttypename'])}}
                                        
                                        <p>Category : {{$room->producttype['producttypename']}}</p>
                                        <p>Min Capacity: {{$room['paxmin']}}</p>
                                        <p>Max Capacity: {{$room['paxmax']}}</p>

                                        @if(Session::get('date_info')['modeofstay'])
                                            @if(Session::get('date_info')['modeofstay'] == "day")
                                                <p>Price: PHP {{$room['productprice']}} / 9 hours</p>
                                                {{Form::hidden('price', $room['productprice'])}}
                                            @elseif(Session::get('date_info')['modeofstay'] == "night")
                                                <p>Price: PHP {{$room['nightproductprice']}} / 9 hours</p>
                                                {{Form::hidden('price', $room['nightproductprice'])}}
                                            @else
                                                <p>Price: PHP {{$room['overnightproductprice']}} / 20 hours</p>
                                                {{Form::hidden('price', $room['overnightproductprice'])}}
                                            @endif
                                        @endif
                                        <p>{{$room['roomdesc']}}</p>

                                        <p class="text-success text-center">Booking Information</p>
                                        <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1">Quantity</span>
                                                {{Form::number('quantity', 1 ,array( 'min' =>'1' , 'max' => ($room['productquantity'] - $room->reservedqty) ,'class' => 'form-control', 'style' => 'height:50px' , 'placeholder' => 'Quantity?'))}}
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

