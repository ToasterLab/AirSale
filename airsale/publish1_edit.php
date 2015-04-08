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
<title>Editing Step 1 Information</title>
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
            <a href='/airsale/home.php' class='navbar-brand'> AirSale</a>
        </div>
        
        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li> <a href='/airsale/profile.php' id='nav-log-in'> </a></li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li ><a href='/airsale/explore.php' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
                    <li ><a href='/airsale/my_history.php' class='btn'><i class='fa fa-history'></i> Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown active'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li class="active"><a href='/airsale/publish.php' class='btn'><i class='fa fa-plus-circle'></i> Sell new items</a> </li>
                    <li><a href='/airsale/posted.php' class='btn'><i class='fa fa-history'></i> My Posted Items</a></li>
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
            <a href="#" class='btn btn-default btn-lg active'>Step 1: Update profile information</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish2_edit.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish3_edit.php" class='btn btn-default btn-lg'>Step 3: Confirm details and strike a deal!</a>
        	</div>
        </div>
        <br>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 33%">
          </div>
        </div>
    </div>
    </div>    
    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="#" class='btn btn-default active btn-lg'>Step 1: Update/Confirm profile information</a>
        <a href="/airsale/publish2_edit.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3_edit.php" class='btn btn-default btn-lg'>Step 3: Confirm details and strike a deal!</a>
        </div>
    </div>
    </center>
</div>
<br><br>

<div class='container'>
	<div class='row'>
    <form action='/api/airsale.php' method='POST' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <input type='hidden' name="action" value='publish1_edit'>
    
    <br><center><label for='disclaimer'> ALL INFORMATION COLLECTED WILL NOT UNDER ANY CIRCUMSTANCE BE RELEASED TO ANY PARTY FOR ANY PURPOSE. COMPULSORY FIELDS ARE MARKED WITH *</label><br><br></center>
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
        
        <div class='col-md-12 form-group' id='other-div'>
        <label>Other method to contact me(format: method-account)</label>
        <input type='text' class='form-control' name='other' id='other' placeholder="eg. MSN-a@a.com">
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
	updateForm();
});

function formValidation()
{
	error = true;	//false indicates there is an error
	if($('#number').val()=='') {$('#number-div').addClass('has-error');error=false;}
	else {$('#number-div').removeClass('has-error');error=error&true;}
	if($('#location').val()=='') {$('#location-div').addClass('has-error');error=false;}
	else {$('#location-div').removeClass('has-error');error=error&true;}
	if($('#email').val()=='') {$('#email-div').addClass('has-error');error=false;}
	else {$('#email-div').removeClass('has-error');error=error&true;}
	if($('#prefered').val()=='') {$('#prefered-div').addClass('has-error');error=false;}
	else {$('#prefered-div').removeClass('has-error');error=error&true;}
	
	if(error==false) {alert('Please check for any missing fields that are highlighted in red. Please note that compulsory fields are marked with a asterisk (*).');return false;}
	else return true;
	
}

function updateForm()
{
	var JSession,JArray,JResult;
	$.post('http://airsale.lalx.org/api/airsale.php',{JSON:1,action:'user_profile'},function(data) 
	{
		JArray = $.parseJSON(data);
		document.getElementById('email').value=JArray['email'];
		document.getElementById('number').value=JArray['number'];
		document.getElementById('other').value=JArray['other'];
		document.getElementById('prefered').value=JArray['prefered'];
		document.getElementById('location').value=JArray['location'];
	});
	
	
}
</script>