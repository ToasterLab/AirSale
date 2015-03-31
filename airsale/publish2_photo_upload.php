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


$edit_id = base64_decode( $_COOKIE['edit_id']);
$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));
$uploaddir = './items/';
//if($debug)  die("info:".$vocab.$definition.$sentence1);

if(!empty($_FILES['itemPicture2']))
{	
	$filename2=(string)rand() . basename($_FILES['itemPicture2']['name']);
	$uploadfile2 = $uploaddir . $filename2;
	$itemPictureName2 = mysqli_escape_string($conn,$filename2);
}


if(!empty($_FILES['itemPicture3']))
{	
	$filename3=(string)rand() . basename($_FILES['itemPicture3']['name']);
	$uploadfile3 = $uploaddir . $filename3;
	$itemPictureName3 = mysqli_escape_string($conn,$filename3);
}


if(!empty($_FILES['itemPicture4']))
{	
	$filename4=(string)rand() . basename($_FILES['itemPicture4']['name']);
	$uploadfile4 = $uploaddir . $filename4;
	$itemPictureName4 = mysqli_escape_string($conn,$filename4);
}

/*$sql="INSERT INTO publish2 (category,
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
$sql="UPDATE publish2
		SET itemPictureName2 = '$itemPictureName2',
			itemPictureName3 = '$itemPictureName3',
			itemPictureName4 = '$itemPictureName4'
		WHERE id='$edit_id'";
$status=mysqli_query($conn,$sql);
echo '<pre>';
if($debug){
if($status) echo "...Data stored...";
else die("...Data not stored...Error:" .mysqli_error($conn));
}
if($status) echo "...Data stored...";
echo "Some debug info on SQL process:.\n";
echo $_POST;


if (move_uploaded_file($_FILES['itemPicture2']['tmp_name'], $uploadfile2)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

if (move_uploaded_file($_FILES['itemPicture3']['tmp_name'], $uploadfile3)) {
    echo "File is valid, and was successfully uploaded.\n";
} else {
    echo "Possible file upload attack!\n";
}

if (move_uploaded_file($_FILES['itemPicture4']['tmp_name'], $uploadfile4)) {
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