@extends('layout.template')

@section('image' , '-AboutUs')

@section('content')
    <!-- Header -->
     @include('includes.default.carousel')

    <div class="bg-white col-lg-8 col-lg-offset-2">
    <h2 class="text-center">About Us</h2>
    <div class="row">

    @foreach($content as $k=>$c)
    @if($k % 2 ==0)
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-6">
                    <h2 class="section-heading">{{$c->title}}</h2>
                    <hr class="section-heading-spacer">
                    <p class="lead">{{$c->value}}</p>
                </div>
                <div class="col-lg-6">
                    <img class=" img img-thumbnail" style="" src="{{URL::asset('media/photos')}}/1.jpg" alt="">
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-lg-6">
                <img class="img-responsive img img-thumbnail" width="auto" src="{{URL::asset('media/photos')}}/2.jpg" alt="">
            </div>
                <div class="col-lg-6">
                    <hr class="section-heading-spacer">
                    <h2 class="section-heading">{{$c->title}}</h2>
                    <p class="lead">{{$c->value}}</p>
                </div>
                
        </div>
    @endif
    @endforeach
</div>
</div>
    <iframe src="https://www.google.com/maps/embed" width="100%" height="600" frameborder="0" style="border:0;margin-bottom:20px" allowfullscreen=""></iframe>

@stop

@section('script')
 <script src="{{URL::asset('default')}}/js/main.js"></script>
@stop