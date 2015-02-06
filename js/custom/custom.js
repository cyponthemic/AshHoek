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
