function showSnack() {
    // Get the snackbar DIV
    let x = $('#snackbar');
    // Add the "show" class to DIV
    x.addClass('show');
    // After 3 seconds, remove the show class from DIV
    setTimeout(
        function(){ 
            x.removeClass('show'); 
        }, 3000);
}


function addAndShowSnack(){
    
}