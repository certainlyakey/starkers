'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'c-searchform';
  var cl_results = 'c-search-results';


  // !Launch onload functions
  if ($('.' + cl_results).length === 0) {
    $('.' + cl).addClass('js-not-active');
  }

  // !Events
  $('.' + cl + '__submit').on('click',function(e) {
    e.preventDefault();
    $(this).closest('.' + cl).toggleClass('js-not-active');
  });

  $('.' + cl + '__input').on('keyup',function(e) {
    if (e.which === 13) {
      $(this).closest('.' + cl).trigger('submit').removeClass('js-not-active');
    }
  });

  $('.' + cl + '__reset').on('click',function() {
    var $form = $(this).closest('.' + cl);
    $form.addClass('js-not-active');
  });


}

module.exports = {
  init: init
};
