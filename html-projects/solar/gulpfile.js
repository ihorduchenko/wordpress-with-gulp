const watch = require('gulp-watch'),
browserSync = require('browser-sync'),
reload = browserSync.reload,
gulp = require('gulp'),
autoprefixer = require('gulp-autoprefixer'),
concat = require('gulp-concat'),
rename = require('gulp-rename'),
minifyCSS = require('gulp-minify-css'),
plumber = require('gulp-plumber'),
sass = require('gulp-sass'),
sourceMaps = require('gulp-sourcemaps'),
gutil = require('gulp-util'),
uglify = require('gulp-uglify'),
concatCss = require('gulp-concat-css');

gulp.task('browserSync', function () {
    var files = [
        'sources/**/**/**/*.*',
        '*.html'
    ];
    browserSync.init(files, {
        server: "./",
        notify: false,
        reloadDelay: 1000
    });
});

gulp.task('vendorStyles', function () {
    return gulp.src('sources/css/**/*.*')
        .pipe(plumber())
        .on('error', gutil.log)
        .pipe(concatCss('vendor.min.css'))
        .pipe(minifyCSS())
        .pipe(gulp.dest('css/', {"mode": "0777"}))
        .pipe(reload({stream: true}));
});


gulp.task('styles', function () {
    return gulp.src('sources/scss/main.scss')
        .pipe(plumber({
            errorHandler: function (err) {
                console.log(err);
                this.emit('end');
            }
        }))
        .pipe(sass({errLogToConsole: true, outputStyle: 'compressed'}))
        .pipe(autoprefixer({
            browsers: ['last 7 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'],
            cascade: true
        }))
        .on('error', gutil.log)
        .pipe(rename({suffix: ".min"}))
        .pipe(sourceMaps.write())
        .pipe(gulp.dest('css/', {"mode": "0777"}))
        .pipe(reload({stream: true}));
});

var jsFiles = [
    'sources/js/jquery.js',
    'sources/js/vendor/*.js',
    'sources/js/index.js'
];

gulp.task('scripts', function () {
    return gulp.src(jsFiles)
        .pipe(plumber())
        .pipe(concat('index.min.js'))
        .pipe(uglify())
        .on('error', gutil.log)
        .pipe(gulp.dest('js/', {"mode": "0777"}))
        .pipe(reload({stream: true}));
});

gulp.task('html', function () {
    return gulp.src('*.html')
        .pipe(plumber())
        .pipe(reload({stream: true}))
        .on('error', gutil.log);
});

gulp.task('watch', function () {
    watch('sources/css/**/*.*', function () {
        gulp.start('vendorStyles');
    });
    watch('sources/scss/**/*.scss', function () {
        gulp.start('styles');
    });
    watch('sources/js/**/*.*', function () {
        gulp.start('scripts');
    });
});

gulp.task('build', [
    'watch',
    'styles',
    'vendorStyles',
    'scripts'
]);

gulp.task('default', ['build', 'browserSync']);


