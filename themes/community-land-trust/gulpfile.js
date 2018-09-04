const gulp = require('gulp'),
  prettyError = require('gulp-prettyerror'),
  sass = require('gulp-sass'),
  autoprefixer = require('gulp-autoprefixer'),
  rename = require('gulp-rename'),
  cssnano = require('gulp-cssnano'),
  uglify = require('gulp-uglify'),
  eslint = require('gulp-eslint'),
  browserSync = require('browser-sync');

// Create basic Gulp tasks

gulp.task('sass', function() {
  return gulp
    .src('./src/scss/style.scss', { sourcemaps: true })
    .pipe(prettyError())
    .pipe(sass())
    .pipe(
      autoprefixer({
        browsers: ['last 2 versions']
      })
    )
    .pipe(gulp.dest('./'))
    .pipe(cssnano())
    .pipe(rename('style.min.css'))
    .pipe(gulp.dest('./build/css'));
});

gulp.task('lint', function() {
  return gulp
    .src(['./src/js/*.js'])
    .pipe(prettyError())
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
});

gulp.task(
  'scripts',
  gulp.series('lint', function() {
    return gulp
      .src('./src/js/*.js')
      .pipe(uglify())
      .pipe(
        rename({
          extname: '.min.js'
        })
      )
      .pipe(gulp.dest('./build/js'));
  })
);

// Set-up BrowserSync and watch

gulp.task('browser-sync', function() {
  const files = [
    './build/css/*.css',
    './build/js/*.js',
    './*.php',
    './**/*.php'
  ];

  browserSync.init(files, {
    proxy: 'localhost[:port-here]/[your-dir-name-here]'
  });

  gulp.watch(files).on('change', browserSync.reload);
});

gulp.task('watch', function() {
  gulp.watch('src/js/*.js', gulp.series('scripts'));
  gulp.watch('src/scss/*.scss', gulp.series('scss'));
});

gulp.task('default', gulp.parallel('browser-sync', 'watch'));
