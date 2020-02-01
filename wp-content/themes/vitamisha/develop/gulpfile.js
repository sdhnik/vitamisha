var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

var plumber = require("gulp-plumber");
var mincss = require("gulp-clean-css");
var groupmedia = require("gulp-group-css-media-queries");

gulp.task('styles', function() {
    return gulp.src('./src/scss/main.scss')
		.pipe(plumber())
        .pipe(sass())
        .pipe(groupmedia())
		.pipe(plumber.stop())
        .pipe(gulp.dest('./../'));
});

gulp.task('build', function() {
    return gulp.src('./src/scss/main.scss')
		.pipe(plumber())
        .pipe(sass())
        .pipe(groupmedia())
        .pipe(autoprefixer({
			cascade: false,
			grid: true
        }))
		.pipe(mincss({
			compatibility: "ie8", level: {
				1: {
					specialComments: 0,
					removeEmpty: true,
					removeWhitespace: true
				},
				2: {
					mergeMedia: true,
					removeEmpty: true,
					removeDuplicateFontRules: true,
					removeDuplicateMediaBlocks: true,
					removeDuplicateRules: true,
					removeUnusedAtRules: false
				}
			}
		}))
		.pipe(plumber.stop())
        .pipe(gulp.dest('./../'));
});

gulp.task('default', gulp.parallel('styles', function() {
    gulp.watch('./src/scss/**/*.scss', gulp.parallel('styles'));
}));

