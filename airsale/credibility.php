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
<title>Credibility Ratings</title>
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
                	<li><a href='/airsale/explore.php' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
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
            <li> <a href='/contact.html'><i class='fa fa-phone'></i> Contact</a></li>
        	</ul>
        </div>
    </div>
</nav>

<div>
	<div class='jumbotron' style="padding-top:100pt">
    <h1 id='head2' style="display:none"> Credibility Ratings<br></h1>
    </div>
</div>

<div class='container'>
	<div class='row'>
    	<h3 style="text-decoration:underline">Introduction</h3>
        <p>The credibility ratings system is created to provide information about the reliability of our users. This article will explain the criteria based on which credibility ratings are given to AirSale users.</p>
        <h3 style="text-decoration:underline">The credibility ratings system</h3>
    	<p>Credibility is rated out of a total of five levels. Each level and its respective criteria is listed on the table below.</p>
        <table class='table table-responsive table-bordered table-hover'>
        <tr>
        	<th><h3>Credibility rating</h3></th>
            <th><h3>Criteria to get this rating</h3></th>
        </tr>
        <tr>
        	<td><h3>0/5 <i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i></h3></td>
            <td>
            <p style="text-align:left">Default sign-up level:</p>
            <ul>
            	<li>Sign-up for an account at AirSale</li>
            </ul>
            </td>
        </tr>
        <tr>
        	<td><h3>1/5 <i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i></h3></td>
            <td>
            <p style="text-align:left">Basic level:<br>
			EITHER:</p>
            <ul>
            	<li>Verify identity using full name and an official photo ID</li>
            </ul>
            <p style="text-align:left">OR</p>
            <ul>
            	<li>Get AT LEAST 3 new items approved</li>
                <li>Get AT LEAST 1 successful transaction</li>
                <li>Place SGD$50 deposit at AirSale*</li>
            </ul>
            </td>
        </tr>
        <tr>
        	<td><h3>2/5 <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i></h3></td>
            <td>
            <p style="text-align:left">Moderately credible level:<br>
			BOTH:</p>
            <ul>
            	<li>Verify identity using full name and an official photo ID</li>
            </ul>
            <p style="text-align:left">AND ONE OF THE FOLLOWING</p>
            <ul>
            	<li>Get AT LEAST 10 new items approved</li>
                <li>Get AT LEAST 3 successful transaction</li>
                <li>Place SGD$50 deposit at AirSale*</li>
            </ul>
            </td>
        </tr>
        <tr>
        	<td><h3>3/5 <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i><i class='fa fa-star-o'></i></h3></td>
            <td>
            <p style="text-align:left">Credible level:<br>
			BOTH:</p>
            <ul>
            	<li>Verify identity using full name and an official photo ID</li>
                <li>No customer/seller complain or poor feedback</li>
            </ul>
            <p style="text-align:left">AND ONE OF THE FOLLOWING</p>
            <ul>
                <li>Get AT LEAST 5 successful transaction</li>
                <li>Place SGD$100 deposit at AirSale*</li>
            </ul>
            </td>
        </tr>
        <tr>
        	<td><h3>4/5 <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star-o'></i></h3></td>
            <td>
            <p style="text-align:left">Credible level:<br>
			ALL OF THE FOLLOWING:</p>
            <ul>
            	<li>Verify identity using full name and an official photo ID</li>
                <li>Get AT LEAST 5 successful transaction</li>
                <li>No customer/seller complain or poor feedback</li>
                <li>Place SGD$100 deposit at AirSale*</li>
            </ul>
            </td>
        </tr>
        <tr>
        	<td><h3>5/5 <i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i><i class='fa fa-star'></i></h3></td>
            <td>
            <p style="text-align:left">Highly credible level:<br>
			ALL OF THE FOLLOWING:</p>
            <ul>
            	<li>Verify identity using full name and an official photo ID</li>
                <li>Get AT LEAST 20 successful transaction</li>
                <li>No customer/seller complain or poor feedback</li>
                <li>Place SGD$100 deposit at AirSale*</li>
            </ul>
            </td>
        </tr>
        </table>
    </div>
    <div class='row'>
    <h4>NOTE: *Placing a deposit at AirSale does NOT incur any cost. All third party costs are born by AirSale. The deposit will be fully refundable at any period of time. Once the deposit is withdrawn, the criteria is NO LONGER considered satisfied and your credibility rating may be affected. Please contact us via the contact page or email info@lalx.org if you wish to make a deposit.</h4> 
    </div>
</div>
<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>
  