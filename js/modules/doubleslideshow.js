'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-doubleslideshow';
  var gallery_sel = '.' + cl + '_multiple-items .' + cl + '__list';


  // !Launch onload functions

  var gallery_header_height = $('.c-gallery-single-header').height();
  var compensation = 6;
  $(gallery_sel).on('init', function(){
    $(gallery_sel).find('.slick-current + .slick-active').css('padding-top', (gallery_header_height - compensation) + 'px');
    // $(gallery_sel).find('.slick-list').css('min-height', parseInt($(gallery_sel).find('.slick-list').css('min-height')) + gallery_header_height + 'px');
    $(gallery_sel).css('margin-top', '-' + (gallery_header_height - compensation) + 'px');
  });
  $(gallery_sel).on('afterChange', function(){
    $(gallery_sel).find('.slick-slide').css('padding-top', '0');
    $(gallery_sel).find('.slick-current + .slick-active').css('padding-top', (gallery_header_height - compensation) + 'px');
  });

  $(gallery_sel).slick({
    infinite: false,
    adaptiveHeight: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    prevArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_prev"><span class="u-screenreader-text">Previous</span></button>',
    nextArrow: '<button type="button" class="' + cl + '__arrows ' + cl + '__arrows_next"><span class="u-screenreader-text">Next</span></button>',
  });

  // !Events


}

module.exports = {
  init: init
};
