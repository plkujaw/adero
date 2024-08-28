const gulp = require('gulp');
const include = require('gulp-include');
const sass = require('gulp-sass');
const browserSync = require('browser-sync').create();
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const rename = require('gulp-rename');
const svgmin = require('gulp-svgmin');
const svgstore = require('gulp-svgstore');
const cheerio = require('gulp-cheerio');
const webp = require('gulp-webp');
const imagemin = require('gulp-imagemin');
const imageminPngquant = require('imagemin-pngquant');
const imageminMozjpeg = require('imagemin-mozjpeg');
const cssnano = require('cssnano');
const uglify = require('gulp-uglify');
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const order = require('gulp-order');
const sourcemaps = require('gulp-sourcemaps');

const theme = 'adero';

// Development Tasks
// -----------------

// Start browserSync server
gulp.task('browserSync', () => {
  browserSync.init({
    proxy: `http://localhost:8888/${theme}/`
  });

  gulp.watch('assets/src/scss/**/**/*.scss', gulp.parallel('sass'));
  gulp.watch('./*.php').on('change', browserSync.reload);
  gulp.watch('./inc/**/**/**/*.php').on('change', browserSync.reload);
  gulp.watch('assets/src/js/**/main.js', gulp.parallel('scripts'));
  gulp.watch('assets/src/js/modules/*.js', gulp.parallel('scripts'));
  gulp.watch('assets/src/js/vendor/*.js', gulp.parallel('libs'));
});

gulp.task('sass', () => {
  return gulp
    .src('assets/src/scss/main.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer(), cssnano()]))
    .pipe(rename('main.min.css'))
    .pipe(sourcemaps.write())
    .pipe(gulp.dest('assets/dist/css'))
    .pipe(browserSync.stream());
});

gulp.task('scripts', () => {
  return gulp
    .src('assets/src/js/main.js')
    .pipe(include())
    .pipe(rename('main.min.js'))
    .pipe(babel({ presets: ['@babel/env'] }))
    .pipe(uglify())
    .pipe(gulp.dest('assets/dist/js'))
    .pipe(browserSync.stream());
});

gulp.task('libs', () => {
  return gulp
    .src([
      'assets/src/js/vendor/*.js',
      '!assets/src/js/vendor/jquery-3.3.1.min.js'
    ])
    .pipe(order(['ScrollMagic.min.js', '*.js']))
    .pipe(concat('libs.min.js'))
    .pipe(gulp.dest('assets/dist/js'))
    .pipe(browserSync.stream());
});

// Watchers
gulp.task('watch', gulp.series('sass', 'libs', 'scripts', 'browserSync'));
// gulp.task('watch', gulp.series('sass', 'libs', 'scripts'));

// Optimization Tasks
gulp.task('webp', () =>
  gulp
    .src('assets/img/hero_*.{jpg,png}')
    .pipe(webp())
    .pipe(gulp.dest('assets/img/'))
);

gulp.task('imagemin', () =>
  gulp
    .src('assets/img/*.{jpg,png}')
    .pipe(
      imagemin(
        [
          (imageminPngquant({
            speed: 1,
            quality: 98 // lossy settings
          }),
          imageminMozjpeg({
            quality: 90
          }))
        ],
        {
          verbose: true
        }
      )
    )
    .pipe(gulp.dest('img/'))
);

// Sprites
gulp.task('sprite', () => {
  return gulp
    .src('assets/img/icon-*.svg')
    .pipe(svgmin())
    .pipe(svgstore({ inlineSvg: true }))
    .pipe(
      cheerio({
        run($) {
          $('[fill]').removeAttr('fill');
          $('svg').attr('style', 'display:none');
        },
        parserOptions: { xmlMode: true }
      })
    )
    .pipe(rename('sprite.svg'))
    .pipe(gulp.dest('assets/img/'));
});
