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
		font-size: 75%;

	}
	</style>
</head>
<body>
		<h2>Reservation Report</h2>
		<?php
		$s0 =0;
		$s1 = 0;
		$s2 =0;
		$s3 =0;
		$s4 =0;
		$s5 = 0;
		$s6 = 0;
		foreach ($booking as $book ) {
	    		switch ($book['active']) {
	    			case 0:
	    				$s0++;
	    				break;
	    			case 1:
	    				$s1++;
	    			break;
	    			case 2:
	    				$s2++;
	    			break;
	    			case 3:
	    				$s3++;
	    			break;
	    			case 4:
	    				$s4++;
	    			break;
	    			case 5:
	    				$s5++;
	    			break;
	    			case 6:
	    				$s6++;
	    			break;
	    		}
	    	}
	    ?>
		<table border='0' width="100%" style="">
				<tr><td>Awaiting Payment: <?php echo $s0;?></td></tr>
				<tr><td>Awaiting Payment Confirmation: <?php echo $s1;?></td></tr>
				<tr><td>Confirmed(Fully Paid/Downpayment Paid): <?php echo $s2;?></td></tr>
				<tr><td>Checked-in: <?php echo $s3;?></td></tr>
				<tr><td>Checked-out/Past Reservation: <?php echo $s4;?></td></tr>
				<tr><td>Expired: <?php echo $s5;?></td></tr>
				<tr><td>Rejected/Cancelled: <?php echo $s6;?></td></tr>
				<tr><td>Total: <?php echo count($booking);?></td></tr>
		</table>
	<hr>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr> 
				<th colspan="7">Reservation Details [<?php if(isset($date))echo $date;?>]</th>
			</tr>
			<tr>
				<th>Booking ID</th>
				<th>Booking Reference Id</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>Date/Time</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($booking as $book ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$book['bookingid'].'</td>';
	    		echo '<td>'.$book['bookingreferenceid'].'</td>';
	    		echo '<td>'.$book->account()->first()['firstname']." ".$book->account()->first()['lastName'].'</td>';
	    		echo '<td>'.$book['bookingstart'].'</td>';
	    		echo '<td>'.$book['bookingend'].'</td>';
	    		echo '<td>';
	    		switch ($book['active']) {
	    			case 0:
	    				echo 'Awaiting Payment';
	    				break;
	    			case 1:
	    				echo 'Awaiting Payment Confirmation';
	    			break;
	    			case 2:
	    				echo 'Payment Confirmed';
	    			break;
	    			case 3:
	    				echo 'Checked-in';
	    			break;
	    			case 4:
	    				echo 'Checked-out/Past';
	    			break;
	    			case 5:
	    				echo 'Expired';
	    			break;
	    			case 6:
	    				echo 'Rejected';
	    			break;
	    		}
	    		echo '</td>';
	    		echo '<td>'.$book['created_at'].'</td>';
	    		//created_at
	    		/*echo '<td>'.$account['title'].'</td>';
	    		echo '<td>'.$account['lastName'].', '.$account['firstname'].' '.$account['middleName'].'</td>';
	    		echo '<td>'.$account['email'].'</td>';
	    		echo '<td>'.$account['contactnumber'].'</td>';
	    		echo '<td>'.$account['usergroupid'].'</td>';
	    		echo '<td>'.$account['active'].'</td>';*/
	    		echo "</tr>";
	    		//$TotalQty += $book->quantity;
	    	}
    ?>
	</table>
	<br/>
	<table width="100%" border=0> 
		<tr>
			<td>Total Quantity:</td>
			<td><?php echo count($booking);?>		
			</td>
		</tr>
	</table>
	<hr>	

<?php foreach($groups as $b){ ?>
<div style="page-break-before: always;"></div>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr> 

				<th colspan="7">Reservation Details [<?php if(isset($b[0]))switch ($b[0]['active']) {
	    			case 0:
	    				echo 'Awaiting Payment';
	    				break;
	    			case 1:
	    				echo 'Awaiting Payment Confirmation';
	    			break;
	    			case 2:
	    				echo 'Payment Confirmed';
	    			break;
	    			case 3:
	    				echo 'Checked-in';
	    			break;
	    			case 4:
	    				echo 'Checked-out/Past';
	    			break;
	    			case 5:
	    				echo 'Expired';
	    			break;
	    			case 6:
	    				echo 'Rejected';
	    			break;
	    		}?>]</th>
			</tr>
			<tr>
				<th>Booking ID</th>
				<th>Booking Reference Id</th>
				<th>Name</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Status</th>
				<th>Date/Time</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($b as $book ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$book['bookingid'].'</td>';
	    		echo '<td>'.$book['bookingreferenceid'].'</td>';
	    		echo '<td>'.$book->account()->first()['firstname']." ".$book->account()->first()['lastName'].'</td>';
	    		echo '<td>'.$book['bookingstart'].'</td>';
	    		echo '<td>'.$book['bookingend'].'</td>';
	    		echo '<td>';
	    		switch ($book['active']) {
	    			case 0:
	    				echo 'Awaiting Payment';
	    				break;
	    			case 1:
	    				echo 'Awaiting Payment Confirmation';
	    			break;
	    			case 2:
	    				echo 'Payment Confirmed';
	    			break;
	    			case 3:
	    				echo 'Checked-in';
	    			break;
	    			case 4:
	    				echo 'Checked-out/Past';
	    			break;
	    			case 5:
	    				echo 'Expired';
	    			break;
	    			case 6:
	    				echo 'Rejected';
	    			break;
	    		}
	    		echo '</td>';
	    		echo '<td>'.$book['created_at'].'</td>';
	    		//created_at
	    		/*echo '<td>'.$account['title'].'</td>';
	    		echo '<td>'.$account['lastName'].', '.$account['firstname'].' '.$account['middleName'].'</td>';
	    		echo '<td>'.$account['email'].'</td>';
	    		echo '<td>'.$account['contactnumber'].'</td>';
	    		echo '<td>'.$account['usergroupid'].'</td>';
	    		echo '<td>'.$account['active'].'</td>';*/
	    		echo "</tr>";
	    		//$TotalQty += $book->quantity;
	    	}
    ?>
	</table>
	Total <?php if(isset($b[0]))switch ($b[0]['active']) {
	    			case 0:
	    				echo 'Awaiting Payment';
	    				break;
	    			case 1:
	    				echo 'Awaiting Payment Confirmation';
	    			break;
	    			case 2:
	    				echo 'Payment Confirmed';
	    			break;
	    			case 3:
	    				echo 'Checked-in';
	    			break;
	    			case 4:
	    				echo 'Checked-out/Past';
	    			break;
	    			case 5:
	    				echo 'Expired';
	    			break;
	    			case 6:
	    				echo 'Rejected';
	    			break;
	    		}?> Reservations: <?= count($b) ?>
	
	<?php }?>

   
</body>
</html>