$('#search').keyup(function(){ 
var name = $('#search').val();
$.post('process.php', {srch: name}, function(data) {
$('#content').html(data);
});
});