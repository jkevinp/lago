@extends('layout.admin-dashboard')


@section('content')

<div class="row mt">
	<div class="col-md-12">
		<div class="form-panel"> 
			<h4>>Edit Content</h4>
			<div class="panel-body">
				{{Form::open(array('route' => 'cms.store','role'=>'form','files'=> true , 'method' => 'post'))}}
			
				    <div class="form-group">
                        <div class="">Select page:</div>
                        {{Form::select('contenttype' , $contenttype ,$content->contentkey->contentkey , ['class' => 'form-control' , 'id' => 'content-page' , 'data-target' => route('cms.ajax.contentvalue')])}}
					</div>
					<div class="form-group">
                        <div class="">Select content category:</div>
                        <select name="content-category" id="content-category" class="form-control" disabled="">
                        	
                        </select>
					</div>
					<div class="form-group">
						<div class="">Title:</div>
						<input type="text" class="form-control" name="title" value="{{$content->title}}" placeholder="Title" />
					</div>
					<div class="form-group">
						<div class="">Text Content:</div>
						<textarea placeholder="Content" name="textcontent" class="form-control">{{$content->value}}</textarea>
					</div>

					<div class="form-group">
						<div class="">Image Content: </div>
                    	{{Form::file('image')}}
					</div>

                        
				<input type="submit" value="Save" style='display:none;' id="btn-submit"/>
				{{Form::close()}}
			</div>
		</div>
	</div>
</div>


@stop

@section('script')
	<script type="text/javascript">
		$('#content-page').on('change' , function(e){
			var _targetUrl  = $(this).data('target');
			
			$('#content-category').removeAttr('disabled');
			$('#content-category').empty();
			$.get( _targetUrl, {key : $(this).val()}, function(response){
				$('#content-category').append("<option selected='true' disabled>Select category</option>");
				$.each(response , function(index,object){
					$('#content-category').append("<option>" + object.contentvalue + "</option>");
				});
			},'json');
		});
		$('#content-category').on('change' , function(e){
			$('#btn-submit').show(0);
			console.log('test');

		});
	</script>
@stop