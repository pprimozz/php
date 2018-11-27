<html>
<head>
<script type="text/javascript">

	function findmatch(){
		
		if(window.XMLHttpRequest){
			xmlhttp = new XMLHttpRequest();	
		}else {
			xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');	
		}
		
	xmlhttp.onreadystatechange = function(){
	if(xmlhttp.readyState == 4 && xmlhttp.status == 200) {
		document.getElementById('results').innerHTML = xmlhttp.responseText;
			
	}
	}
	
	xmlhttp.open('GET', 'search.inc.php?search_text='+document.search.search_text.value, true);
	xmlhttp.send();
		
	}

</script>
</head>
<body>


<form id="search" name="search">
	type a name:<br>
    <input type="text" name="search_text" onKeyUp="findmatch();">
</form>

<div id="results" style="width:150px; height:150px; margin-top:-15px; margin-left:2px; padding-top:20px;"></div>


</body>
</html>