@extends('layout.template')

@section('image', '-Home')
@stop

@section('content')
<br/>
<div class="row">
    <div class="col-md-4">
        <div class="row content" style="padding-bottom:10px !important;">
            @include('includes.form.form-date')
        </div>

        <div class="row" style="margin-top:10px !important;">
            <div class="col-md-12">
                <div class="content" style="height:100% !important;">
                    <div class="karousel" style="z-index:5;">
                        <img src="{{URL::asset('media/photos')}}/1.jpg" class="carousel-item img-thumbnail"/>
                        <img src="{{URL::asset('media/photos')}}/2.jpg" class="carousel-item img-thumbnail"/>
                        <img src="{{URL::asset('media/photos')}}/3.JPG" class="carousel-item img-thumbnail"/>
                        <img src="{{URL::asset('media/photos')}}/4.JPG" class="carousel-item img-thumbnail"/>
                        <img src="{{URL::asset('media/photos')}}/5.jpg" class="carousel-item img-thumbnail"/>
                     </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="content" style="min-height:800px !important;">
            <div class="row">
            <legend class="text-center"><i class="fa fa-newspaper-o"></i> News And Updates</legend>
            </div>
            @foreach($news as $new)
                <div class="col-md-10 col-md-offset-1">
                <div class="row">

                <span class="label label-success pull-right">{{$new->updated_at}}</span>
                 <h3>> <i>{{$new->title}}</i></h3>
                 </div>
                 
                <hr/>
                <p>{{$new->value}}</p>
                @if(isset($new->media) && !empty($new->media))
                <center>
                <img class="img img-thumbnail" src="{{asset('default/img-uploads/'.$new->media)}}" style="max-width: 250px;max-height: 250px;"></h1>
 </center>
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

