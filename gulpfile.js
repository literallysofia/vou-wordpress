// Gulp.js configuration
"use strict";

const // source and build folders
  dir = {
    src: "src/",
    build: "./",
  },
  // Gulp and plugins
  gulp = require("gulp"),
  gutil = require("gulp-util"),
  newer = require("gulp-newer"),
  imagemin = require("gulp-imagemin"),
  sass = require("gulp-sass"),
  postcss = require("gulp-postcss"),
  deporder = require("gulp-deporder"),
  concat = require("gulp-concat"),
  stripdebug = require("gulp-strip-debug"),
  uglify = require("gulp-uglify"),
  browsersync = require("browser-sync").create(),
  del = require("del");

// PHP settings
const phpOpts = {
  src: [dir.src + "**/*.php", dir.src + "partials/**/*.php", dir.src + "templates/**/*.php"],
  build: dir.build,
};

// Task: copy PHP files
function php() {
  let dirs = [phpOpts.build + "*.php", phpOpts.build + "partials", phpOpts.build + "templates"];
  del(dirs);
  return gulp.src(phpOpts.src).pipe(newer(phpOpts.build)).pipe(gulp.dest(phpOpts.build)).pipe(browsersync.stream());
}
exports.php = php;

// Bootstrap settings
const bsOpts = {
  src: dir.src + "assets/bootstrap/**/*",
  build: dir.build + "assets/bootstrap/",
};

// Task: copy Bootstrap
function bootstrap() {
  return gulp.src(bsOpts.src).pipe(newer(bsOpts.build)).pipe(gulp.dest(bsOpts.build));
}

// Image settings
const imageOpts = {
  src: dir.src + "assets/images/**/*",
  build: dir.build + "assets/images/",
};

// Task: image processing
function images() {
  del(imageOpts.build + "*");
  return gulp.src(imageOpts.src).pipe(newer(imageOpts.build)).pipe(imagemin()).pipe(gulp.dest(imageOpts.build));
}

exports.images = images;

// CSS settings
const cssOpts = {
  src: dir.src + "assets/scss/style.scss",
  watch: dir.src + "assets/scss/**/*",
  build: dir.build,
  sassOpts: {
    outputStyle: "nested",
    imagePath: images.build,
    precision: 3,
    errLogToConsole: true,
  },
  processors: [
    require("postcss-assets")({
      loadPaths: ["assets/images/"],
      basePath: dir.build,
      baseUrl: "/wp-content/themes/vou/",
    }),
    require("autoprefixer"),
    require("css-mqpacker"),
    require("cssnano"),
  ],
};

// Task: CSS processing
function css() {
  return gulp
    .src(cssOpts.src)
    .pipe(sass(cssOpts.sassOpts))
    .pipe(postcss(cssOpts.processors))
    .pipe(gulp.dest(cssOpts.build))
    .pipe(browsersync.stream());
}
exports.css = gulp.series(images, bootstrap, css);

// JavaScript settings
const jsOpts = {
  src: dir.src + "assets/js/**/*",
  build: dir.build + "assets/js/",
  filename: "scripts.js",
};

// Task: JavaScript processing
function js() {
  return gulp
    .src(jsOpts.src)
    .pipe(deporder())
    .pipe(concat(jsOpts.filename))
    .pipe(stripdebug())
    .pipe(uglify())
    .pipe(gulp.dest(jsOpts.build))
    .pipe(browsersync.stream());
}
exports.js = js;

// Task: delete built files
function clean() {
  var dirs = [
    dir.build + "*.php",
    dir.build + "style.css",
    dir.build + "partials",
    dir.build + "templates",
    dir.build + "assets",
  ];
  return del(dirs);
}
exports.clean = clean;

const build = gulp.series(clean, gulp.parallel(php, gulp.series(images, bootstrap, css), js));
exports.build = build;

// Browsersync options
const syncOpts = {
  proxy: "localhost:8888/vou",
  open: false,
  notify: false,
  ghostMode: false,
  ui: {
    port: 8001,
  },
};

// browser-sync
function browserSync(done) {
  browsersync.init(syncOpts);
  done();
}

// BrowserSync Reload
function browserSyncReload(done) {
  browsersync.reload();
  done();
}

// watch for file changes
function watch() {
  // page changes
  gulp.watch(phpOpts.src, php);

  // image changes
  gulp.watch(imageOpts.src, gulp.series(images, browserSyncReload));

  // CSS changes
  gulp.watch(cssOpts.watch, css);

  // JavaScript main changes
  gulp.watch(jsOpts.src, js);
}
exports.watch = watch;

exports.default = gulp.series(gulp.series(clean, build), browserSync, watch);
