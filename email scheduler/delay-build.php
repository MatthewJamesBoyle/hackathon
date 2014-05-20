<html>
<body>
<img src="img/car.png">
<h2 align="center">Your Vehicle Order Update</h2>
<p>Ref: <?php echo $fleetid; ?></p>
<p>Customer: <?php echo $driverid; ?></p>
<p><?php echo $make $model $spec ?></p>
<p>Dear Mr <?php echo $surname; ?></p>
<p>The estimated delivery date of your vehicle has changed, please see details below.</p>
<p><b>Previous Estimated Delivery: <?php echo $previous_delivery_dt; ?></b></p>
<p><b>Current Estimated Delivery: <?php echo $current_delivery_dt; ?></b></p>
<p><b>Reason: <?php echo $reason; ?></b></p>
<?php echo $reason; ?>
If you have any queries regarding your vehicle delivery please contact Customer Services on 0870 444 1000 using your Customer ID: <?php echo $driverid ?>, or speak to your dealer directly on 01619761111.
<p>Kind regards, </p>
<p>Vehicle Order Team</p>
</body>
</html>