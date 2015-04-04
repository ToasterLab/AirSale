<?php
include('/home/u979434920/public_html/airsale/api/airsale.php');
getPublishElements(1);getPublishElements(2);getPublishElements(3);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href='/css/b.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/airsale.js"></script>
<script src='/js/j2.js'></script>
<title>Editing step 1 information</title>
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
            <a href='/airsale/home.php' class='navbar-brand'> AirSale</a>
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
            <a href="#" class='btn btn-default btn-lg active'>Step 1: Validate my air ticket	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
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
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 25%">
          </div>
        </div>
    </div>
    </div>    
    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="#" class='btn btn-default active btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>
<br><br>

<div class='container'>
	<div class='row'>
    <form action='/api/airsale.php' method='POST' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <input type='hidden' name="action" value='publish1_edit'>
    <input type='hidden' name="edit_id" id='edit_id'>
    <br><center><label for='disclaimer'> ALL INFORMATION COLLECTED WILL NOT UNDER ANY CIRCUMSTANCE BE RELEASED TO ANY PARTY FOR ANY PURPOSE. ALL FIELDS ARE COMPULSORY</label><br><br></center>
    	<div class='col-md-6 form-group' id='departureCountry-div'>
        <label>Departure Country (Leaving FROM):</label>
        <input class='form-control' type="text" name='departureCountry' id='departureCountry-form'>
        </div>
        
        <div class='col-md-3 form-group' id='arrivalCountry-div'>
        <label>Arrival Country (Arriving AT):</label>
        <input class='form-control' type="text" name='arrivalCountry' id='arrivalCountry-form'>
        </div>
        
        <div class='col-md-3 form-group' id='arrivalDateTime-div'>
        <label>Arrival time (Format: YYYY-MM-DD HH:MM:SS):</label>
        <input class='form-control' type="datetime" name='arrivalDateTime' id='arrivalDateTime-form' placeholder="eg. 2015-01-01 12:50:00">
        </div>
        
        <div class='col-md-3 form-group' id='flightCarrier-div'>
        <label>Flight carrier:</label>
        <input class='form-control' type="text" name='flightCarrier' id='flightCarrier-form'>
        </div>
        
        <div class='col-md-3 form-group' id='flightNumber-div'>
        <label>Flight number:</label>
        <input class='form-control' type="text" name='flightNumber' id='flightNumber-form'>
        </div>
        
        <div class='col-md-6 form-group' id='fullName-div'>
        <label>Passenger FULL name (The passenger who is selling the item. This should be the account holder):</label>
        <input class='form-control' type="text" name='fullName' id='fullName-form'>
        </div>
  
        <div class='col-md-6 form-group' id='airTicket-div'>
        <label>Picture of air-ticket (OR e-ticket) showing flight number, passenger's full name, departure country and departure time (Any picture format, preferably jpg, jpeg, png, that is SMALLER than 7MB):</label>
        <input class='form-control' type="file" name='airTicket' id='airTicket' accept="image/*">
        </div>
    
    <br><br> 
    <center>
    <input type='submit' class='btn btn-lg btn-default' onClick="setCookie('destination','2',1);"> <br><br>
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
	formUpdate();
});

function formValidation()
{
	error=0;
	if($('#arrivalCountry-form').val()=='') {$('#arrivalCountry-div').addClass('has-error');error=1;}
	else {$('#arrivalCountry-div').removeClass('has-error');error=0;}
	if($('#airTicket-form').val()=='') {$('#airTicket-div').addClass('has-error');error=1;}
	else {$('#airTicket-div').removeClass('has-error');error=0;}
	if($('#arrivalDateTime-form').val()=='') {$('#arrivalDateTime-div').addClass('has-error');error=1;}
	else {$('#arrivalDateTime-div').removeClass('has-error');error=0;}
	if($('#departureCountry-form').val()=='') {$('#departureCountry-div').addClass('has-error');error=1;}
	else {$('#departureCountry-div').removeClass('has-error');error=0;}
	if($('#flightCarrier-form').val()=='') {$('#flightCarrier-div').addClass('has-error');error=1;}
	else {$('#flightCarrier-div').removeClass('has-error');error=0;}
	if($('#flightNumber-form').val()=='') {$('#flightNumber-div').addClass('has-error');error=1;}
	else {$('#flightNumber-div').removeClass('has-error');error=0;}
	if($('#fullName-form').val()=='') {$('#fullName-div').addClass('has-error');error=1;}
	else {$('#fullName-div').removeClass('has-error');error=0;}
	
	if(error==1) {alert('Please check for any missing fields that are highlighted in red. Please note that all fields are compulsory.');return false;}
	else return true;
	
}

function formUpdate()
{
	document.getElementById('departureCountry-form').value = getElement('departureCountry');
	document.getElementById('arrivalCountry-form').value = getElement('arrivalCountry');
	document.getElementById('arrivalDateTime-form').value = getElement('arrivalDateTime');
	document.getElementById('flightCarrier-form').value = getElement('flightCarrier');
	document.getElementById('flightNumber-form').value = getElement('flightNumber');
	document.getElementById('fullName-form').value = getElement('fullName');
	
}


</script>