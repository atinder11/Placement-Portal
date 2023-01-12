// NAVBAR STARTS
$(document).ready(function() {

    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function() {
        // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");
    });
});

//NAVBAR ENDS

$(".notification").fadeTo(3000,1).fadeOut(1000);
// $(".notification").fadeOut(3000);

