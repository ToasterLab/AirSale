<?php
include('/home/u979434920/public_html/header/airsale.php');

$sql = "SELECT departureCountry,
		arrivalCountry,
		arrivalDateTime,
		flightCarrier,
		flightNumber,
		fullName,
		passport,
		ticketName,
		account,id FROM publish1";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['account'] == base64_decode($_COOKIE['auth']) )
		{
		setElement('departureCountry',base64_encode($row['departureCountry']));
		setElement('arrivalCountry',base64_encode($row['arrivalCountry']));
		setElement('arrivalDateTime',base64_encode($row['arrivalDateTime']));
		setElement('flightCarrier',base64_encode($row['flightCarrier']));
		setElement('flightNumber',base64_encode($row['flightNumber']));
		setElement('fullName',base64_encode($row['fullName']));
		setElement('passport',base64_encode($row['passport']));
		setElement('ticketName',base64_encode($row['ticketName']));
		setElement('publish1id',base64_encode($row['id']));
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
		account,id FROM publish2";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		if($row['account'] == base64_decode($_COOKIE['auth']) )
		{
		setElement('category',base64_encode($row['category']));
		setElement('name',base64_encode($row['name']));
		setElement('specifications',base64_encode($row['specifications']));
		setElement('price',base64_encode($row['price']));
		setElement('description',base64_encode($row['description']));
		setElement('itemPictureName',base64_encode($row['itemPictureName']));
		setElement('itemPictureName2',base64_encode($row['itemPictureName2']));
		setElement('itemPictureName3',base64_encode($row['itemPictureName3']));
		setElement('itemPictureName4',base64_encode($row['itemPictureName4']));
		setElement('publish2id',base64_encode($row['id']));
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
		setElement('number',base64_encode($row['number']));
		setElement('email',base64_encode($row['email']));
		setElement('location',base64_encode($row['location']));
		setElement('other',base64_encode($row['other']));
		setElement('prefered',base64_encode($row['prefered']));
		setElement('userPictureName',base64_encode($row['userPictureName']));
		setElement('publish3id',base64_encode($row['id']));
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
<link rel="stylesheet" href='/airsale/css/bootstrap.min.css'>
<link rel="stylesheet" href='/airsale/css/gryphon.css'>
<script src="/airsale/js/jquery-1.11.0.min.js"></script>
<script src="/airsale/js/bootstrap.min.js"></script>
<script src="/airsale/js/gryphon.js"></script>
<script src="/airsale/js/classie.js"></script>
<script src="/airsale/js/airsale.js"></script>
<script src='/js/jquery.sticky.js'></script>
<title>Step 4 and you are done!</title>
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
            <a href='/airsale/airsale/home.html' class='navbar-brand'> AirSale</a>
        </div>
        
        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li> <a href='/airsale/airsale/profile.php' id='nav-log-in'> </a></li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li ><a href='/airsale/airsale/explore.php' class='btn'> Explore</a> </li>
                    <li ><a href='/airsale/airsale/my_history.php' class='btn'>Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown active'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li class="active"><a href='/airsale/airsale/publish.php' class='btn'> Sell new items</a> </li>
                    <li><a href='/airsale/airsale/explore_destination.php' class='btn'>Explore destination airport</a></li>
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
    <div class='panel-body' style="background-color:#EEEEEE">
        <div class='btn-group btn-group-justified' role='group'>
            <div class='btn-group '>
            <a href="/airsale/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
            </div>
            <div class='btn-group'>
            <a href="#" class='btn btn-default btn-lg active'>Step 4: Strike a deal!</a>
            </div>
        </div>
        <br>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 95%">
          </div>
        </div>
    </div>
    </div>
    
    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="/airsale/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="/airsale/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
    <div class='row'>
    <br><center><h3>Please verify all information entered. If there is any error, click on the respective edit buttons to edit. Information CANNOT be changed after confirmation until the request is approved. Approval time is usually about 3 working days (Singapore time).</h3><br><br></center>
    </div>
    
    <div class='row'>
    
    <form enctype="multipart/form-data" action="/airsale/airsale/publish4_upload.php">
    
    <div class='panel panel-default'>
    <div class='panel-heading'>
    <h4>Information entered in Step 1</h4>
    <center>
    <a class='btn btn-warning ' onClick="editPublish(1)">Edit</a>
    </center>
    </div>
    
        <div class='panel-body'>
            <div class='col-md-6 form-group' id='departureCountry-div'>
            <label>Departure Country (Leaving FROM):</label>
            <p class='form-control form-control-static' id='departureCountry-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='arrivalCountry-div'>
            <label>Arrival Country (Arriving AT):</label>
            <p class='form-control form-control-static'  id='arrivalCountry-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='arrivalDateTime-div'>
            <label>Arrival time (Format: YYYY-MM-DD HH:MM:SS):</label>
            <p class='form-control form-control-static' id='arrivalDateTime-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='flightCarrier-div-form'>
            <label>Flight carrier:</label>
            <p class='form-control form-control-static' id='flightCarrier-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='flightNumber-div'>
            <label>Flight number:</label>
            <p class='form-control form-control-static' id='flightNumber-form'></p>
            </div>
            
            <div class='col-md-6 form-group' id='fullName-div'>
            <label>Passenger FULL name (The passenger who is selling the item. This should be the account holder):</label>
            <p class='form-control form-control-static'  id='fullName-form'></p>
            </div>
            
            <div class='col-md-6 form-group' id='passport-div'>
            <label>Passenger passport number (This should match the one given at sign-up. This is solicited again for verification purposes):</label>
            <p class='form-control form-control-static' id='passport-form'></p>
            </div>
            
            <div class='col-md-6 form-group'>
            <label>Air ticket IMAGE:</label>
            <img id='img1' width="80%" class='img-responsive img-thumbnail'>
            </div>
        </div>
    </div>
    
    <div class='panel panel-default'>
    <div class='panel-heading'>
    <h4>Information entered in Step 2</h4>
    <center>
    <div class='btn-group'>
        <div class='btn-group'>
        <a class='btn btn-warning ' onClick="editPublish(2)">Edit</a>
        </div>
        <div class='btn-group'>
        <a class='btn btn-success' href='/airsale/airsale/publish2_photo.php'>Add more photos</a>
        </div>
    </div>
    </center>
    </div>
    
        <div class='panel-body'>
            
            <div class='col-md-3 form-group' id='category-div'>
            <label>*Category of item</label>
            <p class='form-control form-control-static' id='category-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='name-div'>
            <label>*Name of item</label>
            <p class='form-control form-control-static' id='name-form'></p>
            </div>
            
            <div class='col-md-4 form-group' id='specifications-div'>
            <label>*Specifications of item(Volume, brand, etc)</label>
            <p   class='form-control form-control-static' id='specifications-form'></p>
            </div>
            
            <div class='col-md-2 form-group' id='price-div-form'>
            <label>*Price</label>
            <p   class='form-control form-control-static' id='price-form'></p>
            </div>
            
            <div class='form-group col-md-12' id='description-div'>
            <label>*Description of the item</label>
            <p rows="10" class='form-control form-control-static' id='description-form'></p>
            </div>
            
            <div class='form-group col-md-12'>
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                  <!-- Indicators -->
                  <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                  </ol>
                
                  <!-- Wrapper for slides -->
                  <div class="carousel-inner" role="listbox">
                    <div class="item active">
                      <img id='img21'>
                    </div>
                    <div class="item">
                      <img id="img22" >
                    </div>
                    <div class="item">
                      <img id="img23" >
                    </div>
                    <div class="item">
                      <img id="img24" >
                    </div>
                  </div>
                
                  <!-- Controls -->
                  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div><!-- Carousel -->
            </div>
        </div>
    </div>
    
    <div class='panel panel-default'>
    <div class='panel-heading'>
    <h4>Information entered in Step 3</h4>
    <center>
    <a class='btn btn-warning ' onClick="editPublish(3)">Edit</a>
    </center>
    </div>
    
        <div class='panel-body'>
            
            <div class='col-md-3 form-group' id='number-div'>
            <label>*Contact number</label>
            <p class='form-control form-control-static'   id='number-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='email-div'>
            <label>*Contact email</label>
            <p class='form-control form-control-static' id='email-form'></p>
            </div>
            
            <div class='col-md-3 form-group' id='location-div'>
            <label>*Hand-over location</label>
            <p   class='form-control form-control-static'  id='location-form'></p>
            </div>
            
            <div class='form-group col-md-3' id='prefered-div'>
            <label>*Prefered method of contact</label>
            <p   class='form-control form-control-static' id='prefered-form'></p>
            </div>
            
            <div class='col-md-6 form-group' id='other-div'>
            <label>Other method to contact me(format: method-account)</label>
            <p   class='form-control form-control-static' id='other-form'></p>
            </div>
            
            <div class='form-group col-md-6'>
            <label>Your photo</label>
            <img id='img3' width="80%" class='img-responsive img-thumbnail'>
            </div>
            
        </div>
    </div>
        
    </div>
        
    <div class='col-md-12'>
    <center>
    <input type='submit' class='btn btn-lg btn-default' value='Confirm'> <br><br>
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
//    $('#sticky').sticky({topSpacing:100});
	formUpdate();
});

