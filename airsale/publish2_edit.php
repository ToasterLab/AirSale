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
            <a href='/airsale/home.php' class='navbar-brand'> AirSale</a>
        </div>
        
        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li> <a href='/airsale/profile.php' id='nav-log-in'> </a></li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li ><a href='/airsale/explore.php' class='btn'><i class='fa fa-search'></i> Explore</a> </li>
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
            <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish3_edit.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
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
        <a href="/airsale/publish1_edit.php" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3_edit.php" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4.php" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
	<div class='row'>
    <form action='/api/airsale.php' method='post' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <input type='hidden' name="action" value='publish2_edit'>
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
        <select class='form-control' name='category' id='category-form'>
        	<option value='cosmetics'>Cosmetics</option>
            <option value='cosmetics-makeup'>Cosmetics-makeup</option>
            <option value='electronics'>Electronics</option>
        </select>
        </div>
        
        <div class='col-md-3 form-group' id='name-div'>
        <label>*Name of item</label>
        <input class='form-control' type='text' name='name' id='name-form'>
        </div>
        
        <div class='col-md-4 form-group' id='specifications-div'>
        <label>*Specifications of item(Volume, brand, etc)</label>
        <input type='text' class='form-control' name='specifications' id='specifications-form'>
        </div>
        
        <div class='col-md-2 form-group' id='price-div'>
        <label>*Price</label>
        <input type='text' class='form-control' name='price' id='price-form'>
        </div>
        
        <div class='form-group col-md-12' id='description-div'>
        <label>*Description of the item</label>
        <textarea rows="10" class='form-control' name='description' id='description-form'></textarea>
        </div>
        
        <div class='form-group col-md-12'>
        <label>Picture of the item (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='itemPicture' accept="image/*">
        </div>
        
    <br><br> 
    <center>
    <input type='submit' class='btn btn-lg btn-default' "> <br><br>
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
	if($('#category-form').val()=='') {$('#category-div').addClass('has-error');error=1;}
	else {$('#category-div').removeClass('has-error');error=0;}
	if($('#name-form').val()=='') {$('#name-div').addClass('has-error');error=1;}
	else {$('#name-div').removeClass('has-error');error=0;}
	if($('#specifications-form').val()=='') {$('#specifications-div').addClass('has-error');error=1;}
	else {$('#specifications-div').removeClass('has-error');error=0;}
	if($('#price-form').val()=='') {$('#price-div').addClass('has-error');error=1;}
	else {$('#price-div').removeClass('has-error');error=0;}
	if($('#description-form').val()=='') {$('#description-div').addClass('has-error');error=1;}
	else {$('#description-div').removeClass('has-error');error=0;}
	
	if(error==1) {alert('Please check for any missing fields that are highlighted in red. Please note that all fields are compulsory.');return false;}
	else return true;
	
}

function formUpdate()
{
	document.getElementById('category-form').selected = getElement('category');
	document.getElementById('name-form').value = getElement('name');
	document.getElementById('specifications-form').value = getElement('specifications');
	document.getElementById('price-form').value = getElement('price');
	document.getElementById('description-form').value = getElement('description');
	
}

</script>