@extends('layout.template')

@yield('image' ,'-Gallery')

@section('header')

<style type="text/css">
   .carousel-control {
      height: 100%;
      margin-top: 0;
      text-shadow: 0 1px 1px rgba(0,0,0,.4);
      background-color: transparent;
      border: 0;
      z-index: 10;
    }
    .carousel {
        margin-top:15px;
    }
    .carousel .container 
    {
      position: relative;
      z-index: 9;
    }
</style>

@stop


@section('content')
<div id="carousel-explore" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-explore" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-explore" data-slide-to="1"></li>
    <li data-target="#carousel-explore" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
         <img class="img-responsive" src="{{URL::asset('default')}}/img/slide-1.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h2>Pools</h2>
              <p class="lead">Feeling the heat? Swim off the heat!</p>
              <a class="btn btn-large btn-primary" href="#">Jump to the pool</a>
            </div>
          </div>
    </div>
    <div class="item">
            <img class="img-responsive" src="{{URL::asset('default')}}/img/slide-2.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h2>Cottages</h2>
              <p class="lead">Need to rest? Here's a cottage for you!</p>
              <a class="btn btn-large btn-primary" href="#">Check out Cottages</a>
            </div>
          </div>
        </div>
        <div class="item">
            <img class="img-responsive" src="{{URL::asset('default')}}/img/slide-3.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h2>Rooms</h2>
              <p class="lead">We offer you a comfortable rooms to relax, after a good swim.</p>
              <a class="btn btn-large btn-primary" href="{{URL::action('static.home')}}/#booknow">Find me a room</a>
            </div>
          </div>
        </div>  
   
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-explore" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-explore" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<br/>
 <div class="row well well-lg">
    <h3 align="center">Admission</h3>  
    @foreach($pools as $room)
    <div class="col-md-4">
        <div class="thumbnail">
            <a data-lightbox="image-1"class="example-image-link" data-title="{{$room['productname']}}<hr>{{$room['productdesc']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}" >
                <img src="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}"  class="example-image img-responsive" width="320px" height="320px"/>
            </a>
        </div>             
    </div>
    @endforeach
  </div>
 <div class="row well well-lg">
 <h3 align="center">Cottages</h3> 

  @foreach($cottages as $room)
    <div class="col-md-4">
        <div class="thumbnail">
            <a data-lightbox="image-1"class="example-image-link" data-title="{{$room['productname']}}<hr>{{$room['productdesc']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}" >
                <img src="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}"  class="example-image img-responsive" width="320px" height="320px"/>
            </a>
        </div>             
    </div>
    @endforeach
  </div>
   <div class="row well well-lg">
    <h3 align="center">Rooms</h3><hr />
     @foreach($rooms as $room)
    <div class="col-md-4">
        <div class="thumbnail">
            <a data-lightbox="image-1" class="example-image-link" data-title="{{$room['productname']}}<hr>{{$room['productdesc']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}" >
                <img src="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}"  class="example-image img-responsive" width="320px" height="320px"/>
            </a>
        </div>             
    </div>
    @endforeach
  </div>


    
@stop

@section('script')

 <script>
      !function ($) {
        $(function(){
          // carousel demo
          $('#myCarousel').carousel()
        })
      }(window.jQuery)
    </script>
@stop