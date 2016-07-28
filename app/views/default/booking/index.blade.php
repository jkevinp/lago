@extends('layout.template')

@section('script')
<script type="text/javascript">


    $(document).ready(function(e){
        
        $( ".items" ).hover(
          function() {
                $(this).find("a").fadeOut(0);
                $(this).find("div.caption").fadeIn(200);

          }, function() {
              $(this).find("div.caption").fadeOut(0);
                $(this).find("a").fadeIn(0);
              
          }
        );
    AddActiveClass(new URI((''+document.location)).search(true).type , 'All');
    });
</script>
@stop

@section('content')
	
        <div class="row">
            <legend>
            <h3 class="text-center">Rooms and Services</h3>
            </legend>
            
             <div class="row">
                
                <div class="col-md-9" style=" border-right:1px solid #e5e5e5" > 
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
                        <div class="col-md-4 items" style="height:283px !important;">
                            <div class="thumbnail">
                                <a data-lightbox="image-1" class="example-image-link" data-title="{{$room['productname']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}" >
                                    @if(File::exists(public_path('default/img-uploads/'.$room['attr']['imagename'])))
                                        <img src="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}"  style="width:300px;height:200px;"  class="example-image img-responsive"/>
                                    @else
                                        <img src="{{URL::asset('media/photos/default-image.png')}}"  style="width:300px;height:200px;"  class="example-image img-responsive"/>
                                    @endif

                                </a>
                                    <div class="caption" style="display:none;">

                                        <h5 class="text-primary">{{$room['productname']}}</h5>
                                        {{Form::hidden('image', URL::asset("default/img-uploads").'/'.$room['attr']['imagename'])}}
                                        {{Form::hidden('productid', $room['id'])}}
                                        {{Form::hidden('productname', $room['productname'])}}
                                        {{Form::hidden('producttotalqty', $room['productquantity'])}}
                                        {{Form::hidden('productdescription', $room['productdesc'])}}
                                        {{Form::hidden('producttype', $room->producttype['producttypename'])}}
                                        @if($room->producttype['id'] ==2)
                                        {{Form::hidden('paxmax', $room['paxmax'])}}
                                        @else
                                        {{Form::hidden('paxmax', 0)}}
                                        @endif
                                        
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
                                        <div class="input-group input-group-sm">
                                            <span class="input-group-addon" id="sizing-addon1">Quantity</span>
                                                {{Form::number('quantity', 1 ,array( 'min' =>'1' , 'max' => ($room['productquantity'] - $room->reservedqty) ,'class' => 'form-control', 'style' => 'height:30px' , 'placeholder' => 'Quantity?'))}}
                                                </div>
                                                <br/>
                                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                    <div class="btn-group" role="group">
                                                        <button type="submit" class="btn-sm btn btn-primary">
                                                            <i class="fa fa-plus"></i> Add to Reservation List
                                                        </button>
                                                    </div>
                                                </div>
                                           </div>
                            </div>
                       
                        </div>
                        {{Form::close()}}
                    @endforeach
                    @endif

                </div>
            <div class="col-md-3" style="">
                     <ul class="nav nav-list nav-stacked">
                        <li class="nav-header" style="color:#00b356;font-weight:bold;">Filter By Category</li>
                        @foreach(ProductType::where('id' , '<>' ,3)->get() as $pt)
                           <li role="presentation" id="Cottages"><a href="{{Request::url()}}?type={{$pt->id}}">{{$pt->producttypename}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div align="center" >

            <?php
                $qs = array_keys(Input::all());
                $appends = array();
                foreach ($qs as $key) {
                    if($key !='page')
                    $rooms->appends(array($key => Input::get($key)));
                }
            ?>
            {{$rooms->links()}}  
        </div>
           <!-- /.Row -->
        </div>
         <br/><br/>
   
        <!-- /.container -->

@stop