function formUpdate()
{
	document.getElementById('departureCountry-form').innerHTML = getElement('departureCountry');
	document.getElementById('arrivalCountry-form').innerHTML = getElement('arrivalCountry');
	document.getElementById('arrivalDateTime-form').innerHTML = getElement('arrivalDateTime');
	document.getElementById('flightCarrier-form').innerHTML = getElement('flightCarrier');
	document.getElementById('flightNumber-form').innerHTML = getElement('flightNumber');
	document.getElementById('fullName-form').innerHTML = getElement('fullName');
	document.getElementById('passport-form').innerHTML = getElement('passport');
	
	document.getElementById('category-form').innerHTML = getElement('category');
	document.getElementById('name-form').innerHTML = getElement('name');
	document.getElementById('specifications-form').innerHTML = getElement('specifications');
	document.getElementById('price-form').innerHTML = getElement('price');
	document.getElementById('description-form').innerHTML = getElement('description');
	
	document.getElementById('number-form').innerHTML = getElement('number');
	document.getElementById('email-form').innerHTML = getElement('email');
	document.getElementById('location-form').innerHTML = getElement('location');
	document.getElementById('prefered-form').innerHTML = getElement('prefered');
	document.getElementById('other-form').innerHTML = getElement('other');
	document.getElementById('img1').src= './tickets/'.concat( getElement('ticketName') );
	document.getElementById('img21').src= './items/'.concat( getElement('itemPictureName') );
	document.getElementById('img22').src= './items/'.concat( getElement('itemPictureName2') );
	document.getElementById('img23').src= './items/'.concat( getElement('itemPictureName3') );
	document.getElementById('img24').src= './items/'.concat( getElement('itemPictureName4') );
	document.getElementById('img3').src= './users/'.concat( getElement('userPictureName') );
	
}

function editPublish(edit_handle)
{
	//edit_handle points to which Publish is to be edited.
	setCookie('edit_id',getElement('publish'.concat(String(edit_handle),'id')),1);
	setCookie('edit_handle', String(edit_handle) ,1);
	location.replace('/airsale/airsale/publish'.concat( String(edit_handle),'_edit.php')  );
}


</script>