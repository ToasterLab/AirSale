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
<title>Step 2 in selling new items</title>
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
            <li> <a href='/airsale/contact.html'><i class='fa fa-phone'></i> Contact</a></li>
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
            <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Update/Confirm profile information</a>
            </div>
            <div class='btn-group'>
            <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Confirm details and strike a deal!</a>
        	</div>
        </div>
        <br>
        <div class="progress">
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 66%">
          </div>
        </div>
    </div>
    </div>
    
    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Update/Confirm profile information</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3.php" class='btn btn-default btn-lg'>Step 3: Confirm details and strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
	<div class='row'>
    <form action='/api/airsale.php' method='post' onSubmit="return formValidation()" enctype="multipart/form-data" >
        <input type='hidden' name="action" value='publish2'>
    <br><center><label for='instruction'> Compulsory fields are marked with an asterisk (*). Please complete this page with the most accurate description possible. Also, you may wish to browse the airport websites to find out what is available at your destination.</label><br><br></center>
    
    	
        <div class='col-md-3 form-group' id='flightCarrier-div'>
        <label>*Flight carrier(Carrier CODE only. Eg. SQ,MI,VA):</label>
        <input class='form-control' type="text" name='flightCarrier' id='flightCarrier' placeholder="eg. MI,SQ,VA">
        </div>
        
        <div class='col-md-3 form-group' id='flightCarrierFullName-div'>
        <label>*Flight carrier FULL name:</label>
        <p class='form-control form-control-static' id='flightCarrierFullName' onClick='getCarrierFullName()'><a class='btn' onClick='getCarrierFullName()'>Click here to search for carrier Full name</a></p>
        </div>
        
        <div class='col-md-3 form-group' id='flightNumber-div'>
        <label>*Flight number (NUMBER ONLY):</label>
        <input class='form-control' type="number" name='flightNumber' id='flightNumber' placeholder="eg. 961,572,942">
        </div>
        
        
        <div class='col-md-3 form-group' id='arrivalDate-div'>
        <label>*Arrival Date:</label>
        <input class='form-control' type='text' name='arrivalDate' id='arrivalDate' placeholder="(Format: YYYY-MM-DD) eg. 2015-03-26">
        </div>
                
        <div class='col-md-3 form-group' id='category-div'>
        <label>*Category of item</label>
        <select class='form-control' name='category'>
        	<option value='cosmetics'>Cosmetics</option>
            <option value='cosmetics-makeup'>Cosmetics-makeup</option>
            <option value='electronics'>Electronics</option>
        </select>
        </div>
        
        <div class='col-md-3 form-group' id='name-div'>
        <label>*Name of item</label>
        <input class='form-control' type='text' name='name' id='name' placeholder="eg. SK2 make-up">
        </div>
        
        <div class='col-md-4 form-group' id='specifications-div'>
        <label>*Specifications of item(Volume, brand, etc)</label>
        <input type='text' class='form-control' name='specifications' id='specifications' placeholder="eg. 20grams">
        </div>
        
        <div class='col-md-2 form-group' id='price-div'>
        <label>*Price</label>
        <input type='text' class='form-control' name='price' id='price' placeholder="99.90SGD">
        </div>
        
        <div class='form-group col-md-12' id='description-div'>
        <label>*Description of the item</label>
        <textarea rows="10" class='form-control' name='description' id='description'></textarea>
        </div>
        
        <div class='form-group col-md-12'>
        <label>Picture of the item (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='itemPicture' accept="image/*">
        <label>TIP: This is the primary preview picture that all users will see under the Explore Tab. Thus, shoot the best shot for this picture!</label>
        </div>
        
    <br><br> 
    <center>
    <input type='submit' class='btn btn-lg btn-default' > <br><br>
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
	error = true;	//false indicates there is an error
	if($('#category').val()=='') {$('#category-div').addClass('has-error');error=false;}
	else {$('#category-div').removeClass('has-error');error=error&true;}
	if($('#name').val()=='') {$('#name-div').addClass('has-error');error=false;}
	else {$('#name-div').removeClass('has-error');error=error&true;}
	if($('#specifications').val()=='') {$('#specifications-div').addClass('has-error');error=false;}
	else {$('#specifications-div').removeClass('has-error');error=error&true;}
	if($('#price').val()=='') {$('#price-div').addClass('has-error');error=false;}
	else {$('#price-div').removeClass('has-error');error=error&true;}
	if($('#description').val()=='') {$('#description-div').addClass('has-error');error=false;}
	else {$('#description-div').removeClass('has-error');error=error&true;}
	if($('#arrivalDate').val()=='') {$('#arrivalDate-div').addClass('has-error');error=false;}
	else {$('#arrivalDate-div').removeClass('has-error');error=error&true;}
	if($('#flightNumber').val()=='') {$('#flightNumber-div').addClass('has-error');error=false;}
	else {$('#flightNumber-div').removeClass('has-error');error=error&true;}
	if($('#flightCarrier').val()=='') {$('#flightCarrier-div').addClass('has-error');error=false;}
	else {$('#flightCarrier-div').removeClass('has-error');error=error&true;}
	
	if(error==false) {alert('Please check for any missing fields that are highlighted in red. Please note that compulsory fields are marked with a asterisk (*).');return false;}
	else return true;
}

function getCarrierFullName()
{
	tag=document.createElement('i');
	tag.className='fa fa-spinner fa-pulse';
	document.getElementById('flightCarrierFullName').innerHTML=null;
	document.getElementById('flightCarrierFullName').appendChild(tag);
	text = document.createTextNode(" Loading");
	document.getElementById('flightCarrierFullName').appendChild(text);
	$.post('../api/airsale.php',{JSON:1,action:'getCarrierFullName',flightCarrier:$('#flightCarrier').val()},function(data) {
		result = $.parseJSON(data);
		if(result == '0') document.getElementById('flightCarrierFullName').innerHTML = 'Not found. Click to try again';
		else document.getElementById('flightCarrierFullName').innerHTML = result;
	});
}

</script>