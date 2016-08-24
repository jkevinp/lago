@extends('layout.admin-dashboard')

@section('content')

        <div class="row">
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body">
                       
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class=""><a href="{{URL::action('cpanel.show' ,array('action' => 'message' , 'param' => 'all'))}}"> <i class="fa fa-inbox"></i> Inbox  <span class="label label-theme pull-right inbox-notification">
                                @if(count($mails) == 0)
                                  0
                                @else
                                    ({{count($mails)}})
                                @endif
                            </span></a></li>
                            <li class="active"><a href="{{URL::action('cpanel.create' ,array('action' => 'message'))}}"> <i class="fa fa-pencil"></i>  Compose Mail</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-sm-9">
                <div class="box box-primary">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case">New Message</h4>
                    </header>
                    <div class="panel-body minimal">
                        {{Form::open(['class' =>'' ,'method' => 'post' , 'route' => 'cpanel.mail.create'])}}
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
                                    {{Form::email('receiveremail' ,null ,['class' => 'form-control'])}}
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
                               
                                  {{Form::submit('Submit' , ['class' => 'btn btn-primary '])}}
                                  {{Form::reset('Reset' , ['class' => 'btn btn-default '])}}
                                  <a href="{{ URL::previous()}}"  class="btn btn-success "><i class="fa fa-arrow-left"></i>Back</a>
                          {{Form::close()}}
                        
                </div>
            </div>
        </div>
          
@stop