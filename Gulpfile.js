// Gulp things
var gulp 		= require('gulp'),
	cp 			= require('child_process'),
	sass 		= require('gulp-sass'),
	concat 		= require('gulp-concat'),
	cssmin 		= require('gulp-cssmin'),
	rename 		= require('gulp-rename'),
	uglify 		= require('gulp-uglify'),
	plumber 	= require('gulp-plumber'),
	browserSync = require('browser-sync'),
	connect 	= require('gulp-connect-php');

// Paths
var basePath = './';

var baseDev = basePath + 'dev/',
	baseAssets = basePath + 'assets/';

var paths = {
		dev: {
			main_scss: baseDev + 'scss/main.scss',
			scss: [baseDev + 'scss/*.scss', baseDev + 'scss/**/*.scss', baseDev + 'scss/**/**/*.scss'],
			js: baseDev + 'js/*.js',
			image: baseDev + 'img/*.jpg',
			font: baseDev + 'font/*.(ttf|ttc|eot|woff|woff2|svg)',
			php: ['*.php', 'u/*.php', 'u/**/*.php', 'u/**/**/*.php']
		},
		assets: {
			css: baseAssets + 'css/',
			js: baseAssets + 'js/',
			image: baseAssets + 'img/',
			font: baseAssets + 'font/'
		}
	};

// Tasks
// Generate CSS
gulp.task('scss', function() {
    gulp.src(paths.dev.main_scss)
    		.pipe(plumber())
			.pipe(sass())
			.pipe(cssmin())
			.pipe(gulp.dest(paths.assets.css))
			.pipe(browserSync.reload({stream: true}));
});

// Generate JavaScript
gulp.task('js', function() {
	gulp.src(paths.dev.js)
		.pipe(plumber())
		.pipe(concat('main.js'))
		.pipe(uglify())
		.pipe(gulp.dest(paths.assets.js))
		.pipe(browserSync.reload({stream: true}));

	/*gulp.watch(paths.dev.js).on('change', function () {
		browserSync.reload({stream: true});
	});*/
});

// Connect
gulp.task('connect-sync', function() {
	connect.server({}, function (){
		browserSync({
			proxy: '127.0.0.1:8000'
		});
	});

	gulp.watch(paths.dev.php).on('change', function () {
		browserSync.reload();
	});

	gulp.watch(paths.dev.scss, ['scss']);
	gulp.watch(paths.dev.js, ['js']);
});

// Run everything
gulp.task('runner', function() {
	gulp.run(['scss', 'js', 'connect-sync']);
});


gulp.task('default', ['runner']);