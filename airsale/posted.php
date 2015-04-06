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
<script src='/js/j2.js'></script>

<title>My Posted Items</title>
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
            <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/explore.php' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
                    <li><a href='/airsale/my_history.php' class='btn'><i class='fa fa-history'></i> Past Purchases</a></li>
                </ul>
            </li>
            <li class='dropdown active'>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a seller!<span class='caret'></span></a>
          	 	 <ul class='dropdown-menu' role='menu'>
                	<li><a href='/airsale/publish.php' class='btn'><i class='fa fa-plus-circle'></i> Sell new items</a> </li>
                    <li class='active'><a href='/airsale/posted.php' class='btn'><i class='fa fa-history'></i> My Posted Items</a></li>
                </ul>
            
            </li>
        	</ul>
        </div>
    </div>
</nav>

<div>
	<div class='jumbotron' style="padding-top:100pt">
    <h1 id='head3' style="display:none"><i class='fa fa-history'></i> Viewing my posted items<br></h1>
    </div>
</div>

<div class='container' style="text-align:center; padding-top:20pt">    
<div class='table-responsive'>
	<table id='display_table' class='table table-hover table-bordered' >
    <tr>
    	<th style="width:33%"><i class='fa fa-camera'></i> Snapshot and name of the item</th>
        <th><i class='fa fa-dollar'></i> Price</th>
        <th><i class='fa fa-plane'></i> Seller's arrival country</th>
        <th><i class='fa fa-plane'></i> Seller's arrival date and time</th>
        <th><i class='fa fa-gears'></i> Action</th>
    </tr>
    </table>
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
	display_data();
});


function display_data()
{
	var table=document.getElementById('display_table');
	var cell,row;
	var JArray;
	$.post('../api/airsale.php',{concise:'1',action:'seller_history'},function(data){
			JArray = $.parseJSON(data);
			for(i=0;JArray[i];i++)
			{
			//get the variables
				item_id				=			JArray[i]["item_id"];
				flightNumber 		= 			JArray[i]["result"]["flightNumber"];
				arrivalCountry 		=	 		JArray[i]["result"]["arrivalCountry"];
				arrivalDate		 	= 			JArray[i]["result"]["arrivalDate"];
				name 				= 			JArray[i]["result"]["name"];
				price 				= 			JArray[i]["result"]["price"];
				email				=			JArray[i]["result"]["email"];
				number				=			JArray[i]["result"]["number"];
				description			=			JArray[i]["result"]["description"];
				itemPictureName 	= 			JArray[i]["result"]["itemPictureName"];
				//put them into the table
				row = table.insertRow();
				cell = row.insertCell();
				img = document.createElement('img');
				img.src = './items/'.concat(itemPictureName);
				img.style.width = '50%';
				img.style.display='block';
				img.style.marginLeft='auto';
				img.style.marginRight='auto';
				cell.appendChild(img);
				title = document.createElement('h3');
				title.innerHTML = name;
				cell.appendChild(title);
				
				price_tag = document.createElement('h2');
				price_tag.innerHTML='$'+price;
				cell = row.insertCell();
				cell.style.position='relative';
				cell.appendChild(price_tag );
				
				cell = row.insertCell();
				cell.style.position='relative';
				arrivalCountry_tag = document.createElement('h3');
				arrivalCountry_tag.innerHTML = arrivalCountry+"(Flight Number: "+ flightNumber + ")";
				cell.appendChild(arrivalCountry_tag);
				
				cell = row.insertCell();
				cell.style.position='relative';
				arrivalDateTime_tag = document.createElement('h3');
				arrivalDateTime_tag.innerHTML = arrivalDate;
				cell.appendChild(arrivalDateTime_tag);
				
				cell = row.insertCell();
				cell.style.position='relative';
				action1_tag = document.createElement('a');
				action1_tag.innerHTML = '<i class="fa fa-plus-circle"></i> Details';
				action1_tag.className = 'btn btn-default';
				cell.appendChild(action1_tag);
				
				cell.appendChild(document.createElement('br'));cell.appendChild(document.createElement('br'));
				action2_tag = document.createElement('a');
				action2_tag.innerHTML = '<i class="fa fa-pencil"></i> Edit';
				action2_tag.setAttribute("onClick",'itemEdit(' + item_id + ');');
				action2_tag.className = 'btn btn-info';
				cell.appendChild(action2_tag);
				
			}
	});

	
}

function itemEdit(item_id)
{
	setSessionCookie('edit_item_id',item_id);
	$.post('../api/airsale.php',{action:'setSession(item_id)viaCookie(edit_item_id)'});
	location.replace('publish1_edit.php');
}


</script>

