//- @codekit-prepend "jq.fancy-scroll.js"

jQuery(function($){ //alias of jQuery(document).ready(function ($) {


	/* ========================================================================= */

	// !– Dev tools

	/* ========================================================================= */


	$('body').append('<div class="baselinegrided"></div>');
	$('.baselinegrided').height($(document).height());
	$(document).on('keypress', function(e) {
		var code = e.keyCode || e.which;
		if(code === 119) {
			$('.baselinegrided').toggle();
		}
	});


	/* ========================================================================= */

	// !– Cosmetics

	/* ========================================================================= */




	/* ========================================================================= */

	// !– Another scripts section

	/* ========================================================================= */



		// !Append HTML



		// !Set vars



		// !Functions



		// !Launch onload functions



		// !Events



});