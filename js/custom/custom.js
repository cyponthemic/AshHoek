jQuery(document).ready(function($) {
if ( jQuery("aside[class~='Director']"=true)){
	jQuery('#sidebar').addClass("Director");
	}
else if ( jQuery("aside[class~='Cinematographer']")){
	jQuery('#sidebar').addClass("Cinematographer");
	}
else {
	jQuery('#sidebar').addClass("Photographer");
	}
});


