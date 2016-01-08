@extends('layout.admin-dashboard')


@section('content')

<div class="row mt">
	<div class="col-md-12"><h4>> Upload New File</h4>
		<div class="form-panel"> 
			<div class="panel-body">
				{{Form::open(array('route' => 'cpanel.file.create','role'=>'form','files'=> true , 'method' => 'post'))}}
				    <div class="form-group">
                             <div class="alert alert-info">Select an Image to upload</div>
                              <label class="sr-only" for="fileupload">Select file</label>
                             	{{Form::file('image')}}
                             	<br/>
                             	{{Form::textarea('description' ,null , ['placeholder' => 'File description'])}}
                          </div>
				{{Form::submit('Upload Image')}}
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>


@stop