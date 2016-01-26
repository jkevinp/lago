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
		<h2>Account List</h2>
		
		<table border='0' width="100%">
			<tr>
				<td></td>
				<td></td>
			</tr>
		</table>
	<hr>
	<table class="table table-bordered" width='100%'>
		<thead>
			<tr> 
				<th colspan="7">Account Details [<?php if(isset($date))echo $date;?>]</th>
			</tr>
			<tr>
				
				<th>Account ID</th>
				<th>Title</th>
				<th>Name</th>
				<th>Email</th>
				<th>Contact Number</th>
				<th>Usergroup</th>
				<th>Active</th>
			</tr>
		</thead>
		<?php 
		$TotalQty= 0;
			foreach ($accounts as $account ) 
	    	{
	    		echo '<tr>';
	    		echo '<td>'.$account['id'].'</td>';
	    		echo '<td>'.$account['title'].'</td>';
	    		echo '<td>'.$account['lastName'].', '.$account['firstname'].' '.$account['middleName'].'</td>';
	    		echo '<td>'.$account['email'].'</td>';
	    		echo '<td>'.$account['contactnumber'].'</td>';
	    		echo '<td>'.$account['usergroupid'].'</td>';
	    		echo '<td>'.$account['active'].'</td>';
	    		echo "</tr>";
	    		//$TotalQty += $book->quantity;
	    	}
    ?>
	</table>
	<br/>
	<table width="100%" border=0> 
		<tr>
			<td>Total Quantity:</td>
			<td><?php echo count($accounts);?>		
			</td>
		</tr>
	</table>
	<hr>	

   
</body>
</html>