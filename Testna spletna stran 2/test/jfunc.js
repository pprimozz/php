function btn(){
$.post('btn.php', function(data){
	alert(data);
	});	
}

function ip(){
	$.post('script.php', function(data){
		$('#result').html(data);
		 });
	
	}