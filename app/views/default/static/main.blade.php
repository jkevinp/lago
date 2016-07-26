@extends('layout.template')

@section('image', '-Home')
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-12">
                <div class="content" style="height:820px !important;">
                    <div class="karousel" style="z-index:5;">
                        <img src="{{URL::asset('media/photos')}}/1.jpg" style="" class="carousel-item"/>
                        <img src="{{URL::asset('media/photos')}}/2.jpg" style="" class="carousel-item"/>
                        <img src="{{URL::asset('media/photos')}}/3.JPG" style="" class="carousel-item"/>
                        <img src="{{URL::asset('media/photos')}}/5.jpg" style="" class="carousel-item"/>
                     </div>
                </div>
            </div>
        </div>
    </div>
     <div class="col-md-6">
        <div class="content" style="min-height:800px !important;">
            <div class="row">
            <legend class=""><i class="fa fa-newspaper-o"></i> News And Updates</legend>
            </div>
            @foreach($news as $new)
                <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <span class="label label-success pull-right">{{$new->updated_at}}</span>
                    <h3><i>{{$new->title}}</i></h3>
                 </div>
                <hr/>
                @if(isset($new->media) && !empty($new->media))
                <center>
                    <img class="img" src="{{Helpers::Assets($new->media)}}" style="max-width: 100%;width:100%;max-height: 250px;">
                </center>
                @endif
                <br/>
                <p>{{$new->value}}</p>
                <hr/>
                <br/>
                <br/>
                </div>

            @endforeach
        </div> 
    </div>
    <div class="col-md-6">
        <div class="content" style="min-height:800px !important;">
            <div class="row">
            <legend class=""><i class="fa fa-newspaper-o"></i> Facebook Feed</legend>
            </div>
            @foreach($fbposts as $new)

                <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <span class="label label-success pull-right">{{$new->created_time}}</span>
                    @if(isset($new->story))
                    <h3><i>{{$new->story}}</i></h3>
                    @endif
                 </div>
                <hr/>
                @if(isset($new->media) && !empty($new->media))
                <center>
                    <img class="img" src="{{Helpers::Assets($new->media)}}" style="max-width: 100%;width:100%;max-height: 250px;">
                </center>
                @endif
                <br/>
                  @if(isset($new->message))
                <p>{{$new->message}}</p>
                @endif
                <hr/>
                <br/>
                <br/>
                </div>

            @endforeach
        </div> 
    </div>
</div>


@stop

@section('script')
 <script src="{{URL::asset('default')}}/js/main.js"></script>
 <script type="text/javascript">
 $(document).ready(function(){
    var currentIndex = 0;
    var lastIndex = 0;
 
    
    $('.carousel-item').each(function(index, obj){
        if(index !=0)
        $(obj).css('display', 'none');
        $(obj).css('z-index', '-' +index);
        $(obj).attr('data-count' , index);
        lastIndex = index;
    });
    
    setInterval(function(){
        if($("[data-count='"+ currentIndex  +"']").length)
            $(".carousel-item[data-count='"+ currentIndex  +"']").fadeOut("slow");
        if(currentIndex < lastIndex)
        currentIndex++;
    else currentIndex =0;
        $(".carousel-item[data-count='"+ currentIndex  +"']").fadeIn("slow");
     
    }, 4000);

 });
 </script>
@stop

