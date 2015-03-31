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
<link rel="stylesheet" href='/css/bootstrap.min.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>


<title>AirSale ADMIN intro description edit</title>
</head>

<h1> Data stored into the server. Click <span><a class='btn' href='/admin/home.php'> here</a></span> to go back</h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>