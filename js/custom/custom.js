/*

Function to apply the active filter on the single pages.
Not very AGILE.
Need some rewritting

*/
jQuery(document).ready(function($) {
	jQuery("aside[class~='Director']").find( "li.menu-item-47" ).addClass("active");
	jQuery("aside[class~='Cinematographer']").find( "li.menu-item-46" ).addClass("active");
	jQuery("aside[class~='Photographer']").find( "li.menu-item-45" ).addClass("active");

	

});

$(function() {
  $('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top-100
        }, 1000);
        return false;
      }
    }
  });
});