@extends('layout.template')

@yield('image' , 'Gallery')

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
   <?php $counter = 0;?>
    @foreach($carousel as $c)
        
        <div class="item <?php if($counter == 0)echo 'active'; ?>">
            <img class="img-responsive" src="{{URL::asset('default/img-uploads')}}/{{$c['media']}}" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h2>{{$c['title']}}</h2>
              <p class="lead">{{$c['value']}}</p>
            </div>
          </div>
        </div>  
         <?php $counter++?>
        @endforeach
   
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
    <h3 align="center">Gallery</h3>  
    @foreach($content as $c)
    <div class="col-md-4">
        <div class="thumbnail">
            <a data-lightbox="image-1"class="example-image-link" data-title="{{$c['title']}}<hr>{{$c['value']}}" href="{{URL::asset('default/img-uploads')}}/{{$c['media']}}" >
                <img src="{{URL::asset('default/img-uploads')}}/{{$c['media']}}"  class="example-image img-responsive" width="320px" height="320px"/>
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