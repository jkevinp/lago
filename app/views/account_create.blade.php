@extends('layout.template');

@section('content');

<a name="booknow" id="booknow">
    <div class="content-section-a">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-12 col-sm-12 text-center">
					<form class="form-horizontal" method="post" action="/account/register">
					    <legend>Book Now and enjoy the summer heat!</legend>
                        <div class="control-group">
                            <div class="controls">
                            	<input type="text" class="padded-text" name="username" placeholder="Username" width="300px">
                            </div>
                        </div>
                          <div class="control-group">
                            <div class="controls">
					           <input type="password" class="padded-text" name="password" placeholder="Password">
                            </div>
                        </div>
                       

					    <span class="help-block">Example block-level help text here.</span>
					    <label class="checkbox">
					      <input type="checkbox"> I agree to the terms and condition
					    </label>
					    <button type="submit" class="btn">Submit</button>
					  
					</form>
				</div>
			</div>
		</div>
    </div>