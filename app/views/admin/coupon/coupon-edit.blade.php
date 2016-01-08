@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                  	<h3>> {{$title}} </h3>
                      <div class="form-panel">
                      	<div class="row">
                      		<div class="col-md-10 col-md-offset-1">
	                      	<div class="alert alert-info">
	                      		<ul>
	                      			<li>To create a new coupon/discount coupon. First, Enter the coupon name.</li>
	                      			<li>Select type of coupon, percent for coupons that reduced bill by a percentage and absolute for coupons that deduct bill by a value.</li>
	                      			<li>After setting the type of coupon, enter the discount percentage or value of the coupon.</li>
	                      			<li>Select the status of the coupon. Either, Active or Inactive</li>
	                      			<li>Once all necessary informations are provided, press create and the system will generate a code for the coupon.</li>
	                      			
	                      		</ul>
	                      	</div>
	                      </div>
                      	</div>
                      	<hr>
                      	{{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'cpanel.coupon.edit'])}}
                      	  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Coupon Id</label>
                              <div class="col-sm-10">
                                  {{Form::hidden('id' , $coupon['id'])}}
                                  {{Form::text('id' ,$coupon['id'],['class' => 'form-control' ,'disabled'=> 'true'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Coupon Name</label>
                              <div class="col-sm-10">
                              		{{Form::text('name' ,$coupon['couponname'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Coupon Type</label>
                              <div class="col-sm-10">
                                  {{Form::select('type',['absolute' => 'Absolute', 'percent' => 'Percentage'],$coupon['type'], ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Discount Value/Percentage</label>
                              <div class="col-sm-10">
                                  {{Form::number('discount' ,($coupon['type'] == 'percent') ? $coupon['discountbypercentage'] : $coupon['discountbyvalue']

                                  , ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                        		<div class="col-sm-12">
	                              <label class="col-sm-2 control-label">Status</label>
	                              <div class="col-sm-4">
	                                  	<div class="col-sm-12">
	                                  		<div class="switch switch-square"
		                                       data-on-label="<i class=' fa fa-check'></i>ON "
		                                       data-off-label="<i class='fa fa-times'></i>OFF">
	                                  		{{Form::checkbox('active', 'value', true )}}
		                                  </div>
	                              		</div>
	                              </div>
                          		</div>
                         </div>
                         <hr>
                   
                      	
						    <div class="btn-group btn-group-justified" role=""> 
						    	<div class="btn-group" role="group">
						     		{{Form::submit('Save' ,['class' => 'btn btn-primary'])}} 
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
