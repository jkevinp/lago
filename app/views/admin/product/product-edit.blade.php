@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                  
                      <div class="form-panel">
                          <h3>>{{$title}}</h3>
                      	<div class="row">
                      		<div class="col-md-10 col-md-offset-1">
	                      	<div class="alert alert-info">
	                      		<ul>
	                      		   Please Fill All Fields.
	                      		</ul>
	                      	</div>
	                      </div>
                      	</div>
                      	<hr>
                      	{{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'cpanel.product.edit'])}}
                      	   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product ID</label>
                              <div class="col-sm-10">
                                {{Form::hidden('id' , $product['id'])}}
                                  {{Form::text('productname' ,$product['id'],['class' => 'form-control' , 'disabled' => 'true'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product name</label>
                              <div class="col-sm-10">
                                  {{Form::text('productname' ,$product['productname'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Image</label>
                              <div class="col-sm-10">
                                 {{Form::select('fileid',$files,$product['fileid'], ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Type</label>
                              <div class="col-sm-10">
                                  {{Form::select('producttypeid',$productType,$product['producttypeid'], ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Description</label>
                              <div class="col-sm-10">
                              		{{Form::textarea('productdesc' ,$product['productdesc'],['class' => 'form-control'])}}
                              </div>
                         </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Day Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('productprice' ,$product['productprice'],['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Night Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('nightproductprice' ,$product['nightproductprice'],['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Overnight Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('overnightproductprice' ,$product['overnightproductprice'],['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Extension Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('extensionproductprice' ,$product['extensionproductprice'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Minimum Capacity</label>
                              <div class="col-sm-10">
                                  {{Form::number('paxmin' ,$product['paxmin'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Max Capacity</label>
                              <div class="col-sm-10">
                                  {{Form::number('paxmax' ,$product['paxmax'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         <hr>
                   
                      	
						    <div class="btn-group btn-group-justified" role=""> 
						    	<div class="btn-group" role="group">
						     		{{Form::submit('Update' ,['class' => 'btn btn-primary'])}} 
						  		</div>  	
						  	<div class="btn-group" role="group">
						      {{Form::reset('Reset' ,['class' => 'btn btn-default'])}} 
						 	 </div>
						    </div>  
						       	{{Form::close()}}
                      </div><!-- /form-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->



@stop
