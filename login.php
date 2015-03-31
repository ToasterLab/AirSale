<?php
ob_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$servername = "mysql.hostinger.co.uk";
$username = "u814771946_root";
$password = "_MYsql";
$db = "u814771946_root";
$table = 'Entry'.base64_decode($_COOKIE['auth']);
setcookie('debug','0',time()+30*85400,'/');
$debug=$_COOKIE['debug'];

$conn = mysqli_connect($servername, $username, $password,$db);

$UI_user=$_POST['user'];
$UI_password = $_POST['password'];
$sql = "SELECT user,password FROM user_list";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
	setrawcookie('auth','',time()+1800);
	while($row = mysqli_fetch_assoc($result)) {
		if( ($UI_user == $row['user']) && ($UI_password==$row['password']) ) setrawcookie('auth',base64_encode($UI_user),time()+1800);
	}
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