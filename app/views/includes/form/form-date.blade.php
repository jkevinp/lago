<div class="col-md-10 col-md-offset-1 text-center">
	<form class="form-horizontal" action="{{URL::route('book.SetInfo')}}" method="post" >
	    <legend>Booking Information</legend>
             <div class="alert alert-info">
                  Minimum of 3 Guest per reservation.
                 
             </div>
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
                
       <br/>
      <button type="submit" class="btn btn-lg btn-success" id="btn_submit_date">Book now!</button>
	</form>
</div>