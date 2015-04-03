$(document).ready(function(e) {
    if(  getCookie_raw('auth') == ""  )
	window.location.href="/airsale/login_failed.html";
	if(getCookie('auth') != null) document.getElementById('nav-log-in').innerHTML = "<span class='glyphicon glyphicon-user'></span>".concat(getCookie('auth'));
});

