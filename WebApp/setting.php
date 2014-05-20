<html>
<head>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Notification Settings</title>
    <meta name="viewport" content="width=device-width">

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
	<link rel="stylesheet" type="text/css" href="css/style.css".

    <!--[if lt IE 9]>
      <link id="theme-ie" href="../css/ie.css" rel="stylesheet" type="text/css">
    <![endif]-->



    <script src="../../components/modernizr/modernizr.js"></script>
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
    <![endif]-->
	<?php
	include('config.php');
	session_start();
	$driver = $_SESSION["driverid"];
	$order = $_SESSION["order"];
	
	$result = mysql_query("SELECT * FROM notification WHERE fleetid='".$order."'");
	$row = mysql_fetch_array($result);
	?>
</head>
    <div class="navbar navbar-static-top">
	
      <div class="navbar-inner">
        <div class="container"> <a class="brand" href="#"><span class="ge-logo">General Electric</span> Car Tracker</a>
        </div>
      </div>
    </div>
<div class="container">
<div class="row">
<div class="span12">
<div class="block">
<?php
$orderResult = mysql_query("SELECT make, model, spec FROM orderdetails WHERE fleetid='".$order."'");
$orderRow = mysql_fetch_array($orderResult);
?>
<h1>Notification Setting</h1>
<p>Please use this section to change your notification settings for order id <?php echo $order ?></p>
<!--?php echo "<p>Make: $orderRow['make'] Model: $orderRow['model'] Spec; $orderRow['spec']</p>"; ?> -->
<form action="insert.php" method="post">
<table>
	<tr>
		<td></td>
		<td>Yes</td>
		<td>No</td>
	</tr>
	<tr class="pushOut">
		<td>Text</td>
		<td><input type="radio" value="Y" id="Y" name="text" <?php if($row['text']=='Y') { echo "checked"; }?> /></td>
		<td><input type="radio" value="N" id="N" name="text" <?php if($row['text']=='N') { echo "checked" ;}?> /></td>
	</tr>
	<tr class="pushOut">
		<td>Email</td>
		<td><input type="radio" value="Y" id="Y" name="email" <?php if($row['email']=='Y') { echo "checked"; }?> /></td>
		<td><input type="radio" value="N" id="N" name="email" <?php if($row['email']=='N') { echo "checked"; }?>/></td>
	</tr>
	<tr class="pushOut">
		<td>Push Notifications</td>
		<td><input type="radio" value="Y" id="Y" name="push" <?php if($row['push']=='Y') { echo "checked"; }?> /></td>
		<td><input type="radio" value="N" id="N" name="push" <?php if($row['push']=='N') { echo "checked"; }?> /></td>
	</tr>
</table>
<br />
<input type="submit" Text="Update" />
</form>
</div>
</div>
</div>
</div>
</body>
</html>