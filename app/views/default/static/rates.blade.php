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
     @include('includes.default.carousel')

    <div class="bg-white col-lg-8 col-lg-offset-2">
       <h2 class="text-center">Rates And Rules</h2>
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
						<p style="text-align:center">Resort Rules</p>
					<p style="text-align:justify"><i class="fa fa-check"></i>	A 50% down payment will be required from guest in order to secure their bookings. Guests are requested to place their down payment via bank deposit on or before a set option date to avoid cancellation of their reservation.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	In order to preserve orderliness in our booking schedules, please be informed that check-in time is 1:00PM and check-out time is 11:00AM. Please check out on time or kindly call on our resort manager should you wish to check-out late. This will avoid unnecessary charges for unauthorized late check-out.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	It is understandable that there are instances where resort properties are either lost or damaged by our guests, but much as we would like our guest not to incur additional expenses on such situation, due to high cost of maintenance, we are constrained to charge the cost of items lost or damaged by guest.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	For your convenience, one bath towel will be provided for each registered guest for each night of stay in our hotel or Casita. Charges will apply for additional towels that will be requested.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	The resort premises are generally safe. Our staff is advised to look after your belongings from time to time, whenever they have time. But though such is the case, we require that you lock your parked vehicle and room at all times, and ensure the safe keeping of your valuables. Management is not liable for any lost or damage to valuables and personal belongings not formally endorsed to us for safe keeping. You may call on our resort manager should you wish to have special security arrangements for your belongings.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	To serve your food and beverage requirements, our in-house restaurant, Coco Café, is open from 7:00AM to 10:00PM daily. It serves a wide variety of local and international cuisine and beverages at reasonable prices. For safety reasons and orderliness, we prohibit cooking meals and bringing food and beverages inside the resort. Corkage will be charged on the guest who brings in beverages and food cooking/consumptions. The resort is in semi forested area and ants and other insects attracted to food may pose inconvenience and hazard. Therefore, we prohibit eating inside the rooms, balconies, or casitas.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	Use of grill (primarily for cooking fish caught from the lagoon) is on first come, first served basis and is only allowed only at designated areas and. Bonfires are also allowed only at designated areas and should only be set up by authorized resort personnel. Kindly call on our Resort Manager for schedule use.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	Use of recreational facilities in the resort is on first come, first served basis. Kindly call on our Resort manager for schedule of use.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	For safety reasons and orderliness, eating and drinking within the swimming pool area are only allowed inside the picnic huts.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	For safety reasons and orderliness, setting-up of tents is only allowed within the fenced area of the casitas.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	Illegal drugs, weapons, and hazardous chemicals/materials are not allowed within the resort premises. Disrupting the peace at the resort is likewise prohibited.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	We try to keep our resort CLEAN. Please throw your trash including cigarette butts, in the designated trash bins. We also ask our guest to please conserve energy and water by turning off their sources when not in use.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	All fish that guests intend to cook, consume, or bring home should be weighed first at the restaurant and assessed on the guest. We also follow the “Catch and Release” protocol when handling certain species of fish in lagoon. Bringing home any of fish caught from the lagoon without the knowledge of, and permission from the Management is ILLEGAL and strictly PROHIBITED.
</p><p style="text-align:justify"><i class="fa fa-check"></i>	Guest are required to settle their dues and secure an Exit pass before leaving the resort premises.</p>


						</td>
					</tr>
					<tr>
					<td>

						<p style="text-align:center">Pet Rules</p>
										<p style="text-align:justify"><i class="fa fa-check"></i>	Beds are for human use, if you need to let your pets sleep beside you, kindly bring and use your top/bed sheet for this purpose.
						</p><p style="text-align:justify"><i class="fa fa-check"></i>	After your pets defecates and urinates, Bring out your clean up kit and Clean as you go.
						</p><p style="text-align:justify"><i class="fa fa-check"></i>	Coco café allows pets to be brought inside the restaurant, but pet should always be on leash and not allowed to freely roam around the restaurant.
						</p><p style="text-align:justify"><i class="fa fa-check"></i>	Always have your pet on leash whenever you take them for a walk.
						</p><p style="text-align:justify"><i class="fa fa-check"></i>	Always look after your pet. Lago will not be held responsible for the loss of/injury on your pet.
						</p><p style="text-align:justify"><i class="fa fa-check"></i>	All are enjoined to follow these simple rules for you and others to enjoy your pet friendly LAGO FISHING VILLAGE.	</p>

					</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
@stop