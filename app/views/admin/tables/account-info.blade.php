 <div class="row">
                               <div class ="col-md-2">
                                  Name :
                               </div>
                               <div class="col-md-10">
                                   {{$account['firstname']}} {{$account['middleName']}} {{$account['lastName']}}
                                   
                                    @if($account['active'] == 1)
                                     <label class="label label-mini label-success"> Activated  </label>
                                    @else
                                     <label class="label label-mini label-danger"> Needs activation.  </label>
                                    @endif
                                 
                               </div>
                                <div class ="col-md-2">
                                  Account ID:
                               </div>
                               <div class="col-md-10">
                                  {{$account['id']}}
                               </div>
                                 <div class ="col-md-2">
                                  Email:
                               </div>
                               <div class="col-md-10">
                                  {{$account['email']}}
                               </div>
                                 <div class ="col-md-2">
                                  Contact #:
                               </div>
                               <div class="col-md-10">
                                  {{$account['contactnumber']}}
                               </div>
                                <div class ="col-md-2">
                                  User Group:
                               </div>
                               <div class="col-md-10">
                                  {{$account['usergroupid']}}
                               </div>
                                <div class ="col-md-2">
                                  Created at:
                               </div>
                               <div class="col-md-10">
                                  {{$account['created_at']}}
                               </div>
                            </div>
                            @