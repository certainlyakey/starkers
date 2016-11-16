'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-fullslideshow-group';


  // !Launch onload functions
  $('.' + cl + '__list').slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_prev"><span class="u-screenreader-text">Previous</span></button>',
    nextArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_next"><span class="u-screenreader-text">Next</span></button>',
  });


  // !Events


}

module.exports = {
  init: init
};
