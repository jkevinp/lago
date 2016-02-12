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
            <h1>Purchase Rentals/Add Ons for {{$booking['bookingid']}}</h1>
            </legend>
             <div class="row">
                <div class="col-sm-4">

                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th></th>
                            </tr>
                        </thead>
                    @if((Session::get('items')))
                        <?php $ctr =0; $price = 0;?>
                        @foreach (Session::get('items') as $i)
                            <tr>  
                                <td>{{$i['product']}} </td>
                                <td>{{$i['quantity']}}</td>
                                <td>{{$i['price']}}</td>
                                <td> <a type="" href="{{URL::route('cpanel.cashier.deleteItem', ['key' => $ctr])}}" class="btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-remove"></i> Remove</a></td>
                                <?php 
                                    $price += $i['price'] * $i['quantity'];
                                ?>
                               
                            </tr>        
                            <?php $ctr ++;?>
                        @endforeach
                       <tr>  
                                <td> </td>
                                <td></td>
                                <td style="border-top:4px solid black">{{Helpers::ToNumber($price)}}</td>
                                <td> </td>
                        </tr>   
                    @else
                        <div role="presentation">
                            <a role="menuitem" tabindex="-1" href="/">Cart is Empty</a>           
                        </div>
                    @endif
                    </table>
                       @if((Session::get('items')))
                      <div class="row mt">
                   

                           <a type="" href="{{URL::route('cpanel.cashier.removeAllItems')}}" class="btn btn-danger">
                                <i class="glyphicon glyphicon-remove"></i> Remove All</a>
                                 <a type="" href="{{URL::route('cpanel.checkoutaddsessionitems' , $booking['bookingid'])}}" class="btn btn-success">
                                <i class="fa fa-check"></i> Add Items to Reservation</a>
                            </div>
                            @endif
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
                        {{Form::open(array('action' => 'cpanel.cashier.addItem' , 'method' => 'post'))}}
                        <div class="col-md-6">
                            <div class="thumbnail">
                                <a data-lightbox="image-1"class="example-image-link" data-title="{{$room['productname']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}" >
                                    <img src="{{URL::asset('default/img-uploads')}}/{{$room['attr']['imagename']}}"  style="min-height:200px;max-height:200px;" class="example-image img-responsive"/>
                                </a>
                                <div class="caption">

                                        <h4 class="text-primary">{{$room['productname']}}</h4>
                                        {{Form::hidden('image', URL::asset("default/img-uploads").'/'.$room['attr']['imagename'])}}
                                        {{Form::hidden('productid', $room['id'])}}
                                        {{Form::hidden('productname', $room['productname'])}}
                                        {{Form::hidden('producttotalqty', $room['productquantity'])}}
                                        {{Form::hidden('productdescription', $room['productdesc'])}}
                                        {{Form::hidden('producttype', $room->producttype['producttypename'])}}
                                         @if($room->producttype['id'] != 3 && $room->producttype['id'] != 4)
                                        {{Form::hidden('paxmax', $room['paxmax'])}}
                                        @else
                                        {{Form::hidden('paxmax', 0)}}
                                        @endif
                                       
                                        @if(Carbon::now('Asia/Manila')->hour >= 19 && Carbon::now('Asia/Manila')->hour <= 24)
                                            {{Form::hidden('price', $room['nightproductprice'])}}
                                            <p>Price: PHP {{$room['nightproductprice']}}/unit</p>
                                        @else
                                            {{Form::hidden('price', $room['productprice'])}}
                                            <p>Price: PHP {{$room['productprice']}}/unit</p>
                                        @endif
                                        <p>Category : {{$room->producttype['producttypename']}}</p>
                                        
                                        <p>{{$room['roomdesc']}}</p>
                                         <div class="input-group input-group-lg">
                                            <span class="input-group-addon" id="sizing-addon1">Quantity</span>
                                                {{Form::number('quantity', 1 ,array( 'min' =>'1' , 'max' => ($room['productquantity'] - $room->reservedqty) ,'class' => 'form-control', 'style' => 'height:50px' , 'placeholder' => 'Quantity?'))}}
                                                </div>
                                                <br/>
                                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                                    <div class="btn-group" role="group">
                                                         {{Form::submit('Add To Cart',array('class' => 'btn btn-primary '))}}
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

