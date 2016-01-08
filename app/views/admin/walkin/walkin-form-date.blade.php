
        <div class="row mt">
                  <div class="col-md-12">
                    <h3>> Add New Reservation </h3>
                      <div class="form-panel">
                        <div class="row">
                          <div class="col-md-10 col-md-offset-1">
                          <div class="alert alert-info">
                            <ul>
                              Please fill all required fields.
                            </ul>
                          </div>
                        </div>
                        </div>
                        <hr>
                        {{Form::open(['class' => 'form-horizontal style-form' ,'method' => 'post', 'route' => 'cpanel.cashier.SetInfo'])}}
                         {{Form::hidden('route', 'cpanel.show.product')}}
                         <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                     <input  tpye="text" id="email" name="email" value= ""class="form-control" placeholder="Client's Email-Address">
                              </div>
                         </div>
                        <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Start Date</label>
                              <div class="col-sm-10">
                                      @if(Session::get('date_info'))
                                     <input autocomplete="off"  type="text" id="date_start" name="start" value= "{{Session::get('date_info')['start']}}" class="form-control" placeholder="Start Date">    
                                    @else
                                      <input autocomplete="off"  type="text"  id="date_start" name="start" class="form-control" placeholder="Start Date">    
                                    @endif
                                    </div>
                          </div>
                         <div class="form-group" id="custom">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-5">
                                 <select class="form-control" name="timeofday" id="timeofday">
                                  <option value="0">Starting Session</option>
                                  <option value="06" id='morning'>6:00 AM</option>
                                  <option value="18" id='evening'>6:00 PM</option>
                                </select>
                              </div>
                              <div class="col-sm-5">
                                  <select class="form-control padded-text" name="lenofstay" id="lenofstay" disabled>
                                  <option value="0">Length of stay</option>
                                  <?php
                                    for($x = 1 ; $x <= 60; $x ++)
                                    {
                                      echo '<option value="'.(($x*12) /24).'">'.($x * 12).' Hours - '.(($x*12) /24).' days</option>';
                                    }
                                  ?>
                                </select>
                              </div>
                         </div>
                         <div class="form-group">
                             <label class="col-sm-2 col-sm-2 control-label">End Date</label>
                             <div class="col-sm-10">
                                @if(Session::get('date_info'))
                                <input  autocomplete="off" disabled type="text" value="{{Session::get('date_info')['end']}}" id="date_end"  class="form-control" name="end"  placeholder="End Date">
                                @else
                                <input  autocomplete="off"  disabled type="text" id="date_end" name="end" class="form-control" placeholder="End Date">
                                @endif
                              </div>
                         </div>
                         <div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label">Admission</label>
                              <div class="col-sm-5">
                                 <select class="form-control padded-text" name="adult">
                                  <option value="0">Number of Adult</option>
                                  <?php
                                    for($x = 1 ; $x <= 200; $x ++)
                                    {
                                      echo '<option value="'.$x.'">'.($x).'</option>'; 
                                    }
                                  ?>
                                </select>
                                </select>
                              </div>
                              <div class="col-sm-5">
                                 <select class="form-control padded-text" name="children">
                              <option value="0">Number of children</option>
                              <?php
                                for($x = 1 ; $x <= 200; $x ++)
                                {
                                  echo '<option value="'.$x.'">'.($x).'</option>';
                                }
                              ?>
                            </select>
                              </div>
                         </div>
                   
                        
                <div class="btn-group btn-group-justified" role=""> 
                  <div class="btn-group" role="group">
                    {{Form::submit('Create' ,['class' => 'btn btn-primary' , 'id' => 'btn_submit_date'])}} 
                  </div>    
                <div class="btn-group" role="group">
                  {{Form::reset('Reset' ,['class' => 'btn btn-default'])}} 
               </div>
                </div>  
                    {{Form::close()}}
                      </div><!-- /form-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

