<html>
<head>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Where's My Car Tracker</title>
    <meta name="viewport" content="width=device-width">
	<meta http-equiv="refresh" content="10">
    <!-- For third-generation iPad with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../../components/brandkit/favicon/favicon-144px.png">

    <!-- For iPhone with high-resolution Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../../components/brandkit/favicon/favicon-114px.png">

    <!-- For first- and second-generation iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../../components/brandkit/favicon/favicon-72px.png">

    <!-- For non-Retina iPhone, iPod Touch, and Android 2.1+ devices: -->
    <link rel="apple-touch-icon-precomposed" href="../../components/brandkit/favicon/favicon.png">

    <link rel="icon" href="../../components/brandkit/favicon/favicon.ico">

    <!--<link href="./assets/css/documentation.css" rel="stylesheet" type="text/css">-->
    <link href="css/mds.css" rel="stylesheet" type="text/css">
    <link href="css/mds-ie-overflow.css" rel="stylesheet" type="text/css">
    <link href="css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/style.css" rel="stylesheet" type="text/css">
    <!--[if lt IE 9]>
      <link id="theme-ie" href="../css/ie.css" rel="stylesheet" type="text/css">
    <![endif]-->



    <script src="../../components/modernizr/modernizr.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script src="http://yui.yahooapis.com/3.16.0/build/yui/yui-min.js"></script>
    <script>
	$( document ).ready(function() {
		$("#dealerOrder").click(function() {
			alert("The dealer is processing your order with the manufacturer");
		});
	});
	$( document ).ready(function() {
		$("#factoryOrder").click(function() {
			alert("Your vehicle is being built to your specification");
		});
	});
	$( document ).ready(function() {
		$("#dealerStock").click(function() {
			alert("Your vehicle has arrived into Dealer Stock and is currently being Registered, Inspected and made ready for delivery. The dealer will contact you shortly to confirm a delivery date.");
		});
	});
	$( document ).ready(function() {
		$("#deliveryConfirmed").click(function() {
			alert("A delivery date has been agreed. Please ensure you have read and understood the T&C’s for the return of your current vehicle if applicable");
		});
	});
	</script>
	<!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
    <![endif]-->

  <style>
  .block{
    height:700px;
  }

  </style>
</head>

<body>
<header class="header">
<div class="navbar navbar-static-top">
  <!-- start new IIDS refactor -->
  <div class="navbar navbar-static-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="brand" href="#"><span class="ge-logo"></span> <span class="primary-brand">GE </span> <span class="secondary-brand">Fleet Tracker</span></a>
        <div class="toolbar-container pull-right">
          <div class ="btn-group">
            <button class="btn dropdown-toggle" data-toggle="dropdown">
              <i class="icon-ico_user_male_lg"></i>
              <span class="user-name"><?php session_start(); echo $_SESSION['driverid'];?></span>
              <i class="icon-ico_chevron_down_lg"></i>
            </button>
            <ul class="dropdown-menu pull-right">
              <li class="index"><a href="index.php"><h6>Sign Out</h6>
            </ul>
          </div>

          <a class="btn btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
            <i class="icon-ico_menu_lg"><span>Menu</span></i>
          </a>
        </div>
      </div>
    </div>
	</div>
</div>
</header>

<div class="container">
<div class="row">
<div class="span12">
<div class="block">
<?php
	include('config.php');
	//$order = $_GET["order"];
	$driver = $_SESSION["driverid"];
	$result = mysql_query("SELECT fleetid FROM orderdetails inner join driver ON orderdetails.driverid = driver.driverid WHERE driver.driverid = '".$driver."'");
	while($row=mysql_fetch_array($result)) {
		$order = $row[0];
	}
	$_SESSION["order"] = $order;
	//run query to join driver against orderdetails
	//use order details to get id and pass through to variable thus unaffecting anything else
	$orderResult = mysql_query("SELECT * FROM status WHERE fleetid='".$order."'");
	$status = array();
	while($row=mysql_fetch_array($orderResult, MYSQL_NUM)) {
		$status[]=$row[1];
	}
	$found = false;
  $dDate ="23/05/2014";
?>
<h1>Track your car</h1>
<?php
	echo "Welcome ".$_SESSION['forename'];
	$result =mysql_query("SELECT * FROM orderdetails WHERE fleetid='".$order."'");
	while ($row=mysql_fetch_array($result, MYSQL_NUM)) {
		$make = $row[10];
		$model = $row[11];
		$spec = $row[12];
	}
	echo "<p>Please see below for the current status of ".$make." ".$model." ".$spec."";
?>
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
				echo "<div id='dealerOrder'>";
				echo "<img src='img/tick.png' width='40%' />";
				echo "</div>";
				$found = true;
			}
		}
		if(!$found)
		{
			echo "<img src='img/fail.png' width='40%' />";
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
			echo "<div id='factoryOrder'>";
			echo "<img src='img/tick.png' width='40%' />";
			echo "</div>";
			$found = true;
		}
	}
		if(!$found)
		{
			echo "<img src='img/fail.png' width='40%' />";
		}
	?>
	</div>
</div>
<div class="status">
	<h3>Dealer Stock</h3>
	<div class="button">
	<?php
	$found = false;
	$dateResult = mysql_query("SELECT * FROM contractend WHERE fleetid='".$order."'");
	while($dateRow=mysql_fetch_array($dateResult))
	{
		$date = $dateRow['end_date'];
	}
	foreach($status as $tmp) {
	if($found)
	{
		break;
	}
		if($tmp=='Dealer Stock')
		{
			echo "<div id ='dealerStock'>";
			echo "<span class='image'><img src='img/tick.png' width='40%' /></span>";
			echo "</div>";
			$found = true;
      $dDate= "24/05/2014";

		}
	}
	if(!$found)
		{
			echo "<img src='img/fail.png' width='40%' />";
		}
	?>
	</div>
</div>
<div class="status">
	<h3>Delivery Confirmed</h3>
	<div class="button">
	<?php
$found = false;
	foreach($status as $tmp) {
	if($found)
	{
		break;
	}
		if($tmp=='Delivery Confirmed')
		{
			echo "<div id = 'deliveryConfirmed'>";
			echo "<img src='img/tick.png' width='40%' />";
			echo "</div>";
			$found = true;
      $dDate="26/05/2014";
		}
	}
		if(!$found)
		{
			echo "<img src='img/fail.png' width='40%' />";
		}
	?>
	</div>

</div>
<div class="text">
  <br/>
  <br/>

	<p><b>For further details on your vehicle's progress, please click on the tick above.</b></p>

  <div class= "delDate"> Your estimated delivery date is <?php echo $dDate ?> </div>
</div>
<!-- Add an additional blue button style -->

</div>
</div>
</div>

</div>


</body>
</html>
