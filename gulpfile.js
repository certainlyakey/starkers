//npm install --save-dev "name-of-gulp-plugin"
//npm install to get all the deps
var gulp         = require('gulp');
var sass         = require('gulp-sass');
var cssnano      = require('gulp-cssnano');
var concat       = require('gulp-concat');
var notify       = require('gulp-notify');
var uglify       = require('gulp-uglify');
var bourbon      = require('node-bourbon');
// var sourcemaps   = require('gulp-sourcemaps');

gulp.task('styles', function() {
  gulp.src(['scss/style.scss'])
    // .pipe(sourcemaps.init())
      .pipe(sass({ 
        style: 'expanded',
        includePaths: bourbon.includePaths
      }))
      .pipe(cssnano())
        .pipe(concat('style.css'))
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest('./'))
    .pipe(notify("CSS compiled and concatenated successfully!"))
});

gulp.task('scripts', function() {
  gulp.src(['js/scripts.js'])
    // .pipe(sourcemaps.init())
        .pipe(concat('scripts.min.js'))
      .pipe(uglify())
    // .pipe(sourcemaps.write())
    .pipe(gulp.dest('js'))
    .pipe(notify("JS compiled successfully!"))
});


gulp.task('watch', function(){
  gulp.watch('scss/*/*.scss', ['styles']);
  gulp.watch('js/*.js', ['scripts']);
});

gulp.task('build', ['styles', 'scripts']);

gulp.task('default', ['build', 'watch']);