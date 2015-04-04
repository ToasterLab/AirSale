<?php
ob_start();
/*
function debug_info(){
echo "<pre> Some debug info \n";
var_dump($_POST);
}*/
session_start();
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

if($_POST['mobile'] != 1)
{
	if($_POST['action']!= 'signup' && $_POST['action']!= 'login') if($_SESSION['auth']=='') 
	echo '<script>location.replace(\'../login_failed.html\')</script>';
	
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
	switch($_POST['action'])
	{
		case 'login':
		{
			
			$UI_user=$_POST['user'];
			$UI_password = $_POST['password'];
			$sql = "SELECT user,password FROM user_list WHERE password='$UI_password' AND user='$UI_user'";
			$result = mysqli_query($conn, $sql);
	//		var_dump($result,$_POST); 
			if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
				//	var_dump($row);
				//	echo $row['user'] == $UI_user;
				//	die();
					if($row['user'] == $UI_user)
					{
					$_SESSION['auth']=$row['user'];
					setrawcookie('auth',base64_encode($row['user']),time()+1800,'/');
					echo '<script>location.replace(\'../airsale/home.php\')</script>';
					}
					else {
					$_SESSION['auth']='';
					echo '<script>location.replace(\'../login_failed.html\')</script>';
					}
			
			}
			else {
				$_SESSION['auth']='';
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
			
			//if($debug)  die("info:".$vocab.$definition.$sentence1);
			
			$sql="SELECT user FROM user_list WHERE user='$user'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 0)
			{
				$sql="INSERT INTO user_list (user,
						password,
						email,
						country)
						VALUES ('$user',
						'$password',
						'$email',
						'$country')";
				
				$status=mysqli_query($conn,$sql);
				$_SESSION['auth']=$user;
				setrawcookie('auth',base64_encode($user),time()+1800,'/');
				echo '<script>location.replace(\'../airsale/home.php\')</script>';
			}
			else 
			{
				echo '<script>  alert("User name is already registered. Please try a different one");location.replace(\'../signup.html\')</script>';
				
			}
			break;
		}
			
		case 'publish1':
		{
			$departureCountry=mysqli_escape_string($conn,$_POST["departureCountry"]);
			$arrivalCountry=mysqli_escape_string($conn,$_POST["arrivalCountry"]);
			$arrivalDateTime=mysqli_escape_string($conn,$_POST["arrivalDateTime"]);
			$flightCarrier=mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$fullName = mysqli_escape_string($conn,$_POST["fullName"]);
			$passport = mysqli_escape_string($conn,$_POST["passport"]);
			$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));
			
			//if($debug)  die("info:".$vocab.$definition.$sentence1);
			
			$uploaddir = '../airsale/tickets/';
			$filename=(string)rand() . basename($_FILES['airTicket']['name']);
			$uploadfile = $uploaddir . $filename;
			$ticketName = mysqli_escape_string($conn,$filename);
			
			$sql="INSERT INTO publish1 (departureCountry,
					arrivalCountry,
					arrivalDateTime,
					flightCarrier,
					flightNumber,
					fullName,
					passport,
					ticketName,
					account)
					VALUES ('$departureCountry',
					'$arrivalCountry',
					'$arrivalDateTime',
					'$flightCarrier',
					'$flightNumber',
					'$fullName',
					'$passport',
					'$ticketName',
					'$account')";
			$status=mysqli_query($conn,$sql);
			
			break;
			
			
		}
	}
}

if($_POST['mobile'] == 1)
{
	switch($_POST['action'])
	{
		case 'login':
		{
			session_start();
			$UI_user=$_POST['user'];
			$UI_password = $_POST['password'];
			$sql = "SELECT id,user,password FROM user_list WHERE password='$UI_password' AND user='$UI_user'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					if($row['user'] == $UI_user)
					{
					$_SESSION['auth']=$row['user'];
					echo $row['id'];
					}
					else {
					$_SESSION['auth']='';
					echo 'failed';
					}
			
			}
			else {
				$_SESSION['auth']='';
				echo 'failed';
			}
			break;
		}
		
		case 'signup':
		{
			$password=mysqli_escape_string($conn,$_POST["password"]);
			$user=mysqli_escape_string($conn,$_POST["user"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$country=mysqli_escape_string($conn,$_POST["country"]);
			
			//if($debug)  die("info:".$vocab.$definition.$sentence1);
			
			$sql="SELECT user FROM user_list WHERE user='$user'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) == 0)
			{
				$sql="INSERT INTO user_list (user,
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
				$_SESSION['auth']=$user;
				setrawcookie('auth',base64_encode($user),time()+1800,'/');
				echo '<script>location.replace(\'../airsale/home.php\')</script>';
			}
			else 
			{
				echo '<script>  alert("user name found");location.replace(\'../signup.html\')</script>';
				
			}
			break;
		}
			
		case 'publish1':
		{
			$departureCountry=mysqli_escape_string($conn,$_POST["departureCountry"]);
			$arrivalCountry=mysqli_escape_string($conn,$_POST["arrivalCountry"]);
			$arrivalDateTime=mysqli_escape_string($conn,$_POST["arrivalDateTime"]);
			$flightCarrier=mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$fullName = mysqli_escape_string($conn,$_POST["fullName"]);
			$passport = mysqli_escape_string($conn,$_POST["passport"]);
			$account = mysqli_escape_string($conn, base64_decode($_COOKIE['auth']));
			
			//if($debug)  die("info:".$vocab.$definition.$sentence1);
			
			$uploaddir = '../airsale/tickets/';
			$filename=(string)rand() . basename($_FILES['airTicket']['name']);
			$uploadfile = $uploaddir . $filename;
			$ticketName = mysqli_escape_string($conn,$filename);
			
			$sql="INSERT INTO publish1 (departureCountry,
					arrivalCountry,
					arrivalDateTime,
					flightCarrier,
					flightNumber,
					fullName,
					passport,
					ticketName,
					account)
					VALUES ('$departureCountry',
					'$arrivalCountry',
					'$arrivalDateTime',
					'$flightCarrier',
					'$flightNumber',
					'$fullName',
					'$passport',
					'$ticketName',
					'$account')";
			$status=mysqli_query($conn,$sql);
			
			break;
			
			
		}
	}
}
?>