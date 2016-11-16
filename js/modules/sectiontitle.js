'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-section-title';


  // !Launch onload functions
  $('.' + cl).each(function() {
    $(this).wrapInner('<span class="' + cl + '__inner u-inner" />');
  });


  // !Events


}

module.exports = {
  init: init
};
