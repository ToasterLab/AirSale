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
            <li class='dropdown active'>
            <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-expanded="false">I am a buyer!<span class='caret'></span></a>
            	<ul class='dropdown-menu' role='menu'>
                	<li class="active"><a href='/airsale/explore.php' class='btn'><i class='fa fa-shopping-cart'></i> Explore</a> </li>
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
    <h1 id='head3' style="display:none"><i class='fa fa-shopping-cart'></i> Exploring AirSale<br></h1>
    </div>
</div>


<div class='container' >

	<div class='visible-md visible-lg' id='sticky'>
    <div class='panel panel-success'>
    <div class='panel-body'>
    <!--//NOT YET READY------------------------------------------
        <div class='btn-group btn-group-justified' role='group' style="z-index:12">
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
        </div><br>
        ------------>
     	<div>
            <div class='input-group input-group-lg'>
            <span class='input-group-addon'><i class='fa fa-search'></i></span>
            <input class='form-control input-lg' id='search_field' type='search' onChange="search_routine_handle();">
            <span class='input-group-btn'>
            <button type='button' class='btn btn-default btn-lg' id='search_btn'  onClick="search_routine_handle();">Search</button>
            </span>
            </div>
      	</div>
        
    </div>
    </div>
    
    </div>
    
    <div class='visible-sm visible-xs'>
    <div class='row'>
    <center>
    <!---------------------NOT YET READY
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
        -------------------------------------->
        <div class='btn-group'>
            <div class='input-group'>
            <span class='input-group-addon'><i class='fa fa-search'></i></span>
            <input class='form-control' id='search_field_mobile' type='search' onChange="search_routine_handle();">
            <span class='input-group-btn'>
            <button type='button' class='btn btn-default' id='search_btn'  onClick="search_routine_handle();">Search</button>
            </span>
            </div>
      	</div> 
        
        </div>
        
        
        
        </center>
    </div>
    
    </div>
</div>

