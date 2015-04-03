<?php
include('/home/u979434920/public_html/header/airsale.php');

//getting data from previous entry
$paragraphs= base64_encode($_POST["paragraphs"]);

$sql="UPDATE admin_intro SET paragraphs='$paragraphs'";

		
$status=mysqli_query($conn,$sql);
if($debug){
if($status) echo "...Data stored...";
else die("...Data not stored...Error:" .mysqli_error($conn));
}
if($status) echo "...Data stored...";


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


<title>AirSale ADMIN intro description edit</title>
</head>

<h1> Data stored into the server. Click <span><a class='btn' href='/airsale/airsale/admin/home.php'> here</a></span> to go back</h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>