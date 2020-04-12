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
  del = require("del");

// Browser-sync
var browsersync = false;

// PHP settings
const php = {
  src: [dir.src + "**/*.php", dir.src + "partials/**/*.php", dir.src + "templates/**/*.php"],
  build: dir.build,
};

// copy PHP files
gulp.task("php", () => {
  return gulp.src(php.src).pipe(newer(php.build)).pipe(gulp.dest(php.build));
});

// image settings
const images = {
  src: dir.src + "assets/images/**/*",
  build: dir.build + "images/",
};

// image processing
gulp.task("images", () => {
  return gulp.src(images.src).pipe(newer(images.build)).pipe(imagemin()).pipe(gulp.dest(images.build));
});

// CSS settings
var css = {
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

// CSS processing
gulp.task("sass", () => {
  return gulp
    .src(css.src)
    .pipe(sass(css.sassOpts))
    .pipe(postcss(css.processors))
    .pipe(gulp.dest(css.build))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});

gulp.task("css", gulp.series("images", "sass"));

// JavaScript settings
const js = {
  src: dir.src + "assets/js/**/*",
  build: dir.build + "js/",
  filename: "scripts.js",
};

// JavaScript processing
gulp.task("js", () => {
  return gulp
    .src(js.src)
    .pipe(deporder())
    .pipe(concat(js.filename))
    .pipe(stripdebug())
    .pipe(uglify())
    .pipe(gulp.dest(js.build))
    .pipe(browsersync ? browsersync.reload({ stream: true }) : gutil.noop());
});

gulp.task("clean", () => {
  var dirs = [
    dir.build + "*.php",
    dir.build + "style.css",
    dir.build + "partials",
    dir.build + "templates",
    dir.build + "images",
    dir.build + "js",
  ];
  return del(dirs);
});

gulp.task("build", gulp.series("clean", gulp.parallel("php", "css", "js")));
//gulp.task("build", gulp.parallel("php", "css", "js"));
