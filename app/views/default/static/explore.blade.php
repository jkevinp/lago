@extends('layout.template')

@section('image' ,'-RoomCottage')

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
  
    .thumbnail{
        min-height: 320px !important;
        max-height: 320px !important;
    }

    .image-control{
        min-height: 310px !important;
        max-height: 310px !important;
    }
</style>

@stop


@section('content')
<div class="row content">
<div id="carousel-explore"  class="carousel slide" data-ride="carousel">

  <div class="carousel-inner" role="listbox">
   <?php $counter = 0;?>
    @foreach($carousel as $c)
        
        <div class="item <?php if($counter == 0)echo 'active'; ?>">
            <img class="img-responsive" style="width:100%;height:600px;" src="{{Helpers::Assets($c['imagename'])}}" alt="">
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



 <div class="col-md-12">
    <div class="row">
        <h3 align="center">Rooms</h3><hr/>
        @foreach($rooms as $room)
          <div class="col-md-4 col-md-4">
            <div class="thumbnail">
                <a data-lightbox="image-1" class="example-image-link" data-title="{{$room['productname']}}<hr>{{$room['productdesc']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}" >
                    <img src="{{asset('default/img-uploads')}}/{{$room['imagename']}}"  class="image-control example-image img-responsive"/>
                </a>
            </div>             
        </div>
      @endforeach
    </div>
  </div>

  <div class="col-md-12">
    <div class="row">
        <h3 align="center">Cottages</h3><hr/>
        @foreach($cottages as $room)
          <div class="col-md-4 col-md-4">
            <div class="thumbnail">
                <a data-lightbox="image-1" class="example-image-link" data-title="{{$room['productname']}}<hr>{{$room['productdesc']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}" >
                    <img src="{{asset('default/img-uploads')}}/{{$room['imagename']}}"  class="image-control example-image img-responsive"/>
                </a>
            </div>             
        </div>
      @endforeach
    </div>
  </div>

  <div class="col-md-12">
    <div class="row">
        <h3 align="center">Nipa Huts</h3><hr/>
        @foreach($pools as $room)
          <div class="col-md-4 col-md-4">
            <div class="thumbnail">
                <a data-lightbox="image-1" class="example-image-link" data-title="{{$room['productname']}}<hr>{{$room['productdesc']}}" href="{{URL::asset('default/img-uploads')}}/{{$room['imagename']}}" >
                    <img src="{{asset('default/img-uploads')}}/{{$room['imagename']}}"  class="image-control example-image img-responsive"/>
                </a>
            </div>             
        </div>
      @endforeach
    </div>
  </div>

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