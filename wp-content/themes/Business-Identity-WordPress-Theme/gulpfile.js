'use strict';
 
var gulp = require('gulp');
var sass = require('gulp-sass');

var sourcemaps = require('gulp-sourcemaps');
 
gulp.task('sass', function () {
    return gulp.src(['custom.scss'])
     .pipe(sourcemaps.init())
     .pipe(sass())
     .pipe(sourcemaps.write())
     .pipe(gulp.dest('./../css'));
   });

gulp.task('sass:watch', function () {
    gulp.watch('./*.scss', ['sass']);
  });