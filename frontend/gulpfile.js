var gulp = require('gulp');
var $ = require('gulp-load-plugins')();
var browserify = require('browserify');
var sync = require('browser-sync');
var source = require('vinyl-source-stream');
var nsg = require('node-sprite-generator');

gulp.task('default', ['run'], function () {
  gulp.watch('**/*.jade', ['jade', sync.reload]);
  gulp.watch('**/*.styl', ['stylus', sync.reload]);
})

gulp.task('sprite', function () {
  nsg({
    src: [
        'source/assets/images/*.png'
    ],
    spritePath: '../web/assets/images/sprite.png',
    stylesheetPath: 'stylus/sprite.styl',
    layout: 'packed',
    layoutOptions: {
      padding: 16
    },
    stylesheetPath: 'source/assets/stylesheets/_sprite.styl',
    stylesheetOptions: {
      pixelRatio: 2,
      spritePath: '/assets/images/sprite.png'
    }
  }, function (err) {
      console.log('Sprite generated!');
  });
})


gulp.task('run', function () {
  sync({
    open: false,
    notify: false,
    server: {
      baseDir: ['../web/']
    }
  })
})

gulp.task('jade', function () {
  gulp.src('source/templates/**/*.jade')
    .pipe($.ignore('**/_*.jade'))
    .pipe($.jade({
      pretty: true}))
    .pipe(gulp.dest('../web/bundle/'))

})

gulp.task('stylus', function () {
  gulp.src('source/assets/stylesheets/**/*.styl')
    .pipe($.ignore('**/_*.styl'))
    .pipe($.stylus())
    .pipe($.autoprefixer())
    .pipe($.rename({
      suffix: '.bundle'
    }))
    .pipe(gulp.dest('../web/assets/stylesheets/'))
    .pipe(gulp.dest('../web/template/css/'))
})

gulp.task('javascripts', function () {
  var bundler = browserify({
    entries: ['source/index.js']
  }).transform(require('babelify'), {
    presets: ['es2015']
  });

  bundler.on('update', function () {
    bundle();
  });

  bundle();

  function bundle() {
    bundler.bundle()
      .on('error', function (err) { console.error(err) })
      .pipe(source('bundle.min.js'))
      .pipe($.streamify($.uglify()))
      .pipe(gulp.dest('../web/assets/javascripts/'))
      .pipe(gulp.dest('../web/template/js/'))

  }
})