<div class='container' style="text-align:center; padding-top:20pt">    
<div class='table-responsive'>
	<table id='display_table' class='table table-hover table-bordered' >
    <tr>
    	<th style="width:33%"><i class='fa fa-camera'></i> Snapshot and name of the item</th>
        <th><i class='fa fa-dollar'></i> Price</th>
        <th><i class='fa fa-thumbs-o-up'></i> Seller's credibility</th>
        <th><i class='fa fa-plane'></i> Seller's arrival country</th>
        <th style="width:20%"><i class='fa fa-plane'></i> Seller's arrival date</th>
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
	$.post('../api/airsale.php',{concise:'1',action:'explore'},function(data){
			JArray = $.parseJSON(data);
			$.post('../api/airsale.php',{JSON:1,action:'getUserCredibility'},function(data) {
			JCredibility = $.parseJSON(data);
			for(i=0;JArray[i]!=null;i++)
			{
				if(JArray[i]["result"]["isApproved"]=='1')
				{
				item_id				=			JArray[i]["item_id"];
				flightNumber 		= 			JArray[i]["result"]["flightNumber"];
				flightCarrier 		= 			JArray[i]["result"]["flightCarrier"];
				if(flightNumber == null) flightNumber = 'User did not specify.';
				arrivalCountry 		=	 		JArray[i]["result"]["arrivalCountry"];
				if(arrivalCountry == null) arrivalCountry = 'Currently not available.';
				arrivalDate		 	= 			JArray[i]["result"]["arrivalDate"];
				if(arrivalDate == null) arrivalDate = 'User did not specify.';
				name 				= 			JArray[i]["result"]["name"];
				price 				= 			JArray[i]["result"]["price"];
				email				=			JArray[i]["result"]["email"];
				number				=			JArray[i]["result"]["number"];
				description			=			JArray[i]["result"]["description"];
				itemPictureName 	= 			JArray[i]["result"]["itemPictureName"];
				account				=			JArray[i]["result"]["account"];
				for(j=0;JCredibility[j]!=null;j++)
				{
					if(JCredibility[j]["user"]==account) credibility=JCredibility[j]["credibility"];
				}
				//put them into the table
				row = table.insertRow();
				row.id = "row_" + name.replace(/\s/g, '');
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
				cell.appendChild(price_tag );				
				
				credibility_tag = document.createElement('h4');
				credibility_tag.innerHTML=credibility + "/5 <br>";
				for(k=Number(credibility);k>=1;k--)  
				{
					tag = document.createElement('i');
					tag.className='fa fa-star';
					credibility_tag.appendChild(tag);
				}
				for(k=5-Number(credibility);k>=1;k--)  
				{
					tag = document.createElement('i');
					tag.className='fa fa-star-o';
					credibility_tag.appendChild(tag);
				}
				cell = row.insertCell();
				cell.appendChild(credibility_tag );
				
				cell = row.insertCell();
				arrivalCountry_tag = document.createElement('h3');
				arrivalCountry_tag.innerHTML = arrivalCountry+"(Flight Number: "+flightCarrier+ flightNumber + ")";
				cell.appendChild(arrivalCountry_tag);
				
				cell = row.insertCell();
				arrivalDateTime_tag = document.createElement('h3');
				arrivalDateTime_tag.innerHTML = arrivalDate;
				cell.appendChild(arrivalDateTime_tag);
				
				cell = row.insertCell();
				action1_tag = document.createElement('a');
				action1_tag.innerHTML = '<i class="fa fa-plus-circle"></i> Details';
				action1_tag.setAttribute('onClick','itemDetails('+item_id+');');
				action1_tag.className = 'btn btn-default';
				cell.appendChild(action1_tag);
				
				cell.appendChild(document.createElement('br'));cell.appendChild(document.createElement('br'));
				action2_tag = document.createElement('button');
				action2_tag.innerHTML = '<i class="fa fa-phone"></i> Contact';
				action2_tag.className = 'btn btn-info';
				action2_tag.setAttribute('data-toggle','popover');
				action2_tag.setAttribute('data-placement','top');
				action2_tag.setAttribute('title','Contact seller');
				action2_tag.setAttribute('data-content','number:'+number+ "\nemail:"+email);
				cell.appendChild(action2_tag);
				
				}//if isApproved bracket
			}//'for' closing bracket
			
			});//Credibility closing

			$('[data-toggle="popover"]').popover();
			window.setInterval(function() {search_routine_handle();},100);
			
		});
}


function search_routine_handle()
{
	if(JArray!=null)
	for(j=0;JArray[j]!=null;j++)
	{
		name				= 			JArray[j]['result']['name'];
		flightNumber 		= 			JArray[j]["result"]["flightNumber"];
		if(flightNumber == null) flightNumber = 'User did not specify.';
		arrivalCountry 		=	 		JArray[j]["result"]["arrivalCountry"];
		if(arrivalCountry == null) arrivalCountry = 'Currently not available.';
		arrivalDate		 	= 			JArray[j]["result"]["arrivalDate"];
		if(arrivalDate == null) arrivalDate = 'User did not specify.';
		
	if(name.toLowerCase().indexOf( $('#search_field').val().toLowerCase() ) == (-1) && arrivalCountry.toLowerCase().indexOf( $('#search_field').val().toLowerCase() ) == (-1) &&	flightNumber.toLowerCase().indexOf( $('#search_field').val().toLowerCase() ) == (-1) && arrivalDate.toLowerCase().indexOf( $('#search_field').val().toLowerCase() ) == (-1) || 
	(name.toLowerCase().indexOf( $('#search_field_mobile').val().toLowerCase() ) == (-1) && arrivalCountry.toLowerCase().indexOf( $('#search_field_mobile').val().toLowerCase() ) == (-1) &&	flightNumber.toLowerCase().indexOf( $('#search_field_mobile').val().toLowerCase() ) == (-1) && arrivalDate.toLowerCase().indexOf( $('#search_field_mobile').val().toLowerCase() ) == (-1)))
		$('#row_'+JArray[j]['result']['name'].replace(/\s/g, '')).css({display:'none'});
	else $('#row_'+JArray[j]['result']['name'].replace(/\s/g, '')).css({display:' '});
	}
}

function itemDetails(item_id)
{
	setSessionCookie('detail_item_id',String(item_id));
	window.location='details.php';
}
</script>

