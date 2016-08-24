@extends('layout.template')

@section('script')
<script type="text/javascript">


    $(document).ready(function(e){
        
        // $( ".items" ).hover(
        //   function() {
        //         $(this).find("a").fadeOut(0);
        //         $(this).find("div.caption").fadeIn(200);

        //   }, function() {
        //       $(this).find("div.caption").fadeOut(0);
        //         $(this).find("a").fadeIn(0);
              
        //   }
        // );
    AddActiveClass(new URI((''+document.location)).search(true).type , 'All');
    });
</script>
@stop

@section('content')
	
        <div class="bg-white-0 col-lg-8 col-lg-offset-2">
            <h3 class="">Rooms and Services</h3>
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
                        <div class="col-md-12 items" style="">
                            <hr/>
                            <div class="row">
                                <div class="col-md-7">
                                    <h4 class=""><b>{{$room['productname']}} 
                                    (
                                     @if(Session::get('date_info')['modeofstay'])
                                            @if(Session::get('date_info')['modeofstay'] == "day")
                                                ₱{{$room['productprice']}} per 10 hours
                                                {{Form::hidden('price', $room['productprice'])}}
                                            @elseif(Session::get('date_info')['modeofstay'] == "night")
                                                ₱{{$room['nightproductprice']}} per 10 hours
                                                {{Form::hidden('price', $room['nightproductprice'])}}
                                            @else
                                                 ₱{{$room['overnightproductprice']}} per 20 hours
                                                {{Form::hidden('price', $room['overnightproductprice'])}}
                                            @endif
                                        @endif
                                        )
                                        </b>
                                </h4>
                                </div>
                                <div class="col-md-4">
                                    <label>Quantity:
                                    {{Form::number('quantity', 1 ,array( 'min' =>'1' , 'max' => $room['remainingproductquantity'] ,'class' => '', 'style' => 'height:30px' , 'placeholder' => 'Quantity?'))}}
                                    <button type="submit" class="btn-sm btn btn-primary"><i class="fa fa-plus"></i> Book Now</button>
                                    </label>
                                </div>
                            </div>

                            <p style="color:#777;">{{$room['productdesc']}}</p>
                            <br/>

                               <div class="">
                         

                                <div class="row">
                                @if(File::exists(public_path('default/img-uploads/'.$room['attr']['imagename'])))
                                        <img src="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}" class="img img-thumbnail col-md-8"/>
                                    @else
                                        <img src="{{URL::asset('media/photos/default-image.png')}}" class="img img-thumbnail col-md-8"/>
                                @endif
                                      <div class="col-md-4">
                                        <span class="col-xs-12">Category : {{$room->producttype['producttypename']}}</span>
                                        <span class="col-xs-12">Minimum Capacity: {{$room['paxmin']}}</span>
                                        <span class="col-xs-12">Max Capacity: {{$room['paxmax']}}</span>
                                        <span class="col-xs-12">Available:    {{$room['remainingproductquantity']}}</span>
                                    </div>
                                </div>

                                    <div class="" style="">
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
                                        <br/>
                           
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

