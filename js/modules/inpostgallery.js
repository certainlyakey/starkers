'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-inpost-gallery';
  var gallery_sel = '.' + cl + '__list';


  // !Launch onload functions

  $('.' + cl).wrap('<div class="' + cl + '__wrapper' + ($('.' + cl).closest('.c-single-news').length ? ' c-single-news__gallery' : '') + '"></div>');
  $(gallery_sel).slick({
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    adaptiveHeight: true,
    prevArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_prev"><span class="u-screenreader-text">Previous</span></button>',
    nextArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_next"><span class="u-screenreader-text">Next</span></button>',
    dots: true,
    appendDots: $('.' + cl + '__wrapper'),
    dotsClass: cl + '__paging',
    customPaging: function(slider, i) { 
      return '<button class="' + cl + '__paging-item" style="background-image:url(\'' + $(slider.$slides[i]).find('img').attr('src') + '\');"><span class="u-screenreader-text">' + $(slider.$slides[i]).find('img').attr('src') + '</span></button>';
    },
  });

  // !Events


}

module.exports = {
  init: init
};
