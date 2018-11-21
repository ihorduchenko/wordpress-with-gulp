const watch = require('gulp-watch'),
browserSync = require('browser-sync'),
reload = browserSync.reload,
gulp = require('gulp'),
autoprefixer = require('gulp-autoprefixer'),
concat = require('gulp-concat'),
rename = require('gulp-rename'),
plumber = require('gulp-plumber'),
sass = require('gulp-sass'),
sourceMaps = require('gulp-sourcemaps'),
gutil = require('gulp-util'),
uglify = require('gulp-uglify');

gulp.task('browserSync', function () {
  var files = [
  'src/**/**/**/*.*',
  '**/*.php',
  'templates/**/*.php'
  ];
  browserSync.init(files, {
    proxy: "ihorduchenko", //this may be different in your project (local url without http://)
    notify: false
  });
});

gulp.task('styles', function () {
  return gulp.src('src/scss/index.scss')
  .pipe(plumber({
    errorHandler: function (err) {
      console.log(err);
      this.emit('end');
    }
  }))
  .pipe(sourceMaps.init())
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
'src/js/jquery-2.1.4.min.js', //this may be different in your project
'src/js/vendor/*.js'
];

gulp.task('vendorScripts', function () {
  return gulp.src(jsFiles)
  .pipe(plumber())
  .pipe(concat('vendor.min.js'))
  .pipe(uglify())
  .on('error', gutil.log)
  .pipe(gulp.dest('js/', {"mode": "0777"}))
  .pipe(reload({stream: true}));
});

gulp.task('scripts', function () {
  return gulp.src('src/js/index.js')
  .pipe(plumber())
  .pipe(concat('index.min.js'))
  .pipe(uglify())
  .on('error', gutil.log)
  .pipe(gulp.dest('js/', {"mode": "0777"}))
  .pipe(reload({stream: true}));
});

gulp.task('php', function () {
  return gulp.src('**/*.php')
  .pipe(plumber())
  .pipe(reload({stream: true}))
  .on('error', gutil.log);
});

gulp.task('watch', function () {
  watch('src/scss/**/*.*', function () {
    gulp.start('styles');
  });
  watch('src/js/**/*.*', function () {
    gulp.start('vendorScripts');
    gulp.start('scripts');
  });
});

gulp.task('build', [
  'watch',
  'styles',
  'vendorScripts',
  'scripts'
  ]);

gulp.task('default', ['build', 'browserSync']);


