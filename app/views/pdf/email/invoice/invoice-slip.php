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
<center> <img src="media/photos/logo-invoice.jpg" style="width:400px;height:100px;" /> </center>
		
     
<center style="font-size:12px;">
<p>Maharlika Road, Brgy.</p>
<p>San Salvador, Baras, Rizal</p>
<p>0922 807 1360 | 0917 517 6510 | 0917 516 1226</p>

</center>
<center style="font-size:20px;"><b><i>Invoice Slip</i></b></center>
<center><h4>Invoice No: <?= str_pad($transactionid, 4, "0" , STR_PAD_LEFT) ?></h4></center>
<center><?= Carbon::now(); ?></center>
	
	<?php if(isset($account)){ ?>
	<h4>Guest Name: <?= $account ?></h4><br/>
	<?php } ?>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr>
				<th>Date</th>
				<th>Product Name</th>
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
				echo '<td style="text-align:right;">'.$sale['created_at'].'</td>';
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
	<br/><br/><br/><br/>
	<table width="100%" border=0> 
	<!-- 	<tr>
			<td>Total Quantity:</td>
			<td class="r"><?php
		echo ''.$TotalQty.'';
	?></td> -->
	<!-- <tr>
			<td>Total Price:</td>
			<td class="r"><?php
		echo ''.number_format($TotalPrice,2).'';
	?></td>	
		</tr> -->
	<!-- 	<tr>
			<td>&nbsp;</td>
			<td class="r"><?php
		echo '<hr>';
	?></td>	 -->
		<tr>
			<td>&nbsp;</td>
			<td class="r">Total Bill: <u><?php
		echo ''.(number_format($TotalPrice,2) ).'';
	?></u></td>	
		</tr>
	</table>
</body>
</html>