@extends('layout.template')


@section('content')
<br/><br/><br/>
<div class="container">
	<div class="row">
		   <div class="table-responsive" align="Center">
				<p>File Name : {{$file->imagename}}</p>
				<hr class="intro-divider">
				<img src="{{URL::asset('default/img-uploads')}}/{{$file->imagename}}" class="img-polaroid"/>
				
		</div>
	</div>
</div>