'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-backdropped-group';


  // !Launch onload functions
  $('.' + cl + '__thumbnail').each(function() {
    $(this).closest('.' + cl + '__item').find('.' + cl + '__link').css('background-image','url(' + $(this).attr('src') + ')');
    $(this).remove();
  });

  $('.' + cl + '__link').each(function() {
    $(this).wrapInner('<span class="u-inner-layer" />');
  });


  // !Events


}

module.exports = {
  init: init
};
