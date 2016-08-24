<div class="col-md-10 col-md-offset-1 text-center">
	<form class="form-horizontal" action="{{URL::route('book.SetInfo')}}" method="post" >
	    <legend>Booking Information</legend>
                <div class="control-group">
                    <div class="controls">
                    <input  type="text" id="email" name="email" value="{{Auth::user()->usergroupid == 2 ? Auth::user()->email : ''}}" class="padded-text form-control" placeholder="Your Email-Address">
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
                      <option value="0"  selected disabled="true">Start</option>
                      <option value="7" mode="day" id='day'>Day[7AM-5PM]</option>
                      <option value="13" mode="night" id='night'>Night[1PM-11AM]</option>
                      <!-- <option value="19" mode="overnight2" id='overnight2'>Overnight [24 hours]</option> -->

                    </select>
                    <input type="hidden" name="modeofstay" readonly id="modeofstay"/>
                      <select class="form-control padded-text" name="lenofstay" id="lenofstay" disabled>
                      <option value="0">Length of stay</option>
                      <?php
                        for($x = 10 ; $x <= 60; $x+= 10)
                        {
                          echo '<option value="$x">'.($x).' Hours</option>';
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
                
       <br/>
      <button type="submit" class="btn btn-lg btn-success" id="btn_submit_date">Book now!</button>
	</form>
</div>