'use strict';

/**
 * Mainmenu
 */
function init() {

  // !Append HTML


  // !Set vars
  var cl = 'js-ajax-form';


  // !Launch onload functions
  
  

  // !Events
  $('.' + cl).submit(function(ev) {
    // Prevent the form from actually submitting
    ev.preventDefault();

    // Get the post data
    var data = $(this).serialize();
    var $form = $(this);
    var message = $(this).data('label-message-success');
    var message_error = $(this).data('label-message-error');

    // Send it to the server
    $.post('/', data, function(response) {
      if (response.success) {
        $form.append('<div class="c-message c-form__message">' + message + '</div>');
        $form.find('.' + cl + '__submit').hide();
      } else {
        // response.error will be an object containing any validation errors that occurred, indexed by field name
        // e.g. response.error.fromName => ['From Name is required']
        $form.append('<div class="c-form__message c-message c-message_error">' + message_error + '</div>');
        console.log(response.error);
      }
    });
  });
}

module.exports = {
  init: init
};
