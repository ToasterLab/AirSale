<!doctype html>
<html>
<head hreflang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="msvalidate.01" content="6738510A8888021CF044447BBD6D0C60" />
<link rel="stylesheet" href='/css/b.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<link rel="stylesheet" href='/css/gry2.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>
<title>AirSale</title>
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
                	<li><a href='/airsale/explore' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
                    <li><a href='/airsale/my_history' class='btn'><i class='fa fa-history'></i> Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/publish' class='btn'><i class='fa fa-plus-circle'></i> Sell new items</a> </li>
                    <li><a href='/airsale/posted' class='btn'><i class='fa fa-history'></i> My Posted Items</a></li>
                </ul>

            </li>
            <li class='active'> <a href='/airsale/contact'><i class='fa fa-phone'></i> Contact</a></li>
        	</ul>
        </div>
    </div>
</nav>



<div class='container-fluid' style="padding-top:100pt">
<div class='row'>
	<div class='col-sm-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h2>Li Xi: chief software developer and co-founder of LALX Singapore</h2>
            </div>

            <div class='panel-body'>
                <h4>Email: lixi@lalx.org</h4>
            </div>
        </div>
    </div>
    <div class='col-sm-6'>
        <div class='panel panel-default'>
            <div class='panel-heading'>
                <h2>Li An: co-founder of LALX Singapore</h2>
            </div>

            <div class='panel-body'>
                <h4>Email: lian@lalx.org</h4>
            </div>
        </div>
    </div>
</div>

<div class='row'>
<div class='col-sm-12'>
	<div class='panel panel-default'>
        <div class='panel-heading'>
            <h2>General enquiries</h2>
        </div>


        <div class='panel-body'>
            <p>Email: info@lalx.org</p>
            <form action='/api/airsale' enctype="multipart/form-data" method='POST'>
            <input type="hidden" name="action" value="contact">
            <div class='row'>
            	<div class='col-md-4'>
                <label>Your Name:</label>
                <input type='text' class='form-control' placeholder="Enter your name" name='name' id='name'>
                </div>

                <div class='col-md-4'>
                <label>Your email:</label>
                <input type='email' class='form-control' placeholder="Enter your email" name='email' id='email'>
                </div>

                <div class='col-md-4'>
                <label>Your contact number:</label>
                <input type='number' class='form-control' placeholder="Enter your contact number" name='number' id='number'>
                </div>
            </div>
            <br>
            <div class='row'>
            <div class='col-sm-12'>
            	<label>Feedback/Comment/Enquiry</label>
                <textarea class='form-control' rows='6' name='comment'></textarea>
            </div>
            </div>


            <center>
            <br><br>
            <button type='submit' class='btn btn-lg btn-default'>Submit</button>
            </center>
            </form>
        </div>
    </div>
</div>
</div>
</div>



<br>
<div class='modal-footer'>

	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>
