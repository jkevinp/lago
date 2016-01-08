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
		<p align="right">

				<br>Tel: 696-4316<br/>Mobile: 0927-500-5257	
		</p>
		<h2>Sunrock Resort Sales Report</h2>
		
		<table border='0' width="100%">
			<tr>
				<td>Total Income: <?php echo $sum;?></td>
				<td>Total vat: <?php echo number_format(($sum * 0.12),2);?></td>
				<td>Total Income w/vat: <?php echo number_format($sum + ($sum * 0.12),2)?></td>
			</tr>
		</table>
	<hr>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr> 
				<th colspan="7">Sale Details [<?php if(isset($date))echo $date;?>]</th>
			</tr>
			<tr>
				<th>Sales ID</th>
				<th>Sales Type</th>
				<th>Product Id</th>
				<th>Quantity</th>
				<th>Price</th>
				<th>Total Price</th>
				<th>Date/Time</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($sales as $sale ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$sale['id'].'</td>';
	    		echo '<td>'.$sale['type'].'</td>';

	    		echo '<td>'.$sale['productid'].'</td>';
	    		echo '<td>'.$sale['productquantity'].'</td>';
	    		echo '<td>'.$sale['productprice'].'</td>';
	    		echo '<td>'.$sale['totalprice'].'</td>';
	    		echo '<td>'.$sale['created_at'].'</td>';
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
			<td><?php echo count($sales);?>		
			</td>
		</tr>
	</table>
	<hr>	

   
</body>
</html>