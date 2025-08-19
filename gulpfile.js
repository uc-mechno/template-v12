// ---------------------------------------------------------------
// パッケージ読み込み
// ---------------------------------------------------------------

// gulpコマンドの省略
const { src, dest, watch, series, parallel, lastRun } = require("gulp");

// sass
const sass = require("gulp-sass")(require("sass"));
const plumber = require("gulp-plumber");
const notify = require("gulp-notify");
const postcss = require("gulp-postcss");
const autoprefixer = require("autoprefixer");
const cssdeclsort = require("css-declaration-sorter");
const gcmq = require("gulp-group-css-media-queries");
const mode = require("gulp-mode")();

// rename
const rename = require("gulp-rename");

// js
const concat = require("gulp-concat");
const terser = require("gulp-terser"); //ES6(ES2015)の圧縮に対応

// Cache Busting
const crypto = require("crypto");
const hash = crypto.randomBytes(8).toString("hex");
const replace = require("gulp-replace");

// browser-sync
const browserSync = require("browser-sync");

// ejs
const ejs = require("gulp-ejs");
const fs = require('fs');
const htmlbeautify = require("gulp-html-beautify");

// del
const del = require("del");

// 画像圧縮
const tinypng = require("gulp-tinypng-extended");
const webp = require("gulp-webp");

// ---------------------------------------------------------------
// Path
// ---------------------------------------------------------------

// 開発
const srcPath = {
  root: "./src",
  html: ["./src/ejs/**/*.ejs", "!" + "./src/ejs/**/_*.ejs"],
  htmlPartial: "./src/ejs/**/_*.ejs",
  htmlWatch: "./src/ejs/**/*.ejs",
  json: "./src/ejs/data/config.json",
  css: "./src/assets/sass/**/*.scss",
  cssWatch: "./src/assets/sass/**/*.scss",
  js: "./src/assets/js/**/_*.js",
  jsWatch: "./src/assets/js/**/*.js",
  jsCopy: "./src/assets/js/libs/**/*.js",
  image: "./src/assets/images/",
  imageFile: "./src/assets/images/**/*.{png,jpg,jpeg}",
  imageDir: "./src/assets/images/**/*",
  imageWatch: "./src/assets/images/**/*",
  fontDir: "./src/assets/fonts/**/*",
};

// 公開
const destPath = {
  root: "./dist",
  files: "./dist/assets/**/*",
  // html: "./dist/html",
  html: "./dist/*.html",
  css: "./dist/assets/css",
  cssMap: "./sourcemaps",
  js: "./dist/assets/js",
  jsMap: "./sourcemaps",
  jsCopy: "./dist/assets/js/libs",
  // cache: "./dist/html/**/*.html",
  // cacheHtml: "./dist/html/**/*.html",
  cache: "./dist/**/*.html",
  cacheHtml: "./dist/**/*.html",
  clean: "./dist/",
  image: "./dist/assets/images",
  font: "./dist/assets/fonts",
  php: "./**/*.php",
  domain: "http://kokyousushi.local/",
};

// 削除
const clean = {
  all: "./dist/",
  assest: "./dist/assets/",
  html: "./dist/!(assets)**",
  css: "./dist/assets/css",
  cssMap: "./dist/assets/css/sourcemaps",
  jsMap: "./dist/assets/js/sourcemaps",
  js: "./dist/assets/js",
  image: "./dist/assets/images",
};

// gulp-concatの順番
const jsConcat = {
  order: [
  // './src/assets/js/_start.js',
  './src/assets/js/_drawer.js',
  './src/assets/js/_bp.js',
  './src/assets/js/_fixed.js',
  './src/assets/js/_scrollTop.js',
  './src/assets/js/_smoothScroll.js',
  './src/assets/js/_accordion.js',
  './src/assets/js/_animeation.js',
  './src/assets/js/_function.js',
  './src/assets/js/_swiper.js',
  './src/assets/js/_vivus.js',
  './src/assets/js/_vw.js',
  // './src/assets/js/_end.js'
]};

// ---------------------------------------------------------------
// Sass
// ---------------------------------------------------------------

