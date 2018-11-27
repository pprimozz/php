$(':text').focusin(function() {
	$(this).css('background-color', 'yellow');
	
});

$(':text').blur(function() {
	$(this).css('background-color', '#fff');
});
	
	
$(':password').focusin(function() {
$(this).css('background-color', 'yellow');
});

$(':password').blur(function() {
	$(this).css('background-color', '#fff');
});
