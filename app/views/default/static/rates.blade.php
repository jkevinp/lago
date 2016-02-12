@extends('layout.template')

@section('image' ,'-Rates')

@section("header")
<style type="text/css">
	p{
		margin: 5px;
	}
</style>
@stop

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-6" style="padding:10px !important;">
				<table width="100%" cellspacing= "5" border="0" class="content table table-hover" style="margin:5px !important;">
			<tr>
				<td style="text-align:"><p>Entrance Fees:</p></td>
				<td style="text-align:"><p>Day:<br>8am-5pm</p></td>	
				<td style="text-align:"><p>Night:<br>7pm-4am</p></td>
				<td style="text-align:"width="30%"><p>Overnight:<br>8am-4am/7pm-5pm</p></td>
			</tr>
			<tr>
				<td style="text-align:"><p>Adults<br>*20% discount on senior citizens</p></td>
				<td style="text-align:"><p>Php 100.00</p></td>
				<td style="text-align:"><p>Php 150.00</p></td>
				<td style="text-align:"><p>Php 200.00</p></td>
			</tr>
			<tr>
				<td style="text-align:"><p>Children<br>*2 feet below are free</p></td>
				<td style="text-align:"><p>Php 100.00</p></td>
				<td style="text-align:"><p>Php 150.00</p></td>
				<td style="text-align:"><p>Php 200.00</p></td>
			</tr>
		</table>
		<table width="100%" class="table table-hover content" cellspacing= "5" border="0"  style="margin:5px !important;">
			
			@foreach($products as $type)
					<tr>
						<td colspan="4" style=";"><p><b>{{$type->producttypename}}</p></td>
					</tr>
					<tr>
				<td style="text-align:"><p><b>Product Name</p></td>
				<td style="text-align:"><p><b>Day Rate</p></td>
				<td style="text-align:"><p><b>Night Rate</p></td>
				<td style="text-align:"><p><b>Overnight Rate</p></td>
			</tr>

				@foreach($type->products as $p)
				<tr>
					<td style="text-align:"><p>{{$p->productname}}</p></td>
					<td style="text-align:"><p>{{$p->productprice}}</p></td>
					<td style="text-align:"><p>{{$p->nightproductprice}}</p></td>
					<td style="text-align:"><p>{{$p->overnightproductprice}}</p></td>
				</tr>
				@endforeach

			@endforeach
		</table>

				

			</div>
			<div class="col-md-6" style="padding:10px !important;">
				<table width="100%" cellspacing= "5" border="0" class="content table table-hover" style="margin:5px !important;">
					<tr>
						<td>
						<p style="text-align:center"><b>HOUSE RULES</b></p>
						<p style="text-align:justify">• Cooked foods, drinking water, softdrinks and juices are allowed. 
						We also have foods and drinks available at D' One Restaurant / Convenience Store.</p>
						<p style="text-align:justify">• We have grilling areas which are to be shared with other guest.</p>
						<p style="text-align:justify">•	Alcoholic drinks brought inside the resort will be subjected to a corkage fee of P100 for bottle of wine / liquor & P150 per case of beer.</p>
						<p style="text-align:justify">•	Any appliances (rice cooker, speaker, etc.) brought inside the resort will be subjected to electricity charge of P100.</p>
						<p style="text-align:justify">•	Breakables, flammables, pets, and deadly weapons are not allowed inside the resort.</p>
						<p style="text-align:justify">•	Eating, drinking and smoking in the pool area is strictly prohibited.</p>
						<p style="text-align:justify">•	Guest shall be responsible for any damages or losses of items at the resort.</p>
						<p style="text-align:justify">•	A responsible adult must accompany children / minors at all times.</p>
						<p style="text-align:justify">•	Main Gate CLOSE at 12 MN.</p>
						<p style="text-align:justify"><b>•	PAY AS YOU ENTER</b></p>
						<p style="text-align:justify;">• For 24 hours check-in: Complimentary use of swimming pool is included according to the number of occupants.</p>

<p style="text-align:justify;">• Extension per hour is P150 depends on the availability of the room.</p>

<p style="text-align:justify;">• Children below 12 years old sharing bed with parents are free-of-charge. Maximum of (2) Children.</p>

<p style="text-align:justify;">• In excess of allowed number of guest per room: additional P250 per head will be charged. This includes a complete bet set up. Maximum (10) Occupants in a room.</p>

<p style="text-align:justify;">• Cooking inside the room is strictly prohibited. We have food and drinks available at D' One Restaurant.</p>

<p style="text-align:justify;">• Guests are strictly prohibited of bringing in any hazardous objects, pets, and prohibited drugs inside the room.</p>

<p style="text-align:justify;">• Guests shall be responsible for any damages or losses of items in the rooms.</p>

						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@stop