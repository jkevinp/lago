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
	
		
	<hr>
	<table class="" border='1' width='100%'>
		<thead>
			<tr> 
				<th colspan="7">Sale Details</th>
			</tr>
			<tr>
				<th>Date</th>
				<th>Guest Name</th>
				<th>Product Name</th>
				<th>Total Balance</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($sales as $sale ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$sale['created_at'].'</td>';
	    		echo '<td>'.$sale['type'].'</td>';

	    		echo '<td>'.$sale->product->productname.'</td>';
	    		echo '<td>'.$sale['productquantity'].'</td>';
	    		echo '<td>'.$sale['productprice'].'</td>';
	    		echo '<td>'.$sale['totalprice'].'</td>';
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
			<td>Total INCOME: Php</td>
			<td><?php echo number_format($sum,2);?>	</td>
		</tr>
	</table>
	<hr>	

   
</body>
</html>