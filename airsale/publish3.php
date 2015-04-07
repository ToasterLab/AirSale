<?php
include('/home/u979434920/public_html/airsale/api/airsale.php');

//getPublishElements(1);getPublishElements(2);getPublishElements(3);

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
<title>Step 3: Confirm details and strike a deal!</title>
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
    <div class='panel-body' style="background-color:#EEEEEE">
        <div class='btn-group btn-group-justified' role='group'>
            <div class='btn-group '>
            <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Update/Confirm profile information</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
            </div>
            <div class='btn-group'>
            <a href="/airsale/publish3.php" class='btn btn-default btn-lg active'>Step 3: Confirm details and strike a deal!</a>
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
        <a href="/airsale/publish.php" class='btn btn-default btn-lg'>Step 1: Update/Confirm profile information</a>
        <a href="/airsale/publish2.php" class='btn btn-default btn-lg'>Step 2: Tell others what I am selling	</a>
        <a href="/airsale/publish3.php" class='btn btn-default btn-lg active'>Step 3: Confirm details and strike a deal!</a>
        </div>
    </div>
    </center>
</div>


<div class='container'>
    <div class='row'>
    <br><center><h3>Please verify all information entered. If there is any error, click on the respective edit buttons to edit. Changes on this page WILL NOT be submitted to the server.</h3><br><br></center>
    </div>
    
    <div class='row'>
    
    <form enctype="multipart/form-data" action="/api/airsale.php" method='post'>
    <input type='hidden' name="action" value='publish3'>
    
    <div class='panel panel-default'>
    <div class='panel-heading'>
    <h4>Information entered in Step 1</h4>
    <center>
    <a class='btn btn-warning ' onClick="editPublish(1)">Edit</a>
    </center>
    </div>
    
        <div class='panel-body'>
        
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
            <label>Picture of me: (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
            <img id='img1'>
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
        <a class='btn btn-success' href='/airsale/publish2_photo_edit.php'>Add more photos</a>
        </div>
    </div>
    </center>
    </div>
    
        <div class='panel-body'>
            	<div class='col-md-3 form-group' id='flightCarrier-div'>
                <label>*Flight carrier:</label>
                <input class='form-control' type="text" name='flightCarrier' id='flightCarrier'>
                </div>
                
                <div class='col-md-3 form-group' id='flightNumber-div'>
                <label>*Flight number:</label>
                <input class='form-control' type="text" name='flightNumber' id='flightNumber'>
                </div>
                
                
                <div class='col-md-6 form-group' id='arrivalDate-div'>
                <label>*Arrival Date:</label>
                <input class='form-control' type='text' name='arrivalDate' id='arrivalDate' placeholder="(Format: YYYY-MM-DD) eg. 2015-03-26">
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
                      <img id='img21' style='width:100%'>
                    </div>
                    <div class="item">
                      <img id="img22"  style='width:100%'>
                    </div>
                    <div class="item">
                      <img id="img23"  style='width:100%'>
                    </div>
                    <div class="item">
                      <img id="img24"  style='width:100%'>
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
	/*
	document.getElementById('departureCountry-form').innerHTML = getElement('departureCountry');
	document.getElementById('arrivalCountry-form').innerHTML = getElement('arrivalCountry');
	document.getElementById('arrivalDateTime-form').innerHTML = getElement('arrivalDateTime');
	document.getElementById('flightCarrier-form').innerHTML = getElement('flightCarrier');
	document.getElementById('flightNumber-form').innerHTML = getElement('flightNumber');
	document.getElementById('fullName-form').innerHTML = getElement('fullName');
	
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
	*/
	
		var JSession,JArray,JResult;
	$.post('http://airsale.lalx.org/api/airsale.php',{JSON:1,action:'session'},function(data) {
		JSession=$.parseJSON(data);
		item_id = Number( JSession['item_id']);
		$.post('http://airsale.lalx.org/api/airsale.php',{JSON:1,action:'seller_history'},function(data) {
		JArray=$.parseJSON(data);
		for(i=0;JArray[i] != null;i++)
		{
			if(JArray[i]['item_id']==JSession['item_id']) index_of_item = i;
		}
		JResult = JArray[index_of_item]['result'];
		document.getElementById('email').value=JResult['email'];
		document.getElementById('number').value=JResult['number'];
		document.getElementById('other').value=JResult['other'];
		document.getElementById('prefered').value=JResult['prefered'];
		document.getElementById('location').value=JResult['location'];
		
		document.getElementById('flightCarrier').value=JResult['flightCarrier'];
		document.getElementById('flightNumber').value=JResult['flightNumber'];
		document.getElementById('arrivalDate').value=JResult['arrivalDate'];
		document.getElementById('category').selected=JResult['category'];
		document.getElementById('name').value=JResult['name'];
		document.getElementById('specifications').value=JResult['specifications'];
		document.getElementById('price').value=JResult['price'];
		document.getElementById('description').value=JResult['description'];
		
		document.getElementById('img1').src= './users/'.concat( JResult['userPictureName'] );
		document.getElementById('img21').src= './items/'.concat( JResult['itemPictureName'] );
		document.getElementById('img22').src= './items/'.concat( JResult['itemPictureName2'] );
		document.getElementById('img23').src= './items/'.concat( JResult['itemPictureName3'] );
		document.getElementById('img24').src= './items/'.concat( JResult['itemPictureName4'] );
		
	});
	});
	
}

function editPublish(edit_handle)
{
	location.replace('/airsale/publish'.concat( String(edit_handle),'_edit.php')  );
}


</script>