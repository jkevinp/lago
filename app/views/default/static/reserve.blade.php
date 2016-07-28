@extends('layout.template')

@section('image', '-Home')
@stop

@section('content')
<br/>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div class="row content" style="margin-bottom:10px !important;">
            @include('includes.form.form-date')
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

