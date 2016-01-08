@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> {{$title}}
                               <span class="badge">
                                @if(count($coupons) == 0)
                                  No records found
                                  @else
                                    {{count($coupons)}} record found.
                                @endif
                              </span>

                            </h4>
	                  	  	  <hr>
                              <thead>
                              	
                                <tr>
                                  
                                  <th><i class="fa fa-bullhorn"></i>Coupon ID</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Coupon name</th>
                                  <th><i class="fa fa-bookmark"></i> code</th>
                                  <th><i class="fa fa-bookmark"></i> discount</th>
                                  <th><i class="fa fa-bookmark"></i> type</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Actions</th>
                                  <th></th>
                              </tr>
                              </thead>

                              @foreach($coupons as $coupon)
                              <tbody>
                              <tr>
                                  <td><a href="basic_table.html#">{{$coupon['id']}}</a></td>
                                  <td class="hidden-phone">{{$coupon['couponname']}}</td>
                                  <td>{{$coupon['couponcode']}}</td>
                                  <td>
                                      @if(isset($coupon['discountbypercentage']) && $coupon['type'] == 'percent')
                                      {{$coupon['discountbypercentage']}}%
                                      @else
                                      {{$coupon['discountbyvalue']}}
                                      @endif
                                  </td>
                                  <td>{{$coupon['type']}}</td>
                                  <td>
                                    @if($coupon['active'] == 1)
                                    <label class="label label-mini label-success">
                                      Activated
                                    </label>
                                    @else 
                                      <label class="label label-mini label-danger">
                                       Needs Activation
                                    </label>
                                    @endif
                                    
                                  </td>
                                  <td>
                                       <a href="{{URL::action('cpanel.edit', ['action' => 'coupon' ,'param' => $coupon['id']])}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                     @if($coupon['active'] == 0)
                                        <a href="{{URL::action('coupon.changeStatus', ['id' => $coupon['id'] ,'status' => '1'])}}" class="btn btn-primary btn-xs"><i class="fa fa-check"></i>Activate</a>
                                        @else
                                         <a href="{{URL::action('coupon.changeStatus', ['id' => $coupon['id'] ,'status' => '0'])}}" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i>Deactivate</a>
                                      @endif
                                  	
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


@stop