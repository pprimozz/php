	
function Time(){
	var x = new Date();
	var t = x.toLocaleTimeString("en-GB");
	document.getElementById('clock').innerHTML= t;
}

function Slider(){
	 $(".slideshow #1").show("fade",500);
	 $(".slideshow #1").delay(3000).hide("fade", 500);
	 
	 var sc = $(".slideshow img").size(); //število slik ki so v slideshow divu
	 var count =2;
	
	 
	setInterval(function (){
		 $(".slideshow #"+count).show("fade", 500);
		 $(".slideshow #"+count).delay(3000).hide("fade",500);
		 	
		 if (count==sc){
			 count=1;
			 } else {
				 count= count+1;
				 }
		 },4000); 	 
 }
 
setInterval(function() {Time()}, 1000);// JavaScript Document
 
 
 function visitors(){
	 $.post('script.php', function(){
		
		 });
	 
	 }

