//npm install --save-dev "name-of-gulp-plugin"
//npm install to get all the deps
var gulp         = require('gulp');
var sass         = require('gulp-sass');
var plumber      = require('gulp-plumber'); //restoring on build error
var cssnano      = require('gulp-cssnano'); //css minification
var concat       = require('gulp-concat'); //joining files
var notify       = require('gulp-notify'); 
var uglify       = require('gulp-uglify'); //uglifying js
var bourbon      = require('node-bourbon');
var svgsprite    = require('gulp-svg-sprite'); //creates sprites from files in /src/img/svg
var jshint       = require('gulp-jshint');

svgSpriteConfig  = {
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
    .pipe(notify("SVG sprite created successfully!"))
});

gulp.task('styles', function() {
  gulp.src(['scss/style.scss'])
    .pipe(plumber())
    .pipe(sass({ 
      style: 'expanded',
      includePaths: bourbon.includePaths
    }))
    .pipe(cssnano())
      .pipe(concat('style.css'))
  .pipe(gulp.dest('./'))
  .pipe(notify("CSS compiled and concatenated successfully!"))
});

gulp.task('lint', function() {
  gulp.src(['js/scripts.js'])
    .pipe(jshint())
    .pipe(jshint.reporter('default'))
});

gulp.task('scripts', function() {
  gulp.src(['js/scripts.js'])
    .pipe(concat('scripts.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('js'))
    .pipe(notify("JS compiled successfully!"))
});

gulp.task('watch', function(){
  gulp.watch('src/img/svg/*.svg', ['svg-sprites']);
  gulp.watch('scss/**/*.scss', ['styles']);
  gulp.watch('js/*.js', ['lint', 'scripts']);
});


gulp.task('build', ['svg-sprites', 'styles', 'lint', 'scripts']);

gulp.task('default', ['build', 'watch']);