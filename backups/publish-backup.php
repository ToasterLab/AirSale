<?php
include('/home/u979434920/public_html/airsale/api/airsale.php');
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href='/css/b.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<link rel="stylesheet" href='/css/gry2.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/airsale.js"></script>
<script src='/js/j2.js'></script>
<title>Selling new items</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61584028-1', 'auto');
  ga('send', 'pageview');

</script>
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
            <a href='/airsale/home' class='navbar-brand'> AirSale</a>
        </div>

        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li> <a href='/airsale/profile' id='nav-log-in'> </a></li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li ><a href='/airsale/explore' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
                    <li ><a href='/airsale/my_history' class='btn'><i class='fa fa-history'></i> Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown active'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li class="active"><a href='/airsale/publish' class='btn'><i class='fa fa-plus-circle'></i> Sell new items</a> </li>
                    <li><a href='/airsale/posted' class='btn'><i class='fa fa-history'></i> My Posted Items</a></li>
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
            <a href="/airsale/publish2" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish3" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish4" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
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
        <a href="/airsale/publish2" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>
<br><br>

<div class='container'>
	<div class='row'>
    <form action='/api/airsale' method='POST' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <input type='hidden' name="action" value='publish1'>

    <br><center><label for='disclaimer'> ALL INFORMATION COLLECTED WILL NOT UNDER ANY CIRCUMSTANCE BE RELEASED TO ANY PARTY FOR ANY PURPOSE. ALL FIELDS ARE COMPULSORY</label><br><br></center>
    	<div class='col-md-6 form-group' id='departureCountry-div'>
        <label>Departure Country (Leaving FROM):</label>
        <input class='form-control' type="text" name='departureCountry' id='departureCountry'>
        </div>

        <div class='col-md-6 form-group' id='arrivalCountry-div'>
        <label>Arrival Country (Arriving AT):</label>
        <input class='form-control' type="text" name='arrivalCountry' id='arrivalCountry'>
        </div>

        <div class='col-md-6 form-group' id='arrivalDateTime-div'>
        <label>Arrival time (Format: YYYY-MM-DD HH:MM:SS):</label>
        <input class='form-control' type="datetime" name='arrivalDateTime' id='arrivalDateTime' placeholder="eg. 2015-01-01 12:50:00">
        </div>

        <div class='col-md-3 form-group' id='flightCarrier-div'>
        <label>Flight carrier:</label>
        <input class='form-control' type="text" name='flightCarrier' id='flightCarrier'>
        </div>

        <div class='col-md-3 form-group' id='flightNumber-div'>
        <label>Flight number:</label>
        <input class='form-control' type="text" name='flightNumber' id='flightNumber'>
        </div>

        <div class='col-md-6 form-group' id='fullName-div'>
        <label>Passenger FULL name (The passenger who is selling the item. This should be the account holder):</label>
        <input class='form-control' type="text" name='fullName' id='fullName'>
        </div>


        <div class='col-md-6 form-group' id='airTicket-div'>
        <label>Picture of air-ticket (OR e-ticket) showing flight number, passenger's full name, departure country and departure time (Any picture format, preferably jpg, jpeg, png, that is SMALLER than 7MB):</label>
        <input class='form-control' type="file" name='airTicket' id='airTicket' accept="image/*">
        </div>

    <br><br>
    <center>
    <input type='submit' class='btn btn-lg btn-default'> <br><br>
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
});

function formValidation()
{
	error=0;
	if($('#arrivalCountry').val()=='') {$('#arrivalCountry-div').addClass('has-error');error=1;}
	else {$('#arrivalCountry-div').removeClass('has-error');error=0;}
	if($('#airTicket').val()=='') {$('#airTicket-div').addClass('has-error');error=1;}
	else {$('#airTicket-div').removeClass('has-error');error=0;}
	if($('#arrivalDateTime').val()=='') {$('#arrivalDateTime-div').addClass('has-error');error=1;}
	else {$('#arrivalDateTime-div').removeClass('has-error');error=0;}
	if($('#departureCountry').val()=='') {$('#departureCountry-div').addClass('has-error');error=1;}
	else {$('#departureCountry-div').removeClass('has-error');error=0;}
	if($('#flightCarrier').val()=='') {$('#flightCarrier-div').addClass('has-error');error=1;}
	else {$('#flightCarrier-div').removeClass('has-error');error=0;}
	if($('#flightNumber').val()=='') {$('#flightNumber-div').addClass('has-error');error=1;}
	else {$('#flightNumber-div').removeClass('has-error');error=0;}
	if($('#fullName').val()=='') {$('#fullName-div').addClass('has-error');error=1;}
	else {$('#fullName-div').removeClass('has-error');error=0;}

	if(error==1) {alert('Please check for any missing fields that are highlighted in red. Please note that all fields are compulsory.');return false;}
	else return true;

}
</script>