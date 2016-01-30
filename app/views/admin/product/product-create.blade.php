@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                  
                      <div class="form-panel">
                        <h3>> {{$title}} </h3>
                      	<div class="row">
                      		<div class="col-md-10 col-md-offset-1">
	                      	<div class="alert alert-info">
	                      	    To create a new product, fill up all fields below.
	                      	</div>
	                      </div>
                      	</div>
                      	<hr>
                      	{{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'cpanel.product.create'])}}
                      	  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product name</label>
                              <div class="col-sm-10">
                                  {{Form::text('productname' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Image</label>
                              <div class="col-sm-10">
                                 {{Form::select('fileid',$files, 0, ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Type</label>
                              <div class="col-sm-10">
                                  {{Form::select('producttypeid',$productType,'0', ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Product Description</label>
                              <div class="col-sm-10">
                              		{{Form::textarea('productdesc' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>

                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Day Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('productprice' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Night Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('nightproductprice' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Overnight Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('overnightproductprice' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Extension Rate/Price</label>
                              <div class="col-sm-10">
                                  {{Form::number('extensionproductprice' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>

                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Minimum Capacity</label>
                              <div class="col-sm-10">
                                  {{Form::number('paxmin' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Max Capacity</label>
                              <div class="col-sm-10">
                                  {{Form::number('paxmax' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                         <hr>
                   
                      	
						    <div class="btn-group btn-group-justified" role=""> 
						    	<div class="btn-group" role="group">
						     		{{Form::submit('Create' ,['class' => 'btn btn-primary'])}} 
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
