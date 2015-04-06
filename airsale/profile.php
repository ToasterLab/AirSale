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
        	<div class='panel-body'>
            <form action='../api/airsale.php' enctype="multipart/form-data" method='POST' onSubmit="return validateForm()">
            <input type='hidden' name='action' value='profile_update'>
            <label> If you need to update any field, edit the corresponding field and click submit. Other fields will not be affected. </label><br><br>
            <div class='row'>
              <div class='col-sm-4'>
            	<label><i class='glyphicon glyphicon-user'></i> User Name</label>
            	<p class='form-control-static form-control' id='name-form'></p>
              </div>
              <div class='col-sm-4'>
                <label><i class='fa fa-barcode'></i> Unique user ID (Useful for technical support)</label>
            	<p class='form-control-static form-control' id='id-form'></p>
              </div>
              
              <div class='col-sm-4'>
                <label><i class='fa fa-envelope-o'></i> Email</label>
            	<input class='form-control' type='text' id='email-form' name='email'>
              </div>
              
            </div><br>
            
            <div class='row'>
            
             <div class='col-sm-4 form-group' id='number-div'>
       		 <label><i class='fa fa-phone'></i> Contact number</label>
      		 <input class='form-control' type='text' name='number' id='number' placeholder="Contact Number">
     		 </div>
             
             <div class='col-sm-4'>
             <label><i class='fa fa-globe'></i> Country of residence</label>
           	 <input type='text' class='form-control' id='country-form' name='country'>
             </div>
              
             <div class='col-sm-4 form-group' id='location-div'>
             <label><i class='fa fa-exchange'></i> Prefered hand-over location</label>
             <input type='text' class='form-control' name='location' id='location' placeholder="eg. Airport">
             </div>
            </div><br>
            
            <div class='row'>
            
            <div class='col-md-8 form-group' id='other-div'>
            <label><i class='fa fa-list'></i> Other method to contact me(format: method-account)</label>
            <input type='text' class='form-control' name='other' id='other' placeholder="eg. MSN-a@a.com">
            </div>
            <div class='form-group col-md-4' id='prefered-div'>
            <label><i class='fa fa-check-square-o'></i> Prefered method of contact</label>
            <input type='text' class='form-control' name='prefered' id='prefered' value="Message">
            </div>
            
            </div><br>
            
            
            <div class='row'>
              <div class='col-sm-3' id='password1-div'>
              <label><i class='fa fa-key'></i> New password</label>
           	  <input type='password' class='form-control' id='password1' name='password'>
              </div>
              <div class='col-sm-3' id='password2-div'>
              <label><i class='fa fa-key'></i> Confirm password</label>
           	  <input type='password' class='form-control' id='password2'>
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
	document.getElementById('name-form').innerHTML = getCookie('auth');
	$.post('http://airsale.lalx.org/api/airsale.php',{mobile:1,action:'user_profile'},function(data) {
	JArray=$.parseJSON(data);	
	document.getElementById('id-form').innerHTML = JArray["id"];
	document.getElementById('email-form').value = JArray["email"];
	document.getElementById('country-form').value = JArray["country"];
	document.getElementById('number').value=JArray['number'];
	document.getElementById('other').value=JArray['other'];
	document.getElementById('prefered').value=JArray['prefered'];
	document.getElementById('location').value=JArray['location'];
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