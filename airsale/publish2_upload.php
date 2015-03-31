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



//getting data from previous entry

$category=mysqli_escape_string($conn,$_POST["category"]);
$name=mysqli_escape_string($conn,$_POST["name"]);
$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
$price=mysqli_escape_string($conn,$_POST["price"]);
$description = mysqli_escape_string($conn,$_POST["description"]);
$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));

//if($debug)  die("info:".$vocab.$definition.$sentence1);

if(!empty($_FILES['itemPicture']))
{	
	$uploaddir = './items/';
	$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
	$uploadfile = $uploaddir . $filename;
	$itemPictureName = mysqli_escape_string($conn,$filename);
}

$sql="INSERT INTO publish2 (category,
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
		)";
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
		case 2: location.replace('/airsale/publish2.php');break;
		case 3: location.replace('/airsale/publish3.php');break;
		case 4: location.replace('/airsale/publish4.php');break;
		case 1: location.replace('/airsale/publish.php');break;
	}
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