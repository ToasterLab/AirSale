<?php
/*
© 2015 LALX Singapore programmed by Li Xi together with Huey Lee
Access URL: airsale.lalx.org/api/airsale.php
*/
ob_start();
/*
function debug_info(){
echo "<pre> Some debug info \n";
var_dump($_POST);
}*/
session_start();
$servername = "31.170.164.39";
$username = "u979434920_asale";
$password = "_MYsql";
$db = "u979434920_asale";
$table = 'user_list';
setcookie('debug','0',time()+30*85400,'/');
$debug=$_COOKIE['debug'];

$conn = mysqli_connect($servername, $username, $password,$db);
var_dump($servername,$conn);
?>