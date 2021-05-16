const gulp = require('gulp');
const sass = require('gulp-sass');
const plumber = require('gulp-plumber');
const autoPrefixer = require('gulp-autoprefixer');
const browserSync = require('browser-sync').create();
const sourceMaps = require('gulp-sourcemaps');

gulp.task('sass', function (){
    return gulp.src('styles')
        .pipe(plumber())
        .pipe(sourceMaps.init())
        .pipe(sass())
        .pipe(autoPrefixer({browsers: ['last 2 versions']}))
        .pipe(sourceMaps.write())
        .pipe(gulp.dest('build/css'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('html', function (){
    return gulp.src('*.html')
        .pipe(gulp.dest('build'))
        .pipe(browserSync.reload({stream: true}));
});

/**
 * возможно придётся удалить, не уверен в её работе
 * */
gulp.task('php', function (){
    return gulp.src('*.php')
        .pipe(gulp.dest('build'))
        .pipe(browserSync.reload({stream: true}));
});

/**
 * возможно придётся удалить, не уверен в её работе
 * */
gulp.task('scripts', function (){
    return gulp.src('*.js')
        .pipe(gulp.dest('build'))
        .pipe(browserSync.reload({stream: true}));
});

/**
 * возможно придётся удалить, не уверен в её работе
 * */
gulp.task('images', function (){
    return gulp.src('styles/images/*')
        .pipe(gulp.dest('build'))
        .pipe(browserSync.reload({stream: true}));
});

gulp.task('serve', function (){
    browserSync.init({server: "build"});
    gulp.watch('scss/**/*.scss', gulp.series('sass'));
    gulp.watch('*.html', gulp.series('html'));
    gulp.watch("*.php", gulp.series('php'));
    gulp.watch("*.js", gulp.series('scripts'));
    gulp.watch("styles/images/*", gulp.series('images'));
});



