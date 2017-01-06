
$(document).ready(function() {
 
  $("#owl-demo").owlCarousel({
 
    navigation : true, // Show next and prev buttons
    slideSpeed : 1000,
    paginationSpeed : 400,
    singleItem:true

      // "singleItem:true" is a shortcut for:
      // items : 1, 
      // itemsDesktop : false,
      // itemsDesktopSmall : false,
      // itemsTablet: false,
      // itemsMobile : false
 
  });
 
});

$document.ready(function() { 
	$("#owl-demo").css("display","block");
});

$(function() {
	$("#confirm").submit(function(e) {
		e.preventDefault();

		$.post("RSVP_form.php", {
			name: $("name").val(),
		    attending: $("attending").val(),
		    diet: $("diet").val()
		}, function(d) {
			alert(d);
		});
	});
});

