@extends('layout.user-dashboard')

@section('content')
	<div class="row">
                  <div class="col-md-8 col-md-offset-1">
                          <h3>Create Message</h3>
                          {{Form::open(['class' =>'form-horizontal' ,'method' => 'post' , 'route' => 'cpanel.mail.create'])}}
                          <div class="form-panel">
                            <div class="row">
                              <div class="form-group">
                                 <div class ="col-md-2">
                                    From :
                                 </div>
                                 <div class="col-md-10">
                                     {{Form::hidden('senderemail' , $user['email'])}}
                                     {{Form::hidden('sendername' , $user['firstname'].' '.$user['middleName'].' '.$user['lastName'])}}
                                     {{Form::text('senderemail' ,'<'.$user['email'].'>' ,['class' => 'form-control' ,'disabled' => 'true'])}}
                                 </div>
                               </div>
                               <div class="form-group">
                                  <div class ="col-md-2">
                                    To :
                                 </div>
                                 <div class="col-md-10">
                                    {{Form::email('receiveremail' ,null ,['class' => 'form-control' , 'style' => 'height:34px'])}}
                                 </div>
                               </div>
                               <div class="form-group">
                                 <div class ="col-md-2">
                                    Subject :
                                 </div>
                                 <div class="col-md-10">
                                    {{Form::text('subject' ,null ,['class' => 'form-control'])}}
                                 </div>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                             <div class="form-group">
                                <div class="col-md-12">
                                    {{Form::textarea('message' ,null ,['class' => 'form-control'])}}
                                 </div>
                            </div>
                          </div>
                            <hr>
                               
                                  {{Form::submit('Send' , ['class' => 'btn btn-primary btn-xs'])}}
                                  {{Form::reset('Reset' , ['class' => 'btn btn-default btn-xs'])}}
                                  <a href="{{ URL::previous()}}"  class="btn btn-success btn-xs"><i class="fa fa-arrow-left"></i>Back</a>
                          {{Form::close()}}
                          </div>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
@stop