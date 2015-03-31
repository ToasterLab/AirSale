<?php
ob_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><pre>';
$servername = "mysql.hostinger.co.uk";
$username = "u814771946_root";
$password = "_MYsql";
$db = "u814771946_root";
$table = 'user_list';
setcookie('debug','0',time()+30*85400,'/');
$debug=$_COOKIE['debug'];

$conn = mysqli_connect($servername, $username, $password,$db);


if (!$conn) {
    echo("...Connection failed..." . mysqli_error($conn) );
}
echo "...Debug info: Connected successfully...";




//getting data from previous entry
$approve_id= base64_decode($_COOKIE['approve-ticket-id']);

$sql="UPDATE publish1 SET isApproved ='1' WHERE id='$approve_id' ";

$status=mysqli_query($conn,$sql);

if($status) echo "...Data stored...";
else die("...Data not stored...Error:" .mysqli_error($conn));
echo "Debug info: \n ";
echo $_COOKIE['approve-ticket-id']." \n ";
echo 'Decoded code:'.base64_decode($_COOKIE['approve-ticket-id']);
echo "</pre>"
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
/*
$(document).ready(function(e) {
    location.replace('/admin/home.php');
});
*/
</script>
<title>AirSale ADMIN intro description edit</title>
</head>

<h1> Click <span><a class='btn' href='/admin/home.php'> here</a></span> to go back</h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>