<?php
include('/home/u979434920/public_html/header/airsale.php');
echo '<pre>';

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
<link rel="stylesheet" href='/css/b.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<link rel="stylesheet" href='/css/gry2.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
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
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61584028-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<h1> Click <span><a class='btn' href='/airsale/admin/home.php'> here</a></span> to go back</h1>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>
  