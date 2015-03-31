<?php
ob_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$servername = "mysql.hostinger.co.uk";
$username = "u814771946_root";
$password = "_MYsql";
$db = "u814771946_root";
$table = 'Entry'.base64_decode($_COOKIE['auth']);
setcookie('debug','0',time()+30*85400,'/');
$debug=$_COOKIE['debug'];
function setElement($element_name,$element_value)
{
	echo '<p id="'.$element_name.'" style="display:none">'.$element_value.'</p>';
}


$conn = mysqli_connect($servername, $username, $password,$db);

$sql = "SELECT arrivalCountry,account,arrivalDateTime FROM publish1";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['account'] == base64_decode($_COOKIE['auth']) )
		{
		setElement('arrivalCountry',base64_encode($row['arrivalCountry']));
		setElement('arrivalDateTime',base64_encode($row['arrivalDateTime']));
		}
		$i++;
	}
}

$sql = "SELECT name,price,account FROM publish2";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['account'] == base64_decode($_COOKIE['auth']) )
		{
		setElement('itemName',base64_encode($row['name']));
		setElement('itemPrice',base64_encode($row['price']));
		}
		$i++;
	}
}


$sql = "SELECT number,
		email,
		location,
		other,
		prefered,
		userPictureName,
		account,id FROM publish3";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['account'] == base64_decode($_COOKIE['auth']) )
		{
		setElement('server-number',base64_encode($row['number']));
		setElement('server-email',base64_encode($row['email']));
		setElement('server-location',base64_encode($row['location']));
		setElement('server-other',base64_encode($row['other']));
		setElement('server-prefered',base64_encode($row['prefered']));
		setElement('server-userPictureName',base64_encode($row['userPictureName']));
		setElement('server-publish3id',base64_encode($row['id']));
		}
		$i++;
	}
}


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
<script src="/js/airsale.js"></script>
<script src='/js/jquery.sticky.js'></script>
<title>Editing step 3 information</title>
</head>
<body>

<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
	<div class='container-fluid'>
    	<div class='navbar-header'>
        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#page-navG" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
       		<span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href='/airsale/home.html' class='navbar-brand'> AirSale</a>
        </div>
        
        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li> <a href='/airsale/profile.php' id='nav-log-in'> </a></li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li ><a href='/airsale/explore.php' class='btn'> Explore</a> </li>
                    <li ><a href='/airsale/my_history.php' class='btn'>Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown active'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li class="active"><a href='/airsale/publish.php' class='btn'> Sell new items</a> </li>
                    <li><a href='/airsale/explore_destination.php' class='btn'>Explore destination airport</a></li>
                </ul>
            
            </li>
        	</ul>
        </div>
    </div>
</nav>

<div>
	<div class='jumbotron' style="padding-top:100pt">
    <h1 id='head3' style="display:none"> Selling an item<br></h1>
    </div>
</div>


<div class='container'>

	<div class='row panel panel-default visible-md visible-lg ' id='sticky' style="z-index:10">
    <div class='panel-body'>
        <div class='btn-group btn-group-justified' role='group'>
            <div class='btn-group '>
            <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="#" class='btn btn-default btn-lg active'>Step 3: Update my contact details</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
            </div>
        </div>
        <br>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 75%">
          </div>
        </div>
    </div>
    </div>
    
    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
	<div class='row'>
    <form action='/airsale/publish_edit_push.php' method='post' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <br><center><label for='disclaimer'> ALL INFORMATION COLLECTED WILL NOT UNDER ANY CIRCUMSTANCE BE RELEASED TO ANY PARTY FOR ANY PURPOSE. Compulsory fileds are marked with an asterisk (*)</label><br><br></center>
    
    	<div class='col-md-3 form-group'>
        <label>Arrival Country (Last entry):</label>
        <p class='form-control-static form-control' id='arrivalCountry-div'></p>
        </div>
        
        <div class='col-md-3 form-group'>
        <label>Arrival Time (Last entry):</label>
        <p class='form-control-static form-control' id='arrivalDateTime-div'></p>
        </div>
        
        <div class='col-md-3 form-group'>
        <label>Item name (Last entry):</label>
        <p class='form-control-static form-control' id='itemName-div'></p>
        </div>
        
        <div class='col-md-3 form-group'>
        <label>Price (Last entry):</label>
        <p class='form-control-static form-control' id='itemPrice-div'></p>
        </div>
                
        <div class='col-md-3 form-group' id='number-div'>
        <label>*Contact number</label>
        <input class='form-control' type='text' name='number' id='number'>
        </div>
        
        <div class='col-md-3 form-group' id='email-div'>
        <label>*Contact email</label>
        <input class='form-control' type='text' name='email' id='email'>
        </div>
        
        <div class='col-md-3 form-group' id='location-div'>
        <label>*Hand-over location</label>
        <input type='text' class='form-control' name='location' id='location'>
        </div>
        
        <div class='form-group col-md-3' id='prefered-div'>
        <label>*Prefered method of contact</label>
        <input type='text' class='form-control' name='prefered' id='prefered' value="Message">
        </div>
        
        <div class='col-md-6 form-group' id='other-div'>
        <label>Other method to contact me(format: method-account)</label>
        <input type='text' class='form-control' name='other' id='other' placeholder="eg. MSN-a@a.com">
        </div>
        
        
        <div class='form-group col-md-6' id='userPicture-div'>
        <label>*Picture of me: (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='userPicture' id='userPicture' accept="image/*">
        <label for='picture-instruction' class='alert-danger'> Requirement for the picture: Face must be fully shown. Upper body and your arms must be visible in the picture. Your request to publish this item will be rejected if you fail to meet these requirements.</label>
        </div>
        
    <div class='col-md-12'>
    <center>
    <input type='submit' class='btn btn-lg btn-default' onClick="setCookie('destination','4',1);"> <br><br>
    </center>
    </form>
    </div>
    </div>

</div>



<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>

<script>
$(document).ready(function(e) {
    $('#sticky').sticky({topSpacing:100});
	document.getElementById('arrivalCountry-div').innerHTML = getElement('arrivalCountry');
	document.getElementById('arrivalDateTime-div').innerHTML = getElement('arrivalDateTime');
	document.getElementById('itemName-div').innerHTML = getElement('itemName');
	document.getElementById('itemPrice-div').innerHTML = getElement('itemPrice');
	formUpdate();
});

function formValidation()
{
	error=0;
	if($('#number').val()=='') {$('#number-div').addClass('has-error');error=1;}
	else {$('#number-div').removeClass('has-error');error=0;}
	if($('#location').val()=='') {$('#location-div').addClass('has-error');error=1;}
	else {$('#location-div').removeClass('has-error');error=0;}
	if($('#email').val()=='') {$('#email-div').addClass('has-error');error=1;}
	else {$('#email-div').removeClass('has-error');error=0;}
	if($('#prefered').val()=='') {$('#prefered-div').addClass('has-error');error=1;}
	else {$('#prefered-div').removeClass('has-error');error=0;}
	if($('#userPicture').val()=='') {$('#userPicture-div').addClass('has-error');error=1;}
	else {$('#userPicture-div').removeClass('has-error');error=0;}
	
	if(error==1) {alert('Please check for any missing fields that are highlighted in red. Please note that compulsory fields are marked with a asterisk (*).');return false;}
	else return true;
	
}

function formUpdate()
{
	document.getElementById('number').value = getElement('server-number');
	document.getElementById('email').value = getElement('server-email');
	document.getElementById('location').value = getElement('server-location');
	document.getElementById('other').value = getElement('server-other');
	document.getElementById('prefered').value = getElement('server-prefered');
}

</script>