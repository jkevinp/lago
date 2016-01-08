<!DOCTYPE html>
<html>
<head>
    <title>Booking Information</title>
     <link href="{{URL::asset('default')}}/css/bootstrap.css" rel="stylesheet">
     <link href="{{URL::asset('default')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <style type="text/css">
     table, th, td 
     {
    	border: 2px solid #AAA;
		padding: 2px;
	}
	</style>
</head>
<body>
		<p align="right">
				<?php echo $booking->created_at;?>	
				<br>Tel: 696-4316<br/>Mobile: 0927-500-5257	
		</p>
		<h2>Sunrock Resort Reservation Slip</h2>
		
		<table border='0' width="100%">
			<tr>
				<td>Name: <b> <?php echo $account->firstname.' '.$account->middleName .' '.$account->lastName  ;?></b></td>
				<td>Email: <b> <?php echo $account->email;?></b></td>
			</tr>
			<tr>
				<td> Account ID: <b> <?php echo $account->id ;?></b></td>
				<td> Booking ID: <b> <?php echo $booking->bookingid ;?></b></td>
			</tr>
			<tr>
				<td>Arrival Date: <b> <?php echo $booking->bookingstart ;?></b></td>
				<td>Departure Date: <b> <?php echo $booking->bookingend ;?></b></td>
			</tr>
			
			<tr>
				<td>Total Bill: <b> <?php echo $booking->fee ;?></b></td>
				<td>Downpayment: <b> <?php 
						if($booking->paymenttype == 'half')
							echo $booking->fee * 0.50 ;
						elseif ($booking->paymenttype == 'full')
							echo $booking->fee;
				?></b></td>
			</tr>
		</table>
	<hr>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr> 
				<th colspan="4">Booking Details</th>
			</tr>
			<tr>
				<th>Product/Service Name</th>
				<th>Quantity</th>
				<th>Session Start</th>
				<th>Session End</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($booking->bookingdetails as $book ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$book->productname.'</td>';
	    		echo '<td style="text-align: right;">'.$book->quantity.'</td>';
	    		echo '<td>'.$book->bookingstart.'</td>';
	    		echo '<td>'.$book->bookingend.'</td>';
	    		echo "</tr>";
	    		$TotalQty += $book->quantity;
	    	}
    ?>
	</table>
	<br/>
	<table width="100%" border=0> 
		<tr>
			<td>Total Quantity:</td>
			<td><?php
		echo ''.$TotalQty.'';
	?></td>
		</tr>
	</table>
	<hr>	
	<p>
		<br><br>
		<li>
			To Confirm this reservation, Please pay <b>Php <?php  
																if($booking->paymenttype == 'half')
																	echo $booking->fee * 0.50 ;
																else if ($booking->paymenttype == 'full')
																	echo $booking->fee;
															?></b> via bank deposit or paypal.
		</li>
		<li>
			For each electronics/gadgets you carry, you are required to pay Php 50 for the electric consumption.
		</li>
	
		<li>
			Our staff will take no responsibility for any lost belongings or gadget. We advise you to mind your belongings.
		</li>
		<li>
			Once you have paid the downpayment, you can no longer ask for a <b><u>REFUND</u></b>. You are only given One(1) chance to rebook the same product/room/cottage if available.
		</li>
		<li>
			If the product you want to rebook is not avaialable, you can choose any rooms which have lower price than your reserved room.
		</li>
		<li>
			For rebooking request, please call or text us assistance. 696-4316/0927-500-5257	
		</li>
		<li>
			Your reservation will expire if left unpaid, Any complaints will not be entertained.
		</li>
	</p>
   
</body>
</html>