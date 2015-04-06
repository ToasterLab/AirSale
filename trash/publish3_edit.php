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
<link rel="stylesheet" href='/css/gry2.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/airsale.js"></script>
<script src='/js/j2.js'></script>
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
    <h1 id='head3' style="display:none"> Editing item information<br></h1>
    </div>
</div>


<div class='container'>

	<div class='row panel panel-default visible-md visible-lg ' id='sticky' style="z-index:10">
    <div class='panel-body'>
        <div class='btn-group btn-group-justified' role='group'>
            <div class='btn-group '>
            <a href="/airsale/publish1_edit.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish2_edit.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
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
        <a href="/airsale/publish1_edit.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="/airsale/publish2_edit.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
	<div class='row'>
    <form action='/api/airsale.php' method='post' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <input type='hidden' name="action" value='publish3_edit'>
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
        <input class='form-control' type='text' name='number' id='number-form'>
        </div>
        
        <div class='col-md-3 form-group' id='email-div'>
        <label>*Contact email</label>
        <input class='form-control' type='text' name='email' id='email-form'>
        </div>
        
        <div class='col-md-3 form-group' id='location-div'>
        <label>*Hand-over location</label>
        <input type='text' class='form-control' name='location' id='location-form'>
        </div>
        
        <div class='form-group col-md-3' id='prefered-div'>
        <label>*Prefered method of contact</label>
        <input type='text' class='form-control' name='prefered' id='prefered-form' value="Message">
        </div>
        
        <div class='col-md-6 form-group' id='other-div'>
        <label>Other method to contact me(format: method-account)</label>
        <input type='text' class='form-control' name='other' id='other-form' placeholder="eg. MSN-a@a.com">
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
	document.getElementById('itemName-div').innerHTML = getElement('name');
	document.getElementById('itemPrice-div').innerHTML = getElement('price');
	formUpdate();
});

function formValidation()
{
	error=0;
	if($('#number-form').val()=='') {$('#number-div').addClass('has-error');error=1;}
	else {$('#number-div').removeClass('has-error');error=0;}
	if($('#location-form').val()=='') {$('#location-div').addClass('has-error');error=1;}
	else {$('#location-div').removeClass('has-error');error=0;}
	if($('#email-form').val()=='') {$('#email-div').addClass('has-error');error=1;}
	else {$('#email-div').removeClass('has-error');error=0;}
	if($('#prefered-form').val()=='') {$('#prefered-div').addClass('has-error');error=1;}
	else {$('#prefered-div').removeClass('has-error');error=0;}
	if($('#userPicture-form').val()=='') {$('#userPicture-div').addClass('has-error');error=1;}
	else {$('#userPicture-div').removeClass('has-error');error=0;}
	
	if(error==1) {alert('Please check for any missing fields that are highlighted in red. Please note that compulsory fields are marked with a asterisk (*).');return false;}
	else return true;
	
}

function formUpdate()
{
	document.getElementById('number-form').value = getElement('number');
	document.getElementById('email-form').value = getElement('email');
	document.getElementById('location-form').value = getElement('location');
	document.getElementById('other-form').value = getElement('other');
	document.getElementById('prefered-form').value = getElement('prefered');
}

</script>