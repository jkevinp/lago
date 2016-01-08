@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover table-responsive">
	                  	  	  <h4><i class="fa fa-angle-right"></i> {{$title}}
                               <span class="badge">
                                @if(count($mails) == 0)
                                  No records found
                                  @else
                                    {{count($mails)}} record found.
                                @endif
                              </span>

                            </h4>
	                  	  	  <hr>
                              <thead>
                              	
                                <tr>
                                  
                                  <th><i class="fa fa-bullhorn"></i>From</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Sender Email</th>
                                  <th><i class="fa fa-bookmark"></i> To</th>
                                  <th><i class="fa fa-bookmark"></i> Receiver Email</th>
                                  <th><i class="fa fa-bookmark"></i> Subject</th>
                                  <th><i class=" fa fa-edit"></i> Message</th>
                                  <th><i class=" fa fa-edit"></i> Actions</th>
                                  <th></th>
                              </tr>
                              </thead>

                              	@foreach($mails as $mail)
                              <tbody>
                              <tr>
                                  <td><a href="basic_table.html#">{{$mail['sendername']}}</a></td>
                                  <td class="hidden-phone">{{$mail['senderemail']}}</td>
                                  <td>{{$mail['receivername']}}</td>
                                  <td>{{$mail['receiveremail']}}</td>
                                  <td>{{$mail['subject']}}</td>
                                  <td>{{substr($mail['message'] ,0,30)}}</td>
                                  <td>
                                  	  <a href="{{URL::action('cpanel.show' ,['action' => 'viewmessage' , 'param' => $mail['id']])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i>View</a>
                                      <a href="{{URL::action('mail.delete' , ['id' => $mail['id']])}}"class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>Delete</a>
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


@stop