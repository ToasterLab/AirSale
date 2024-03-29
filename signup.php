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
<title>AirSale SIGNUP</title>
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
    <h1> Sign-up for AirSale!<br></h1>
</div>

<div class='container'>
	<div class='row'>
      <form role="form" action='/api/airsale' method="post"  onSubmit="return formValidate();" enctype="multipart/form-data">
      <div class='col-xs-12'>
      <center>
      <h4>All information collected will NOT under any circumstance be released in any form to any party for any reason. Information is securely stored on our servers. Please note that compulsory fields are marked with an asterisk *.</h4>
      </center><br><br>
      </div>
      <input type='hidden' name='action' value="signup">
      <div class='row'>
        <div class="form-group col-sm-4" id='user-div'>
          <label><i class='fa fa-user'></i> *User name:</label>
          <input class="form-control" name="user" placeholder="Enter user name" id='user'>
        </div>

        <div class="form-group col-sm-4" id='password1-div'>
          <label for="password"><i class='fa fa-key'></i> *Password:</label>
          <input class="form-control" name="password" placeholder="Enter your password" type='password' id='password1'>
        </div>

        <div class="form-group col-sm-4" id='div-pw'>
          <label for="password"><i class='fa fa-key'></i> *Confirm your password:</label>
          <input class="form-control" name="password_2" placeholder="Enter your password again" type='password' id='password2'>
          <label id='pw-status' class='has-error'></label>
        </div>

      </div>

      <div class='row'>
        <div class="form-group col-sm-4" id='email1-div'>
          <label><i class='fa fa-envelope-o'></i> *Email:</label>
          <input class="form-control" name="email" placeholder="Enter email" type="email" id='email1'>
          <label class='alert-info'>We will send you important notifications via this email. Thus, please check carefully that this is the correct email.</label>
        </div>

        <div class="form-group col-sm-4" id='email-div'>
          <label><i class='fa fa-envelope-o'></i> *Confirm your email:</label>
          <input class="form-control" name="email_2" placeholder="Enter email" type="email" id='email2'>
          <label id='email-status'></label>
        </div>

        <div class="form-group col-sm-4" id='country-div'>
          <label><i class='fa fa-globe'></i> *Current country of residence:</label>
          <input class="form-control" name="country" placeholder="Enter country of residence" id='country'>
        </div>
      </div>

      <div class='row'>
        <div class='col-sm-4 form-group' id='number-div'>
        <label><i class='fa fa-phone'></i> *Contact number</label>
        <input class='form-control' type='text' name='number' id='number' placeholder="Contact Number">
        </div>

      	<div class='col-sm-4 form-group' id='location-div'>
        <label><i class='fa fa-exchange'></i> *Prefered hand-over location</label>
        <input type='text' class='form-control' name='location' id='location' placeholder="eg. Airport">
        </div>

        <div class='form-group col-sm-4' id='prefered-div'>
        <label><i class='fa fa-check-square-o'></i> *Prefered method of contact</label>
        <input type='text' class='form-control' name='prefered' id='prefered' value="Message">
        </div>
      </div>

      <div class='row'>
       	<div class='col-md-4 form-group' id='other-div'>
        <label><i class='fa fa-list'></i> Other method to contact me(format: method-account)</label>
        <input type='text' class='form-control' name='other' id='other' placeholder="eg. MSN-a@a.com">
        </div>

        <div class='form-group col-sm-4' id='fullName-div'>
        <label><i class='fa fa-lock'></i> *Full Name(as in official identification documents)</label>
        <input type='text' class='form-control' name='fullName' id='fullName' placeholder="Joe Example Name or Tan Ah Kau">
        </div>

        <div class='form-group col-md-4' id='userPicture-div'>
        <label><i class='fa fa-camera'></i> Picture of photo ID: (ONLY picture files are allowed, that is jpg, jpeg, png, etc.)</label>
        <input class='form-control' type='file' name='userPicture' id='userPicture' accept="image/*">
        <label for='picture-instruction' class='alert-danger'> You are recommended to upload a picture of any photo identification documents such as IC card. This will improve your credibility rating, which is visible by both buyers and sellers. This picture will not be accessible by anyone (including you) once your identity is validated. </label>
        </div>

      </div>
        <center>
        <button type="submit" class="btn btn-default btn-lg" >Submit</button><br>
        <label> <a href="/airsale/login" class='btn'>If you have an account already, log in here</a></label>
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
   window.setInterval( function() { $('#password2').on('blur', checkform());},500);

});


function checkform()
{
	if( document.getElementById('password1').value != document.getElementById('password2').value )
	{
		$('#div-pw').addClass('has-error');
		document.getElementById('pw-status').innerHTML = 'Passwords do not match';
		setCookie('error','1',1);
	}
	else
	{
		$('#div-pw').removeClass('has-error');
		document.getElementById('pw-status').innerHTML = ' ';
		setCookie('error','1',0);
	}

	if( document.getElementById('email1').value != document.getElementById('email2').value )
	{
		$('#email-div').addClass('has-error');
		document.getElementById('email-status').innerHTML = 'Emails do not match';
		setCookie('error','1',1);
	}
	else
	{
		$('#email-div').removeClass('has-error');
		document.getElementById('email-status').innerHTML = ' ';
		setCookie('error','1',0);
	}
}

function formValidate()
{
	error = true;	//false indicates there is an error
	if($('#user').val()=='') {$('#user-div').addClass('has-error');error=false;}
	else {$('#user-div').removeClass('has-error');error=error&true;}
	if($('#password1').val()=='') {$('#password1-div').addClass('has-error');error=false;}
	else {$('#password1-div').removeClass('has-error');error=error&true;}
	if($('#email1').val()=='') {$('#email1-div').addClass('has-error');error=false;}
	else {$('#email1-div').removeClass('has-error');error=error&true;}
	if($('#country').val()=='') {$('#country-div').addClass('has-error');error=false;}
	else {$('#country-div').removeClass('has-error');error=error&true;}

	if($('#number').val()=='') {$('#number-div').addClass('has-error');error=false;}
	else {$('#number-div').removeClass('has-error');error=error&true;}
	if($('#location').val()=='') {$('#location-div').addClass('has-error');error=false;}
	else {$('#location-div').removeClass('has-error');error=error&true;}
	if($('#prefered').val()=='') {$('#prefered-div').addClass('has-error');error=false;}
	else {$('#prefered-div').removeClass('has-error');error=error&true;}
	if($('#fullName').val()=='') {$('#fullName-div').addClass('has-error');error=false;}
	else {$('#fullName-div').removeClass('has-error');error=error&true;}

	if(error==false) {alert('Please check for any missing fields that are highlighted in red. Please note that compulsory fields are marked with an asterisk *.');return false;}
	else return true;
}
</script>
