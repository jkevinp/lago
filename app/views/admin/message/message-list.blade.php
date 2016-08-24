@extends('layout.admin-dashboard')

@section('content')

        <!-- page start-->
        <div class="row">
            <div class="col-sm-3">
                <section class="panel">
                    <div class="panel-body">
                       
                        <ul class="nav nav-pills nav-stacked mail-nav">
                            <li class="active"><a href="{{URL::action('cpanel.show' ,array('action' => 'message' , 'param' => 'all'))}}"> <i class="fa fa-inbox"></i> Inbox  <span class="label label-theme pull-right inbox-notification">
                                @if(count($mails) == 0)
                                  0
                                @else
                                    ({{count($mails)}})
                                @endif
                            </span></a></li>
                            <li><a href="{{URL::action('cpanel.create' ,array('action' => 'message'))}}"> <i class="fa fa-pencil"></i>  Compose Mail</a></li>
                        </ul>
                    </div>
                </section>
            </div>
            <div class="col-sm-9">
                <section class="panel">
                    <header class="panel-heading wht-bg">
                       <h4 class="gen-case">Inbox  @if(count($mails) == 0)
                                  No records found
                                  @else
                                    ({{count($mails)}})
                                @endif
                        <form action="#" class="pull-right mail-src-position">
                            
                        </form>
                       </h4>
                    </header>
                    <div class="panel-body minimal">
                        <div class="mail-option">
                            
                        <div class="table-inbox-wrap ">
                            <table class="table table-inbox table-hover">
                        <tbody>
                        @foreach($mails as $mail)
                        <tr class="unread">
                            <td class="inbox-small-cells">
                               
                            </td>
                          
                            <td class="view-message  dont-show"><a href="{{URL::action('cpanel.show' ,['action' => 'viewmessage' , 'param' => $mail['id']])}}">{{$mail['sendername']}} [{{$mail['senderemail']}}]</a></td>
                            <td class="view-message "><a href="{{URL::action('cpanel.show' ,['action' => 'viewmessage' , 'param' => $mail['id']])}}">{{$mail['subject']}}</a></td>
                            <td class="view-message  inbox-small-cells">{{substr($mail['message'] ,0,30)}}</td>
                            <td class="view-message  text-right">
                             <a href="{{URL::action('cpanel.show' ,['action' => 'viewmessage' , 'param' => $mail['id']])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i>View</a>
                                      <a href="{{URL::action('mail.delete' , ['id' => $mail['id']])}}"class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>Delete</a></td>
                        </tr>
                        @endforeach
                      
                        </tbody>
                        </table>

                        </div>
                    </div>
                </section>
            </div>
        </div>
@stop