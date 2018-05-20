$(document).ready(function(){

	$("#btn-snackbar").on("click", function(){
		
		$(".snackbar").fadeIn();
		setTimeout(function(){
			$(".snackbar").fadeOut();
		}, 3000);

	})

});