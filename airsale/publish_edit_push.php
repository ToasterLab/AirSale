<?php
ob_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$servername = "mysql.hostinger.co.uk";
$username = "u814771946_root";
$password = "_MYsql";
$db = "u814771946_root";
$table = 'user_list';
setcookie('debug','0',time()+30*85400,'/');
$debug=$_COOKIE['debug'];

$conn = mysqli_connect($servername, $username, $password,$db);
if($debug){
if (!$conn) {
    die("...Connection failed..." . mysqli_error($conn) );
}
echo "...Debug info: Connected successfully...";
}

$edit_handle = (int) base64_decode( $_COOKIE['edit_handle']);
$edit_id = base64_decode( $_COOKIE['edit_id']);

switch($edit_handle)
{
case 1:
	{
		$departureCountry=mysqli_escape_string($conn,$_POST["departureCountry"]);
		$arrivalCountry=mysqli_escape_string($conn,$_POST["arrivalCountry"]);
		$arrivalDateTime=mysqli_escape_string($conn,$_POST["arrivalDateTime"]);
		$flightCarrier=mysqli_escape_string($conn,$_POST["flightCarrier"]);
		$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
		$fullName = mysqli_escape_string($conn,$_POST["fullName"]);
		$passport = mysqli_escape_string($conn,$_POST["passport"]);
		$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));
		
		$uploaddir = './tickets/';
		$filename=(string)rand() . basename($_FILES['airTicket']['name']);
		$uploadfile = $uploaddir . $filename;
		$ticketName = mysqli_escape_string($conn,$filename);
		
	/*	$sql="INSERT INTO publish1 (departureCountry,
				arrivalCountry,
				arrivalDateTime,
				flightCarrier,
				flightNumber,
				fullName,
				passport,
				ticketName,
				account)
				VALUES ('$departureCountry',
				'$arrivalCountry',
				'$arrivalDateTime',
				'$flightCarrier',
				'$flightNumber',
				'$fullName',
				'$passport',
				'$ticketName',
				'$account')"; */
		$sql="UPDATE publish1 SET
				departureCountry 	= '$departureCountry',
				arrivalCountry		= '$arrivalCountry',
				arrivalDateTime		= '$arrivalDateTime',
				flightCarrier		= '$flightCarrier',
				flightNumber		= '$flightNumber',
				fullName			= '$fullName',
				passport			= '$passport',
				ticketName			= '$ticketName'
				WHERE id='$edit_id'
				";
		$status=mysqli_query($conn,$sql);
		
		echo '<pre>';
		
		if($debug){
		if($status) echo "...Data stored...";
		else die("...Data not stored...Error:" .mysqli_error($conn));
		}
		if($status) echo "...Data stored...";
		echo "Some debug info on SQL process:.\n";
		echo $_POST;
		
		
		if ($_FILES["airTicket"]["size"] > 800000) {
			die("Sorry, your file is too large. Please go back to upload your file again.");
		}
		
		if (move_uploaded_file($_FILES['airTicket']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
		} else {
			echo "Possible file upload attack!\n";
		}
		
		echo 'Here is some more debugging info:';
		print_r($_FILES);
		
		print "</pre>";
		break;
	}
case 2:
	{
		$category=mysqli_escape_string($conn,$_POST["category"]);
		$name=mysqli_escape_string($conn,$_POST["name"]);
		$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
		$price=mysqli_escape_string($conn,$_POST["price"]);
		$description = mysqli_escape_string($conn,$_POST["description"]);
		$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));
				
		if(!empty($_FILES['itemPicture']))
		{	
			$uploaddir = './items/';
			$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
			$uploadfile = $uploaddir . $filename;
			$itemPictureName = mysqli_escape_string($conn,$filename);
		}
		
	/*	$sql="INSERT INTO publish2 (category,
				name,
				specifications,
				price,
				description,
				itemPictureName,
				account)
				VALUES ('$category',
				'$name',
				'$specifications',
				'$price',
				'$description',
				'$itemPictureName',
				'$account'
				)";*/
				
		$sql="UPDATE publish2 SET
				category 				= '$category',
				name					= '$name',
				specifications			= '$specifications',
				price					= '$price',
				description				= '$description',
				itemPictureName			= '$itemPictureName'
				WHERE id='$edit_id'
				";
		$status=mysqli_query($conn,$sql);
		echo '<pre>';
		
		if($debug){
		if($status) echo "...Data stored...";
		else die("...Data not stored...Error:" .mysqli_error($conn));
		}
		if($status) echo "...Data stored...";
		echo "Some debug info on SQL process:.\n";
		echo $_POST;
		
		
		if ($_FILES["itemPicture"]["size"] > 800000) {
			die("Sorry, your file is too large. Please go back to upload your file again.");
		}
		
		if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
		} else {
			echo "Possible file upload attack!\n";
		}
		
		echo 'Here is some more debugging info:';
		print_r($_FILES);
		
		print "</pre>";
		break;
	}
	
case 3:
	{
		$number=mysqli_escape_string($conn,$_POST["number"]);
		$email=mysqli_escape_string($conn,$_POST["email"]);
		$location=mysqli_escape_string($conn,$_POST["location"]);
		$other=mysqli_escape_string($conn,$_POST["other"]);
		$prefered = mysqli_escape_string($conn,$_POST["prefered"]);
		$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));
		echo "Debug info on SQL query: \n ";
		echo $_POST;
		
		if(!empty($_FILES['userPicture']))
		{
			$uploaddir = './users/';	
			$filename=(string)rand() . basename($_FILES['userPicture']['name']);
			$uploadfile = $uploaddir . $filename;
			$userPictureName = mysqli_escape_string($conn,$filename);
		}
		
	/*	$sql="INSERT INTO publish3 (number,
				email,
				location,
				other,
				prefered,
				userPictureName,
				account)
				VALUES ('$number',
				'$email',
				'$location',
				'$other',
				'$prefered',
				'$userPictureName',
				'$account'
				)";*/
				
		$sql="UPDATE publish3 SET
				number 					= '$number',
				email					= '$email',
				location				= '$location',
				other					= '$other',
				prefered				= '$prefered',
				userPictureName			= '$userPictureName'
				WHERE id='$edit_id'
				";
		$status=mysqli_query($conn,$sql);
	
		if($debug){
		if($status) echo "...Data stored...";
		else die("...Data not stored...Error:" .mysqli_error($conn));
		}
		if($status) echo "...Data stored...";
		echo "Some debug info on SQL process:.\n";
		echo $_POST;
		
		
		if ($_FILES["userPicture"]["size"] > 800000) {
			die("Sorry, your file is too large. Please go back to upload your file again.");
		}
		
		if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
			echo "File is valid, and was successfully uploaded.\n";
		} else {
			echo "Possible file upload attack!\n";
		}
		
		echo 'Here is some more debugging info:';
		print_r($_FILES);
		
		print "</pre>";
		break;
	}

default: break;
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href='/css/bootstrap.min.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>

<script>

$(document).ready(function(e) {
location.replace('/airsale/publish4.php');
});

</script>


<title>AirSale SIGNUP</title>
</head>

<h1> You will be redirected to the main page. If you are not redirected, click <span><a class='btn' href='/airsale/home.html'> here</a></span></h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>