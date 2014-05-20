<html>
<body>
<img src="img/car.png" />
<h2 align="center">Your Vehicle Order Update</h2>
<p>Ref: <?php echo $fleetid; ?></p>
<p>Customer: <?php echo $driverid; ?></p>
<p><?php echo $make $model $spec ?></p>
<p>Dear Mr <?php echo $surname; ?></p>
<br>Your vehicle has been ordered with the following dealership
<p><?php echo $dealer; ?></p>
<p><?php echo $address1; ?></p>
<p><?php echo $city; ?></p>
<p><?php echo $postcode; ?></p>
<p><?php echo $dealerContact; ?></p>
<p><?php echo $dealerPhone; ?></p>
<p>The current lead time for your vehicle is 14 weeks. Once the order has been accepted by the manufacturer to be built, you will receive an estimated delivery date and will be kept up to date with any changes to this date as the build progresses.</p>
<p>Your dealer will contact you shortly to conduct a specification check. If in the meantime you have any queries regarding your vehicle order please contact Customer Services on 0870 444 1000 using your customer ID:
<?php echo $driverid; ?></p>
<p>Kind Regards</p>
<p>Vehicle Order Team</p>
<p>GE Capital</p>
</body>
</html>