<!DOCTYPE html>
<html>
<head>
    <title>Booking Information</title>
    <style type="text/css">
    	*{
    		font-family: Arial;
    	}
     table, th, td 
     {
    	border: 2px solid #AAA;
		padding: 2px;
	}
	td.r{
		text-align: right;
	}
	</style>
</head>
<body>
		<center>
		<img src="media/photos/logo.jpg" style="width:400px;height:100px;" />

		</center>
		<p align="right">

				<?php echo date('Y-m-d h:i:s');?>	
		</p>
		<h2>Invoice Slip</h2>
		<h4>Name: <?= $account ?></h4>
	<hr>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr> 
				<th colspan="4">Reservation Details</th>
			</tr>
			<tr>
				<th>Product ID</th>
				<th>Quantity</th>
				<th>Price/unit</th>
				<th>Total Price</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
		$TotalPrice = 0;
			foreach ($sales as $sale) {
				echo '<tr>';
				echo '<td style="text-align:right;">'.$sale['productname'].'</td>';
				echo '<td style="text-align:right;">'.$sale['productquantity'].'</td>';
				echo '<td style="text-align:right;">'.$sale['productprice'].'</td>';
				echo '<td style="text-align:right;">'.$sale['totalprice'].'</td>';	
				echo '</tr>';
				$TotalQty += $sale['productquantity'];	
				$TotalPrice += $sale['totalprice'];
			}
    ?>
	</table>
	<br/>
	<table width="100%" border=0> 
		<tr>
			<td>Total Quantity:</td>
			<td class="r"><?php
		echo ''.$TotalQty.'';
	?></td>
	<tr>
			<td>Total Price:</td>
			<td class="r"><?php
		echo ''.number_format($TotalPrice,2).'';
	?></td>	
		</tr>
		<tr>
			<td>Vat(12%):</td>
			<td class="r"><?php
			$vat= $TotalPrice * 0.12;
		echo ''.(number_format($vat,2) ).'';
	?></td>	
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="r"><?php
		echo '<hr>';
	?></td>	
		<tr>
			<td>Total Bill:</td>
			<td class="r"><?php
		echo ''.(number_format($TotalPrice + $vat,2) ).'';
	?></td>	
		</tr>
	</table>
	<hr>	
</body>
</html>