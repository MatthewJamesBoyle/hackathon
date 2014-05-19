<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
	include('config.php');
	$order = $_GET["order"];
	$result = mysql_query("SELECT order_status FROM status WHERE fleetid='".$order."'");
	$status = array();
	while ($row=mysql_fetch_array($result, MYSQL_NUM)) {
		$status[]=$row[0];
	}
	$found = false;
	var_dump($status);
?>
<h1>Track your car</h1>
<p>Please see below for the current status of the car order</p>
<div class="status">
	<h3>Dealer Order</h3>
	<div class="button">
		<?php
		foreach($status as $tmp) {
		if($found)
		{
			break;
		}
			if($tmp == 'Dealer Order')
			{
				echo "Hi";
				$found = true;
				
			}
			else
			{
				echo "no order";
			}
		}
		?>
	</div>
</div>
<div class="status">
	<h3>Factory Order</h3>
	<div class="button">
	<?php
	$found = false;
	foreach($status as $tmp) {
	if($found)
	{
		break;
	}
		if($tmp=='Factory Order')
		{
			echo "Other text";
			$found = true;
		}
	}
	?>
	</div>
</div>
<div class="status">
	<h3>Dealer Stock</h3>
	<div class="button">
	<?php
	if($status=='Dealer Stock')
	{
		echo "Hello";
	}
	else
	{
		echo "no";
	}
	?>
	</div>
</div>
<div class="status">
	<h3>Delivery Confirmed</h3>
	<div class="button">
	<?php
	if($status=='Delivery Confirmed')
	{
		echo "Yep, delivery here";
	}
	else
	{
		echo "nope, still nothing";
	}
	?>
	</div>
</div>
</body>
</html>