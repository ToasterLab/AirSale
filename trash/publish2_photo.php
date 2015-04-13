<?php
include('/home/u979434920/public_html/header/airsale');

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
            <a href="/airsale/publish" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
            </div>
            <div class='btn-group'>
            <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
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
          <div class="progress-bar progress-bar-striped active" role="progressbar" style="width: 50%">
          </div>
        </div>
    </div>
    </div>

    <center>
    <div class='row visible-sm visible-xs'>
    	<div class='btn-group-vertical'>
        <a href="/airsale/publish" class='btn btn-default btn-lg'>Step 1: Validate my air ticket	</a>
        <a href="#" class='btn btn-default btn-lg active'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3" class='btn btn-default btn-lg'>Step 3: Update my contact details</a>
        <a href="/airsale/publish4" class='btn btn-default btn-lg'>Step 4: Strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
	<div class='row'>
    <form action='/api/airsale' method='post' onSubmit="return formValidation()" enctype="multipart/form-data" >
    <input type='hidden' name='action' value="publish2_photo">
    <br><br>
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
        <br>

        <div class='alert-warning' style="margin-top:40pt">
        <h3> Warning: The TOTAL file size (all three added) must not exeed 8 MB<br>
		Note: You can upload a maximum of 4 photos, including the one uploaded before.</h3>
        </div>

        <div class='form-group col-md-4'>
        <label>Picture of the item (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='itemPicture2' accept="image/*">
        </div>

        <div class='form-group col-md-4'>
        <label>Picture of the item (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='itemPicture3' accept="image/*">
        </div>

        <div class='form-group col-md-4'>
        <label>Picture of the item (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='itemPicture4' accept="image/*">
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
	document.getElementById('itemName-div').innerHTML = getElement('itemName');
	document.getElementById('itemPrice-div').innerHTML = getElement('itemPrice');
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

</script>