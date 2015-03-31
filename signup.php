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
$password=mysqli_escape_string($conn,$_POST["password"]);
$user=mysqli_escape_string($conn,$_POST["user"]);
$email=mysqli_escape_string($conn,$_POST["email"]);
$country=mysqli_escape_string($conn,$_POST["country"]);
$identity_method = mysqli_escape_string($conn,$_POST["identity_method"]);
$identity = mysqli_escape_string($conn,$_POST["identity"]);

//if($debug)  die("info:".$vocab.$definition.$sentence1);

$sql="INSERT INTO ".$table." (user,
		password,
		email,
		country,
		identity_method,
		identity)
		VALUES ('$user',
		'$password',
		'$email',
		'$country',
		'$identity_method',
		'$identity')";

		
$status=mysqli_query($conn,$sql);
if($debug){
if($status) echo "...Data stored...";
else die("...Data not stored...Error:" .mysqli_error($conn));
}
if($status) echo "...Data stored...";

setrawcookie('auth',base64_encode($user),time()+1800);

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
    if(getCookie_raw('auth')!='') location.replace('/airsale/home.html');
	if(getCookie_raw('auth')=='') location.replace('/login_failed.html');
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