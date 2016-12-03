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

var base = {
		dev: basePath + 'dev/',
		assets: basePath + 'assets/'
	};

var paths = {
		dev: {
			scss: base.dev + 'scss/main.scss',
			js: base.dev + 'js/*.js',
			image: base.dev + 'img/*.jpg',
			font: base.dev + 'font/*.+(ttf|ttc|eot|woff|woff2|svg)',
			php: ['php/*.php', 'php/**/*.php', 'php/**/**/*.php']
		},
		assets: {
			css: base.assets + 'css/main.css',
			js: base.assets + 'js/main.js',
			image: base.assets + 'img/',
			font: base.assets + 'font/'
		}
	};

// Tasks
// Generate CSS
gulp.task('scss', function() {
    return gulp.src(paths.dev.scss)
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
});

// Minify images
gulp.task('image', function() {
	gulp.src(paths.dev.image)
		.pipe(plumber())
		.pipe(gulp.dest(paths.assets.image))
		.pipe(browserSync.reload());
});

// Minify images
gulp.task('font', function() {
	gulp.src(paths.dev.font)
		.pipe(plumber())
		.pipe(gulp.dest(paths.assets.font))
		.pipe(browserSync.reload());
});

// Connect
gulp.task('connect', function() {
    connect.server({}, function() {
    	browserSync({
    		proxy: '127.0.0.1:8000'
    	});
    });
});

// Reload
gulp.task('reloader', function() {
	browserSync.reload();
});

// Run everything
function runner() {
	gulp.run('scss', 'js', 'connect');

	gulp.watch(paths.dev.scss, ['scss']);
	gulp.watch(paths.dev.js, ['js']);
	//gulp.watch(paths.dev.image, ['image']);
	//gulp.watch(paths.dev.font, ['font']);
	gulp.watch(paths.dev.php, ['reloader']);
}

gulp.task('default', runner);