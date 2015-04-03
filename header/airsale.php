<?php
ob_start();
/*
function debug_info(){
echo "<pre> Some debug info \n";
var_dump($_POST);
}*/
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$servername = "mysql.hostinger.co.uk";
$username = "u979434920_asale";
$password = "_MYsql";
$db = "u979434920_asale";
$table = 'user_list';
setcookie('debug','0',time()+30*85400,'/');
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
		var_dump($result); 
		if (mysqli_num_rows($result) > 0) {
				$row = mysqli_fetch_assoc($result);
				var_dump($row);
				if($row['user'] == $UI_user)
				{
				$_SESSION['auth']=$row['user'];
				setrawcookie('auth',base64_encode($row['user']),time()+1800,'/');
	//			die('');
				echo '<script>location.replace(\'../airsale/home.php\')</script>';
				}
				else {
				$_SESSION['auth']='';
	//			die('');
				echo '<script>location.replace(\'../login_failed.html\')</script>';
				}
		
		}
		else {
			$_SESSION['auth']='';
	//		die('');
			echo '<script>location.replace(\'../login_failed.html\')</script>';
		}
		break;
	}
	
	case 'signup':
	{
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
		$_SESSION['auth']=$user;
		setrawcookie('auth',base64_encode($user),time()+1800,'/');
		echo '<script>location.replace(\'../airsale/home.php\')</script>';
		break;
	}
		
}
?>