@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                  	<h3>> {{$title}} </h3>
                      <div class="form-panel">
                      	<div class="row">
                      		<div class="col-md-10 col-md-offset-1">
	                      	
	                      </div>
                      	</div>
                      	<hr>
                      	{{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'account.create'])}}
                      	 <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10">
                                  {{Form::select('Title',['MR' => 'MR', 'MRS' => 'MRS' ,'MS' => 'MS'],'MR', ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Group</label>
                              <div class="col-sm-10">
                                  {{Form::select('usergroup',['1' => 'Admin', '2' => 'User' , '3' =>'Staff'],'2', ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Firstname</label>
                              <div class="col-sm-10">
                              		{{Form::text('Firstname' ,null,['class' => 'form-control text-only'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Middlename</label>
                              <div class="col-sm-10">
                                  {{Form::text('Middlename' ,null,['class' => 'form-control text-only'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Lastname</label>
                              <div class="col-sm-10">
                                  {{Form::text('Lastname' ,null,['class' => 'form-control text-only'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address</label>
                              <div class="col-sm-10">
                                  {{Form::text('Email' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Confirm Email Address</label>
                              <div class="col-sm-10">
                                  {{Form::text('Email2' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contact Number</label>
                              <div class="col-sm-10">
                                  {{Form::text('ContactNumber' ,null,['class' => 'form-control'])}}
                              </div>
                         </div>
                         
                         <hr>
                   
                      	
						    <div class="btn-group btn-group-justified" role=""> 
						    	<div class="btn-group" role="group">
						     		{{Form::submit('Create' ,['class' => 'btn btn-primary'])}} 
						  		</div>  	
						  	<div class="btn-group" role="group">
						      {{Form::reset('Reset' ,['class' => 'btn btn-default'])}} 
						 	 </div>
						    </div>  
						       	{{Form::close()}}
                      </div><!-- /form-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->



@stop


@section('script')
<script type="text/javascript">
function isLetter(myString){
  console.log(myString);
if (myString.match(/^[a-zA-Z\s]*$/)) { 
    return true;
  }
  return false;
}

    $('.text-only').keypress(function(e){
        var letter = String.fromCharCode(e.which);
       if(!isLetter(letter))e.preventDefault();
    });
</script>
@stop