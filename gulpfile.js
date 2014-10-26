var gulp = require('gulp')
var plumber = require('gulp-plumber')
var rename = require('gulp-rename')
var browserify = require('gulp-browserify')
var uglify = require('gulp-uglify')
var stylus = require('gulp-stylus')
var nib = require('nib')
var livereload = require('gulp-livereload')

gulp.task('livescript', function() {
  gulp.src('public/src/ls/index.ls', {read: false})
    .pipe(plumber())
    .pipe(browserify({
      transform: ['liveify'],
      extensions: ['.ls'],
      debug: true
    }))
    .pipe(rename('index.js'))
    .pipe(gulp.dest('public/lib/js'))
    .pipe(uglify())
    .pipe(rename('index.min.js'))
    .pipe(gulp.dest('public/lib/js'))
})

gulp.task('stylus', function() {
  gulp.src('public/src/styl/index.styl')
    .pipe(plumber())
    .pipe(stylus({
      set: ['compress'],
      use: [nib()]
    }))
    .pipe(gulp.dest('public/lib/css'))
})

gulp.task('default', ['livescript', 'stylus'], function() {
  livereload.listen()
  gulp.watch('public/src/ls/**/*.ls', ['livescript'])
  gulp.watch('public/src/styl/**/*.styl', ['stylus'])
  gulp.watch('public/lib/**').on('change', livereload.changed)
})
