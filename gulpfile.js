var gulp = require('gulp');
var minifyCss = require('gulp-minify-css');
var less = require('gulp-less');
var sourcemaps = require('gulp-sourcemaps');

var paths = {
    less: ['less/*.less']
};

gulp.task('less', function () {
    return gulp.src('./less/**/*.less')
        .pipe(sourcemaps.init())
        .pipe(less())
        .pipe(sourcemaps.write())
        .pipe(minifyCss())
        .pipe(gulp.dest('./css'));
});

gulp.task('watcher',function(){
    gulp.watch(paths.less, ['less']);
});

gulp.task('default', ['watcher']);