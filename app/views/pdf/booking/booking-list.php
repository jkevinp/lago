<!DOCTYPE html>
<html>
<head>
    <title>Reservation Report</title>
     <link href="{{URL::asset('default')}}/css/bootstrap.css" rel="stylesheet">
     <link href="{{URL::asset('default')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <style type="text/css">
     *{
    		font-family:'Century Gothic', CenturyGothic, AppleGothic, sans-serif;
    		font-size: 11pt;
    		margin-top: 0;
    		margin-bottom: 0;
    	}
      table ,th{
    		 border-collapse: collapse;
    		 border: 2px solid #AAA;

    }
    .center{
    	 text-align: center;
    }

     td {
    	border-collapse: collapse;
    	border-left: 2px solid #AAA;
    	border-right: 2px solid #AAA;
    	padding-bottom: 1px;
    	padding-top: 1px;
    	font-size: 9pt !important;
	}
	</style>
</head>
<body>
<br/><br/>
<table width="100%" class="" border="0">
<tr>
	<td width="200px">
		<img src="media/photos/logo-invoice.jpg" style="width:100%;height:100px;" /> 
	</td>
	<td>
		<p style="font-size:16pt;"><b><i>RESERVATION REPORT</i></b></p>
		<p>Maharlika Road, Brgy.</p>
		<p>San Salvador, Baras, Rizal</p>
		<p><?= date_format(Carbon::now(),'F j,Y - g:ia') ?></p>
	</td>
</tr>
</table>


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
	<br>
	<table class="table table-bordered center" width='100%'>
		<thead>
		
			<tr>
				<th>Arrival Date</th>
				<th>Departure Date</th>
				<th>Booking ID</th>
				<th>Guest Name</th>
				<th>Contact Number</th>
				<th>Email Address</th>
				<th>Reference Number</th>
				<th>Status</th>
				<?php if(isset($additional)){?>
					<?= isset($additional['paymenttype']) ? '<th>Reservation Type</th>' : '' ?>
					<?= isset($additional['modeofpayment']) ? '<th>Payment Mode</th>' : '' ?>
				<?php } ?>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($booking as $book ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$book['bookingstart'].'</td>';
	    		echo '<td>'.$book['bookingend'].'</td>';
	    		echo '<td>'.$book['bookingid'].'</td>';
	    		echo '<td>'.$book->account()->first()['firstname']." ".$book->account()->first()['lastName'].'</td>';
	    		echo '<td>'.$book->account()->first()['contactnumber'].'</td>';
	    		echo '<td>'.$book->account()->first()['email'].'</td>';
	    		
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

	    		if(isset($additional)){
					echo isset($additional['paymenttype']) ? '<td>'.ucfirst($book['bookingtype']).'</td>' : '';
					echo isset($additional['modeofpayment']) ? '<td>'.ucfirst($book['paymenttype']).'</td>' : '';
	    		}
				
	    	
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
	<br/><br/><br/>
	<table width="100%" border="0">
		<tr>
			<td style="font-size:12pt;">Prepared By : Alma Cordero</td>
		</tr>
		<tr>
			<td style="font-size:12pt;">Approved By: Donata Santos</td>
		</tr>
	</table>
	
<?php foreach($groups as $b){ ?>
<div style="page-break-before: always;"></div>
<br/><br/>
<table width="100%" border="0">
<tr>
	<td width="200px">
		<img src="media/photos/logo-invoice.jpg" style="width:100%;height:100px;" /> 
	</td>
	<td>
		<p style="font-size:16pt;"><b><i>RESERVATION REPORT</i></b></p>
		<p>Maharlika Road, Brgy.</p>
		<p>San Salvador, Baras, Rizal</p>
		<p><?= date_format(Carbon::now(),'F j,Y - g:ia') ?></p>
	</td>
</tr>
</table>


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
	<br>
	<table class="table table-bordered center" width='100%'>
		<thead>
		
			<tr>
				<th>Arrival Date</th>
				<th>Departure Date</th>
				<th>Booking ID</th>
				<th>Guest Name</th>
				<th>Contact Number</th>
				<th>Email Address</th>
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
	    		echo '<td>'.$book['bookingid'].'</td>';
	    		echo '<td>'.$book->account()->first()['firstname']." ".$book->account()->first()['lastName'].'</td>';
	    		echo '<td>'.$book->account()->first()['contactnumber'].'</td>';
	    		echo '<td>'.$book->account()->first()['email'].'</td>';
	    		
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
	<br/><br/><br/>
	<table width="100%" border="0">
		<tr>
			<td style="font-size:12pt;">Prepared By : Alma Cordero</td>
		</tr>
		<tr>
			<td style="font-size:12pt;">Approved By: Donata Santos</td>
		</tr>
	</table>



<?php }?>

   
</body>
</html>