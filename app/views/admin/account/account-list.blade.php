@extends('layout.admin-dashboard')

@section('content')
<div class="box box-primary">
  <div class="box-header with-border">
    <h4><i class="fa fa-angle-right"></i> {{$title}}
       <span class="badge">
        @if(count($accounts) == 0)
          No records found
          @else
            {{count($accounts)}} record found.
        @endif
      </span>
        
           </h4>
           <div class="box-tools pull-right">
          <button class="btn btn-box-tool layer-opener" data-w="800px" data-h="600px" data-type="2" data-href="{{URL::action('cpanel.create' ,array('action' => 'account')) }}"><i class="fa fa-plus"></i></button>
          <a href="{{URL::action('pdf.stream' , ['action' => 'account' ,'param' => 'all'])}}" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Print</a>
         
     </div>
	  	</div>
         <table class="table table-striped table-advance table-hover">
          <thead>
            <tr>
              <th><i class="fa fa-bullhorn"></i>Account id</th>
              <th class="hidden-phone"><i class="fa fa-question-circle"></i>Full name</th>
              <th><i class="fa fa-bookmark"></i> Contact</th>
              <th><i class="fa fa-bookmark"></i> Email</th>
              <th><i class="fa fa-bookmark"></i> User Group</th>
              <th><i class=" fa fa-edit"></i> Status</th>
              <th><i class=" fa fa-edit"></i> Actions</th>
          </tr>
          </thead>

          
          <tbody>
            @foreach($accounts as $account)
          <tr>
              <td><a href="basic_table.html#">{{$account['id']}}</a></td>
              <td class="hidden-phone">{{$account['title']}}. {{$account['firstname']}} {{$account['middleName']}} {{$account['lastName']}}</td>
              <td>{{$account['contactnumber']}}</td>
              <td>{{$account['email']}}</td>
              <td>{{$account['usergroupid']}}</td>
              <td>
                @if($account['active'] == 1)
                  <label class="label label-mini label-success">
                    Activated
                  </label>
                @elseif($account['active'] == 2)
                  <label class="label label-mini label-warning">
                    Locked
                  </label>
                @else 
                  <label class="label label-mini label-danger">
                   Inactive
                  </label>
                @endif
                
              </td>
              <td>
                  
              	  <a href="{{URL::action('cpanel.show' ,['action' => 'viewaccount' , 'param' => $account['id']])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i>View</a>
                  <a href="{{URL::action('cpanel.edit' ,['action' => 'account' , 'param' => $account['id']])}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                
                  @if($account['active'] == 0)
                    <a href="{{URL::action('account.manualactivation' ,['email' => $account['email'] , 'code' => $account['confirmationcode']])}}" class="btn btn-success btn-xs"><i class="fa fa-check"></i>Activate</a>
                  @elseif($account['active'] == 1)
                    <a href="{{URL::action('account.manualactivation' ,['email' => $account['email'] , 'code' => $account['confirmationcode']])}}" class="btn btn-warning btn-xs"><i class="fa fa-check"></i>Deactivate</a>
                  @endif
              </td>
          </tr>
          @endforeach
          </tbody>
      </table>

    
  </div><!-- /content-panel -->
</div><!-- /col-md-12 -->


@stop