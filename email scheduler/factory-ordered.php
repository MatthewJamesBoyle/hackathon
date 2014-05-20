<html>
<body>
<img src="img/car.png">
<h2 align="center">Your Vehicle Order Update</h2>
<p>Ref: <?php echo $fleetid; ?></p>
<p>Customer: <?php echo $driverid; ?></p>
<p><?php echo $make $model $spec ?></p>
<p>Dear Mr <?php echo $surname; ?></p>
<p>Your vehicle order has been allocated a slot at the production factory. The Estimated Delivery is currently: <?php echo current_delivery_dt; ?></p>
<p>This date may change as the build progresses, but we will keep you up to date with any changes.</p>
<p>You should now start to make any arrangements to have damage or defects to your existing vehicle repaired, to avoid any delays with taking delivery of your new vehicle when it is ready.</p>
<p>If you are unsure what you need to have repaired, please refer to your company car damage policy and take the appropriate action. If your return vehicle is not in a satisfactory condition this could delay the delivery of your next vehicle.</p>
<p>If you have any queries regarding your vehicle delivery please contact Customer Services on 0870 444 1000 using your Customer ID: <?php echo $driverid ?>, or speak to your dealer directly on 01619761111.</p>
<p>Kind Regards</p>
<p>Vehicle Order</p>
</body>
</html>