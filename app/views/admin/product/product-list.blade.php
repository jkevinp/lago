@extends('layout.admin-dashboard')

@section('content')
	<div class="box box-primary">
	
	<div class="box-header with-border"> 
 	{{$title}} <span class='badge'>{{count($products)}} records found.</span>
 	<div class="box-tools pull-right">
          <button class="btn btn-box-tool layer-opener" data-w="800px" data-h="600px" data-type="2" data-href="{{URL::action('cpanel.create' ,array('action' => 'product'))}}"><i class="fa fa-plus"></i></button>
     </div>
	</div>
	<div class="box-body">
		<table class="table" data-height="299">
			<thead>
			<tr>
				<th>Product Name</th>
				<th>Description</th>
				<th>Type</th>
				<th>Day Rate/Price</th>
				<th>Night Rate/Price</th>
				<th>Overnight Rate/Price</th>
				<th>Extension Rate/Price</th>
				<th>Quantity</th>
				<th>Actions</th>
			</tr>
			</thead>
			<tbody>
				@foreach($products as $product)	
					<tr>
						<td>{{$product->productname}}</td>
						<td>{{$product['productdesc']}}</td>
						<td>{{$product['producttypeid']}}</td>
						<td>{{$product['productprice']}}</td>
						<td>{{$product['nightproductprice']}}</td>
						<td>{{$product['overnightproductprice']}}</td>
						<td>{{$product['extensionproductprice']}}</td>
						<td>{{$product['productquantity']}}</td>
						<td> 	
		   					<a data-href="{{URL::action('cpanel.edit' ,['action' => 'product' , 'param' => $product['id']])}}" class="btn btn-primary btn-xs layer-opener" data-w="800px" data-h="600px" data-type="2">
		   					<i class="fa fa-edit"></i></a>
		   					@if($product['active'] == 1)
                            <a href="{{URL::action('product.changeStatus' ,['id' => $product['id'] , 'param' => '0'])}}" class="btn btn-warning btn-xs"><i class="fa fa-remove"></i> </a>
            				@elseif($product['active'] == 0)
            				<a href="{{URL::action('product.changeStatus' ,['id' =>  $product['id']  , 'param' => '1'])}}" class="btn btn-warning btn-xs"><i class="fa fa-check"></i></a>
            				@endif
            				<a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#p{{$product->id}}"><i class="fa fa-eye"></i></a>
                        </td>

					</tr>

				@endforeach
			</tbody>
		</table>
	</div>
	</div>

				@foreach($products as $product)	
			
				<div class="modal fade bd-example-modal-sm" id="p{{$product->id}}" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
					    <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="gridModalLabel">{{$product->productname}}</h4>
				      </div>
				    	    <div class="modal-body">
				        <div class="container-fluid">
				          <div class="row">
				              <a data-lightbox="image-1" class="example-image-link" data-title="{{$product->productname}}" href="{{URL::asset('default/img-uploads')}}/{{$product->image}}" >
					    			<img width="800px" height="600px" src="{{URL::asset('default/img-uploads')}}/{{$product->image}}"  class="img-thumbnail"/>
								</a>
				          </div>
				     
				      </div>
				      <div class="modal-footer">
				        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				        <button type="button" class="btn btn-primary">Save changes</button> -->
				      </div>
				  </div>
				    </div>
			
				</div>
				</div>
				@endforeach



	
@stop

@section('script')

@stop