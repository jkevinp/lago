<!DOCTYPE html>
<html>
<head>
    <title>Sales Report</title>
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

     td {
    	border-collapse: collapse;
    	border-left: 2px solid #AAA;
    	border-right: 2px solid #AAA;
    	padding-bottom: 1px;
    	padding-top: 1px;
    	font-size: 9pt !important;
	}
	.center{
		text-align: center;
	}
	</style>
</head>
<body>
<br/><br/>
<table width="100%" border="0">
<tr>
	<td width="200px">
		<img src="media/photos/logo-invoice.jpg" style="width:100%;height:100px;" /> 
	</td>
	<td>
		<p style="font-size:16pt;"><b><i>SALES REPORT</i></b></p>
		<p>Maharlika Road, Brgy.</p>
		<p>San Salvador, Baras, Rizal</p>
		<p><?= date_format(Carbon::now(),'F j,Y - g:ia') ?></p>
	</td>
</tr>
</table>

</center>

	
		
	<br/><br/>
	<table class="center" border='1' width='100%'>
		<thead>
			<tr>
				<th>Date</th>
				<th>Guest Name</th>
				<th>Product Name</th>
				<th>Total Balance</th>
				<th>Total Price</th>
				<?php if(isset($additional)){?>
					<?= isset($additional['paymenttype']) ? '<th>Reservation Type</th>' : '' ?>
					<?= isset($additional['modeofpayment']) ? '<th>Payment Mode</th>' : '' ?>
					<?= isset($additional['producttype']) ? '<th>Product Type</th>' : '' ?>
				<?php } ?>
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
	    		if(isset($additional)){
	    			echo '<td>';
					if(isset($additional['paymenttype'])){
						echo ucfirst($additional['paymenttype']);
					}
					echo '</td>';

					echo '<td>';
					if(isset($additional['modeofpayment'])){
						echo ucfirst($additional['modeofpayment']);
					}
					echo '</td>';

					echo '<td>';
					if(isset($additional['producttype'])){
						if($sale->product)
							echo $sale->product->producttype->producttypename;
					}
					echo '</td>';
					
				 } 
	    		echo "</tr>";
	    		$halfincome += $sale['totalprice'];
	    	}
    ?>
	</table>
	<br/>

			<h2 style="text-align:right;">Total INCOME: Php <?php echo number_format($halfincome,2);?></h2>
			<br/>
	<table width="100%" border="0">
		<tr>
			<td style="font-size:12pt;">Prepared By : Alma Cordero</td>
		</tr>
		<tr>
			<td style="font-size:12pt;">Approved By: Donata Santos</td>
		</tr>
	</table>




<?php if(isset($additional)){ return; } ?>

<div style="page-break-before: always;"></div>
<br/><br/>
<table width="100%" border="0">
<tr>
	<td width="200px">
		<img src="media/photos/logo-invoice.jpg" style="width:100%;height:100px;" /> 
	</td>
	<td>
		<p style="font-size:16pt;"><b><i>SALES REPORT</i></b></p>
		<p>Maharlika Road, Brgy.</p>
		<p>San Salvador, Baras, Rizal</p>
		<p><?= date_format(Carbon::now(),'F j,Y - g:ia') ?></p>
	</td>
</tr>
</table>
		
	<br/><br/>
	<table class="center" border='1' width='100%'>
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

			<h2 style="text-align:right;">Total INCOME: Php <?php echo number_format($halfincome,2);?></h2>
			<br/>
	<br/>
	<br/>
	<table width="100%" border="0">
		<tr>
			<td style="font-size:12pt;">Prepared By : Alma Cordero</td>
		</tr>
		<tr>
			<td style="font-size:12pt;">Approved By: Donata Santos</td>
		</tr>
	</table>
   
</body>
</html>