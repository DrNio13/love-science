$(document).ready(function() {

	// Get the results
	$.ajax({
		url: '/love-science/system/api/get-articles.php',
		type: 'GET'
	})
	.done(function(data) {
		console.log(data);
	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});

	
});