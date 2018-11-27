<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="style2.css"/>
</head>
<body>

<div id="main">

<div class="menu_simple">
<ul>
<li><a id="ed" href="#">Education</a></li>
<li><a id="work" href="#">Working experiences</a></li>
<li><a id="it" href="#">IT skills</a></li>
<li><a id="cv" href="#">CV in Slovenian</a></li>
</ul>

</div>
</div>

<div id="main2">

</div>

<script>
$(document).ready( function() {
	$('#main2').load("education.php");
	
    $("#ed").on("click", function() {
        $("#main2").load("education.php");
    });
	
	$("#work").on("click", function() {
        $("#main2").load("work.php");
    });
	
	$("#it").on("click", function() {
        $("#main2").load("it.php");
    });
	
	$("#cv").on("click", function() {
        $("#main2").load("cv.php");
    });
});
</script>
</body>
</html>