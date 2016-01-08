@extends('layout.admin-dashboard')

@section('content')
				<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4><i class="fa fa-angle-right"></i> {{$title}}
                               <span class="badge">
                                @if(count($accounts) == 0)
                                  No records found
                                  @else
                                    {{count($accounts)}} record found.
                                @endif
                              </span>
                               <span class="pull-right">
                                  <a href="{{URL::action('pdf.stream' , ['action' => 'account' ,'param' => 'all'])}}" class="btn btn-primary btn-xs"><i class="fa fa-print"></i>Print</a>
                              </span>
                               </h4>
	                  	  	  <hr>
                              <thead>
                              	
                                <tr>
                                  
                                  <th><i class="fa fa-bullhorn"></i>Account id</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i>Full name</th>
                                  <th><i class="fa fa-bookmark"></i> Contact</th>
                                  <th><i class="fa fa-bookmark"></i> Email</th>
                                  <th><i class="fa fa-bookmark"></i> User Group</th>
                                  <th><i class=" fa fa-edit"></i> Status</th>
                                  <th><i class=" fa fa-edit"></i> Actions</th>
                                  <th></th>
                              </tr>
                              </thead>

                              	@foreach($accounts as $account)
                              <tbody>
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
                                    @else 
                                      <label class="label label-mini label-danger">
                                       Inactive
                                    </label>
                                    @endif
                                    
                                  </td>
                                  <td>
                                      
                                  	  <a href="{{URL::action('cpanel.show' ,['action' => 'viewaccount' , 'param' => $account['id']])}}" class="btn btn-info btn-xs"><i class="glyphicon glyphicon-info-sign"></i>View</a>
                                      <a href="{{URL::action('cpanel.edit' ,['action' => 'account' , 'param' => $account['id']])}}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a>
                                      <a class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i>Delete</a>
                                      @if($account['active'] == 0)
                                        <a href="{{URL::action('account.manualactivation' ,['email' => $account['email'] , 'code' => $account['confirmationcode']])}}" class="btn btn-warning btn-xs"><i class="fa fa-check"></i>Activate</a>
                                      @endif
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>

                        
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


@stop