const compileSass = (done) => {
  const postcssPlugins = [
    autoprefixer({ grid: "autoplace", cascade: false }),
    cssdeclsort({ order: "alphabetical" }),
  ];
  src(srcPath.css, { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(sass({ outputStyle: "expanded" }))
    .pipe(postcss(postcssPlugins))
    .pipe(mode.production(gcmq()))
    .pipe(dest(destPath.css, { sourcemaps: destPath.cssMap }));
  done();
};

// 圧縮
const compressSass = (done) => {
  const postcssPlugins = [
    autoprefixer({ grid: "autoplace", cascade: false }),
    cssdeclsort({ order: "alphabetical" }),
  ];
  src(srcPath.css, { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(sass({ outputStyle: "compressed" }))
    .pipe(postcss(postcssPlugins))
    .pipe(mode.production(gcmq()))
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest(destPath.css, { sourcemaps: destPath.cssMap }));
  done();
};

// ---------------------------------------------------------------
// JavaScript
// ---------------------------------------------------------------

const compileJs = (done) => {
  // src(srcPath.js, { sourcemaps: true })
  src(jsConcat.order, { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(concat("bundle.js"))
    .pipe(dest(destPath.js, { sourcemaps: destPath.jsMap }));
  done();
};

// 圧縮
const compressJs = (done) => {
  // src(srcPath.js, { sourcemaps: true })
  src(jsConcat.order, { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    .pipe(concat("bundle.js"))
    .pipe(terser()) // ES5、ES6対応で圧縮
    .pipe(rename({ suffix: ".min" }))
    .pipe(dest(destPath.js, { sourcemaps: destPath.jsMap }));
  done();
};

// ---------------------------------------------------------------
// BrowserSync
// ---------------------------------------------------------------
const buildServer = (done) => {
  browserSync.init({
    // 静的サイト
    files: [ // 監視対象の指定
      srcPath.html,
      srcPath.css,
      srcPath.js
    ],
    server: { baseDir: destPath.root }, // ルートとなるディレクトリを指定

    /*
    // 動的サイト
    files: [ // 監視対象の指定
      destPath.php,
      srcPath.css,
      srcPath.js
    ],
    proxy: destPath.domain, // ルートとなるディレクトリを指定
    */

    // browser: "Google Chrome", // ブラウザの指定
    port: 8080, // ポート番号の指定
    notify: true, // 通知をする場合 false を指定
    // open: false, // 別端末でも見れるようにする場合 external を指定
    open: "external", // 別端末でも見れるようにする場合 external を指定
    reloadDelay: 1000, //リロードの遅延
    watchOptions: {
      debounceDelay: 1000, // 1秒間、タスクの再実行を抑制
    },
    ghostMode: {
      clicks: false,
      scroll: false,
      location: false,
      forms: {
        submit: false,
        inputs: false,
        toggles: false,
      },
    },
  });
  done();
};

const browserReload = (done) => {
  browserSync.reload();
  done();
};

// ---------------------------------------------------------------
// Ejs
// ---------------------------------------------------------------

const compileHtml = (done) => {

  const json = JSON.parse(fs.readFileSync(srcPath.json, 'utf-8'));

  src(srcPath.html)
    .pipe(
      plumber({ errorHandler: notify.onError("Error: <%= error.message %>") })
    )
    // .pipe(ejs( {jsonData: json })) //jsonデータの受け渡し
    .pipe(ejs(json, { ext: ".html" })) //jsonデータの受け渡し
    .pipe(rename({ extname: ".html" }))
    .pipe(replace(/[\s\S]*?(<!DOCTYPE)/, "$1"))
    .pipe(
      htmlbeautify({
        indent_size: 2, //インデントサイズ
        indent_with_tabs: false, // インデントはスペース
        indent_char: " ", // インデントに使う文字列はスペース1こ
        max_preserve_newlines: 0, // 許容する連続改行数
        preserve_newlines: false, //コンパイル前のコードの改行
        indent_inner_html: false, //head,bodyをインデント
        extra_liners: [], // 終了タグの前に改行を入れるタグ。配列で指定。head,body,htmlにはデフォで改行を入れたくない場合は[]。
      })
    )
    .pipe(dest(destPath.root));
  done();
};

// ---------------------------------------------------------------
// キャッシュ
// ---------------------------------------------------------------

const cacheBusting = (done) => {
  src(destPath.cache)
    .pipe(replace(/\.(js|css)\?ver/g, ".$1?ver=" + hash))
    .pipe(replace(/\.(webp|jpg|jpeg|png|svg|gif)/g, ".$1?ver=" + hash))
    .pipe(dest(destPath.root));
  done();
};

// ---------------------------------------------------------------
// コピー
// ---------------------------------------------------------------

const copyFont = (done) => {
  src([srcPath.fontDir]).pipe(dest(destPath.font)).on("end", done);
};

const copyJs = (done) => {
  src([srcPath.jsCopy]).pipe(dest(destPath.jsCopy)).on("end", done);
};

const copyPdf = (done) => {
  src(["./src/assets/pdf/**/*.pdf"]).pipe(dest("./dist/assets/pdf")).on("end", done);
};

const copyVideo = (done) => {
  src(["./src/assets/video/**/*.mp4"]).pipe(dest("./dist/assets/video")).on("end", done);
};


// ---------------------------------------------------------------
// 画像
// ---------------------------------------------------------------

const tinyPng = (done) => {
  src(srcPath.imageFile)
    .pipe(plumber())
    .pipe(
      tinypng({
        key: "ここにAPIキーを入力",
        sigFile: srcPath.image + ".tinypng-sigs",
        log: true,
        summarise: true,
        sameDest: true,
        parallel: 10,
      })
    )
    .pipe(dest(destPath.image))
    .on("end", done);
};

const copyImages = (done) => {
  src([srcPath.imageDir]).pipe(dest(destPath.image)).on("end", done);
};

/**
 *
 * webp生成時にリネーム処理を行う
 * @link https://notes.sharesl.net/articles/1869/
 */
const generateWebp = (done) => {
  src(srcPath.imageFile, { since: lastRun(generateWebp) })
    .pipe(rename((path) => {
      path.basename += path.extname; //リネーム処理
    }))
    .pipe(webp())
    .pipe(dest(destPath.image));
  done();
};

// ---------------------------------------------------------------
// Watch
// ---------------------------------------------------------------

const watchFiles = () => {
  watch(srcPath.cssWatch, series(compileSass, browserReload)); // sass
  watch(srcPath.htmlWatch, series(compileHtml, browserReload)); // pug、ejs
  watch(srcPath.jsWatch, series(compileJs, browserReload)); // js
  watch(srcPath.imageWatch, series(copyImages, generateWebp, browserReload)); // img tinyPngを毎回実行するには処理が多いので未設定
  watch(srcPath.json, series(compileHtml, browserReload)); // json
  watch(destPath.php, browserReload); // php
  // watch("./**/*.html", browserReload); // htmlファイルは一時停止
};

// ---------------------------------------------------------------
// del
// ---------------------------------------------------------------

const cleanAll = (done) => {
  del(clean.all);
  done();
};
const cleanAssest = (done) => {
  del(clean.assest);
  done();
};
const cleanHtml = (done) => {
  del(clean.html);
  done();
};
const cleanCss = (done) => {
  del(clean.css);
  done();
};
const cleanMap = (done) => {
  del(clean.cssMap);
  del(clean.jsMap);
  done();
};
const cleanCssMap = (done) => {
  del(clean.cssMap);
  done();
};
const cleanJsMap = (done) => {
  del(clean.jsMap);
  done();
};
const cleanJs = (done) => {
  del(clean.js);
  done();
};
const cleanImage = (done) => {
  del(clean.image);
  done();
};

// ---------------------------------------------------------------
// exports
// ---------------------------------------------------------------

module.exports = {
  // sass
  sass: compileSass,
  minSass: compressSass,

  // js
  js: compileJs,
  minJs: compressJs,

  // BrowserSync
  server: buildServer,

  // pug or ejs
  html: compileHtml,

  //cache
  cache: cacheBusting,

  // watch
  watch: watchFiles,

  //clean
  cleanAll: cleanAll,
  cleanAssest: cleanAssest,
  cleanHtml: cleanHtml,
  cleanCss: cleanCss,
  cleanJs: cleanJs,
  cleanImage: cleanImage,
  cleanMap: cleanMap,
  cleanCssMap: cleanCssMap,
  cleanJsMap: cleanJsMap,

  //copy
  copyFont: copyFont,
  copyJs: copyJs,

  // img
  copyImages: copyImages,
  tinypng: tinyPng,
  webp: generateWebp,

  // fontとjs/libsとpdfとvideoのコピー
  copy: series(copyFont, copyJs, copyPdf, copyVideo),

  // 画像の全ての処理
  image: series(tinyPng, generateWebp, copyImages),

  // 全ての処理
  build: series(
    parallel(compileSass, compileJs, compileHtml),
    tinyPng,
    generateWebp,
    copyImages,
    copyFont,
    copyJs,
    cacheBusting
  ),

  // デフォルト
  default: parallel(buildServer, watchFiles),
};
