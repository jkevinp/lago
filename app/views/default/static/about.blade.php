@extends('layout.template')

@section('image' , 'AboutUs')

@section('content')
    <!-- Header -->
    <br/><br/>
    @foreach($content as $k=>$c)
    @if($k % 2 ==0)
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                     <h2 class="section-heading">{{$c->title}}</h2>
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <p class="lead">{{$c->value}}</p>
                </div>
                <div class="col-lg-6 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive img img-thumbnail" style="float:right;" width="500px" src="{{URL::asset('media/photos')}}/1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">{{$c->title}}</h2>
                    <p class="lead">{{$c->value}}</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive img img-thumbnail" width="500px" src="{{URL::asset('media/photos')}}/2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach

    <legend></legend>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3862.3717672783123!2d121.26506931480299!3d14.52071498985335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397ea796a2274c7%3A0xa02a4c041bda471c!2sD'one+Resort+and+Restaurant!5e0!3m2!1sen!2sph!4v1453258273626" width="100%" height="600" frameborder="0" style="border:0;margin-bottom:20px" allowfullscreen=""></iframe>
@stop

@section('script')
 <script src="{{URL::asset('default')}}/js/main.js"></script>
@stop