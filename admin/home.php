<?php
$_POST['admin']=1;
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
<title>AirSale ADMIN Control panel</title>
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
                	<li><a href='/airsale/publish.php' class='btn'> Publish new item</a> </li>
                    <li><a href='/airsale/posted.php' class='btn'><i class='fa fa-history'></i> My Posted Items</a></li>
                </ul>
            
            </li>
        	</ul>
        </div>
    </div>
</nav>

<div class='container'  style='padding:100pt 0 0 0'>
    <div class='row'>
        <h1> ADMIN CONCTROL PANEL</h1>
           
    <div class='col-md-12'>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Air Ticket approval</h3>
          </div>
          <div class="panel-body">
          <center>
            <div class='btn-group'>
                <button class='btn btn-default' onClick="$('#ticket-div').show(1000);updateTicketTable(1);">Display all unapproved air tickets and passenger information</button>
                <button class='btn btn-default' onClick="$('#ticket-div').show(1000);updateTicketTable(0);">Display all air tickets and passenger information</button>
            </div>
            </center>
            <div style='display:none' id='ticket-div'>
            <br>
            <table id='airTicket-table' class='table table-hover table-responsive'>
            <tr>
            	<th>ID</th>
            	<th>Account name</th>
                <th>User email</th>
                <th>Item Name</th>
                <th>Arrival country</th>
                <th>Arrival Date</th>
                <th>Flight Carrier</th>
                <th>Flight Number</th>
                <th>Approval button</th>
            </tr>
            </table>
            </div>
            
          </div>
        </div>
    </div>
    
    <div class='col-md-12'>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Feedback @ AirSale</h3>
          </div>
          <div class="panel-body">
            <div id='feedback-div'>
            <br>
            <table id='feedback-table' class='table table-hover table-responsive'>
            <tr>
            	<th>ID</th>
            	<th>Name</th>
                <th>Email</th>
                <th>Number</th>
                <th>Feedback</th>
            </tr>
            </table>
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

function updateUserTable()
{
	
	if(!Number(getCookie('displayed')))
	{
		var table=document.getElementById('user-table');
		var cell, row;
		for(var i=1; i <= Number( getElement('numberOfUsers')); i++)
		{
			row = table.insertRow();
			cell = row.insertCell();
			cell.innerHTML = getElement('user'.concat( String(i)));
			cell = row.insertCell();
			cell.innerHTML = getElement('country'.concat( String(i)));
			
		}
		
	}
	setSessionCookie('displayed','1');
}

