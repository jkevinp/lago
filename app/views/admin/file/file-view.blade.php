@extends('layout.admin-dashboard')


@section('content')

<div class="row mt">
	<div class="col-md-8"><h4>> View File</h4>
		<div class="content-panel"> 
			<div class="panel-body">
				<ul>
					<li>Image Name: {{$file->imagename}}</li>
					<li>Description : {{$file->description}}</li>
					<li>File created : {{$file->created_at}}</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="col-md-4">
  			<div class="content-panel">
  				<h4> File Preview</h4>
			  	<div class="panel-body">
					<a data-lightbox="image-1" class="example-image-link" data-title="{{$file->imagename}}" href="{{URL::asset('default/img-uploads')}}/{{$file->imagename}}" >
			    			<img width="150px" height="150px" src="{{URL::asset('default/img-uploads')}}/{{$file->imagename}}"  class="img-thumbnail"/>
						</a>
					</div>
			</div>
		</div>
</div>


@stop