'use strict';

//npm install --save-dev "name-of-gulp-plugin"
//npm install to get all the deps
var gulp              = require('gulp');
var gutil             = require('gulp-util');
var sass              = require('gulp-sass');
var plumber           = require('gulp-plumber'); //restoring on build error
var cssnano           = require('gulp-cssnano'); //css minification
var concat            = require('gulp-concat'); //joining files
var notify            = require('gulp-notify'); 
var uglify            = require('gulp-uglify'); //uglifying js
var bourbon           = require('node-bourbon');
var svgsprite         = require('gulp-svg-sprite'); //creates sprites from files in /src/img/svg
var jshint            = require('gulp-jshint'); // jshint-stylish should be installed too
var autoprefixer      = require('gulp-autoprefixer');
var sourcemaps        = require('gulp-sourcemaps');
var browserify        = require('browserify');
var babelify          = require('babelify'); //babel-preset-es2015 should be installed too
var vinylSourceStream = require('vinyl-source-stream');
var vinylBuffer       = require('vinyl-buffer');


var svgSpriteConfig  = {
  mode           : {
    css          : {
      bust       : true,
      dest       : '.',
      prefix     : '.u-spr-svg-%s',
      dimensions : '-size',
      sprite     : 'img/sprite.svg',
      render     : {
        scss     : {
          dest   : 'scss/generated/_svg-sprite.scss'
        }
      }
    }
  }
};

gulp.task('svg-sprites', function() {
  gulp.src('src/img/svg/*.svg')
    .pipe(svgsprite(svgSpriteConfig)).on('error', function(error){ console.log(error); })
    .pipe(gulp.dest('./'))
    .pipe(notify('SVG sprite created successfully!'));
});


gulp.task('styles', function() {
  gulp.src(['scss/style.scss'])
  .pipe(plumber())
  .pipe(sourcemaps.init())
  .pipe(sass({ 
    style: 'expanded',
    includePaths: bourbon.includePaths
  }))
  .pipe(autoprefixer({
    browsers: [
      'last 3 versions'
    ]
  }))
  .pipe(cssnano())
  .pipe(concat('style.css'))
  .pipe(sourcemaps.write())
  .pipe(gulp.dest('./'))
  .pipe(notify('CSS compiled and concatenated successfully!'));
});

// gulp.task('lint', function() {
//   gulp.src(['js/bundle.js'])
//     .pipe(jshint())
//     .pipe(jshint.reporter('default'))
// });


/**
 * $ gulp jshint
 *
 * - lint Javascript files and Gulpfile.js
 */
gulp.task('jshint', function(){
  var src  = [
    'Gulpfile.js',
    'js/modules/*.js'
  ];

  gulp.src(src)
    .pipe(jshint())
    .pipe(jshint.reporter(require('jshint-stylish')));
});


gulp.task('scripts', function(){
  var bundler = browserify('js/main.js');

  bundler.transform(babelify, {
      presets: ['es2015']
    })
    .bundle()
    .on('error', gutil.log)
    .pipe(vinylSourceStream('scripts.min.js'))
    .pipe(vinylBuffer())
    .pipe(gulp.dest('js'))
    .pipe(notify('JS compiled and concatenated successfully!'));
});

// gulp.task('scripts', function() {
//   gulp.src(['js/scripts.js'])
//     .pipe(concat('scripts.min.js'))
//     .pipe(uglify())
//     .pipe(gulp.dest('js'))
//     .pipe(notify("JS compiled successfully!"))
// });

// gulp.task('watch', function(){
//   // gulp.watch('src/img/svg/*.svg', ['svg-sprites']);
//   gulp.watch('scss/**/*.scss', ['styles']);
//   gulp.watch('js/modules/*.js', ['jshint', 'scripts']);
// });

gulp.task('default', [
  'styles',
  'scripts'
  // 'images',
  // 'modernizr'
]);

gulp.task('watch', ['default'], function(){
  // Gulpfile.js:
  gulp.watch('Gulpfile.js', [
    'jshint'
  ]);

  // Scripts:
  gulp.watch('js/modules/*.js', [
    'jshint',
    'scripts'
  ]);

  // Styles:
  gulp.watch('scss/**/*.scss', [
    'styles'
  ]);

  // // Images:
  // gulp.watch(path.src + '/images/{,*/}*.{gif,jpg,png,svg}', [
  //   'images'
  // ]);
});


// gulp.task('build', ['svg-sprites', 'styles', 'jshint', 'scripts']);

// gulp.task('default', ['build', 'watch']);