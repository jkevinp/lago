@extends('layout.template')

@section('image', '-Home')
@stop

@section('content')
    <div class = "container">
        <div class="css-carousal">
            <img src="{{URL::asset('media/photos')}}/1.jpg" class="css-img img-thumbnail"/>
            <img src="{{URL::asset('media/photos')}}/2.jpg" class="css-img img-thumbnail"/>
            <img src="{{URL::asset('media/photos')}}/3.JPG" class="css-img img-thumbnail"/>
            <img src="{{URL::asset('media/photos')}}/4.JPG" class="css-img img-thumbnail"/>
            <img src="{{URL::asset('media/photos')}}/5.jpg" class="css-img img-thumbnail"/>
         </div>
    </div>

    <a name="booknow" id="booknow"></a>
    @include('includes.form.form-date')
@stop

@section('script')
 <script src="{{URL::asset('default')}}/js/main.js"></script>
@stop