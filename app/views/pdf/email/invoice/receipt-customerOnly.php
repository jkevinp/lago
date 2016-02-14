<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
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

     td {
    	border-collapse: collapse;
    	border-left: 2px solid #AAA;
    	border-right: 2px solid #AAA;
    	padding-bottom: 1px;
    	padding-top: 1px;

	}
	td.r{
		text-align: right;
	}
	</style>
</head>
<body>
	<center> <img src="media/photos/logo-invoice.jpg" style="width:200px;height:100px;margin-top:36px;" /> </center>
	<br/>
	<center>
	<p style="font-size:16pt !important;"><b><i>OFFICIAL RECEIPT</i></b></p>
	<br/>
	<p style="font-size:11pt;">Maharlika Road, Brgy.</p>
	<p>San Salvador, Baras, Rizal</p>
	<p>DONATA L. SANTOS – Prop.</p>
	<p>Tel No: (02) 653-2658</p>
	<p>Non-VAT Reg. TIN: 238-716-361-000</p>
	<p><?= Carbon::now(); ?></p>
	</center>
		<?php if(isset($account)){ ?>
		<br/>
		<h4>Customer's Name: <u><?= $account ?></u></h4><br/>
		<?php } ?>
		<table  width='100%'>
			<thead>
				<tr >
					<th>Qty</th>
					<th>Unit</th>
					<th>ARTICLES</th>
					<th>Unit Price</th>
				</tr>
			</thead>
			<?php 
			$TotalQty= 0;
			$TotalPrice = 0;
			echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
				foreach ($sales as $sale) {
					echo '<tr>';
					echo '<td style="text-align:center;">'.$sale['productquantity'].'</td>';
					echo '<td style="text-align:center;">'.$sale['productprice'].'</td>';
					echo '<td style="text-align:center;">'.$sale['productname'].'</td>';
					echo '<td style="text-align:center;">'.$sale['totalprice'].'</td>';	
					echo '</tr>';
					$TotalQty += $sale['productquantity'];	
					$TotalPrice += $sale['totalprice'];
				}
				echo '<tr><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>';
	    ?>
		</table>
		<br/><br/>
		<table width="100%" border=0> 
			<tr>
				<td>&nbsp;</td>
				<td class="r">Total Amount:<?php
			echo '<b>PHP '.(number_format($TotalPrice,2) ).'</b>';
		?></td>	
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class=""><b><i>Receipt No. (<?= str_pad($transactionid, 4, "0" , STR_PAD_LEFT) ?>)</i></b></td>	
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="r">________________________</td>	
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class="r">Authorized Representative</td>	
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td class=""><i style="color:gray;">CUSTOMER'S COPY</i></td>	
		</tr>
		</table>
</body>
</html>