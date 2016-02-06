<!DOCTYPE html>
<html>
<head>
    <title>Booking Information</title>
     <link href="{{URL::asset('default')}}/css/bootstrap.css" rel="stylesheet">
     <link href="{{URL::asset('default')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
     <style type="text/css">
     table, th, td 
     {
    	
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
<center style="font-size:20px;"><b><i>Sales Report</i></b></center>
<center><?= Carbon::now(); ?></center>
	
		
	<br/><br/>
	<table class="" border='1' width='100%'>
		<thead>
			<tr>
				<th>Date</th>
				<th>Guest Name</th>
				<th>Product Name</th>
				<th>Total Balance</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<?php 
		$halfincome= 0;
			foreach ($saleshalf as $sale ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$sale['created_at'].'</td>';
	    		echo '<td>';
	    		if($sale->transaction->account)
	    			echo $sale->transaction->account->fullname();
	    		else echo "N/A";
	    		
	    		echo '</td>';

	    		echo '<td>'.$sale->product->productname.'</td>';
	    		echo '<td>'.$sale['totalprice'].'</td>';
	    		echo '<td>'.(number_format($sale['totalprice'] * 2,2)).'</td>';
	    		//created_at
	    		/*echo '<td>'.$account['title'].'</td>';
	    		echo '<td>'.$account['lastName'].', '.$account['firstname'].' '.$account['middleName'].'</td>';
	    		echo '<td>'.$account['email'].'</td>';
	    		echo '<td>'.$account['contactnumber'].'</td>';
	    		echo '<td>'.$account['usergroupid'].'</td>';
	    		echo '<td>'.$account['active'].'</td>';*/
	    		echo "</tr>";
	    		$halfincome += $sale['totalprice'];
	    	}
    ?>
	</table>
	<br/>

			<h2>Total INCOME: Php <?php echo number_format($halfincome,2);?></h2>
			<br/>
	<table width="100%" border="0">
		<tr>
			<td style="font-size:12px;">Prepared By</td>
			<td style="font-size:12px;text-align:right;">Approved  By</td>
		</tr>
		<tr>
			<td style="font-size:12px;">___________________________</td>
			<td style="font-size:12px;text-align:right;">___________________________</td>
		</tr>
	</table>






<div style="page-break-before: always;"></div>

<center> <img src="media/photos/logo-invoice.jpg" style="width:400px;height:100px;" /> </center>
		
     
<center style="font-size:12px;">
<p>Maharlika Road, Brgy.</p>
<p>San Salvador, Baras, Rizal</p>
<p>0922 807 1360 | 0917 517 6510 | 0917 516 1226</p>

</center>
<center style="font-size:20px;"><b><i>Sales Report</i></b></center>
<center><?= Carbon::now(); ?></center>
	
		
	<br/><br/>
	<table class="" border='1' width='100%'>
		<thead>
			<tr>
				<th>Date</th>
				<th>Guest Name</th>
				<th>Product Name</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<?php 
		$halfincome= 0;
			foreach ($salesfull as $sale ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$sale['created_at'].'</td>';
	    		echo '<td>';
	    		if($sale->transaction->account)
	    			echo $sale->transaction->account->fullname();
	    		else echo "N/A";
	    		
	    		echo '</td>';

	    		echo '<td>'.$sale->product->productname.'</td>';
	    		echo '<td>'.(number_format($sale['totalprice'] * 2,2)).'</td>';
	    		//created_at
	    		/*echo '<td>'.$account['title'].'</td>';
	    		echo '<td>'.$account['lastName'].', '.$account['firstname'].' '.$account['middleName'].'</td>';
	    		echo '<td>'.$account['email'].'</td>';
	    		echo '<td>'.$account['contactnumber'].'</td>';
	    		echo '<td>'.$account['usergroupid'].'</td>';
	    		echo '<td>'.$account['active'].'</td>';*/
	    		echo "</tr>";
	    		$halfincome += $sale['totalprice'];
	    	}
    ?>
	</table>
	<br/>

			<h2>Total INCOME: Php <?php echo number_format($halfincome,2);?></h2>
			<br/>
	<table width="100%" border="0">
		<tr>
			<td style="font-size:12px;">Prepared By</td>
			<td style="font-size:12px;text-align:right;">Approved  By</td>
		</tr>
		<tr>
			<td style="font-size:12px;">___________________________</td>
			<td style="font-size:12px;text-align:right;">___________________________</td>
		</tr>
	</table>
   
</body>
</html>