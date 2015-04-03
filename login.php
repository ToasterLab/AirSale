<?php
include('/home/u979434920/public_html/header/airsale.php');
session_start();

$UI_user=$_POST['user'];
$UI_password = $_POST['password'];
$sql = "SELECT user,password FROM user_list WHERE password='$UI_password";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_assoc($result);
		$_SESSION['auth']=$row['user'];
}
else {
	$_SESSION['auth']='';
	echo '<script>location.replace(\'login_failed.html\')</script>';
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href='/airsale/css/bootstrap.min.css'>
<link rel="stylesheet" href='/airsale/css/gryphon.css'>
<script src="/airsale/js/jquery-1.11.0.min.js"></script>
<script src="/airsale/js/bootstrap.min.js"></script>
<script src="/airsale/js/gryphon.js"></script>
<script src="/airsale/js/classie.js"></script>

<title>AirSale SIGNUP</title>
</head>

<h1> You will be redirected to the main page. If you are not redirected, click <span><a class='btn' href='/airsale/airsale/home.html'> here</a></span></h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>