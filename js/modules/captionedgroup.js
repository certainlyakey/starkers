'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-captioned-group';
  var slides_shown = $('.' + cl + '__list[data-slides-shown]').length ? parseInt($('.' + cl + '__list').attr('data-slides-shown')) : 4;

  // !Launch onload functions
  $('.' + cl + '__list').slick({
    infinite: true,
    slidesToShow: slides_shown,
    slidesToScroll: slides_shown,
    prevArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_prev"><span class="u-screenreader-text">Previous</span></button>',
    nextArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_next"><span class="u-screenreader-text">Next</span></button>'
    // responsive: [
    //   {
    //     breakpoint: 1024,
    //     settings: {
    //       slidesToShow: 3,
    //       slidesToScroll: 3
    //     }
    //   },
    //   {
    //     breakpoint: 800,
    //     settings: {
    //       slidesToShow: 2,
    //       slidesToScroll: 2
    //     }
    //   },
    //   {
    //     breakpoint: 600,
    //     settings: {
    //       slidesToShow: 1,
    //       slidesToScroll: 1
    //     }
    //   }
    //   // You can unslick at a given breakpoint now by adding:
    //   // settings: "unslick"
    //   // instead of a settings object
    // ]
  });


  // !Events


}

module.exports = {
  init: init
};
