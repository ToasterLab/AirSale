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
<title>Item Details</title>
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
            <li class='dropdown active'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li class='active'><a href='/airsale/explore.php' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
                    <li><a href='/airsale/my_history.php' class='btn'><i class='fa fa-history'></i> Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/publish.php' class='btn'><i class='fa fa-plus-circle'></i> Sell new items</a> </li>
                    <li><a href='/airsale/posted.php' class='btn'><i class='fa fa-history'></i> My Posted Items</a></li>
                </ul>
            
            </li>
        	</ul>
        </div>
    </div>
</nav>

<div class='container' style='padding-top:100pt'>
	<div class='row'>
    	<div class='panel panel-default'>
        	<div class='panel-heading'>
            <h3 id='name'></h3>
            <h4 id='seller'></h4>
            </div>
        	
            <div class='panel-body'>
            
            
            <div class='row'>
            <center>
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style='width:70%'>
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
                </div><!-- Carousel --></center>
             </div>  
             <div class='row'>
             <br>
             <table class='table-bordered table-responsive table-hover table'>
             <tr>
             	<td>	Price</td>
             	<td style='width:70%' id='price'>	</td>
             </tr>
             <tr>
             	<td>	Category</td>
             	<td style='width:70%' id='category'>	</td>
             </tr>
             <tr>
             	<td>	Specifications</td>
             	<td style='width:70%' id='specifications'>	</td>
             </tr>
             <tr>
             	<td>	Description</td>
             	<td style='width:70%' id='description'>	</td>
             </tr>
             <tr>
             	<td>	Seller's prefered hand-over location</td>
             	<td style='width:70%' id='location'>	</td>
             </tr>
             <tr>
             	<td>	Seller's contact number</td>
             	<td style='width:70%' id='number'>	</td>
             </tr>
             <tr>
             	<td>	Seller's email</td>
             	<td style='width:70%' id='email'>	</td>
             </tr>
             <tr>
             	<td>	Other method to contact seller</td>
             	<td style='width:70%' id='other'>	</td>
             </tr>
             <tr>
             	<td>	Seller's prefered method of contact</td>
             	<td style='width:70%' id='prefered'>	</td>
             </tr>
             <tr>
             	<td>	Seller's flight number</td>
             	<td style='width:70%' id='flightNumber'>	</td>
             </tr>
             <tr>
             	<td>	Seller's arrival date</td>
             	<td style='width:70%' id='arrivalDate'>	</td>
             </tr>
             <tr>
             	<td>	Seller's arrival country</td>
             	<td style='width:70%' id='arrivalCountry'>	</td>
             </tr>
             </table>
             <center>
             <button class='btn btn-lg btn-default'>Place order</button>
             </center>
             </div>
            </div>
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
    details_update();
});


function details_update()
{
	item_id = getCookie('detail_item_id');
	setSessionCookie('setItemID',item_id);
	$.post('http://airsale.lalx.org/api/airsale.php',{JSON:1,action:'setSession(item_id)viaCookie(setItemID)'},function()
	{
	$.post('http://airsale.lalx.org/api/airsale.php',{JSON:1,action:'itemAtSession_ItemID'},function(data) {
		JResult=$.parseJSON(data);
		document.getElementById('name').innerHTML=JResult['name'];
		document.getElementById('seller').innerHTML="Seller's user name: "+JResult['account'];
		document.getElementById('email').innerHTML=JResult['email'];
		document.getElementById('number').innerHTML=JResult['number'];
		document.getElementById('other').innerHTML=JResult['other'];
		document.getElementById('prefered').innerHTML=JResult['prefered'];
		document.getElementById('location').innerHTML=JResult['location'];
		document.getElementById('flightNumber').innerHTML=JResult['flightNumber'];
		document.getElementById('arrivalDate').innerHTML=JResult['arrivalDate'];
		document.getElementById('category').innerHTML=JResult['category'];
		document.getElementById('specifications').innerHTML=JResult['specifications'];
		document.getElementById('price').innerHTML=JResult['price'];
		document.getElementById('description').innerHTML=JResult['description'];
		document.getElementById('img21').src= './items/'.concat( JResult['itemPictureName'] );
		document.getElementById('img22').src= './items/'.concat( JResult['itemPictureName2'] );
		document.getElementById('img23').src= './items/'.concat( JResult['itemPictureName3'] );
		document.getElementById('img24').src= './items/'.concat( JResult['itemPictureName4'] );
	});
	
	});
}


</script>