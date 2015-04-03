<?php
ob_start();
debug_info();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$servername = "mysql.hostinger.co.uk";
$username = "u979434920_asale";
$password = "_MYsql";
$db = "u979434920_asale";
$table = 'user_list';
setcookie('debug','1',time()+30*85400,'/');
$debug=$_COOKIE['debug'];
function setElement($element_name,$element_value)
{
	echo '<p id="'.$element_name.'" style="display:none">'.$element_value.'</p>';
}

$conn = mysqli_connect($servername, $username, $password,$db);
if($debug){
if (!$conn) {
    die("...Connection failed..." . mysqli_error($conn) );
}
echo "...Debug info: Connected successfully...";
}

switch($_POST['action'])
{
	case 'login':
	{
		session_start();
		$UI_user=$_POST['user'];
		$UI_password = $_POST['password'];
		$sql = "SELECT user,password FROM user_list WHERE password='$UI_password'";
		$result = mysqli_query($conn, $sql);
		var_dump($result); echo 'asdfasdf';
		if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				var_dump($row);
				if($row['user'] == $UI_user)
				{
				$_SESSION['auth']=$row['user'];
				die('');
				echo '<script>location.replace(\'../airsale/home.php\')</script>';
				}
				else {
				$_SESSION['auth']='';
				die('');
				echo '<script>location.replace(\'../login_failed.html\')</script>';
				}
		
		}
		else {
			$_SESSION['auth']='';
			die('');
			echo '<script>location.replace(\'../login_failed.html\')</script>';
		}
	}
	
	
	
	
}


function debug_info(){
echo "<pre> Some debug info \n";
var_dump($_POST);
echo "Session:".$_SESSION;
}
?>