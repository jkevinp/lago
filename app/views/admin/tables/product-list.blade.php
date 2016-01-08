<div class="row mt">
	<h4 >> {{$title}} 
		<span class='badge'>
			{{count($products)}} records found.
		</span>
	</h4>
	<div class="col-md-12">
	<div class="content-panel"> 
		@foreach($products as $product)	
		 <div class="container">
			<div class="row mt">
		  		<div class="col-md-6" style=" border-right: 2px dashed #333;">
		  			<div class="content content-default">
					  	<div class="content-heading">
					  		> Product: {{$product->productname}}
					  	</div>

					  	<div class="panel-body">
							<table class="table table-responsive" data-height="299">
						   		<tr>
						   			<td>Product ID:</td>
						   			<td> {{$product['id']}}</td>
						   		</tr>
						   		<tr>
						   			<td>Description: </td>
						   			<td>{{$product['productdesc']}}</td>
						   		</tr>
						   		<tr>
						   			<td>Type: </td>
						   			<td>{{$product['producttypeid']}}</td>
						   		</tr>
						   		<tr>
						   			<td>Quantity: </td>
						   			<td>{{$product['productquantity']}}</td>
						   		</tr>
						   		<tr>
						   			<td> Actions </td>
						   			<td> 	
						   					<a href="{{URL::action('cpanel.edit' ,['action' => 'product' , 'param' => $product['id']])}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i> Edit</a>
						   					@if($product['active'] == 1)
				                            <a href="{{URL::action('product.changeStatus' ,['id' => $product['id'] , 'param' => '0'])}}" class="btn btn-warning btn-xs"><i class="fa fa-remove"></i> Deactivate</a>
                            				@elseif($product['active'] == 0)
                            				<a href="{{URL::action('product.changeStatus' ,['id' =>  $product['id']  , 'param' => '1'])}}" class="btn btn-warning btn-xs"><i class="fa fa-check"></i> Activate</a>
                            				@endif
                            		</td>
						   		</tr>
							</table>
						</div>
					</div>
		  		</div>
		  		<div class="col-md-4" style="">
		  			<div class="panel panel-default">
					  	<div class="panel-heading">
					  		Product Preview
					  	</div>
					  	<div class="panel-body">
							<a data-lightbox="image-1" class="example-image-link" data-title="{{$product->productname}}" href="{{URL::asset('default/img-uploads')}}/{{$product->image}}" >
					    			<img width="150px" height="150px" src="{{URL::asset('default/img-uploads')}}/{{$product->image}}"  class="img-thumbnail"/>
								</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		@endforeach
	</div>
	</div>
</div>