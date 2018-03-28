
//snackbar display on error 

function display_snackbar() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    x.innerHTML = "hello";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000); }


