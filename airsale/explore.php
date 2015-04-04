<?php
include('/home/u979434920/public_html/airsale/api/airsale.php');
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href='/css/bootstrap.min.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<link rel="stylesheet" href='/css/font-awesome.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/airsale.js"></script>
<script src='/js/jquery.sticky.js'></script>

<title>EXPLORING AirSale!</title>
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
            <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li class="active"><a href='/airsale/explore.php' class='btn'> Explore</a> </li>
                    <li><a href='/airsale/my_history.php' class='btn'>Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/publish.php' class='btn'> Sell new items</a> </li>
                    <li><a href='/airsale/explore_destination.php' class='btn'>Explore destination airport</a></li>
                </ul>
            
            </li>
        	</ul>
        </div>
    </div>
</nav>

<div>
	<div class='jumbotron' style="padding-top:100pt">
    <h1 id='head3' style="display:none"> Exploring AirSale<br></h1>
    </div>
</div>


<div class='container'>

	<div class='row' id='sticky'>
        <div class='btn-group btn-group-justified' role='group'>
            <div class='btn-group'>
            <button class='btn btn-default btn-lg dropdown-toggle' data-toggle="dropdown"><i class='fa fa-dollar'></i> Sort by prices<span class='caret'></span></button>
            <ul class='dropdown-menu' role='menu'>
            	<li> <a class='btn' id=''><i class='fa fa-arrow-circle-up'></i> From the lowest to highest</a></li>
                <li> <a class='btn' id=''><i class='fa fa-arrow-circle-down'></i> From the highest to lowest</a></li>
            </ul>
            </div>
            
            <div class='btn-group'>
            <button class='btn btn-default btn-lg dropdown-toggle' data-toggle="dropdown"><i class='fa fa-smile-o'></i> Credibility (Customer rating)<span class='caret'></span></button>
            <ul class='dropdown-menu' role='menu'>
            	<li> <a class='btn' id=''><i class='fa fa-stack fa-thumbs-up fa-circle '></i> From the highest to lowest</a></li>
                <li> <a class='btn' id=''><i class='fa fa-stack fa-thumbs-down fa-circle'></i> From the lowest to highest</a></li>
            </ul>
            </div>
            
            <div class='btn-group'>
            <button class='btn btn-default btn-lg dropdown-toggle' data-toggle="dropdown"><i class='fa fa-plane'></i> Flight arrival time<span class='caret'></span></button>
            <ul class='dropdown-menu' role='menu'>
            	<li> <a class='btn' id=''><i class='fa fa-forward'></i> From the closest to today to latest</a></li>
                <li> <a class='btn' id=''><i class='fa fa-backward'></i> From the latest to closest</a></li>
            </ul>
            </div>
        </div>
    </div>
    
    
    
    <div class='row' style="padding-bottom:1000pt">
    
    
    
    
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
	var response = $.post( "../api/airsale.php", {action:'explore'});
  response.done( function(data){
	 $('html').append(data); 
  });
});

</script>