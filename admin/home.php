<?php
ob_start();
echo '<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">';
$servername = "mysql.hostinger.co.uk";
$username = "u814771946_root";
$password = "_MYsql";
$db = "u814771946_root";
$table = 'Entry'.base64_decode($_COOKIE['auth']);
setcookie('debug','0',time()+30*85400,'/');
$debug=$_COOKIE['debug'];
function setElement($element_name,$element_value)
{
	echo '<p id="'.$element_name.'" style="display:none">'.$element_value.'</p>';
}


$conn = mysqli_connect($servername, $username, $password,$db);

$sql = "SELECT user,password,country FROM user_list";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		setElement('user'.$i,base64_encode($row['user']));
		setElement('country'.$i,base64_encode($row['country']));
		
		$i++;
	}
	setElement('numberOfUsers',base64_encode($i-1));
}

$sql = "SELECT paragraphs FROM admin_intro";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		setElement('paragraphs',$row['paragraphs']);
		$i++;
	}
	setElement('numberOfParagraphs',base64_encode($i-1));
}

$sql = "SELECT ticketName,isApproved,fullName,passport,flightNumber,flightCarrier,arrivalDateTime,arrivalCountry,departureCountry,id,account FROM publish1";
$result = mysqli_query($conn, $sql);
$i=1;
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		setElement('isApproved'.$i,base64_encode($row['isApproved']));
		setElement('ticketName'.$i,base64_encode($row['ticketName']));
		setElement('fullName'.$i,base64_encode($row['fullName']));
		setElement('passport'.$i,base64_encode($row['passport']));
		setElement('flightNumber'.$i,base64_encode($row['flightNumber']));
		setElement('flightCarrier'.$i,base64_encode($row['flightCarrier']));
		setElement('arrivalDateTime'.$i,base64_encode($row['arrivalDateTime']));
		setElement('arrivalCountry'.$i,base64_encode($row['arrivalCountry']));
		setElement('departureCountry'.$i,base64_encode($row['departureCountry']));
		setElement('id'.$i,base64_encode($row['id']));
		setElement('account'.$i,base64_encode($row['account']));
		$i++;
	}
	setElement('numberOfTickets',base64_encode($i-1));
}

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href='/css/bootstrap.min.css'>
<link rel="stylesheet" href='/css/gryphon.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>
<script src="/js/airsale.js"></script>
<title>AirSale ADMIN Control panel</title>
</head>
<body>

<script>
function updateTable()
{
	document.getElementById('parag').innerHTML=getElement('paragraphs');
}

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

