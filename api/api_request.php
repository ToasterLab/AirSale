<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>LALX Airsale API REQUEST</title>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-61584028-1', 'auto');
  ga('send', 'pageview');

</script>
</head>
<link rel="stylesheet" href='/css/b.css'>
<script src="/js/jquery-1.11.0.min.js"></script>
<script src="/js/b.js"></script>
<script src="/js/gryphon.js"></script>
<script src="/js/classie.js"></script>

<form>
<label> Enter POST request JQUERY map</label>
<textarea id='text' rows='10' style="width:100%"></textarea><br><br>
<a class='btn btn-danger' id='request'>REQUEST</a><br><br>
<label>Return Result</label>
<textarea id='result' rows="10" style="width:100%"></textarea>

</form>
<body>
</body>
</html>


<script>
$(document).ready(function(e) {
   $('#request').on('click',function(){
	  $.post('./airsale', eval( $('#text').val()), function(data)
	  {
		 document.getElementById('result').value = data;
	  });
   });
});
</script>