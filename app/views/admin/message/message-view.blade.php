@extends('layout.admin-dashboard')

@section('content')
        <div class="row mt">
                  <div class="col-md-8">
                          <h3>> {{$title}} </h3>
                         <div class="showback">
                            <div class="row">
                               <div class ="col-md-2">
                                  From :
                               </div>
                               <div class="col-md-10">
                                   &lt;{{$mail['senderemail']}}&gt; <b>[{{$mail['sendername']}}]</b>
                               </div>
                                <div class ="col-md-2">
                                  To :
                               </div>
                               <div class="col-md-10">
                                  &lt;{{$mail['receiveremail']}}&gt; <b>[{{$mail['receivername']}}]</b>
                               </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                  Subject: {{$mail['subject']}}
                                </div>
                            </div>
                            <div class="alert alert-info" width="100%" height="auto" rows=5 cols=100>
                              {{$mail['message']}}
                            </div>
                            <hr>
                              @if((Auth::user()->email) == $mail['receiveremail'] || $mail['receiveremail'] == 'mail.sunrock@gmail.com')
                                 <a href="{{URL::action('mail.delete' , ['id' => $mail['id']])}}"class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>Delete</a>
                              @endif
                              <a href="{{ URL::previous()}}"  class="btn btn-success btn-xs"><i class="fa fa-arrow-left"></i>Back</a>
                              
                          </div>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


@stop