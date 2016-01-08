@extends('layout.admin-dashboard')

@section('content')

	@if($table)
		@if($table == 'account')
			@include('admin.account.account-list')
		@elseif($table =='coupon')
			@include('admin.coupon.coupon-list')
		@elseif($table =='bookingcheckin' || $table == 'bookingcheckout')
			@include('admin.booking.booking-checkin-list')
		@else
			<div class="row mt">
				<div class="col-md-12">
					<div class="content-panel">
						<div class="panel-body">
							<span>No table found for the given result. </span>
						</div>
					</div>
				</div>
			</div>
		@endif
	@else
		<div class="row mt">
				<div class="col-md-12">
					<div class="content-panel">
						<div class="panel-body">
							<span>No table found for the given result. </span>
						</div>
					</div>
				</div>
			</div>
	@endif

@stop