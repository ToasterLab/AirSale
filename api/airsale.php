<?php 
header('Access-Control-Allow-Credentials:true');
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
					if($row['account'] == $_SESSION['auth'] )
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


if($_POST['mobile'] != 1 && $_POST['concise'] != 1 && $_POST['JSON'] != 1)
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
			$country=mysqli_escape_string($conn,$_POST["country"]);
			
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
			$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
			
			
			if($_FILES['userPicture']['error']==0)
			{
				$uploaddir = '../airsale/users/';	
				$filename=(string)rand().basename($_FILES['userPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
						echo "File is valid, and was successfully uploaded.\n";
						$userPictureName = mysqli_escape_string($conn,$filename);
					} else {
						echo "Possible file upload attack!\n";
						$userPictureName = '0';
					}
				
				
				$sql="SELECT user FROM user_list WHERE user='$user'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 0)
				{
					$sql="INSERT INTO user_list (
							user,				password,
							email,				country,
							number,				fullName,
							location,			prefered,
							userPictureName,	credibility,
							successfulTransactions	)
							VALUES (
							'$user',			'$password',
							'$email',			'$country',
							'$number',			'$fullName',
							'$location',		'$prefered',
							'$userPictureName',	'0',
							'0'	)";
					
					$status=mysqli_query($conn,$sql);
					$_SESSION['auth']=mysqli_escape_string($conn,$_POST["user"]);
					setrawcookie('auth',$user,0,'/');
					
					
					echo '<script>location.replace(\'../airsale/home.php\')</script>';
				}
				else 
				{
					echo '<script>  alert("User already exists. Please try a different one");history.back();</script>';
				}
			}
			else
			{
										
				$sql="SELECT user FROM user_list WHERE user='$user'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 0)
				{
					$sql="INSERT INTO user_list (
							user,				password,
							email,				country,
							number,				fullName,
							location,			prefered,
							credibility,		successfulTransactions	)
							VALUES (
							'$user',			'$password',
							'$email',			'$country',
							'$number',			'$fullName',
							'$location',		'$prefered',
							'0',				'0'	)";
					
					$status=mysqli_query($conn,$sql);
					$_SESSION['auth']=mysqli_escape_string($conn,$_POST["user"]);
					setrawcookie('auth',$user,0,'/');
					$subject = 'AirSale Acknowledgement: Sign-up Successful';
				$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
				'Dear '.$fullName .", \n".
				"Thank you very much for signing up at airsale.lalx.org \n".
				"This is to confirm that your registration is successful.\nThank you for choosing us. \n \n".
				"Yours sincerely,\n AirSale Team \n".
				"\n-----------------\n".
				"\nReply to lixi@lalx.org or goto airsale.lalx.org/contact for any enquiries \n".
				"\n-----------------\n".
				"If you did not submit this enquiry, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
					mail($email,$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");
					echo '<script>location.replace(\'../airsale/home.php\')</script>';
				}
				else 
				{
					echo '<script>  alert("User already exists. Please try a different one");history.back();</script>';
				}
			
			}
			break;
		}
		
		case 'publish1':
		{	
			$sql="INSERT INTO item_id (account) VALUES ('$account')";
			mysqli_query($conn,$sql);
			$item_id = mysqli_insert_id($conn);
			$_SESSION['item_id']=$item_id;
			
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
			$user=$_SESSION['auth'];
			$sql=" 	UPDATE user_list 
					SET number='$number',
						email = '$email',
						location='$location',
						other='$other',
						prefered='$prefered'
					WHERE user = '$user'";
						
			$status=mysqli_query($conn,$sql);
			
			echo '<script>location.replace(\'../airsale/publish2.php\')</script>';break;
		}
		
		case 'publish1_edit':
		{	
			
			$sql="INSERT INTO item_id (account) VALUES ('$account')";
			mysqli_query($conn,$sql);
			$item_id = mysqli_insert_id($conn);
			$_SESSION['item_id']=$_COOKIE['edit_item_id'];
			
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
			$user=$_SESSION['auth'];
			$sql=" 	UPDATE user_list 
					SET number='$number',
						email = '$email',
						location='$location',
						other='$other',
						prefered='$prefered'
					WHERE user = '$user'";
						
			$status=mysqli_query($conn,$sql);
			
			echo '<script>location.replace(\'../airsale/publish2_edit.php\')</script>';break;
		}
		
		case 'publish2':
		{
			$category=mysqli_escape_string($conn,$_POST["category"]);
			$name=mysqli_escape_string($conn,$_POST["name"]);
			$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
			$price=mysqli_escape_string($conn,$_POST["price"]);
			$description = mysqli_escape_string($conn,$_POST["description"]);
			$flightCarrier = mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$arrivalDate = mysqli_escape_string($conn,$_POST["arrivalDate"]);
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
					account,item_id,flightCarrier,flightNumber,arrivalDate,arrivalCountry
					)
					VALUES ('$category',
					'$name',
					'$specifications',
					'$price',
					'$description',
					'$itemPictureName',
					'$account',
					'$item_id',
					'$flightCarrier',
					'$flightNumber',
					'$arrivalDate',''
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
			echo '<script>alert("The item is sucessfully published. It will be seen by all users at the I am a buyer-> explore tab. "); location.replace(\'../airsale/home.php\')</script>';break;
		}
	
		case 'publish2_photo':
		{
			$account = $_SESSION['auth'];
			$uploaddir = '../airsale/items/';
			$result = mysqli_query($conn," SELECT itemPictureName2,itemPictureName3,itemPictureName4
											FROM publish2WHERE item_id='$item_id'");
			$row = mysqli_fetch_assoc($result);
			$itemPictureName2_del =$row['itemPictureName2'];
			$itemPictureName3_del =$row['itemPictureName3'];
			$itemPictureName4_del =$row['itemPictureName4'];
			
			if($_FILES['itemPicture2']['error']==0)
			{	
				unlink($uploaddir . $itemPictureName2_del); echo 'itemPictureName2_del deleted';
				$filename2=(string)rand() . basename($_FILES['itemPicture2']['name']);
				$uploadfile2 = $uploaddir . $filename2;
				$itemPictureName2 = mysqli_escape_string($conn,$filename2);
				$sql="UPDATE publish2
						SET itemPictureName2 = '$itemPictureName2'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if (move_uploaded_file($_FILES['itemPicture2']['tmp_name'], $uploadfile2)) {
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					echo "Possible file upload attack!\n";
				}
			}
			
			if($_FILES['itemPicture3']['error']==0)
			{	
				unlink($uploaddir . $itemPictureName3_del); echo 'itemPictureName3_del deleted';
				$filename3=(string)rand() . basename($_FILES['itemPicture3']['name']);
				$uploadfile3 = $uploaddir . $filename3;
				$itemPictureName3 = mysqli_escape_string($conn,$filename3);
				$sql="UPDATE publish2
						SET itemPictureName3 = '$itemPictureName3'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if (move_uploaded_file($_FILES['itemPicture3']['tmp_name'], $uploadfile3)) {
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					echo "Possible file upload attack!\n";
				}
			}
			
			
			if($_FILES['itemPicture4']['error']==0)
			{	
				unlink($uploaddir . $itemPictureName4_del); echo 'itemPictureName4_del deleted';
				$filename4=(string)rand() . basename($_FILES['itemPicture4']['name']);
				$uploadfile4 = $uploaddir . $filename4;
				$itemPictureName4 = mysqli_escape_string($conn,$filename4);
				$sql="UPDATE publish2
						SET itemPictureName4 = '$itemPictureName4'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if (move_uploaded_file($_FILES['itemPicture4']['tmp_name'], $uploadfile4)) {
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					echo "Possible file upload attack!\n";
				}
			}
			
			echo '<script>location.replace(\'../airsale/publish3.php\')</script>';break;
		}
		
		case 'publish2_edit':
		{
			$category=mysqli_escape_string($conn,$_POST["category"]);
			$name=mysqli_escape_string($conn,$_POST["name"]);
			$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
			$price=mysqli_escape_string($conn,$_POST["price"]);
			$description = mysqli_escape_string($conn,$_POST["description"]);
			$flightCarrier = mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$arrivalDate = mysqli_escape_string($conn,$_POST["arrivalDate"]);
			$account = $_SESSION['auth'];
			$item_id = $_SESSION['item_id'];
			if($_POST['debug']) var_dump($_FILES);			
			if($_FILES['itemPicture']['error'] == 0)
			{	
			
				$sql = "SELECT itemPictureName FROM publish2 WHERE item_id='$item_id'";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				$toBeDeleted_itemPictureName = $row['itemPictureName'];
				if(unlink('../airsale/items/'.$toBeDeleted_itemPictureName)) echo 'item deleted';
				
				$uploaddir = '../airsale/items/';
				$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$itemPictureName = mysqli_escape_string($conn,$filename);
				$sql="UPDATE publish2 SET
						category 				= '$category',
						name					= '$name',
						specifications			= '$specifications',
						price					= '$price',
						description				= '$description',
						itemPictureName			= '$itemPictureName',
						flightCarrier			= '$flightCarrier',
						flightNumber			= '$flightNumber',
						arrivalDate				= '$arrivalDate'
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
			}
			else 
			{
				$sql="UPDATE publish2 SET
						category 				= '$category',
						name					= '$name',
						specifications			= '$specifications',
						price					= '$price',
						description				= '$description',
						flightCarrier			= '$flightCarrier',
						flightNumber			= '$flightNumber',
						arrivalDate				= '$arrivalDate'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);
				
			}
			echo '<script>location.replace(\'../airsale/publish3.php\')</script>';break;
		}
		
		case 'setSession(item_id)viaCookie(edit_item_id)':
		{
			$_SESSION['item_id'] = $_COOKIE['edit_item_id'];
			var_dump($_SESSION,$_COOKIE);
			break;
		}
		
		case 'profile_update':
		{
			$user = $_SESSION['auth'];
			if($_POST['password'] != '')
			{
				if($_FILES['userPicture']['error'] == 0)
				{	
					$sql = "SELECT userPictureName FROM user_list WHERE user='$user'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($result);
					$toBeDeleted_userPicture = $row['userPictureName'];
					if(unlink('../airsale/users/'.$toBeDeleted_userPicture)) echo 'item deleted';
					
					$uploaddir = '../airsale/users/';	
					$filename=(string)rand().basename($_FILES['userPicture']['name']);
					$uploadfile = $uploaddir . $filename;
					if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
							echo "File is valid, and was successfully uploaded.\n";
							$userPictureName = mysqli_escape_string($conn,$filename);
						} else {
							echo "Possible file upload attack!\n";
							$userPictureName = '0';
						}
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$password=mysqli_escape_string($conn,$_POST["password"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$sql=" 	UPDATE user_list 
							SET password='$password',
								number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName',
								userPictureName='$userPictureName'
							WHERE user = '$user'";
				}
				
				else
				{
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$password=mysqli_escape_string($conn,$_POST["password"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$sql=" 	UPDATE user_list 
							SET password='$password',
								number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName'
							WHERE user = '$user'";
					
				}
			}
			else
			{
				if($_FILES['userPicture']['error'] == 0)
				{	
					$sql = "SELECT userPictureName FROM user_list WHERE user='$user'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($result);
					$toBeDeleted_userPicture = $row['userPictureName'];
					if(unlink('../airsale/users/'.$toBeDeleted_userPicture)) echo 'item deleted';
					
					$uploaddir = '../airsale/users/';	
					$filename=(string)rand().basename($_FILES['userPicture']['name']);
					$uploadfile = $uploaddir . $filename;
					if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
							echo "File is valid, and was successfully uploaded.\n";
							$userPictureName = mysqli_escape_string($conn,$filename);
						} else {
							echo "Possible file upload attack!\n";
							$userPictureName = '0';
						}
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$sql=" 	UPDATE user_list 
							SET number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName',
								userPictureName='$userPictureName'
							WHERE user = '$user'";
				}
				else
				{
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$user=$_SESSION['auth'];
					$sql=" 	UPDATE user_list 
							SET number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName'
							WHERE user = '$user'";
				}
				
			}
			mysqli_query($conn,$sql);
			echo '<script> alert("Your profile is successfully updated");location.replace("../airsale/profile.php");</script>';
			break;
		}
		
		case 'contact':
		{
			$name=mysqli_escape_string($conn,$_POST['name']);
			$email=mysqli_escape_string($conn,$_POST['email']);
			$number=mysqli_escape_string($conn,$_POST['number']);
			$comment=mysqli_escape_string($conn,$_POST['comment']);
			
			$sql="INSERT INTO contact (name,
					email,
					number,
					comment)
					VALUES ('$name',
					'$email',
					'$number',
					'$comment')";
			
					
			$status=mysqli_query($conn,$sql);
			if($debug){
			if($status) echo "...Data stored...";
			else die("...Data not stored...Error:" .mysqli_error($conn));
			}
			if($status) echo "...Data stored...";
			
			//notifing user of successful submission
			$subject = 'AirSale Acknowledgement: Successful enquiry submission';
			$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
							'Dear '.$name .", \n".
							"We have received your enquiry submitted at airsale.lalx.org \n".
							"Thank you very much for your interest and we will get back to you shortly. \n \n".
							"Yours sincerely, \nAirSale Team \n".
							"If you did not submit this enquiry, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
							
			mail($email,$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");
			
			//notifing admin of successful submission
			$subject = 'Customer enquiry submission@AirSale';
			$message = 		"----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
							"Dear admin, \n".
							"We have received an enquiry submitted at airsale.lalx.org \n".
							"Please respond accordingly \n \n".
							"Yours sincerely, \nLALX Singapore \n".
							"Enquiry content:\n Customer name: ".$name."\n email: ".$email."\n comment:".$comment;
			mail('lixi@lalx.org',$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");
			echo "<script>alert('Your enquiry has been recorded. You should have received an acknowledgement email from us. We will get back to you shortly. Thank you for choosing AirSale.');location.replace('/index.html');</script>";break;
		}
	}
}

if($_POST['mobile'] == 1 || $_POST['concise']== 1 || $_POST['JSON']== 1)
{
	if($_POST['action']!= 'signup' && $_POST['action']!= 'login') if($_SESSION['auth']=='') 
	die('please login');
	
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
			$country=mysqli_escape_string($conn,$_POST["country"]);
			
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
			$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
			
			
			if($_FILES['userPicture']['error']==0)
			{
				$uploaddir = '../airsale/users/';	
				$filename=(string)rand().basename($_FILES['userPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
						$userPictureName = mysqli_escape_string($conn,$filename);
					} else {
						echo "file upload failed.";
						$userPictureName = '0';
					}
				
				
				$sql="SELECT user FROM user_list WHERE user='$user'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 0)
				{
					$sql="INSERT INTO user_list (
							user,				password,
							email,				country,
							number,				fullName,
							location,			prefered,
							userPictureName,	credibility,
							successfulTransactions	)
							VALUES (
							'$user',			'$password',
							'$email',			'$country',
							'$number',			'$fullName',
							'$location',		'$prefered',
							'$userPictureName',	'0',
							'0'	)";
					
					$status=mysqli_query($conn,$sql);
					$_SESSION['auth']=mysqli_escape_string($conn,$_POST["user"]);
					setrawcookie('auth',$user,0,'/');
					
					
					echo '1';
				}
				else 
				{
					echo 'failed-user exists';
				}
			}
			else
			{
										
				$sql="SELECT user FROM user_list WHERE user='$user'";
				$result = mysqli_query($conn, $sql);
				if (mysqli_num_rows($result) == 0)
				{
					$sql="INSERT INTO user_list (
							user,				password,
							email,				country,
							number,				fullName,
							location,			prefered,
							credibility,		successfulTransactions	)
							VALUES (
							'$user',			'$password',
							'$email',			'$country',
							'$number',			'$fullName',
							'$location',		'$prefered',
							'0',				'0'	)";
					
					$status=mysqli_query($conn,$sql);
					$_SESSION['auth']=mysqli_escape_string($conn,$_POST["user"]);
					setrawcookie('auth',$user,0,'/');
					echo '1';
				}
				else 
				{
					echo 'failed-user exists';
				}
			
			}
			break;
		}
		
		case 'publish1':
		{	
			$sql="INSERT INTO item_id (account) VALUES ('$account')";
			mysqli_query($conn,$sql);
			$item_id = mysqli_insert_id($conn);
			$_SESSION['item_id']=$item_id;
			
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
			$user=$_SESSION['auth'];
			$sql=" 	UPDATE user_list 
					SET number='$number',
						email = '$email',
						location='$location',
						other='$other',
						prefered='$prefered'
					WHERE user = '$user'";
						
			$status=mysqli_query($conn,$sql);
			
			break;
		}
		
		case 'publish1_edit':
		{	
			
			$sql="INSERT INTO item_id (account) VALUES ('$account')";
			mysqli_query($conn,$sql);
			$item_id = mysqli_insert_id($conn);
			$_SESSION['item_id']=$_COOKIE['edit_item_id'];
			
			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$location=mysqli_escape_string($conn,$_POST["location"]);
			$other=mysqli_escape_string($conn,$_POST["other"]);
			$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
			$user=$_SESSION['auth'];
			$sql=" 	UPDATE user_list 
					SET number='$number',
						email = '$email',
						location='$location',
						other='$other',
						prefered='$prefered'
					WHERE user = '$user'";
						
			$status=mysqli_query($conn,$sql);
			
			break;
		}
		
		case 'publish2':
		{
			$category=mysqli_escape_string($conn,$_POST["category"]);
			$name=mysqli_escape_string($conn,$_POST["name"]);
			$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
			$price=mysqli_escape_string($conn,$_POST["price"]);
			$description = mysqli_escape_string($conn,$_POST["description"]);
			$flightCarrier = mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$arrivalDate = mysqli_escape_string($conn,$_POST["arrivalDate"]);
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
					account,item_id,flightCarrier,flightNumber,arrivalDate,arrivalCountry
					)
					VALUES ('$category',
					'$name',
					'$specifications',
					'$price',
					'$description',
					'$itemPictureName',
					'$account',
					'$item_id',
					'$flightCarrier',
					'$flightNumber',
					'$arrivalDate',''
					)";
			$status=mysqli_query($conn,$sql);
			
			if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
			} else {
				echo "failed";
			}
			break;
		}
		
		case 'publish2_photo':
		{
			$account = $_SESSION['auth'];
			$uploaddir = '../airsale/items/';
			$result = mysqli_query($conn," SELECT itemPictureName2,itemPictureName3,itemPictureName4
											FROM publish2WHERE item_id='$item_id'");
			$row = mysqli_fetch_assoc($result);
			$itemPictureName2_del =$row['itemPictureName2'];
			$itemPictureName3_del =$row['itemPictureName3'];
			$itemPictureName4_del =$row['itemPictureName4'];
			
			if($_FILES['itemPicture2']['error']==0)
			{	
				unlink($uploaddir . $itemPictureName2_del); 
				$filename2=(string)rand() . basename($_FILES['itemPicture2']['name']);
				$uploadfile2 = $uploaddir . $filename2;
				$itemPictureName2 = mysqli_escape_string($conn,$filename2);
				$sql="UPDATE publish2
						SET itemPictureName2 = '$itemPictureName2'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if (move_uploaded_file($_FILES['itemPicture2']['tmp_name'], $uploadfile2)) {
				} else {
					echo "failed";
				}
			}
			
			if($_FILES['itemPicture3']['error']==0)
			{	
				unlink($uploaddir . $itemPictureName3_del); 
				$filename3=(string)rand() . basename($_FILES['itemPicture3']['name']);
				$uploadfile3 = $uploaddir . $filename3;
				$itemPictureName3 = mysqli_escape_string($conn,$filename3);
				$sql="UPDATE publish2
						SET itemPictureName3 = '$itemPictureName3'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if (move_uploaded_file($_FILES['itemPicture3']['tmp_name'], $uploadfile3)) {
				} else {
					echo "failed";
				}
			}
			
			
			if($_FILES['itemPicture4']['error']==0)
			{	
				unlink($uploaddir . $itemPictureName4_del); 
				$filename4=(string)rand() . basename($_FILES['itemPicture4']['name']);
				$uploadfile4 = $uploaddir . $filename4;
				$itemPictureName4 = mysqli_escape_string($conn,$filename4);
				$sql="UPDATE publish2
						SET itemPictureName4 = '$itemPictureName4'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if (move_uploaded_file($_FILES['itemPicture4']['tmp_name'], $uploadfile4)) {
				} else {
					echo "failed";
				}
			}
			
			break;
		}
		
		case 'publish2_edit':
		{
			$category=mysqli_escape_string($conn,$_POST["category"]);
			$name=mysqli_escape_string($conn,$_POST["name"]);
			$specifications=mysqli_escape_string($conn,$_POST["specifications"]);
			$price=mysqli_escape_string($conn,$_POST["price"]);
			$description = mysqli_escape_string($conn,$_POST["description"]);
			$flightCarrier = mysqli_escape_string($conn,$_POST["flightCarrier"]);
			$flightNumber = mysqli_escape_string($conn,$_POST["flightNumber"]);
			$arrivalDate = mysqli_escape_string($conn,$_POST["arrivalDate"]);
			$account = $_SESSION['auth'];
			$item_id = $_SESSION['item_id'];
			if($_POST['debug']) var_dump($_FILES);			
			if($_FILES['itemPicture']['error'] == 0)
			{	
			
				$sql = "SELECT itemPictureName FROM publish2 WHERE item_id='$item_id'";
				$result = mysqli_query($conn,$sql);
				$row = mysqli_fetch_assoc($result);
				$toBeDeleted_itemPictureName = $row['itemPictureName'];
				if(unlink('../airsale/items/'.$toBeDeleted_itemPictureName)) ;
				
				$uploaddir = '../airsale/items/';
				$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$itemPictureName = mysqli_escape_string($conn,$filename);
				$sql="UPDATE publish2 SET
						category 				= '$category',
						name					= '$name',
						specifications			= '$specifications',
						price					= '$price',
						description				= '$description',
						itemPictureName			= '$itemPictureName',
						flightCarrier			= '$flightCarrier',
						flightNumber			= '$flightNumber',
						arrivalDate				= '$arrivalDate'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);
				
				if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
				} else {
					echo "failed";
				}
			}
			else 
			{
				$sql="UPDATE publish2 SET
						category 				= '$category',
						name					= '$name',
						specifications			= '$specifications',
						price					= '$price',
						description				= '$description',
						flightCarrier			= '$flightCarrier',
						flightNumber			= '$flightNumber',
						arrivalDate				= '$arrivalDate'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);
				
			}
			break;
		}

		case 'explore':
		{
			$arr=array();
			$sql = "SELECT max(id) FROM item_id";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$max_id = $row['max(id)'];
			
			$sql = "SELECT min(id) FROM item_id";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$min_id = $row['min(id)'];
	if($_POST['debug']) var_dump($row,$min_id,$max_id);
			for($in=$min_id;  ($min_id<= $in) && ($in <= $max_id) ; $in++)
			{
				$sql = "SELECT 	publish2.category,			publish2.name,
								publish2.specifications,	publish2.price,
								publish2.description,		publish2.itemPictureName,
								publish2.itemPictureName2,	publish2.itemPictureName3,
								publish2.itemPictureName4,	publish2.flightCarrier,	
								publish2.flightNumber,		publish2.arrivalDate,	
								publish2.account,			publish2.item_id,
								
								user_list.number,			user_list.email,
								user_list.location,			user_list.other,
								user_list.prefered		
								
								
						FROM	publish2
						INNER JOIN user_list ON publish2.account = user_list.user
						WHERE publish2.item_id = '$in'
						";
				$result = mysqli_query($conn, $sql);
		if($_POST['debug']) var_dump($result);
				if (mysqli_num_rows($result) > 0) 
				{
					
					while($row = mysqli_fetch_assoc($result)) 
					{
						{
						$arr[] = array(
						'item_id'=>$in,	
						'result'=>array( 
			'flightCarrier'=>$row['flightCarrier'],			'flightNumber'=>$row['flightNumber'],
			'account'=>$row['account'],						'item_id'=>$row['item_id'],		
							
			'category'=>$row['category'],					'name'=>$row['name'],
			'specifications'=>$row['specifications'],		'price'=>$row['price'],
			'description'=>$row['description'],				'itemPictureName'=>$row['itemPictureName'],
			'itemPictureName2'=>$row['itemPictureName2'],	'itemPictureName3'=>$row['itemPictureName3'],
			'itemPictureName4'=>$row['itemPictureName4'],	'arrivalDate'=>$row['arrivalDate'],
			
			'number'=>$row['number'],					'email'=>$row['email'],
			'location'=>$row['location'],				'other'=>$row['other'],
			'prefered'=>$row['prefered'] ));
			
				//		echo json_encode($arr_temp);
				if($_POST['debug']) var_dump($row,$arr,$min_id,$max_id,$in);
						}//if account==auth
					}//while
				}//if
			}//for
			if($_POST['debug']) echo '--before echo arr=---';
			if($_POST['debug']) var_dump($arr);
			echo json_encode($arr);
			break;
		}//case
		
		case 'seller_history':
		{
			$arr=array();
			$sql = "SELECT max(id) FROM item_id";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$max_id = $row['max(id)'];
			
			$sql = "SELECT min(id) FROM item_id";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$min_id = $row['min(id)'];
	if($_POST['debug']) var_dump($row,$min_id,$max_id);
			for($in=$min_id;  ($min_id<= $in) && ($in <= $max_id) ; $in++)
			{
				$sql = "SELECT 	publish2.category,			publish2.name,
								publish2.specifications,	publish2.price,
								publish2.description,		publish2.itemPictureName,
								publish2.itemPictureName2,	publish2.itemPictureName3,
								publish2.itemPictureName4,	publish2.flightCarrier,	
								publish2.flightNumber,		publish2.arrivalDate,	
								publish2.account,			publish2.item_id,
								
								user_list.number,			user_list.email,
								user_list.location,			user_list.other,
								user_list.prefered		
								
								
						FROM	publish2
						INNER JOIN user_list ON publish2.account = user_list.user
						WHERE publish2.item_id = '$in'
						";
				$result = mysqli_query($conn, $sql);
		if($_POST['debug']) var_dump($result);
				if (mysqli_num_rows($result) > 0) 
				{
					
					while($row = mysqli_fetch_assoc($result)) 
					{
						if($row['account']==$_SESSION['auth'])
						{
						$arr[] = array(
						'item_id'=>$in,	
						'result'=>array( 
			'flightCarrier'=>$row['flightCarrier'],			'flightNumber'=>$row['flightNumber'],
			'account'=>$row['account'],						'item_id'=>$row['item_id'],		
							
			'category'=>$row['category'],					'name'=>$row['name'],
			'specifications'=>$row['specifications'],		'price'=>$row['price'],
			'description'=>$row['description'],				'itemPictureName'=>$row['itemPictureName'],
			'itemPictureName2'=>$row['itemPictureName2'],	'itemPictureName3'=>$row['itemPictureName3'],
			'itemPictureName4'=>$row['itemPictureName4'],	'arrivalDate'=>$row['arrivalDate'],
			
			'number'=>$row['number'],					'email'=>$row['email'],
			'location'=>$row['location'],				'other'=>$row['other'],
			'prefered'=>$row['prefered'] ));
			
				//		echo json_encode($arr_temp);
				if($_POST['debug']) var_dump($row,$arr,$min_id,$max_id,$in);
						}//if account==auth
					}//while
				}//if
			}//for
			if($_POST['debug']) echo '--before echo arr=---';
			if($_POST['debug']) var_dump($arr);
			echo json_encode($arr);
			break;
		}//case
		
		case 'profile_update':
		{
			$user = $_SESSION['auth'];
			if($_POST['password'] != '')
			{
				if($_FILES['userPicture']['error'] == 0)
				{	
					$sql = "SELECT userPictureName FROM user_list WHERE user='$user'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($result);
					$toBeDeleted_userPicture = $row['userPictureName'];
					if(unlink('../airsale/users/'.$toBeDeleted_userPicture)) ;
					
					$uploaddir = '../airsale/users/';	
					$filename=(string)rand().basename($_FILES['userPicture']['name']);
					$uploadfile = $uploaddir . $filename;
					if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
							echo "1";
							$userPictureName = mysqli_escape_string($conn,$filename);
						} else {
							echo "upload failed";
							$userPictureName = '0';
						}
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$password=mysqli_escape_string($conn,$_POST["password"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$sql=" 	UPDATE user_list 
							SET password='$password',
								number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName',
								userPictureName='$userPictureName'
							WHERE user = '$user'";
				}
				
				else
				{
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$password=mysqli_escape_string($conn,$_POST["password"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$sql=" 	UPDATE user_list 
							SET password='$password',
								number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName'
							WHERE user = '$user'";
					
				}
			}
			else
			{
				if($_FILES['userPicture']['error'] == 0)
				{	
					$sql = "SELECT userPictureName FROM user_list WHERE user='$user'";
					$result = mysqli_query($conn,$sql);
					$row = mysqli_fetch_assoc($result);
					$toBeDeleted_userPicture = $row['userPictureName'];
					if(unlink('../airsale/users/'.$toBeDeleted_userPicture)) ;
					
					$uploaddir = '../airsale/users/';	
					$filename=(string)rand().basename($_FILES['userPicture']['name']);
					$uploadfile = $uploaddir . $filename;
					if (move_uploaded_file($_FILES['userPicture']['tmp_name'], $uploadfile)) {
							echo "1";
							$userPictureName = mysqli_escape_string($conn,$filename);
						} else {
							echo "upload failed";
							$userPictureName = '0';
						}
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$sql=" 	UPDATE user_list 
							SET number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName',
								userPictureName='$userPictureName'
							WHERE user = '$user'";
				}
				else
				{
					$email=mysqli_escape_string($conn,$_POST["email"]);
					$country=mysqli_escape_string($conn,$_POST["country"]);
					$number=mysqli_escape_string($conn,$_POST["number"]);
					$location=mysqli_escape_string($conn,$_POST["location"]);
					$other=mysqli_escape_string($conn,$_POST["other"]);
					$prefered=mysqli_escape_string($conn,$_POST["prefered"]);
					$fullName=mysqli_escape_string($conn,$_POST["fullName"]);
					$user=$_SESSION['auth'];
					$sql=" 	UPDATE user_list 
							SET number='$number',
								email = '$email',
								country='$country',
								location='$location',
								other='$other',
								prefered='$prefered',
								fullName='$fullName'
							WHERE user = '$user'";
				}
				
			}
			mysqli_query($conn,$sql);
			echo '1';
			break;
		}
		
		case 'user_profile':
		{
			session_start();
			$servername = "mysql.hostinger.co.uk";
			$username = "u979434920_asale";
			$password = "_MYsql";
			$db = "u979434920_asale";
			$conn = mysqli_connect($servername, $username, $password,$db);
			$user=$_SESSION['auth'];
			$mysql = "SELECT user,email,country,id,number,other,prefered,location, fullName,
			identityValidation,credibility,successfulTransactions FROM user_list WHERE user='$user' ";
			$result = mysqli_query($conn,$mysql);
			$row=mysqli_fetch_assoc($result);
			echo json_encode( array('user'=>$row['user'],
									'email'=>$row['email'],
									'number'=>$row['number'],
									'country'=>$row['country'],
									'location'=>$row['location'],
									'other'=>$row['other'],
									'prefered'=>$row['prefered'],
									'identityValidation'=>$row['identityValidation'],
									'credibility'=>$row['credibility'],
									'successfulTransactions'=>$row['successfulTransactions'],
									'fullName'=>$row['fullName'],
									'id'=>$row['id']
									));
			break;		
		}
		
		case 'itemAtSession_ItemID':
		{
			$arr=array();
			$item_id = $_SESSION['item_id'];
				$sql = "SELECT 	publish2.category,			publish2.name,
								publish2.specifications,	publish2.price,
								publish2.description,		publish2.itemPictureName,
								publish2.itemPictureName2,	publish2.itemPictureName3,
								publish2.itemPictureName4,	publish2.flightCarrier,	
								publish2.flightNumber,		publish2.arrivalDate,	
								publish2.account,			publish2.item_id,
								
								user_list.number,			user_list.email,
								user_list.location,			user_list.other,
								user_list.prefered		
								
								
						FROM	publish2
						INNER JOIN user_list ON publish2.account = user_list.user
						WHERE publish2.item_id = '$item_id'
						";
				$result = mysqli_query($conn, $sql);
		if($_POST['debug']) var_dump($result);
				if (mysqli_num_rows($result) > 0) 
				{
					
					while($row = mysqli_fetch_assoc($result)) 
					{
						{
						$arr = array( 
			'flightCarrier'=>$row['flightCarrier'],			'flightNumber'=>$row['flightNumber'],
			'account'=>$row['account'],						'item_id'=>$row['item_id'],		
							
			'category'=>$row['category'],					'name'=>$row['name'],
			'specifications'=>$row['specifications'],		'price'=>$row['price'],
			'description'=>$row['description'],				'itemPictureName'=>$row['itemPictureName'],
			'itemPictureName2'=>$row['itemPictureName2'],	'itemPictureName3'=>$row['itemPictureName3'],
			'itemPictureName4'=>$row['itemPictureName4'],	'arrivalDate'=>$row['arrivalDate'],
			
			'number'=>$row['number'],					'email'=>$row['email'],
			'location'=>$row['location'],				'other'=>$row['other'],
			'prefered'=>$row['prefered'] );
			
				//		echo json_encode($arr_temp);
				if($_POST['debug']) var_dump($row,$arr,$min_id,$max_id,$in);
						}//if account==auth
					}//while
				}//if
			if($_POST['debug']) echo '--before echo arr=---';
			if($_POST['debug']) var_dump($arr);
			echo json_encode($arr);
			break;
		}//case
		
		case 'setSession(item_id)viaCookie(setItemID)':
		{
			$_SESSION['item_id'] = $_COOKIE['setItemID'];
			break;
		}
		
		case 'session':
		{
			echo json_encode($_SESSION);
		}
		
	}//switch
}
?>