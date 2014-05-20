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
    <script>
    $(document).ready(
            function() {
                
            });
	</script>
	<!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
    <![endif]-->
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
              <span class="user-name"></span>
              <i class="icon-ico_chevron_down_lg"></i>
            </button>
            <ul class="dropdown-menu pull-right">
              <li class="location"><a href="#"><h6>Sign Out</h6>
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
session_start();
echo "Welcome ".$_SESSION['forename'];
	include('config.php');
	//$order = $_GET["order"];
	$driver = $_SESSION["driverid"];
	$result = mysql_query("SELECT fleetid FROM orderdetails inner join driver ON orderdetails.driverid = driver.driverid WHERE driver.driverid = '".$driver."'");
	while($row=mysql_fetch_array($result)) {
		$order = $row[0];
	}
	//run query to join driver against orderdetails
	//use order details to get id and pass through to variable thus unaffecting anything else
	$orderResult = mysql_query("SELECT order_status FROM status WHERE fleetid='".$order."'");
	$status = array();
	while($row=mysql_fetch_array($orderResult, MYSQL_NUM)) {
		$status[]=$row[0];
	}
	$found = false;
?>
<h1>Track your car</h1>
<?php
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
				echo "<img src='img/checkmark.png' width='40%' />";
				$found = true;
			}
		}
		if($found=false)
		{
			echo "<img src='img/close.png' width='40%' />";
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
			echo "<img src='img/checkmark.png' width='40%' />";
			$found = true;
		}
	}
		if(!$found)
		{
			echo "<img src='img/close.png' width='40%' />";
		}
	?>
	</div>
</div>
<div class="status">
	<h3>Dealer Stock</h3>
	<div class="button">
	<?php
$found = false;
	foreach($status as $tmp) {
	if($found)
	{
		break;
	}
		if($tmp=='Dealer Stock')
		{
			echo "<img src='img/checkmark.png' width='40%' />";
			$found = true;
		}
	}
	if(!$found)
		{
			echo "<img src='img/close.png' width='40%' />";
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
			echo "<img src='img/checkmark.png' width='40%' />";
			$found = true;
		}
	}
		if(!$found)
		{
			echo "<img src='img/close.png' width='40%' />";
		}
	?>
	</div>

</div>
<div class="text">
	<p>For further details on your vechile's progress, please click on the images above</p>
</div>
</div>
</div>
</div>
</div>
</body>
</html>