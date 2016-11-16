'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var sel = '[data-overlay]';


  // !Launch onload functions
  $(sel).addClass('js-hidden');
  $(sel).each(function() {
    $(this).prepend('<button class="c-overlay__close js-close"><span class="u-screenreader-text">Close</span></button>');
  });
  

  // !Events
  $('[data-open-overlay]').on('click',function(e) {
    e.preventDefault();
    var $overlay = $($(this).attr('href'));

    if ($overlay.hasClass('js-hidden')) {
      $overlay.removeClass('js-hidden');
    } else {
      $overlay.addClass('js-hidden');
    }
  });

  $('.js-close').on('click',function(e) {
    e.preventDefault();
    $(this).closest(sel).addClass('js-hidden');
  });

  $(document).keyup(function(e) {
    if(e.which === 27 && $(sel + ':not(.js-hidden)').length){
      $(sel + ':not(.js-hidden)').addClass('js-hidden');
    }
  });


}

module.exports = {
  init: init
};
