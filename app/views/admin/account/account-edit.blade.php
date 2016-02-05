@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                  	
                      <div class="form-panel">
                      	<div class="row">
                          <h3>>{{$title}} </h3>
                      
                      	</div>
                      	<hr>
                      	{{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'cpanel.account.edit'])}}
                      	   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Account id</label>
                              <div class="col-sm-10">
                                  {{Form::hidden('id' , $account['id'])}}
                                  {{Form::text('id', $account['id'], ['class' => 'form-control' , 'disabled' => 'true'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Title</label>
                              <div class="col-sm-10">
                                  {{Form::select('Title',['MR' => 'MR', 'MRS' => 'MRS' ,'MS' => 'MS'], $account['Title'], ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">User Group</label>
                              <div class="col-sm-10">
                                  {{Form::select('usergroup',['1' => 'Admin', '2' => 'User'], $account['usergroupid'], ['class' => 'form-control'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Firstname</label>
                              <div class="col-sm-10">
                              		{{Form::text('Firstname' ,$account['firstname'],['class' => 'form-control text-only'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Middlename</label>
                              <div class="col-sm-10">
                                  {{Form::text('Middlename' ,$account['middleName'],['class' => 'form-control text-only'])}}
                              </div>
                         </div>
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Lastname</label>
                              <div class="col-sm-10">
                                  {{Form::text('Lastname' ,$account['lastName'],['class' => 'form-control text-only'])}}
                              </div>
                         </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email Address</label>
                              <div class="col-sm-10">
                                  {{Form::text('Email' ,$account['email'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contact Number</label>
                              <div class="col-sm-10">
                                  {{Form::text('ContactNumber' ,$account['contactnumber'],['class' => 'form-control'])}}
                              </div>
                         </div>
                         
                         <hr>
                   
                      	
						    <div class="btn-group btn-group-justified" role=""> 
						    	<div class="btn-group" role="group">
						     		{{Form::submit('Update' ,['class' => 'btn btn-primary'])}} 
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