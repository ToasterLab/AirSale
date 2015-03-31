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

$sql = "SELECT category,
		name,
		specifications,
		price,
		description,
		itemPictureName,
		account,id FROM publish2";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['account'] == base64_decode($_COOKIE['auth']) )
		{
		setElement('server-category',base64_encode($row['category']));
		setElement('server-name',base64_encode($row['name']));
		setElement('server-specifications',base64_encode($row['specifications']));
		setElement('server-price',base64_encode($row['price']));
		setElement('server-description',base64_encode($row['description']));
		setElement('server-itemPictureName',base64_encode($row['itemPictureName']));
		setElement('server-publish2id',base64_encode($row['id']));
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
<title>Editing step 2 information</title>
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
            <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
            </div>
        </div>
        <br>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 50%">
          </div>
        </div>
    </div>
    </div>
    
    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
	<div class='row'>
    <form action='/airsale/publish_edit_push.php' method='post' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <br><center><label for='instruction'> Compulsory fields are marked with an asterisk (*). Please complete this page with the most accurate description possible. Also, you may wish to browse the airport websites to find out what is available at your destination.</label><br><br></center>
    
    	<div class='col-md-6 form-group'>
        <label>Arrival Country (Last entry):</label>
        <p class='form-control-static form-control' id='arrivalCountry-div'></p>
        </div>
        
        <div class='col-md-6 form-group'>
        <label>Arrival Time (Last entry):</label>
        <p class='form-control-static form-control' id='arrivalDateTime-div'></p>
        </div>
                
        <div class='col-md-3 form-group' id='category-div'>
        <label>*Category of item</label>
        <select class='form-control' name='category' id='category'>
        	<option value='cosmetics'>Cosmetics</option>
            <option value='cosmetics-makeup'>Cosmetics-makeup</option>
            <option value='electronics'>Electronics</option>
        </select>
        </div>
        
        <div class='col-md-3 form-group' id='name-div'>
        <label>*Name of item</label>
        <input class='form-control' type='text' name='name' id='name'>
        </div>
        
        <div class='col-md-4 form-group' id='specifications-div'>
        <label>*Specifications of item(Volume, brand, etc)</label>
        <input type='text' class='form-control' name='specifications' id='specifications'>
        </div>
        
        <div class='col-md-2 form-group' id='price-div'>
        <label>*Price</label>
        <input type='text' class='form-control' name='price' id='price'>
        </div>
        
        <div class='form-group col-md-12' id='description-div'>
        <label>*Description of the item</label>
        <textarea rows="10" class='form-control' name='description' id='description'></textarea>
        </div>
        
        <div class='form-group col-md-12'>
        <label>Picture of the item (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='itemPicture' accept="image/*">
        </div>
        
    <br><br> 
    <center>
    <input type='submit' class='btn btn-lg btn-default' onClick="setCookie('destination','3',1);"> <br><br>
    </center>
    </form>
    
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
	formUpdate();
});

function formValidation()
{
	error=0;
	if($('#category').val()=='') {$('#category-div').addClass('has-error');error=1;}
	else {$('#category-div').removeClass('has-error');error=0;}
	if($('#name').val()=='') {$('#name-div').addClass('has-error');error=1;}
	else {$('#name-div').removeClass('has-error');error=0;}
	if($('#specifications').val()=='') {$('#specifications-div').addClass('has-error');error=1;}
	else {$('#specifications-div').removeClass('has-error');error=0;}
	if($('#price').val()=='') {$('#price-div').addClass('has-error');error=1;}
	else {$('#price-div').removeClass('has-error');error=0;}
	if($('#description').val()=='') {$('#description-div').addClass('has-error');error=1;}
	else {$('#description-div').removeClass('has-error');error=0;}
	
	if(error==1) {alert('Please check for any missing fields that are highlighted in red. Please note that all fields are compulsory.');return false;}
	else return true;
	
}

function formUpdate()
{
	document.getElementById('category').selected = getElement('server-category');
	document.getElementById('name').value = getElement('server-name');
	document.getElementById('specifications').value = getElement('server-specifications');
	document.getElementById('price').value = getElement('server-price');
	document.getElementById('description').value = getElement('server-description');
	
}

</script>