var gulp 		= require('gulp'),
	cp 			= require('child_process'),
	scss 		= require('gulp-sass'),
	concat 		= require('gulp-concat'),
	cssmin 		= require('gulp-cssmin'),
	rename 		= require('gulp-rename'),
	uglify 		= require('gulp-uglify'),
	plumber 	= require('gulp-plumber'),
	browserSync = require('browser-sync'),
	connect 	= require('gulp-connect-php');

gulp.task('connect', function() {
    connect.server();
});

gulp.task('default', ['connect']);