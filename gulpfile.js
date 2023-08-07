const { src, dest, watch, series } = require("gulp");
const jsImport = require("gulp-js-import");
const minify = require("gulp-minify");
const plumber = require("gulp-plumber");
const url = "metrocomm.localhost"; // Change me
const cleanCSS = require("gulp-clean-css");
const pkg = require('./package.json')

const paths = {
    DIST: "dist",
    PROXY: url,
    CSS: "src/styl",
};

const browserSync = require("browser-sync");

var stylus = require("gulp-stylus"),
    concat = require("gulp-concat"),
    rename = require("gulp-rename"),
    sourcemaps = require("gulp-sourcemaps"),
    autoprefixer = require("autoprefixer-stylus");

var config = {
    style: {
        in: "src/assets/css",
        out: `wp-content/themes/${pkg.name}/assets/css`,
    },
    script: {
        in: "src/assets/js",
        out: `wp-content/themes/${pkg.name}/assets/js`
    }
};

const server = browserSync.create();

// Styles
function style() {
    return src([config.style.in + "/**/*.styl"])
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(
            stylus({
                "include css": true,
                use: [autoprefixer("iOS >= 7", "last 1 Chrome version")],
                compress: true,
                linenos: true,
                import: __dirname + "/src/assets/css/settings.styl",
            })
        )
        .pipe(rename("style.css"))
        .pipe(concat("style.css"))
        .pipe(sourcemaps.write())
        .pipe(dest(config.style.out))
        .on("error", console.log)
        .pipe(server.stream());
}

function styleCompress() {
    return src([config.style.in + "/**/*.styl"])
        .pipe(plumber())
        .pipe(
            stylus({
                "include css": true,
                use: [autoprefixer("iOS >= 7", "last 1 Chrome version")],
                compress: true,
                linenos: true,
                import: __dirname + "/src/assets/css/settings.styl",
            })
        )
        .pipe(rename("style.min.css"))
        .pipe(concat("style.min.css"))
        .pipe(cleanCSS())
        .pipe(dest(config.style.out))
        .on("error", console.log)
        .pipe(server.stream());
}

function script() {
    return src(config.script.in + "/**/*.js", { sourcemaps: false })
        .pipe(jsImport({ hideConsole: true }))
        .pipe(concat("app.js"))
        .pipe(
            minify({
                ext: {
                    src: ".js",
                    min: ".min.js",
                },
                exclude: ["tasks"],
                ignoreFiles: [".combo.js", "-min.js"],
            })
        )
        .pipe(dest(config.script.out, { sourcemaps: false }));
}

function reloadTask(done) {
    server.reload();
    done();
}


function browser(done) {
    server.init({
      baseDir: './',
    });
    done();
}

function watchTask() {
    watch("src/assets/css/**/*.styl", style);
    watch("src/assets/css/**/*.styl", styleCompress);
    watch("src/assets/js/**/**.js", script);

    watch("src/assets/js/**/**.js", reloadTask);
}

exports.default = series(browser, watchTask, style, styleCompress, script);
