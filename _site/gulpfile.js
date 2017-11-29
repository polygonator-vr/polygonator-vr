var gulp = require('gulp'),
    minifyCss = require('gulp-minify-css'),
    less = require('gulp-less'),
    concat = require('gulp-concat');

var paths = {
    less: ['./less/**/*.less']
};

gulp.task('less', function () {
    return gulp.src('./less/**/*.less')
        .pipe(less())
        .pipe(concat('style.css'))
        .pipe(minifyCss())
        .pipe(gulp.dest('./_includes/css/'));
});

gulp.task('watcher',function(){
    gulp.watch(paths.less, ['less']);
});

gulp.task('default', ['less', 'watcher']);