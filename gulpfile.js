/*
 * Rebounce Online Build
 */

const pump = require('pump');
const gulp = require('gulp');
const concat = require('gulp-concat');
const htmlmin = require('gulp-htmlmin');
const stylus = require('gulp-stylus');
const uglify = require('gulp-uglify');
const watch = require('gulp-watch');

gulp.task('html', (cb) => {
    pump([
        gulp.src('./assets/index.html'),
        htmlmin({
            collapseWhitespace: true,
        }),
        gulp.dest('./templates/'),
    ], cb);
});

gulp.task('stylus', (cb) => {
    pump([
        gulp.src('./assets/stylus/rebounce.styl'),
        stylus({
            compress: true,
        }),
        gulp.dest('./public/assets/css/'),
    ], cb);
});

gulp.task('bootstrap', (cb) => {
    pump([
        gulp.src('./assets/deps/css/bootstrap.min.css'),
        gulp.dest('./public/assets/css/'),
    ], cb);
});

gulp.task('js', (cb) => {
    pump([
        gulp.src([
            './assets/deps/js/jquery.min.js',
            './assets/deps/js/bootstrap.bundle.min.js',
            './assets/deps/js/jquery.easing.min.js',
            './assets/js/rebounce.js',
        ]),
        uglify(),
        concat('rebounce.js'),
        gulp.dest('./public/assets/js/'),
    ], cb);
});

gulp.task('images', (cb) => {
    pump([
        gulp.src('./assets/visuals/favicon.ico'),
        gulp.dest('./public/'),

        gulp.src('./assets/visuals/brand.png'),
        gulp.dest('./public/assets/images/'),
    ], cb);
});

gulp.task('data', (cb) => {
    pump([
        gulp.src('./assets/data/**/*'),
        gulp.dest('./public/assets/data/'),
    ], cb);
});

gulp.task('build', [
    'html',
    'stylus',
    'bootstrap',
    'js',
    'images',
    'data',
]);

gulp.task('watch', ['build'], () => {
    gulp.watch('./assets/**/*', ['build']);
});

gulp.task('default', ['build']);
