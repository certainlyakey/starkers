'use strict';

// Import Javascript modules here:
jQuery(function($){

  var mainmenu = require('./modules/mainmenu');
  var searchform = require('./modules/searchform');
  var sectiontitle = require('./modules/sectiontitle');
  var captionedgroup = require('./modules/captionedgroup');
  var backdroppedgroup = require('./modules/backdroppedgroup');
  var fullslideshowgroup = require('./modules/fullslideshowgroup');
  var doubleslideshow = require('./modules/doubleslideshow');
  var diamondgallery = require('./modules/diamondgallery');
  var inpostgallery = require('./modules/inpostgallery');
  var bafiagroup = require('./modules/bafiagroup');
  var overlay = require('./modules/overlay');
  var ajaxform = require('./modules/ajaxform');

  // ...and then do something with them:
  mainmenu.init();
  searchform.init();
  sectiontitle.init();
  captionedgroup.init();
  backdroppedgroup.init();
  fullslideshowgroup.init();
  doubleslideshow.init();
  diamondgallery.init();
  inpostgallery.init();
  bafiagroup.init();
  overlay.init();
  ajaxform.init();

});
