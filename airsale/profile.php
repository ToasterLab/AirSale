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
<title>User Profile</title>
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
            <li  class='active'> <a href='/airsale/profile.php' id='nav-log-in'> </a></li>
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
            <li> <a href='/airsale/contact.html'><i class='fa fa-phone'></i> Contact</a></li>
        	</ul>
        </div>
    </div>
</nav>

<div>
	<div class='jumbotron' style="padding-top:100pt">
    <h1 id='head1' style="display:none"> <i class='glyphicon glyphicon-user'></i> <br></h1>
    </div>
</div>


<div class='container'>
	<div class='row'>
    	<div class='panel panel-default'>
        	<div class='panel-heading'>
            <div class='row'>
        	  <div class='col-sm-4'>
            	<label><i class='glyphicon glyphicon-user'></i> User Name</label>
            	<p class='form-control-static form-control' id='name'></p>
              </div>
              <div class='col-sm-4'>
                <label><i class='fa fa-barcode'></i> Unique user ID (Useful for technical support)</label>
            	<p class='form-control-static form-control' id='id'></p>
              </div>
              <div class='col-sm-4'>
              	<label><i class='fa fa-lock'></i> Identity validation status</label>
            	<p class='form-control-static form-control' id='validation'></p>
              </div>
            </div><br><br>
            <div class='row'>
              <div class='col-sm-6'>
            	<label><i class='fa fa-trophy'></i> Your credibility rating</label>
            	<p class='form-control-static form-control' id='credibility'></p>
                <label> There are 3 ways to improve your credibility. 1. Validate your identity by uploading a picture of your photo ID with your full-name. 2. Strike a deal with someone and complete the transaction. 3. Pay a deposit of SGD$100 to Airsale. You can withdraw your deposit at any time you wish. <span><a href='./credibility.php'> Click here to learn more about credibility ratings</a></span></label>
              </div>
              <div class='col-sm-6'>
                <label><i class='fa fa-cart-plus'></i> Number of successful transactions</label>
            	<p class='form-control-static form-control' id='transactions'></p>
              </div>            
            </div>
        	</div>
        
        	<div class='panel-body'>
            <form action='../api/airsale.php' enctype="multipart/form-data" method='POST' onSubmit="return validateForm()">
            <input type='hidden' name='action' value='profile_update'>
            <label> If you need to update any field, edit the corresponding field and click submit. Other fields will not be affected. </label><br><br>
            <div class='row'>
              
              <div class='col-sm-4' id='password1-div'>
              <label><i class='fa fa-key'></i> New password</label>
           	  <input type='password' class='form-control' id='password1' name='password'>
              </div>
              <div class='col-sm-4' id='password2-div'>
              <label><i class='fa fa-key'></i> Confirm password</label>
           	  <input type='password' class='form-control' id='password2'>
              </div>
              
              <div class='col-sm-4'>
                <label><i class='fa fa-envelope-o'></i> Email</label>
            	<input class='form-control' type='text' id='email' name='email'>
              </div>
              
            </div><br>
            
            <div class='row'>
              
             <div class='col-sm-4 form-group' id='number-div'>
       		 <label><i class='fa fa-phone'></i> Contact number</label>
      		 <input class='form-control' type='text' name='number' id='number' placeholder="Contact Number">
     		 </div>
             
             <div class='col-sm-4'>
             <label><i class='fa fa-globe'></i> Country of residence</label>
           	 <input type='text' class='form-control' id='country' name='country'>
             </div>
              
             <div class='col-sm-4 form-group' id='location-div'>
             <label><i class='fa fa-exchange'></i> Prefered hand-over location</label>
             <input type='text' class='form-control' name='location' id='location' placeholder="eg. Airport">
             </div>
            </div><br>
            
            <div class='row'>
            <div class='col-sm-4 form-group' id='other-div'>
            <label><i class='fa fa-list'></i> Other method to contact me(format: method-account)</label>
            <input type='text' class='form-control' name='other' id='other' placeholder="eg. MSN-a@a.com">
            </div>
            <div class='form-group col-sm-4' id='prefered-div'>
            <label><i class='fa fa-check-square-o'></i> Prefered method of contact</label>
            <input type='text' class='form-control' name='prefered' id='prefered' value="Message">
            </div>
            <div class='form-group col-sm-4' id='fullName-div'>
            <label><i class='fa fa-lock'></i> Full Name</label>
            <input type='text' class='form-control' name='fullName' id='fullName'>
            </div>
            </div><br>
                          
            <div class='row'>
            <div class='form-group col-xs-12' id='userPicture-div'>
            <label><i class='fa fa-camera'></i> Picture of photo ID: (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
            <input class='form-control' type='file' name='userPicture' id='userPicture' accept="image/*">
            </div>
            </div>
            <center><br>
            <button type='submit' class='btn btn-default btn-lg'>Confirm</button>
            </center><br><br>
            </form>
            
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
	var JArray;
    document.getElementById('head1').innerHTML = "<span class='glyphicon glyphicon-user'></span>".concat(getCookie('auth'));
	document.getElementById('name').innerHTML = getCookie('auth');
	$.post('http://airsale.lalx.org/api/airsale.php',{mobile:1,action:'user_profile'},function(data) {
	JArray=$.parseJSON(data);	
	document.getElementById('id').innerHTML = JArray["id"];
	document.getElementById('email').value = JArray["email"];
	document.getElementById('country').value = JArray["country"];
	document.getElementById('number').value=JArray['number'];
	document.getElementById('other').value=JArray['other'];
	document.getElementById('prefered').value=JArray['prefered'];
	document.getElementById('location').value=JArray['location'];
	document.getElementById('fullName').value=JArray['fullName'];
	if(Number(JArray['identityValidation']))
	document.getElementById('validation').innerHTML = "Identity is validated by photo ID";
	else document.getElementById('validation').innerHTML = "Identity has NOT been validated";
	document.getElementById('transactions').innerHTML=JArray['successfulTransactions'];
	
	document.getElementById('credibility').innerHTML=JArray["credibility"] + "/5  ";
	for(i=Number(JArray["credibility"]);i>=1;i--)  
	{
		tag = document.createElement('i');
		tag.className='fa fa-star';
		document.getElementById('credibility').appendChild(tag);
	}
	for(i=5-Number(JArray["credibility"]);i>=1;i--)  
	{
		tag = document.createElement('i');
		tag.className='fa fa-star-o';
		document.getElementById('credibility').appendChild(tag);
	}
	
	window.setInterval(function() {validateFormRealTime()},100);
	});
});

function validateFormRealTime()
{
	if(document.getElementById('password1') != null)
	{
	if($('#password1').val() != $('#password2').val() ) {$('#password1-div').addClass('has-error');$('#password2-div').addClass('has-error');}
	else {$('#password1-div').removeClass('has-error');$('#password2-div').removeClass('has-error');}
	}
}

function validateForm()
{
	error=0;
	if(document.getElementById('password1') != null)
	{
		if($('#password1').val()=='') {$('#password1-div').addClass('has-error');error=1;}
		else {$('#password1-div').removeClass('has-error');error=0;}
		if($('#password2').val()=='') {$('#password2-div').addClass('has-error');error=1;}
		else {$('#password2-div').removeClass('has-error');error=0;}
		if($('#password1').val() != $('#password2').val() ) {$('#password1-div').addClass('has-error');$('#password2-div').addClass('has-error');error=1;}
	else {$('#password1-div').removeClass('has-error');$('#password2-div').removeClass('has-error');error=0;}
	}
	if(error) {alert('Passwords entered are not matched. Please try again.');return false;}
	else return true;
}

</script>