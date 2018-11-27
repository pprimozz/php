$('#str').keyup(function(){
	
var search = $('#str').val();
$.post('script.php', {strsearch:search}, function(data){
	$('#result').html(data);
	});
	
});