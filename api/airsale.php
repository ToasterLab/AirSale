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

$conn = mysqli_connect($servername, $username, $password,$db);
global $item_id;
$item_id=$_SESSION['item_id'];

function setElement($element_name,$element_value)
{
	echo '<p id="'.$element_name.'" style="display:none">'.$element_value.'</p>';
}
function getPublishElements($publish_id)
{
	session_start();
	$servername = "mysql.hostinger.co.uk";
	$username = "u979434920_asale";
	$password = "_MYsql";
	$db = "u979434920_asale";
	$conn = mysqli_connect($servername, $username, $password,$db);
	global $item_id;
	$item_id=$_SESSION['item_id'];
	
	switch($publish_id)
	{
		case 1:
		{
			
			$sql = "SELECT departureCountry,
					arrivalCountry,
					arrivalDateTime,
					flightCarrier,
					flightNumber,
					fullName,
					ticketName,
					account,id FROM publish1 WHERE item_id='$item_id'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['account'] == $_SESSION['auth'] )
					{
					setElement('departureCountry',($row['departureCountry']));
					setElement('arrivalCountry',($row['arrivalCountry']));
					setElement('arrivalDateTime',($row['arrivalDateTime']));
					setElement('flightCarrier',($row['flightCarrier']));
					setElement('flightNumber',($row['flightNumber']));
					setElement('fullName',($row['fullName']));
					setElement('ticketName',($row['ticketName']));
					setElement('publish1id',($row['id']));
					}
				}
			}
			break;
		}
		case 2:
		{
			
			$sql = "SELECT category,
					name,
					specifications,
					price,
					description,
					itemPictureName,itemPictureName2,itemPictureName3,itemPictureName4,
					account,id FROM publish2 WHERE item_id='$item_id'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['account'] == base64_decode($_COOKIE['auth']) )
					{
					setElement('category',($row['category']));
					setElement('name',($row['name']));
					setElement('specifications',($row['specifications']));
					setElement('price',($row['price']));
					setElement('description',($row['description']));
					setElement('itemPictureName',($row['itemPictureName']));
					setElement('itemPictureName2',($row['itemPictureName2']));
					setElement('itemPictureName3',($row['itemPictureName3']));
					setElement('itemPictureName4',($row['itemPictureName4']));
					setElement('publish2id',($row['id']));
					}
				}
			}
			break;
		}
		case 3:
		{
			
			$sql = "SELECT number,
					email,
					location,
					other,
					prefered,
					userPictureName,
					account,id FROM publish3 WHERE item_id='$item_id'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['account'] == $_SESSION['auth'] )
					{
					setElement('number',($row['number']));
					setElement('email',($row['email']));
					setElement('location',($row['location']));
					setElement('other',($row['other']));
					setElement('prefered',($row['prefered']));
					setElement('userPictureName',($row['userPictureName']));
					setElement('publish3id',($row['id']));
					}
				}
			}
			break;
		}
		
	}
	
}


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
					setrawcookie('auth',($row['user']),0,'/');
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
				$_SESSION['auth']=mysqli_escape_string($conn,$_POST["user"]);
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
			$account = $_SESSION['auth'];
						
			$uploaddir = '../airsale/tickets/';
			$filename=(string)rand() . basename($_FILES['airTicket']['name']);
			$uploadfile = $uploaddir . $filename;
			$ticketName = mysqli_escape_string($conn,$filename);
			
			$sql="INSERT INTO item_id (account) VALUES ('$account')";
			mysqli_query($conn,$sql);
			$item_id = mysqli_insert_id($conn);
			$_SESSION['item_id']=$item_id;
			
			$sql="INSERT INTO publish1 (departureCountry,
					arrivalCountry,
					arrivalDateTime,
					flightCarrier,
					flightNumber,
					fullName,
					ticketName,
					account,
					item_id)
					VALUES ('$departureCountry',
					'$arrivalCountry',
					'$arrivalDateTime',
					'$flightCarrier',
					'$flightNumber',
					'$fullName',
					'$ticketName',
					'$account',
					'$item_id')";
			$status=mysqli_query($conn,$sql);
			
			if ($_FILES["airTicket"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}
			
			if (move_uploaded_file($_FILES['airTicket']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			
			echo '<script>location.replace(\'../airsale/publish2.php\')</script>';break;
		}
		
		case 'publish2':
		{
			$category=mysqli_escape_string($conn,$_POST["category"]);
			$name=mysqli_escape_string($conn,$_POST["name"]);
			$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
			$price=mysqli_escape_string($conn,$_POST["price"]);
			$description = mysqli_escape_string($conn,$_POST["description"]);
			$account = $_SESSION['auth'];
						
			if(!empty($_FILES['itemPicture']))
			{	
				$uploaddir = '../airsale/items/';
				$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$itemPictureName = mysqli_escape_string($conn,$filename);
			}
			
			$sql="INSERT INTO publish2 (category,
					name,
					specifications,
					price,
					description,
					itemPictureName,
					account,item_id)
					VALUES ('$category',
					'$name',
					'$specifications',
					'$price',
					'$description',
					'$itemPictureName',
					'$account',
					'$item_id'
					)";
			$status=mysqli_query($conn,$sql);
					
			if ($_FILES["itemPicture"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}
			
			if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			echo '<script>location.replace(\'../airsale/publish3.php\')</script>';break;
		}
		
		case 'publish3':
		{
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered = mysqli_escape_string($conn,$_POST["prefered"]);
			$account = $_SESSION['auth'];
	
			if(!empty($_FILES['userPicture']))
			{
				$uploaddir = '../airsale/users/';	
				$filename=(string)rand() . basename($_FILES['userPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$userPictureName = mysqli_escape_string($conn,$filename);
			}
			
			$sql="INSERT INTO publish3 (number,
					email,
					location,
					other,
					prefered,
					userPictureName,
					account,
					item_id)
					VALUES ('$number',
					'$email',
					'$location',
					'$other',
					'$prefered',
					'$userPictureName',
					'$account',
					'$item_id'
					)";
			$status=mysqli_query($conn,$sql);
			
			if ($_FILES["userPicture"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}
			
			if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			
			echo '<script>location.replace(\'../airsale/publish4.php\')</script>';break;
		}
		
		case 'publish4':
		{
			echo '<script>alert("The item is sucessfully published. It will be seen by all users at the I am a buyer-> explore tab. "); location.replace(\'../airsale/home.php\')</script>';break;
		}
		
		case 'publish2_photo':
		{
			$edit_id = base64_decode( $_COOKIE['edit_id']);
			$account = $_SESSION['auth'];
			$uploaddir = '../airsale/items/';
			
			if(!empty($_FILES['itemPicture2']))
			{	
				$filename2=(string)rand() . basename($_FILES['itemPicture2']['name']);
				$uploadfile2 = $uploaddir . $filename2;
				$itemPictureName2 = mysqli_escape_string($conn,$filename2);
			}
			
			if(!empty($_FILES['itemPicture3']))
			{	
				$filename3=(string)rand() . basename($_FILES['itemPicture3']['name']);
				$uploadfile3 = $uploaddir . $filename3;
				$itemPictureName3 = mysqli_escape_string($conn,$filename3);
			}
			
			
			if(!empty($_FILES['itemPicture4']))
			{	
				$filename4=(string)rand() . basename($_FILES['itemPicture4']['name']);
				$uploadfile4 = $uploaddir . $filename4;
				$itemPictureName4 = mysqli_escape_string($conn,$filename4);
			}
			
			$sql="UPDATE publish2
					SET itemPictureName2 = '$itemPictureName2',
						itemPictureName3 = '$itemPictureName3',
						itemPictureName4 = '$itemPictureName4'
					WHERE item_id='$item_id'";
			$status=mysqli_query($conn,$sql);
			
			if (move_uploaded_file($_FILES['itemPicture2']['tmp_name'], $uploadfile2)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			
			if (move_uploaded_file($_FILES['itemPicture3']['tmp_name'], $uploadfile3)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			
			if (move_uploaded_file($_FILES['itemPicture4']['tmp_name'], $uploadfile4)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			
			echo 'Here is some more debugging info:';
			print_r($_FILES);
			
			print "</pre>";
			
			echo '<script>location.replace(\'../airsale/publish4.php\')</script>';break;
		}
		
		case 'publish1_edit':
		{
			$departureCountry=mysqli_escape_string($conn,$_POST["departureCountry"]);
			$arrivalCountry=mysqli_escape_string($conn,$_POST["arrivalCountry"]);
			$arrivalDateTime=mysqli_escape_string($conn,$_POST["arrivalDateTime"]);
			$flightCarrier=mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$fullName = mysqli_escape_string($conn,$_POST["fullName"]);
			$passport = mysqli_escape_string($conn,$_POST["passport"]);
			$account = $_SESSION['auth'];
			
			$uploaddir = '../airsale/tickets/';
			$filename=(string)rand() . basename($_FILES['airTicket']['name']);
			$uploadfile = $uploaddir . $filename;
			$ticketName = mysqli_escape_string($conn,$filename);
	
			$sql="UPDATE publish1 SET
					departureCountry 	= '$departureCountry',
					arrivalCountry		= '$arrivalCountry',
					arrivalDateTime		= '$arrivalDateTime',
					flightCarrier		= '$flightCarrier',
					flightNumber		= '$flightNumber',
					fullName			= '$fullName',
					passport			= '$passport',
					ticketName			= '$ticketName'
					WHERE item_id='$item_id'
					";
			$status=mysqli_query($conn,$sql);
			
			if ($_FILES["airTicket"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}
			
			if (move_uploaded_file($_FILES['airTicket']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			echo '<script>location.replace(\'../airsale/publish4.php\')</script>';break;
		}
		
		case 'publish2_edit':
		{
			$category=mysqli_escape_string($conn,$_POST["category"]);
			$name=mysqli_escape_string($conn,$_POST["name"]);
			$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
			$price=mysqli_escape_string($conn,$_POST["price"]);
			$description = mysqli_escape_string($conn,$_POST["description"]);
			$account = $_SESSION['auth'];
					
			if(!empty($_FILES['itemPicture']))
			{	
				$uploaddir = '../airsale/items/';
				$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$itemPictureName = mysqli_escape_string($conn,$filename);
			}
			
		
			$sql="UPDATE publish2 SET
					category 				= '$category',
					name					= '$name',
					specifications			= '$specifications',
					price					= '$price',
					description				= '$description',
					itemPictureName			= '$itemPictureName'
					WHERE item_id='$item_id'
					";
			$status=mysqli_query($conn,$sql);
			if ($_FILES["itemPicture"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}
			
			if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
		
			echo '<script>location.replace(\'../airsale/publish4.php\')</script>';break;
		}
		
		case 'publish3_edit':
		{
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered = mysqli_escape_string($conn,$_POST["prefered"]);
			$account = $_SESSION['auth'];
			echo "Debug info on SQL query: \n ";
			echo $_POST;
			
			if(!empty($_FILES['userPicture']))
			{
				$uploaddir = '../airsale/users/';	
				$filename=(string)rand() . basename($_FILES['userPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$userPictureName = mysqli_escape_string($conn,$filename);
			}
			
	
			$sql="UPDATE publish3 SET
					number 					= '$number',
					email					= '$email',
					location				= '$location',
					other					= '$other',
					prefered				= '$prefered',
					userPictureName			= '$userPictureName'
					WHERE item_id='$item_id'
					";
			$status=mysqli_query($conn,$sql);
			if ($_FILES["userPicture"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}
			
			if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				echo "Possible file upload attack!\n";
			}
			echo '<script>location.replace(\'../airsale/publish4.php\')</script>';break;
		}
		
		case 'explore':
		{
			$sql = "SELECT departureCountry,
					arrivalCountry,
					arrivalDateTime,
					flightCarrier,
					flightNumber,
					fullName,
					account,id,item_id FROM publish1";
			$result = mysqli_query($conn, $sql);
			$i=1;
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['account'] == $_SESSION['auth'] )
					{
					setElement('departureCountry'.$i,($row['departureCountry']));
					setElement('arrivalCountry'.$i,($row['arrivalCountry']));
					setElement('arrivalDateTime'.$i,($row['arrivalDateTime']));
					setElement('flightCarrier'.$i,($row['flightCarrier']));
					setElement('flightNumber'.$i,($row['flightNumber']));
					setElement('fullName'.$i,($row['fullName']));
					setElement('publish1id'.$i,($row['id']));
					setElement('item_id1'.$i,($row['item_id']));
					}
					$i++;
				}
			}
			
			$sql = "SELECT category,
					name,
					specifications,
					price,
					description,
					itemPictureName,itemPictureName2,itemPictureName3,itemPictureName4,
					account,id,item_id FROM publish2 ";
			$result = mysqli_query($conn, $sql);
			$i=1;
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['account'] == base64_decode($_COOKIE['auth']) )
					{
					setElement('category'.$i,($row['category']));
					setElement('name'.$i,($row['name']));
					setElement('specifications'.$i,($row['specifications']));
					setElement('price'.$i,($row['price']));
					setElement('description'.$i,($row['description']));
					setElement('itemPictureName'.$i,($row['itemPictureName']));
					setElement('itemPictureName2'.$i,($row['itemPictureName2']));
					setElement('itemPictureName3'.$i,($row['itemPictureName3']));
					setElement('itemPictureName4'.$i,($row['itemPictureName4']));
					setElement('publish2id'.$i,($row['id']));
					setElement('item_id2'.$i,($row['item_id']));
					}
					$i++;
				}
			}
			
			
			$sql = "SELECT number,
					email,
					location,
					other,
					prefered,
					account,id,item_id FROM publish3";
			$result = mysqli_query($conn, $sql);
			$i=1;
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['account'] == $_SESSION['auth'] )
					{
					setElement('number'.$i,($row['number']));
					setElement('email'.$i,($row['email']));
					setElement('location'.$i,($row['location']));
					setElement('other'.$i,($row['other']));
					setElement('prefered'.$i,($row['prefered']));
					setElement('publish3id'.$i,($row['id']));
					setElement('item_id3'.$i,($row['item_id']));
					}
					$i++;
				}
			}
			
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
			$account = $_SESSION['auth'];
			
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