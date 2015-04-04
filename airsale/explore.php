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

	<div class='row visible-md visible-lg' id='sticky'>
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
    
    <div class='row visible-sm visible-xs'>
    <center>
        <div class='btn-group btn-group-vertical' role='group'>
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
        </center>
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
	var response = $.post( "../api/airsale.php", {action:'explore'});
  response.done( function(data){
	 $('html').append(data); 
	 display_data();
  });
  
});

function display_data()
{
	var table=document.getElementById('display_table');
	var cell,row;
	for(i=1;i<Number( getElement('numberOfItems'));i++)
	{
		//get the variables
		flightNumber=getElement( 'flightNumber'.concat(String(i)));
		arrivalCountry=getElement( 'arrivalCountry'.concat(String(i)));
		arrivalDateTime=getElement( 'arrivalDateTime'.concat(String(i)));
		item_id = getElement( 'item_id'.concat(String(i)));
		name = getElement('name'.concat(item_id));
		price= getElement('price'.concat(item_id));
		description= getElement('description'.concat(item_id));
		itemPictureName= getElement('itemPictureName'.concat(item_id));
		itemPictureName2= getElement('itemPictureName2'.concat(item_id));
		itemPictureName3= getElement('itemPictureName3'.concat(item_id));
		itemPictureName4= getElement('itemPictureName4'.concat(item_id));
		number = getElement('number'.concat(item_id));
		email= getElement('email'.concat(item_id));
		account_name=  getElement('account_name'.concat(item_id));
		
		/*
		$.post('../api/airsale.php',{mobile:'1',action:'exploreJSON_Get'},function(data){
			JArray = $.parseJSON(data);
		});
		
		item_id=JArray.item_id;
		flightNumber = 					JArray.result.flightNumber;
		arrivalCountry = 				JArray.result.arrivalCountry;
		arrivalDateTime = 				JArray.result.arrivalDateTime;
		name = 							JArray.result.name;
		itemPictureName = 	JArray.result.itemPictureName;	*/
		
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
		price_tag.style.position='absolute';
		price_tag.style.top='50%';
		cell = row.insertCell();
		cell.style.position='relative';
		cell.appendChild(price_tag );
		
		cell = row.insertCell();
		cell.style.position='relative';
		arrivalCountry_tag = document.createElement('h3');
		arrivalCountry_tag.style.position='absolute';
		arrivalCountry_tag.style.top='50%';
		arrivalCountry_tag.style.transform='translate(0, -50%)';
		arrivalCountry_tag.innerHTML = arrivalCountry+"(Flight Number: "+ flightNumber + ")";
		cell.appendChild(arrivalCountry_tag);
		
		cell = row.insertCell();
		cell.style.position='relative';
		arrivalDateTime_tag = document.createElement('h3');
		arrivalDateTime_tag.style.position='absolute';
		arrivalDateTime_tag.style.top='50%';
		arrivalDateTime_tag.style.transform='translate(0, -50%)';
		arrivalDateTime_tag.innerHTML = arrivalDateTime;
		cell.appendChild(arrivalDateTime_tag);
		
		cell = row.insertCell();
		cell.style.position='relative';
		action1_tag = document.createElement('a');
		action1_tag.style.position='absolute';
		action1_tag.style.top='50%';
		action1_tag.style.transform='translate(0, -50%)';
		action1_tag.innerHTML = '<i class="fa fa-plus-circle"></i> Details';
		action1_tag.className = 'btn btn-default';
		cell.appendChild(action1_tag);
		
		cell.appendChild(document.createElement('br'));cell.appendChild(document.createElement('br'));
		action2_tag = document.createElement('a');
		action2_tag.style.position='absolute';
		action2_tag.style.top='30%';
		action2_tag.innerHTML = '<i class="fa fa-phone"></i> Contact';
		action2_tag.className = 'btn btn-info';
		cell.appendChild(action2_tag);
		
	}
	
}

</script>

