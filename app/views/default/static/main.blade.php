@extends('layout.template')

@section('image', '-Home')
@stop

@section('content')
    @include('includes.default.carousel')

     <div class="col-lg-8 col-lg-offset-2 bg-white">
        <div class="" style="min-height:800px !important;">
            <div class="row">
            <h3 class="text-center"><i class="fa fa-newspaper-o"></i> News And Updates</h3>
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
                    <img class="img" src="{{Helpers::Assets($new->media)}}" style="max-width:100%;width:100%;max-height: 250px;">
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

