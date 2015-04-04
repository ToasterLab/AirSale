<?php
include('/home/u979434920/public_html/header/airsale.php');


//getting data from previous entry

$departureCountry=mysqli_escape_string($conn,$_POST["departureCountry"]);
$arrivalCountry=mysqli_escape_string($conn,$_POST["arrivalCountry"]);
$arrivalDateTime=mysqli_escape_string($conn,$_POST["arrivalDateTime"]);
$flightCarrier=mysqli_escape_string($conn,$_POST["flightCarrier"]);
$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
$fullName = mysqli_escape_string($conn,$_POST["fullName"]);
$passport = mysqli_escape_string($conn,$_POST["passport"]);
$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));

//if($debug)  die("info:".$vocab.$definition.$sentence1);

$uploaddir = './tickets/';
$filename=(string)rand() . basename($_FILES['airTicket']['name']);
$uploadfile = $uploaddir . $filename;
$ticketName = mysqli_escape_string($conn,$filename);

$sql="INSERT INTO publish1 (departureCountry,
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
		'$account')";
$status=mysqli_query($conn,$sql);



//uploading air ticket file
// In PHP versions earlier than 4.1.0, $HTTP_POST_FILES should be used instead
// of $_FILES.



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
    switch(Number(getCookie('destination')))
	{
		case 2: location.replace('/airsale/airsale/publish2.php');break;
		case 3: location.replace('/airsale/airsale/publish3.php');break;
		case 4: location.replace('/airsale/airsale/publish4.php');break;
		case 1: location.replace('/airsale/airsale/publish.php');break;
	}
});

</script>


<title>AirSale SIGNUP</title>
</head>

<h1> You will be redirected to the main page. If you are not redirected, click <span><a class='btn' href='/airsale/home.php'> here</a></span></h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>