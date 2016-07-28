@extends('layout.user-dashboard')

@section('content')
				<div class='row'>
                    <div class="col-lg-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title"><i class="fa fa-clock-o fa-fw"></i>
                                    @if(isset($title))
                                        {{$title}}
                                    @endif
                                </h3>
                            </div>
                            <div class="box-body">
                                <div class="list-group">
                                    <?php $ctr =0?>
                                	<div class="panel-group " id="accordion" role="tablist" aria-multiselectable="false">
                                         <div class="panel panel-default">
                                            @foreach ($messages as $message)
                                                <h4 class="panel-title alert alert-success">
                                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse{{$ctr}}" aria-expanded="false" aria-controls="collapse{{$ctr}}">
                                                            <i class="fa fa-envelope"> </i> Sender:{{$message['sendername']}} [ {{$message['senderemail']}}] 
                                                               <span class="badge">
                                                                    {{$message['created_at']}}
                                                                </span>
                                                        </a>
                                                </h4>
                                                <div id="collapse{{$ctr}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                                    <div class="panel-body">
                                                        <div class="row">
                                                            <div class="col-md-7">
                                                                Message : {{$message['message']}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $ctr+= 1;?>
                                            @endforeach
                                            </div>
                                     </div>
                                </div>
                                
                            </div>
                            <div class="box-footer">
                                    <a href="#" class="pull-right">View All Activity <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                        </div>
                    </div>
            </div>
            <!-- /.row -->
@stop