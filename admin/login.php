<?php
include('/home/u979434920/public_html/header/airsale.php');

$UI_user=$_POST['user'];
$UI_password = $_POST['password'];
$sql = "SELECT user,password FROM admin_list";
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
<link rel="stylesheet" href='/css/b.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<link rel="stylesheet" href='/css/gry2.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>

<script>
$(document).ready(function(e) {
    if(getCookie_raw('auth')!='') location.replace('/admin/home.php');
	if(getCookie_raw('auth')=='') location.replace('/login_failed.html');
});

</script>


<title>AirSale SIGNUP</title>
</head>

<h1> You will be redirected to the ADMIN page. If you are not redirected, click <span><a class='btn' href='/airsale/home.php'> here</a></span></h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>