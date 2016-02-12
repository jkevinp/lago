<div class="col-md-10 col-md-offset-1 text-center">
	<form class="form-horizontal" action="{{URL::route('book.SetInfo')}}" method="post" >
	    <legend>Reservation Form</legend>
                <div class="control-group">
                    <div class="controls">
                    <input  type="text" id="email" name="email" value="{{Auth::user()->usergroupid == 2 ? Auth::user()->email : ''}}" class="padded-text form-control" placeholder="Your Email-Address">
                    </div>
                </div>
              <!--   <div class="control-group">
                    <div class="controls">
                      <select name="producttype" class="form-control padded-text">
                        @foreach(ProductType::whereNotBetween('id' , [3,4])->get() as $pt)
                             <option value="{{$pt->id}}">{{$pt->producttypename}}</option>
                        @endforeach
                      </select>
                    </div>
                </div> -->
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
                      <option value="8"  mode="day"        id='morning'>Day          [8:00am-5:00pm]</option>
                      <option value="19" mode="night"      id='evening'>Night        [7:00pm-4:00am]</option>
                      <option value="8"  mode="overnight1" id='overnight1'>Overnight [8:00am-4:00am]</option>
                      <option value="19" mode="overnight2" id='overnight2'>Overnight [7:00pm-5:00pm]</option>
                    </select>
                    <input type="hidden" name="modeofstay" readonly id="modeofstay"/>
                   
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
                  <input min="0" type="number" value="" style="height:30px" placeholder="Number of Children and Adults" class="form-control padded-text" name="children">
                  <input min="0" type="number" value="" style="height:30px" placeholder="Number of Senior Citizen" class="form-control padded-text" name="adult">
                
              <div class="alert alert-info">
	               <span class="help-block">Select the starting and ending date will be automatically generated for your reservation. Click "Find Available Rooms" to proceed to the next step.</span>
	                Children 2 feet and below are free. Don't add it to the Number of Children/Adults<br/>
                  Senior Citizen must present their Senior citizen ID<br/>
                  Minimum of 3 Guest per reservation.
                 
             </div>
      <button type="submit" class="btn btn-success" id="btn_submit_date">Find Available Rooms</button>
	</form>
</div>