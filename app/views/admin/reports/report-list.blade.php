@extends('layout.admin-dashboard')

@section('content')
	<div class="row mt">

		<div class="col-md-4">
	
				<div class="form-panel">
                  	  <h4 class="mb"><i class="fa fa-angle-right"></i>Make Reports</h4>
                    {{Form::open(['class' => 'form-horizontal style-form' ,'route' => 'report.generate' , 'method' => 'post'])}}
                    <label>Model:</label>
					{{Form::select('model' , [
												'account' => 'Account',
												'sale' => 'Sales',
												'booking' => 'Reservations',

											], '', ['class' => 'form-control'])}}
					<label>Start date</label>
					<input type="date" class="form-control" id="date_start" name="datestart" placeholder="Enter Start Date">
					<label>End date</label>
					<input type="date" class="form-control" id="date_end" name="dateend" placeholder="Enter Start Date">
					<label>Sort:</label>
					{{Form::select('sort' , [
												'ascending' => 'ascending',
												'descending' => 'descending'

											], '', ['class' => 'form-control'])}}
					<label>Action:</label>
					{{Form::select('action' , [
												'stream' => 'stream',
												'download' => 'download'

											], '', ['class' => 'form-control'])}}
					<hr>
					{{Form::submit('Generate' , ['class' => 'btn btn-theme03'])}}
					{{Form::reset('Reset' , ['class' => 'btn btn-danger'])}}
					{{Form::close()}}
				</div>
		</div>
		<div class="col-md-8">
			<div class="content-panel"><h4>Reports List</h4>
				
					<table class="table table-hover table-bordered">
					<thead>
						<tr>
							<th>Model/Record</th>
							<th>Stream</th>
							<th>Download/Print</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Accounts</td>
							<td><a href="{{URL::action('pdf.stream' , ['action' => 'account' ,'param' => 'all'])}}" class="btn btn-primary btn-xs">
							  	<i class="fa fa-info-circle"></i> View
							  </a></td>
							<td>
								<a href="{{URL::action('pdf.stream' , ['action' => 'account' ,'param' => 'all'])}}" class="btn btn-primary btn-xs">
							  	<i class="fa fa-download"></i> Download
							  </a>
							</td>
						</tr>
						<tr>
							<td>Sales</td>
							<td><a href="{{URL::action('pdf.stream' , ['action' => 'sales' ,'param' => 'all'])}}" class="btn btn-primary btn-xs">
							  	<i class="fa fa-info-circle"></i> View
							  </a></td>
							<td>
								<a href="{{URL::action('pdf.stream' , ['action' => 'sales' ,'param' => 'all'])}}" class="btn btn-primary btn-xs">
							  	<i class="fa fa-download"></i> Download
							  </a>
							</td>
						</tr>
						<tr>
							<td>Reservation</td>
							<td><a href="{{URL::action('pdf.stream' , ['action' => 'booking' ,'param' => 'all'])}}" class="btn btn-primary btn-xs">
							  	<i class="fa fa-info-circle"></i> View
							  </a></td>
							<td>
								<a href="{{URL::action('pdf.stream' , ['action' => 'booking' ,'param' => 'all'])}}" class="btn btn-primary btn-xs">
							  	<i class="fa fa-download"></i> Download
							  </a>
							</td>
						</tr>
					</tbody>
					</table>
			</div>
		</div>
	</div>	
@stop
@section('script')
	<link rel="stylesheet" href="{{URL::asset('default')}}/css/morris.css">
    <script type="text/javascript" src="{{URL::asset('default')}}/js/raphael.js"></script>
	<script type="text/javascript" src="{{URL::asset('default')}}/js/morris.min.js" ></script>
	<script type="text/javascript" src="{{URL::asset('default')}}/ajax/charts.js"></script>
@stop