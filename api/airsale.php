<?php
header('Access-Control-Allow-Credentials:true');
/*
© 2015 LALX Singapore programmed by Li Xi together with Huey Lee
Access URL: airsale.lalx.org/api/airsale
Home location: /home/u979434920/public_html/
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
function getCarrierFullName($AirlineCode)
{
	$airlines=json_decode(file_get_contents('./airlines.json'),true);
	foreach($airlines["airlines"] as $index => $value)
	{
		if($value["iata"] == $AirlineCode) $AirlineCode_index = $index;
		if($value["fs"] == $AirlineCode) $AirlineCode_index = $index;
	}
	$AirlineFullName=$airlines["airlines"][$AirlineCode_index]["name"];
	if($_POST['debug']) var_dump($AirlineCode,$AirlineCode_index,$AirlineFullName);
	if($AirlineCode_index != NULL)  return $AirlineFullName;
	else return false;
}


if($_POST['mobile'] != 1 && $_POST['concise'] != 1 && $_POST['JSON'] != 1 && $_POST['admin']!='1')
{
	if($_POST['action']!= 'signup' && $_POST['action']!= 'login') if($_SESSION['auth']=='')
	echo '<script>location.replace(\'../login_failed\')</script>';
	echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';

	switch($_POST['action'])
	{
		case 'login':
		{

			$UI_user=$_POST['user'];
			$UI_password = $_POST['password'];
			$sql = "SELECT user,password FROM user_list WHERE password='$UI_password' AND user='$UI_user'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
				//	var_dump($row);
				//	echo $row['user'] == $UI_user;
				//	die();
					if($row['user'] == $UI_user)
					{
					$_SESSION['auth']=$row['user'];
					setrawcookie('auth',($row['user']),0,'/');
					echo '<script>location.replace(\'../airsale/home\')</script>';
					}
					else {
					$_SESSION['auth']='';
					echo '<script>location.replace(\'../login_failed\')</script>';
					}

			}
			else {
				$_SESSION['auth']='';
				echo '<script>location.replace(\'../login_failed\')</script>';
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


					echo '<script>location.replace(\'../airsale/home\')</script>';
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
					echo '<script>location.replace(\'../airsale/home\')</script>';
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
			$account=$_SESSION['auth'];
			$sql="INSERT INTO item_id (account) VALUES ('$account')";
			mysqli_query($conn,$sql);
			$item_id = mysqli_insert_id($conn);
			$_SESSION['item_id']=$item_id;


			$number=mysqli_escape_string($conn,$_POST["number"]);
			$email=mysqli_escape_string($conn,$_POST["email"]);
			$_SESSION['user_email']=$email;
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

			echo '<script>location.replace(\'../airsale/publish2\')</script>';break;
		}

		case 'publish1_edit':
		{

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

			echo '<script>location.replace(\'../airsale/publish2_edit\')</script>';break;
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
			$flightCarrierFullName = mysqli_escape_string($conn,getCarrierFullName($flightCarrier));
			$account = $_SESSION['auth'];

			if(!empty($_FILES['itemPicture']))
			{
				$uploaddir = '../airsale/items/';
				$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$itemPictureName = mysqli_escape_string($conn,$filename);
			}

			$sql="INSERT INTO publish2 (
					category,					name,
					specifications,				price,
					description,				itemPictureName,
					account,					item_id,
					flightCarrier,				flightNumber,
					arrivalDate,				arrivalCountry,
					flightCarrierFullName
					)
					VALUES (
					'$category',				'$name',
					'$specifications',			'$price',
					'$description',				'$itemPictureName',
					'$account',					'$item_id',
					'$flightCarrier',			'$flightNumber',
					'$arrivalDate',				'',
					'$flightCarrierFullName'
					)";
			$status=mysqli_query($conn,$sql);

			if ($_FILES["itemPicture"]["size"] > 8000000) {
				die("Sorry, your file is too large. Please go back to upload your file again.");
			}

			if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
				if($_POST['debug'])
				echo "File is valid, and was successfully uploaded.\n";
			} else {
				if($_POST['debug'])
				echo "Possible file upload attack!\n";
			}
            if($_POST['debug']) die( var_dump($_FILES));
			echo '<script>location.replace(\'../airsale/publish3\')</script>';break;
		}

		case 'publish3':
		{
			//inform user for the acknowledgement
			$subject = 'AirSale Acknowledgement: New item created';
			$name = $_SESSION['auth'];
			$email = $_SESSION['user_email'];
				$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
				'Dear '.$name .", \n".
				"Thank you very much for using AirSale. \n".
				"This is to confirm that your new item has been successfully created. It will now be sent for approval by the administrators. This is to verify the existence of the flight that you have entered. Please do note that the format of the flight carrier and flight number MUST BE strictly followed in order for your new item to be approved. You will be notified from this email address once your item is approved\nThank you for choosing us and we wish you the best of luck. \n \n".
				"Yours sincerely,\n AirSale Team \n".
				"\n-----------------\n".
				"\nReply to lixi@lalx.org or goto airsale.lalx.org/contact for any enquiries \n".
				"\n-----------------\n".
				"If you did not create the item at AirSale, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
			mail($email,$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");

			//inform admin
			$subject = 'AirSale Notification: New item created by user';
				$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
				"Dear Admin, \n".
				"A new item has been created by user. Please approve/reject it accordingly. Thank you very much.\n \n".
				"Yours sincerely,\n AirSale Team \n".
				"\n-----------------\n".
				"\nReply to lixi@lalx.org or goto airsale.lalx.org/contact for any enquiries \n".
				"\n-----------------\n".
				"If you did not create this item, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
			mail('lieinsteinxi@gmail.com',$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");

			echo '<script>alert("The item is sucessfully created. It will be seen by all users at the I am a buyer-> explore tab once it is APPROVED. You can edit the information at I am a seller -> Posted items page. "); location.replace(\'../airsale/home\')</script>';break;
		}

		case 'publish3_edit':
		{
			//inform admin
			$subject = 'AirSale Notification: Item updated by user';
				$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
				"Dear Admin, \n".
				"An item was edited by user. Please approve/reject it accordingly. Thank you very much.\n \n".
				"Yours sincerely,\n AirSale Team \n".
				"\n-----------------\n".
				"\nReply to lixi@lalx.org or goto airsale.lalx.org/contact for any enquiries \n".
				"\n-----------------\n".
				"If you did not submit this enquiry, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
			mail('lieinsteinxi@gmail.com',$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");

			echo '<script>alert("The item is sucessfully updated. It will be seen by all users at the I am a buyer-> explore tab once it is APPROVED. You can edit the information at I am a seller -> Posted items page. "); location.replace(\'../airsale/home\')</script>';break;
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
					if($_POST['debug'])
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					if($_POST['debug'])
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
					if($_POST['debug'])
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					if($_POST['debug'])
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
					if($_POST['debug'])
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					if($_POST['debug'])
					echo "Possible file upload attack!\n";
				}
			}

			echo '<script>location.replace(\'../airsale/publish3\')</script>';break;
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
			$flightCarrierFullName = mysqli_escape_string($conn,getCarrierFullName($flightCarrier));
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
						isApproved				= '0',
						arrivalDate				= '$arrivalDate',
						flightCarrierFullName	= '$flightCarrierFullName'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);
				if ($_FILES["itemPicture"]["size"] > 8000000) {
					die("Sorry, your file is too large. Please go back to upload your file again.");
				}

				if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
					if($_POST['debug'])
					echo "File is valid, and was successfully uploaded.\n";
				} else {
					if($_POST['debug'])
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
						isApproved				= '0',
						arrivalDate				= '$arrivalDate',
						flightCarrierFullName	= '$flightCarrierFullName'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);

			}
			echo '<script>location.replace(\'../airsale/publish3_edit\')</script>';break;
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
			echo '<script> alert("Your profile is successfully updated");location.replace("../airsale/profile");</script>';
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
			if($_POST['debug']){
			if($status) echo "...Data stored...";
			else die("...Data not stored...Error:" .mysqli_error($conn));
			}

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
			echo "<script>alert('Your enquiry has been recorded. You should have received an acknowledgement email from us. We will get back to you shortly. Thank you for choosing AirSale.');location.replace('/index');</script>";break;
		}
	}
}

if($_POST['mobile'] == 1 || $_POST['concise']== 1 || $_POST['JSON']== 1 && $_POST['admin']!='1')
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
			$account=$_SESSION['auth'];
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
			$flightCarrierFullName = mysqli_escape_string($conn,getCarrierFullName($flightCarrier));
			$account = $_SESSION['auth'];

			if(!empty($_FILES['itemPicture']))
			{
				$uploaddir = '../airsale/items/';
				$filename=(string)rand() . basename($_FILES['itemPicture']['name']);
				$uploadfile = $uploaddir . $filename;
				$itemPictureName = mysqli_escape_string($conn,$filename);
			}

			$sql="INSERT INTO publish2 (
					category,					name,
					specifications,				price,
					description,				itemPictureName,
					account,					item_id,
					flightCarrier,				flightNumber,
					arrivalDate,				arrivalCountry,
					flightCarrierFullName
					)
					VALUES (
					'$category',				'$name',
					'$specifications',			'$price',
					'$description',				'$itemPictureName',
					'$account',					'$item_id',
					'$flightCarrier',			'$flightNumber',
					'$arrivalDate',				'',
					'$flightCarrierFullName'
					)";
			$status=mysqli_query($conn,$sql);

			if (move_uploaded_file($_FILES['itemPicture']['tmp_name'], $uploadfile)) {
			} else {
				echo "failed";
			}
            if($_POST['debug']) var_dump($status,$_FILES,$_POST);

            if($_FILES['itemPicture2']['error']==0)
            {
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
			$flightCarrierFullName = mysqli_escape_string($conn,getCarrierFullName($flightCarrier));
			$account = $_SESSION['auth'];
			$item_id = $_SESSION['item_id'];

            $result = mysqli_query($conn," SELECT itemPictureName2,itemPictureName3,itemPictureName4
                                            FROM publish2WHERE item_id='$item_id'");
            $row = mysqli_fetch_assoc($result);
            $itemPictureName2_del =$row['itemPictureName2'];
            $itemPictureName3_del =$row['itemPictureName3'];
            $itemPictureName4_del =$row['itemPictureName4'];

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
						isApproved				= '0',
						arrivalDate				= '$arrivalDate',
						flightCarrierFullName	= '$flightCarrierFullName'
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
						isApproved				= '0',
						arrivalDate				= '$arrivalDate',
						flightCarrierFullName	= '$flightCarrierFullName'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);

			}

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

		case 'explore':
		{
			$arr=array();
			$sql = "SELECT max(item_id) FROM publish2";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$max_id = $row['max(item_id)'];

			$sql = "SELECT min(item_id) FROM publish2";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$min_id = $row['min(item_id)'];
	if($_POST['debug']) var_dump($row,$min_id,$max_id);
			for($in=$min_id;  ($min_id<= $in) && ($in <= $max_id) ; $in++)
			{
				$sql = "SELECT 	publish2.category,			publish2.name,
								publish2.specifications,	publish2.price,
								publish2.description,		publish2.itemPictureName,
								publish2.itemPictureName2,	publish2.itemPictureName3,
								publish2.itemPictureName4,	publish2.flightCarrier,
								publish2.flightNumber,		publish2.arrivalDate,
								publish2.arrivalCountry,	publish2.flightFileName,
								publish2.arrivalAirport,	publish2.arrivalCode,
								publish2.departureCountry,	publish2.departureAirport,
								publish2.departureCode,		publish2.flightCarrierFullName,
								publish2.account,

								publish2.account,			publish2.item_id,
								publish2.isApproved,

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
			'arrivalCountry'=>$row['arrivalCountry'],		'flightFileName'=>$row['flightFileName'],
			'arrivalAirport'=>$row['arrivalAirport'],		'arrivalCode'=>$row['arrivalCode'],
			'departureCountry'=>$row['departureCountry'],	'departureAirport'=>$row['departureAirport'],
			'departureCode'=>$row['departureCode'],
			'flightCarrierFullName'=>$row['flightCarrierFullName'],


			'account'=>$row['account'],						'item_id'=>$row['item_id'],
			'category'=>$row['category'],					'name'=>$row['name'],
			'specifications'=>$row['specifications'],		'price'=>$row['price'],
			'description'=>$row['description'],				'itemPictureName'=>$row['itemPictureName'],
			'itemPictureName2'=>$row['itemPictureName2'],	'itemPictureName3'=>$row['itemPictureName3'],
			'itemPictureName4'=>$row['itemPictureName4'],	'arrivalDate'=>$row['arrivalDate'],
			'isApproved'=>$row['isApproved'],

			'number'=>$row['number'],					'email'=>$row['email'],
			'location'=>$row['location'],				'other'=>$row['other'],
			'prefered'=>$row['prefered'],				'account'=>$row['account']
			 ));

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
			$sql = "SELECT max(item_id) FROM publish2";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$max_id = $row['max(item_id)'];

			$sql = "SELECT min(item_id) FROM publish2";
			$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));
			$min_id = $row['min(item_id)'];
	if($_POST['debug']) var_dump($row,$min_id,$max_id);
			for($in=$min_id;  ($min_id<= $in) && ($in <= $max_id) ; $in++)
			{
				$sql = "SELECT 	publish2.category,			publish2.name,
								publish2.specifications,	publish2.price,
								publish2.description,		publish2.itemPictureName,
								publish2.itemPictureName2,	publish2.itemPictureName3,
								publish2.itemPictureName4,	publish2.flightCarrier,
								publish2.flightNumber,		publish2.arrivalDate,
								publish2.arrivalCountry,	publish2.flightFileName,
								publish2.arrivalAirport,	publish2.arrivalCode,
								publish2.departureCountry,	publish2.departureAirport,
								publish2.departureCode,		publish2.flightCarrierFullName,
								publish2.account,

								publish2.account,			publish2.item_id,
								publish2.isApproved,

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
			'arrivalCountry'=>$row['arrivalCountry'],		'flightFileName'=>$row['flightFileName'],
			'arrivalAirport'=>$row['arrivalAirport'],		'arrivalCode'=>$row['arrivalCode'],
			'departureCountry'=>$row['departureCountry'],	'departureAirport'=>$row['departureAirport'],
			'departureCode'=>$row['departureCode'],
			'flightCarrierFullName'=>$row['flightCarrierFullName'],


			'account'=>$row['account'],						'item_id'=>$row['item_id'],
			'category'=>$row['category'],					'name'=>$row['name'],
			'specifications'=>$row['specifications'],		'price'=>$row['price'],
			'description'=>$row['description'],				'itemPictureName'=>$row['itemPictureName'],
			'itemPictureName2'=>$row['itemPictureName2'],	'itemPictureName3'=>$row['itemPictureName3'],
			'itemPictureName4'=>$row['itemPictureName4'],	'arrivalDate'=>$row['arrivalDate'],
			'isApproved'=>$row['isApproved'],

			'number'=>$row['number'],					'email'=>$row['email'],
			'location'=>$row['location'],				'other'=>$row['other'],
			'prefered'=>$row['prefered']));

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
								publish2.arrivalCountry,	publish2.flightFileName,
								publish2.arrivalAirport,	publish2.arrivalCode,
								publish2.departureCountry,	publish2.departureAirport,
								publish2.departureCode,		publish2.flightCarrierFullName,

								publish2.account,			publish2.item_id,
								publish2.isApproved,

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
			'arrivalCountry'=>$row['arrivalCountry'],		'flightFileName'=>$row['flightFileName'],
			'arrivalAirport'=>$row['arrivalAirport'],		'arrivalCode'=>$row['arrivalCode'],
			'departureCountry'=>$row['departureCountry'],	'departureAirport'=>$row['departureAirport'],
			'departureCode'=>$row['departureCode'],
			'flightCarrierFullName'=>$row['flightCarrierFullName'],


			'account'=>$row['account'],						'item_id'=>$row['item_id'],
			'category'=>$row['category'],					'name'=>$row['name'],
			'specifications'=>$row['specifications'],		'price'=>$row['price'],
			'description'=>$row['description'],				'itemPictureName'=>$row['itemPictureName'],
			'itemPictureName2'=>$row['itemPictureName2'],	'itemPictureName3'=>$row['itemPictureName3'],
			'itemPictureName4'=>$row['itemPictureName4'],	'arrivalDate'=>$row['arrivalDate'],
			'isApproved'=>$row['isApproved'],

			'number'=>$row['number'],					'email'=>$row['email'],
			'location'=>$row['location'],				'other'=>$row['other'],
			'prefered'=>$row['prefered']);

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

		case 'getFlightInfo':
		{
			$arrivalDate = str_replace('-','/',$_POST['arrivalDate']);
			$flightCarrier = str_replace(' ','',$_POST['flightCarrier']);
			$flightNumber = str_replace(' ','',$_POST['flightNumber']);
			if(getCarrierFullName($flightCarrier)==false) die("0");
	//		$service_url = 'https://api.flightstats.com/flex/schedules/rest/v1/json/flight/'.'MI/962'.'/arriving/'.'2015/04/08'.'?appId=dc456bc3&appKey=3542b23c356d38afa9f190be3306477c';
	$service_url = 'https://api.flightstats.com/flex/schedules/rest/v1/json/flight/'.$flightCarrier.'/'.$flightNumber.'/arriving/'.$arrivalDate.'?appId=dc456bc3&appKey=3542b23c356d38afa9f190be3306477c';
			$curl = curl_init($service_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			if($_POST['debug'])echo ' sending api request. ';
			$curl_response = curl_exec($curl);		//already JSON encoded
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				echo 0;
			}
			else
			{
				file_put_contents('../flightData/'.$flightCarrier.$flightNumber.'_arriving_'.str_replace('-','_',$_POST['arrivalDate']),$curl_response);
			}
			curl_close($curl);
			echo $curl_response;
			break;
		}

		case 'getFlightInfoAndInjectIntoSQLforItemWhereID=Post(item_id)':
		{
			$item_id = $_POST['item_id'];	//ONLY PARAMETER NEEDED
			$sql="SELECT arrivalDate,flightCarrier,flightNumber FROM publish2 WHERE item_id='$item_id'";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);

			$arrivalDate = str_replace('-','/',$row['arrivalDate']);
			$flightCarrier = str_replace(' ','',$row['flightCarrier']);
			if(getCarrierFullName($flightCarrier)==false) die("0");
			$flightNumber = str_replace(' ','',$row['flightNumber']);
			if($flightNumber!= NULL)
			$flightFileName = $flightCarrier.$flightNumber.'_arriving_'.str_replace('-','_',$_POST['arrivalDate']);

	//		$service_url = 'https://api.flightstats.com/flex/schedules/rest/v1/json/flight/'.'MI/962'.'/arriving/'.'2015/04/08'.'?appId=dc456bc3&appKey=3542b23c356d38afa9f190be3306477c';
	$service_url = 'https://api.flightstats.com/flex/schedules/rest/v1/json/flight/'.$flightCarrier.'/'.$flightNumber.'/arriving/'.$arrivalDate.'?appId=dc456bc3&appKey=3542b23c356d38afa9f190be3306477c';
			$curl = curl_init($service_url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
			$curl_response = curl_exec($curl);		//already JSON encoded
			if($_POST['debug'])echo ' sending api request. ';
			if ($curl_response === false) {
				$info = curl_getinfo($curl);
				curl_close($curl);
				echo '0';
			}
			else
			{
				if($flightNumber!= NULL)
				file_put_contents('../flightData/'.$flightFileName,$curl_response);

				$JResult=json_decode($curl_response,true);
				if($_POST['debug'])var_dump($curl_response,$JResult);
				$arrivalCountry = mysqli_escape_string($conn, $JResult["appendix"]["airports"][1]["countryName"]);
				$arrivalAirport = mysqli_escape_string($conn,$JResult["appendix"]["airports"][1]["name"]);
				$arrivalCode	= mysqli_escape_string($conn,$JResult["appendix"]["airports"][1]["cityCode"]);
				$departureCountry 	= mysqli_escape_string($conn,$JResult["appendix"]["airports"][0]["countryName"]);
				$departureAirport 	= mysqli_escape_string($conn,$JResult["appendix"]["airports"][0]["name"]);
				$departureCode		= mysqli_escape_string($conn,$JResult["appendix"]["airports"][0]["cityCode"]);

				$sql = "UPDATE publish2 SET
						arrivalCountry='$arrivalCountry',arrivalAirport='$arrivalAirport',
						arrivalCode='$arrivalCode',
						departureCountry='$departureCountry',departureAirport='$departureAirport',
						departureCode='$departureCode'
						WHERE item_id='$item_id'";
				$status=mysqli_query($conn,$sql);
				if($status!= NULL) echo '1';
			}
			curl_close($curl);
			break;
		}

		case 'getFlightInfoFromFile':
		{
			$arrivalDate = str_replace('-','/',$_POST['arrivalDate']);
			$flightCarrier = str_replace(' ','',$_POST['flightCarrier']);
			$flightNumber = str_replace(' ','',$_POST['flightNumber']);
			$file_location = '../flightData/'.$flightCarrier.$flightNumber.'_arriving_'.str_replace('-','_',$_POST['arrivalDate']);
			if(file_exists($file_location)) echo file_get_contents($file_location); //Already JSON encoded
			else echo '0';
			break;
		}

		case 'getFlightInfoFromFileforItemWhereID=Post(item_id)':
		{
			$item_id = $_POST['item_id'];	//ONLY PARAMETER NEEDED
			$sql="SELECT arrivalDate,flightCarrier,flightNumber FROM publish2 WHERE item_id='$item_id'";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);

			$arrivalDate = str_replace('-','/',$row['arrivalDate']);
			$flightCarrier = str_replace(' ','',$row['flightCarrier']);
			$flightNumber = str_replace(' ','',$row['flightNumber']);
			if($flightNumber!= NULL)
			$flightFileName = $flightCarrier.$flightNumber.'_arriving_'.str_replace('-','_',$_POST['arrivalDate']);
			$file_location = '../flightData/'.$flightFileName;
			if(file_exists($file_location)) echo file_get_contents($file_location); //Already JSON encoded
			else echo '0';
			break;
		}

		case 'getFlightInfoFromFileAndInjectIntoSQLforItemWhereID=Post(item_id)':
		{
			$item_id = $_POST['item_id'];	//ONLY PARAMETER NEEDED
			$sql="SELECT arrivalDate,flightCarrier,flightNumber FROM publish2 WHERE item_id='$item_id'";
			$result=mysqli_query($conn,$sql);
			$row = mysqli_fetch_assoc($result);

			$arrivalDate = str_replace('-','/',$row['arrivalDate']);
			$flightCarrier = str_replace(' ','',$row['flightCarrier']);
			$flightNumber = str_replace(' ','',$row['flightNumber']);
			if($flightNumber!= NULL)
			$flightFileName = $flightCarrier.$flightNumber.'_arriving_'.str_replace('-','_',$_POST['arrivalDate']);
			$file_location = '../flightData/'.$flightFileName;
			if(file_exists($file_location))
			{
				$JResult = json_decode( file_get_contents($file_location),true);
				if($_POST['debug'])var_dump($JResult);
				$arrivalCountry = mysqli_escape_string($conn, $JResult["appendix"]["airports"][1]["countryName"]);
				$arrivalAirport = mysqli_escape_string($conn,$JResult["appendix"]["airports"][1]["name"]);
				$arrivalCode	= mysqli_escape_string($conn,$JResult["appendix"]["airports"][1]["cityCode"]);
				$departureCountry 	= mysqli_escape_string($conn,$JResult["appendix"]["airports"][0]["countryName"]);
				$departureAirport 	= mysqli_escape_string($conn,$JResult["appendix"]["airports"][0]["name"]);
				$departureCode		= mysqli_escape_string($conn,$JResult["appendix"]["airports"][0]["cityCode"]);
				if($_POST['debug'])var_dump($arrivalAirport);
				$sql = "UPDATE publish2 SET
						arrivalCountry='$arrivalCountry',arrivalAirport='$arrivalAirport',
						arrivalCode='$arrivalCode',
						departureCountry='$departureCountry',departureAirport='$departureAirport',
						departureCode='$departureCode'
						WHERE item_id='$item_id'
						";
				$status=mysqli_query($conn,$sql);
				if($status) echo '1';
				if($_POST['debug'])var_dump($status,$item_id,$_COOKIE,$sql,$conn);
			}
			else echo '0';
			break;
		}

		case 'session':
		{
			echo json_encode($_SESSION);
			break;
		}

		case 'getCarrierFullName':
		{
			$AirlineCode=$_POST['flightCarrier'];
			if(file_exists('./airlines.json'))
			{
				$airlines=json_decode(file_get_contents('./airlines.json'),true);
				foreach($airlines["airlines"] as $index => $value)
				{
					if($value["fs"] == $AirlineCode) $AirlineCode_index = $index;
					if($value["iata"] == $AirlineCode) $AirlineCode_index = $index;
				}
				$AirlineFullName=$airlines["airlines"][$AirlineCode_index]["name"];
				if($AirlineCode_index != NULL)
				echo json_encode($AirlineFullName);
				else echo 0;
			}

			break;
		}

		case 'getAllAirlines':
		{
			if(file_exists('./airlines.json'))
			{
				echo file_get_contents('./airlines.json');
			}
			else echo 0;
			break;
		}

		case 'getUserCredibilityWithAccount':
		{
			$account = $_POST['account'];
			$sql = "SELECT credibility, user FROM user_list WHERE user='$account'";
			$row = mysqli_fetch_assoc( mysqli_query($conn,$sql));
			$CredibilityResult = array(
					'user' => $row['user'],	'credibility' => $row['credibility']		);
			echo json_encode($CredibilityResult);
			break;
		}

		case 'getUserCredibility':
		{
			$account = $_POST['account'];
			$sql = "SELECT credibility, user FROM user_list";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result) )
			$CredibilityResult[] = array(
					'user' => $row['user'],	'credibility' => $row['credibility']		);
			echo json_encode($CredibilityResult);
			break;
		}

		case 'getFeedback':
		{
			$sql = "SELECT id,name,email,number,comment FROM contact";
			$result = mysqli_query($conn,$sql);
			while($row = mysqli_fetch_assoc($result) )
			$FeedbackResult[] = array(
					'id' => $row['id'],	'name' => $row['name'],
					'email' => $row['email'],	'number' => $row['number'],
					'comment' => $row['comment']		);
			echo json_encode($FeedbackResult);
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
			if($_POST['debug']){
			if($status) echo "...Data stored...";
			else die("...Data not stored...Error:" .mysqli_error($conn));
			}

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
			echo "1";break;
		}

	}//switch
}

if($_POST['admin']=='1')
{
	if($_POST['action']!= 'admin_login') if($_SESSION['admin_auth']=='')
	echo '<script>location.replace(\'../login_failed\')</script>';

	switch($_POST['action'])
	{
		case 'admin_login':
		{
			session_start();
			$UI_user=$_POST['user'];
			$UI_password = $_POST['password'];
			$sql = "SELECT user,password FROM admin_list WHERE password='$UI_password' AND user='$UI_user'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					if($row['user'] == $UI_user)
					{
					$_SESSION['admin_auth']=$row['user'];
					echo '<script>location.replace(\'/admin/home\')</script>';
					}
					else {
					$_SESSION['admin_auth']='';
					echo '<script>location.replace(\'../login_failed\')</script>';
					}

			}
			else {
				$_SESSION['admin_auth']='';
				echo '<script>location.replace(\'../login_failed\')</script>';
			}
			break;
		}

		case 'admin_approveViaPost(item_id)':
		{
			$item_id = $_POST['item_id'];
			$sql="UPDATE publish2 SET isApproved='1' WHERE item_id='$item_id'";
			$status=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT account,name FROM publish2 WHERE item_id='$item_id'"));
			$account=$row['account'];
			$item_name=$row['name'];
			$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT email FROM user_list WHERE user='$account'"));
			$email = $row['email'];
			$name=$account;
			if($status)
			{
				//notify user of the approval
				$subject = 'AirSale Notification: Item Approved';
					$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
					'Dear '.$name .", \n".
					"Thank you very much for using AirSale. \n".
					"This is to notify you that your recently created item with the name( ".$item_name." ) has been approved. It will now be visible to all potential buyers at the Explore tab.\nThank you for choosing us and we wish you the best of luck. \n \n".
					"Yours sincerely,\n AirSale Team \n".
					"\n-----------------\n".
					"\nReply to lixi@lalx.org or goto airsale.lalx.org/contact for any enquiries \n".
					"\n-----------------\n".
					"If you did not register at AirSale, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
				mail($email,$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");
				echo 1;
			}
			else echo 0;
			break;
		}

		case 'admin_rejectViaPost(item_id)':
		{
			$item_id = $_POST['item_id'];
			if($_POST['reject_reason']!=NULL) $reject_reason = $_POST['reject_reason'];
			else $reject_reason="Incorrect flight information. Please carefully check your flight number again.";
			$sql="UPDATE publish2 SET isApproved='2' WHERE item_id='$item_id'";
			$status=mysqli_query($conn,$sql);
			$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT account,name FROM publish2 WHERE item_id='$item_id'"));
			$account=$row['account'];
			$item_name=$row['name'];
			$row=mysqli_fetch_assoc(mysqli_query($conn,"SELECT email FROM user_list WHERE user='$account'"));
			$email = $row['email'];
			$name=$account;
			if($status)
			{
				//notify user of the rejection
				$subject = 'AirSale Notification: Item REJECTED';
					$message = "----------THIS IS A MACHINE GENERATED EMAIL. DO NOT REPLY----------\n".
					'Dear '.$name .", \n".
					"Thank you very much for using AirSale. \n".
					"We regret to inform you that your recently created item with the name( ".$item_name." ) has been REJECTED because of the following reason: ".$reject_reason."\n You will need to update the details of the item from the page 'My Posted Items' to submit it for approval again. \nThank you for choosing us and we wish you the best of luck. \n \n".
					"Yours sincerely,\n AirSale Team \n".
					"\n-----------------\n".
					"\nReply to lixi@lalx.org or goto airsale.lalx.org/contact for any enquiries \n".
					"\n-----------------\n".
					"If you did not register at AirSale, please ignore this email. This happened because someone was careless and typed his/her email wrongly or was trying to be funny.";
				mail($email,$subject,$message,"From: notification@lalx.org\r\nReply-To:info@lalx.org");
				echo 1;
			}
			else echo 0;
			break;
		}

		case 'admin_deleteViaPost(item_id)':
		{
			$item_id = $_POST['item_id'];
			$sql="DELETE FROM publish2 WHERE item_id='$item_id'";
			$status=mysqli_query($conn,$sql);
			if($status) echo 1;
			else echo 0;
			break;
		}
	}//switch
}
?>