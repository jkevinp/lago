@extends('layout.admin-dashboard')

@section('content')
<div class="col-lg-8 col-lg-offset-2">
  <div class="box box-primary">
  <div class="box-header">
    <h3>Subject: {{$mail['subject']}} </h3>
     <p class ="col-md-6">
        From : &lt;{{$mail['senderemail']}}&gt; <b>[{{$mail['sendername']}}]</b>
     </p>
     <p class ="col-md-6 pull-right">
         {{$mail['created_at']}}
     </p>
      <p class ="col-md-12">
        To :        &lt;{{$mail['receiveremail']}}&gt; <b>[{{$mail['receivername']}}]</b>
     </p>
  </div>
  <hr/>                    
  <div class="box-body">
    <p class="well" width="100%" height="auto" style="border-radius: 0 !important" rows=5 cols=100>{{$mail['message']}}</p>
  </div>                 
  <div class="box-footer">
    @if((Auth::user()->email) == $mail['receiveremail'] || $mail['receiveremail'] == 'mail.sunrock@gmail.com')
       <a href="{{URL::action('mail.delete' , ['id' => $mail['id']])}}" class="pull-right btn btn-danger"><i class="fa fa-trash-o "></i> Delete</a>
    @endif
    <a href="{{ URL::previous()}}"  class="btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
                      
                  </div>
          </div><!-- /col-md-12 -->
      </div><!-- /row -->


@stop