<div class="col-md-10 col-md-offset-1 text-center">
	<form class="form-horizontal" action="{{URL::route('book.SetInfo')}}" method="post" >
	    <legend>Reservation Form</legend>
                  <div class="control-group">
                    <div class="controls">
                    <input  type="text" id="email" name="email" value= ""class="padded-text form-control" placeholder="Your Email-Address">
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                    @if(Session::get('date_info'))
                     <input autocomplete="off"  type="text" id="date_start" name="start" value= "{{Session::get('date_info')['start']}}" class="padded-text form-control" placeholder="Start Date">    
                    @else
                      <input autocomplete="off"  type="text"  id="date_start" name="start" class="padded-text form-control" placeholder="Start Date">    
                    @endif
                    </div>
                </div>
                <div class="btn-group btn-group-justified" role="group" id="custom" style="">
                    <select class="form-control padded-text" name="timeofday" id="timeofday">
                      <option value="0" selected disabled="true">Start</option>
                      <option value="06" id='morning'>6:00 AM</option>
                      <option value="18" id='evening'>6:00 PM</option>
                    </select>
                  
                      <select class="form-control padded-text" name="lenofstay" id="lenofstay" disabled>
                      <option value="0">Length of stay</option>
                      <?php
                        for($x = 1 ; $x <= 60; $x++)
                        {
                          echo '<option value="'.(($x*12) /24).'">'.($x * 12).' Hours</option>';
                        }
                      ?>
                    </select>
                </div>
                <div class="control-group">
                    <div class="controls">
                    @if(Session::get('date_info'))
                    <input  autocomplete="off" disabled type="text" value="{{Session::get('date_info')['end']}}" id="date_end" name="end" class="padded-text form-control" placeholder="End Date">
                    @else
                    <input  autocomplete="off"  disabled type="text" id="date_end" name="end" class="padded-text form-control" placeholder="End Date">
                    @endif
	                 </div>
                </div>
                  <input min="0" type="number" value="" style="height:30px" placeholder="Number of Adults" class="form-control padded-text" name="adult">
                  <input min="0" type="number" value="" style="height:30px" placeholder="Number of Children" class="form-control padded-text" name="children">
                    
                
              <div class="alert alert-info">
	               <span class="help-block">Select the starting and ending date will be automatically generated for your reservation. Click "Find Available Rooms" to proceed to the next step.</span>
	           </div>
      <button type="submit" class="btn btn-success" id="btn_submit_date">Find Available Rooms</button>
	</form>
</div>