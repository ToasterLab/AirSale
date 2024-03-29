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
<title>AirSale LOGIN</title>
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
            <a href='/index' class='navbar-brand'> AirSale</a>
        </div>

        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li class='active'> <a href='/login'><i class='fa fa-key'></i> Login here</a></li>
            <li> <a href='/contact'><i class='fa fa-phone'></i> Contact</a></li>
        	</ul>
        </div>
    </div>
</nav>


<div class='jumbotron' style="padding-top:100pt">
    <h1><i class='fa fa-key'></i> Log-in to AirSale<br></h1>
    <div class='container'>
      <form role="form" action='/api/airsale' method="post" >
      <input type='hidden' name="action" value='login'>
      <div class='row'>
        <div class="form-group col-md-6">
          <label>User name:</label>
          <input class="form-control" name="user" placeholder="Enter user name">
        </div>

        <div class="form-group col-md-6">
          <label for="password">Password:</label>
          <input class="form-control" name="password" placeholder="Enter your password" type='password'>
        </div>
        <br><br>
        <center>
        <button type="submit" class="btn btn-default btn-lg">Submit</button>
        <label> <br>
		<a href="/signup" class='btn'>Sign up for an account here</a></label>
        </center>
      </form>
      </div>
</div>


<div class='modal-footer'>
	<p>  ©2015 Li Xi</p>
</div>

</body>
</html>