function updateTicketTable(unapproved)
{
		$.post('../api/airsale.php',{JSON:1,action:'explore'},function(data) {
			JArray=$.parseJSON(data);
			var table=document.getElementById('airTicket-table');
			var cell, row;
			for(var i=0; JArray[i]!= null; i++)
			{
				item_id				=			JArray[i]["item_id"];
				flightNumber 		= 			JArray[i]["result"]["flightNumber"];
				flightCarrier 		= 			JArray[i]["result"]["flightCarrier"];
				if(flightNumber == null) flightNumber = 'User did not specify.';
				arrivalCountry 		=	 		JArray[i]["result"]["arrivalCountry"];
				if(arrivalCountry == ''||arrivalCountry == ' ') arrivalCountry = 'Currently not available.';
				arrivalDate		 	= 			JArray[i]["result"]["arrivalDate"];
				if(arrivalDate == null) arrivalDate = 'User did not specify.';
				name 				= 			JArray[i]["result"]["name"];
				price 				= 			JArray[i]["result"]["price"];
				email				=			JArray[i]["result"]["email"];
				number				=			JArray[i]["result"]["number"];
				description			=			JArray[i]["result"]["description"];
				isApproved			=			JArray[i]["result"]["isApproved"];
				account				=			JArray[i]["result"]["account"];
												
				if(unapproved == 0)
				{
					row = table.insertRow();
					cell = row.insertCell();
					cell.innerHTML = item_id;
					cell = row.insertCell();
					cell.innerHTML = account;
					cell = row.insertCell();
					cell.innerHTML = email;
					cell = row.insertCell();
					cell.innerHTML = name;
					cell = row.insertCell();
					cell.innerHTML = arrivalCountry;
					cell = row.insertCell();
					cell.innerHTML = arrivalDate
					cell = row.insertCell();
					cell.innerHTML = flightCarrier;
					cell = row.insertCell();
					cell.innerHTML = flightNumber;
					cell = row.insertCell();
					
					if(isApproved=='0')
					cell.innerHTML = "<a class='btn btn-default' onClick='approve("+item_id+")'>Approve</a>			<a class='btn btn-danger' onClick='reject("+item_id+")'>Reject</a><a class='btn btn-danger' onClick='item_delete("+item_id+")'>DELETE</a>";
					if(isApproved=='1') cell.innerHTML = "<a class='btn btn-success'>Approved</a>				<a class='btn btn-danger' onClick='reject("+item_id+")'>Reject</a><a class='btn btn-danger' onClick='item_delete("+item_id+")'>DELETE</a>";
					if(isApproved=='2') cell.innerHTML = "<a class='btn btn-info'>Rejected</a><a class='btn btn-default' onClick='approve("+item_id+")'>Approve</a><a class='btn btn-danger' onClick='item_delete("+item_id+")'>DELETE</a>";
				}
				
				if(unapproved == 1)
				{
					if(isApproved!='1'){
					row = table.insertRow();
					cell = row.insertCell();
					cell.innerHTML = item_id;
					cell = row.insertCell();
					cell.innerHTML = account;
					cell = row.insertCell();
					cell.innerHTML = email;
					cell = row.insertCell();
					cell.innerHTML = name;
					cell = row.insertCell();
					cell.innerHTML = arrivalCountry;
					cell = row.insertCell();
					cell.innerHTML = arrivalDate
					cell = row.insertCell();
					cell.innerHTML = flightCarrier;
					cell = row.insertCell();
					cell.innerHTML = flightNumber;
					cell = row.insertCell();
					if(isApproved=='0')
					cell.innerHTML = "<a class='btn btn-default' onClick='approve("+item_id+")'>Approve</a>			<a class='btn btn-danger' onClick='reject("+item_id+")'>Reject</a><a class='btn btn-danger' onClick='item_delete("+item_id+")'>DELETE</a>";
					if(isApproved=='1') cell.innerHTML = "<a class='btn btn-success'>Approved</a>				<a class='btn btn-danger' onClick='reject("+item_id+")'>Reject</a><a class='btn btn-danger' onClick='item_delete("+item_id+")'>DELETE</a>";
					if(isApproved=='2') cell.innerHTML = "<a class='btn btn-info'>Rejected</a><a class='btn btn-default' onClick='approve("+item_id+")'>Approve</a><a class='btn btn-danger' onClick='item_delete("+item_id+")'>DELETE</a>";
					}
				}
				
				
			}
		});	
}

function approve( var_item_id)
{
	var_item_id=String(var_item_id);
	$.post('../api/airsale.php',{admin:1,action:'admin_approveViaPost(item_id)',item_id:var_item_id},function()
	{
		$.post('../api/airsale.php',{JSON:1,action:'getFlightInfoAndInjectIntoSQLforItemWhereID=Post(item_id)',item_id:var_item_id},function(data) {
			
			if(data) alert('Approval successful. Changes on this page will be seen only after refeshing the page.');
			else alert('Approval operation FAILED.');
		});
	});
	
}

function reject( var_item_id)
{
	var_item_id=String(var_item_id);
	reject_reason=window.prompt("Reason for rejecting");
	if(reject_reason=='') reject_reason=null;
	$.post('../api/airsale.php',{admin:1,action:'admin_rejectViaPost(item_id)',item_id:var_item_id,reject_reason:reject_reason},function(data)
	{
		if(data) alert('Rejection successful. Changes on this page will be seen only after refeshing the page.');
		else alert('Reject operation FAILED.');
	});
	
}


function updateFeedback()
{
	$.post('/api/airsale.php',{JSON:1,action:'getFeedback'},function(data) {
		JArray = $.parseJSON(data);
		table=document.getElementById('feedback-table');
		for(ind=0;JArray[ind]!=null;ind++)
		{
			row = table.insertRow();
			
			row.insertCell().innerHTML = JArray[ind]["id"];
			row.insertCell().innerHTML = JArray[ind]["name"];
			row.insertCell().innerHTML = JArray[ind]["email"];
			row.insertCell().innerHTML = JArray[ind]["number"];
			row.insertCell().innerHTML = JArray[ind]["comment"];
		}
		
	});
	
}

function item_delete(var_item_id)
{
	$.post('/api/airsale.php',{admin:1,action:'admin_deleteViaPost(item_id)',item_id:String(var_item_id)}, function(data){
	if(data) alert('Delete operation is successful. Changes on this page will be seen only after refeshing the page.');
	else alert('Delete operation FAILED.');
});
	
}

$(document).ready(function(e) {
    deleteCookie('displayed');
	deleteCookie('displayed_ticket');
	updateFeedback()
});
</script>