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
<center> <img src="media/photos/logo-invoice.jpg" style="width:400px;height:100px;" /> </center>
		

		<center style="font-size:12px;">
<p>Maharlika Road, Brgy.</p>
<p>San Salvador, Baras, Rizal</p>
<p>0922 807 1360 | 0917 517 6510 | 0917 516 1226</p>

</center>
<center style="font-size:20px;"><b><i>RESERVATION REPORT</i></b></center>
<center><?= Carbon::now(); ?></center>
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
	<!-- 	<table border='0' width="100%" style="">
				<tr><td>Awaiting Payment: <?php echo $s0;?></td></tr>
				<tr><td>Awaiting Payment Confirmation: <?php echo $s1;?></td></tr>
				<tr><td>Confirmed(Fully Paid/Downpayment Paid): <?php echo $s2;?></td></tr>
				<tr><td>Checked-in: <?php echo $s3;?></td></tr>
				<tr><td>Checked-out/Past Reservation: <?php echo $s4;?></td></tr>
				<tr><td>Expired: <?php echo $s5;?></td></tr>
				<tr><td>Rejected/Cancelled: <?php echo $s6;?></td></tr>
				<tr><td>Total: <?php echo count($booking);?></td></tr>
		</table> -->
	<br>
	<table class="table table-bordered" width='100%'>
		<thead>
		
			<tr>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Guest Name</th>
				<th>Email Address</th>
				<th>Contact Number</th>
				<th>Reference Number</th>
				<th>Status</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($booking as $book ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$book['bookingstart'].'</td>';
	    		echo '<td>'.$book['bookingend'].'</td>';
	    		echo '<td>'.$book->account()->first()['firstname']." ".$book->account()->first()['lastName'].'</td>';
	    		echo '<td>'.$book->account()->first()['email'].'</td>';
	    		echo '<td>'.$book->account()->first()['contactnumber'].'</td>';
	    		if($book->transaction){
	    			echo '<td>'.$book->transaction->codeprovided.'</td>';
	    		}else{
	    			echo "<td>N/A</td>";
	    		}

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
	
<?php foreach($groups as $b){ ?>
<div style="page-break-before: always;"></div>
<center> <img src="media/photos/logo-invoice.jpg" style="width:400px;height:100px;" /> </center>
		

		<center style="font-size:12px;">
<p>Maharlika Road, Brgy.</p>
<p>San Salvador, Baras, Rizal</p>
<p>0922 807 1360 | 0917 517 6510 | 0917 516 1226</p>

</center>
<center style="font-size:20px;"><b><i>RESERVATION REPORT (<?php if(isset($b[0]))switch ($b[0]['active']) {
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
	    		}?>)</i></b></center>
<center><?= Carbon::now(); ?></center>

<br/>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr>
				<th>Start Date</th>
				<th>End Date</th>
				<th>Guest Name</th>
				<th>Email Address</th>
				<th>Contact Number</th>
				<th>Reference Number</th>
				<th>Status</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($b as $book ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$book['bookingstart'].'</td>';
	    		echo '<td>'.$book['bookingend'].'</td>';
	    		echo '<td>'.$book->account()->first()['firstname']." ".$book->account()->first()['lastName'].'</td>';
	    		echo '<td>'.$book->account()->first()['email'].'</td>';
	    		echo '<td>'.$book->account()->first()['contactnumber'].'</td>';
	    		if($book->transaction){
	    			echo '<td>'.$book->transaction->codeprovided.'</td>';
	    		}else{
	    			echo "<td>N/A</td>";
	    		}

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
	    	
	    		//created_at
	    		/*echo '<td>'.$account['title'].'</td>';
	    		echo '<td>'.$account['lastName'].', '.$account['firstname'].' '.$account['middleName'].'</td>';
	    		echo '<td>'.$account['email'].'</td>';
	    		echo '<td>'.$account['contactnumber'].'</td>';
	    		echo '<td>'.$account['usergroupid'].'</td>';
	    		echo '<td>'.$account['active'].'</td>';*/
	    		echo "</tr>";
	    	}
    ?>
	</table>
	
	<?php }?>

   
</body>
</html>