function updateTicketTable(approved)
{
	
	if(!Number(getCookie('displayed_ticket')))
	{
		var table=document.getElementById('airTicket-table');
		var cell, row;
		for(var i=1; i <= Number( getElement('numberOfTickets')); i++)
		{
			if(approved==0 && (!Number( getElement('isApproved'.concat( String(i))))))
			{
				row = table.insertRow();
				cell = row.insertCell();
				cell.innerHTML = getElement('account'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('fullName'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('passport'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('departureCountry'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('arrivalCountry'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('arrivalDateTime'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('flightCarrier'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('flightNumber'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = '<a class="btn" href="/airsale/tickets/'.concat(getElement('ticketName'.concat( String(i))),'" >Click to download</a>');
				cell = row.insertCell();
				cell.innerHTML = "<a class='btn btn-default' onClick='approve(".concat( getElement('id'.concat(String(i))),")'>Approve</a>");
			}
			
			if(approved==1)
			{
				row = table.insertRow();
				cell = row.insertCell();
				cell.innerHTML = getElement('account'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('fullName'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('passport'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('departureCountry'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('arrivalCountry'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('arrivalDateTime'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('flightCarrier'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = getElement('flightNumber'.concat( String(i)));
				cell = row.insertCell();
				cell.innerHTML = '<a class="btn" href="/airsale/tickets/'.concat(getElement('ticketName'.concat( String(i))),'" >Click to download</a>');
				cell = row.insertCell();
				if(!Number( getElement('isApproved'.concat( String(i)))))
				cell.innerHTML = "<a class='btn btn-default' onClick='approve(".concat( getElement('id'.concat(String(i))),")'>Approve</a>");
				else cell.innerHTML = "<a class='btn btn-success'>Approved</a>";
			}
			
			
		}
		
	}
	setSessionCookie('displayed_ticket','1');
	
}

function approve( ticket_id)
{
	ticket_id=String(ticket_id);
	setCookie('approve-ticket-id',ticket_id,1);
	location.replace('/admin/approve.php');
}


$(document).ready(function(e) {
    deleteCookie('displayed');
	deleteCookie('displayed_ticket');
});
</script>

<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
	<div class='container-fluid'>
    	<div class='navbar-header'>
        	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#page-navG" >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
       		<span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a href='/airsale/home.html' class='navbar-brand'> AirSale</a>
        </div>
        
        <div id="page-navG" class="collapse navbar-collapse" >
        	<ul class='nav navbar-nav'>
            <li> <a href='/airsale/profile.php' id='nav-log-in'> </a></li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/explore.php' class='btn'> Explore</a> </li>
                    <li><a href='/airsale/my_history.php' class='btn'>Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/publish.php' class='btn'> Publish new item</a> </li>
                    <li><a href='/airsale/explore_destination.php' class='btn'>Explore destination airport</a></li>
                </ul>
            
            </li>
        	</ul>
        </div>
    </div>
</nav>

<div class='container'  style='padding:100pt 0 0 0'>
    <div class='row'>
        <h1> ADMIN CONCTROL PANEL</h1>
    
    <div class='col-md-6'>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">About Page Control Panel</h3>
          </div>
          <div class="panel-body">
            <div class='btn-group '>
                <button onClick="$('#intro-div').toggle(1000);updateTable();" class='btn btn-default'>Display and edit description paragraphs/pointers</button>
            </div>
            
            <div style='display:none' id='intro-div'>
            <br>
            <form action='/admin/intro_push.php' role='form' method="post">
            	<label>Description paragraphs/pointers in the database</label><br><br>
                <textarea class='form-control' rows="10" id='parag' name='paragraphs'></textarea><br><br>
            	<button type='submit' class='btn btn-lg'>Submit</button>
            </form>
            </div>
          </div>
        </div>
    </div>
    
    <div class='col-md-6'>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">User list Control Panel</h3>
          </div>
          <div class="panel-body">
            <div class='btn-group'>
                <button class='btn btn-default' onClick="$('#user-div').toggle(1000);updateUserTable();">Display all user names with countries of residence</button>
            </div>
            
            <div style='display:none' id='user-div'>
            <br>
            <table id='user-table' class='table'>
            <tr>
            	<th> Users</th>
                <th> Country of residence</th>
            </tr>
            </table>
            </div>
            
          </div>
        </div>
    </div>
    
    
    <div class='col-md-12'>
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Air Ticket approval</h3>
          </div>
          <div class="panel-body">
            <div class='btn-group'>
                <button class='btn btn-default' onClick="$('#ticket-div').show(1000);updateTicketTable(0);">Display all unapproved air tickets and passenger information</button>
                <button class='btn btn-default' onClick="$('#ticket-div').show(1000);updateTicketTable(1);">Display all air tickets and passenger information</button>
            </div>
            
            <div style='display:none' id='ticket-div'>
            <br>
            <table id='airTicket-table' class='table'>
            <tr>
            	<th>Account name</th>
            	<th>Passenger full name</th>
                <th>Passenger passport number</th>
                <th>Departure country</th>
                <th>Arrival country</th>
                <th>Arrival time</th>
                <th>Flight Carrier</th>
                <th>Flight Number</th>
                <th>Passenger airTicket</th>
                <th>Approval button</th>
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