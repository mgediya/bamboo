let mix = require('laravel-mix');
require('laravel-mix-svg-sprite');

const purgeContent = [
	"template-part/**/*.php",
	"assets/js/**/*.js",
	"index.php",
  ];
require('laravel-mix-purgecss');
const purgeExclude = require('./purge.mix.js');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application, as well as bundling up your JS files.
 |
 */

mix.webpackConfig({
	module: {
		rules: [{
			test: require.resolve('jquery'),
			use: [{
				loader: 'expose-loader',
				options: '$'
			}]
		}]
	}
});

mix.options({
	postCss: [
		require('autoprefixer')({
			cascade: false,
			// grid: true
		})
	]
});

mix.autoload({
	jquery: ['$', 'window.$', 'window.jQuery']
});

mix.setPublicPath('public/');
mix.setResourceRoot('../');

mix
	.js('assets/js/main.js','js/')
;

// Compile SASS
mix
	.sass('assets/scss/style.scss', 'css/')
	.purgeCss({
		enabled: (process.env.PURGE == "true" ? true : false),
		content: purgeContent,
		safelist: { standard: purgeExclude.whitelist }
});

// Copy fonts
mix.copy('assets/fonts', 'fonts/');

// Copy images
mix.copy('assets/images', 'images/');

// Combine icons
// mix.svgSprite('src/icons/**/*.svg', 'web/assets/svg/icons.svg');

// Add cache-busting versioning to the built files via a /[publicPath]/mix-manifest.json
mix.version();

// Alternate: This adds the font files to the mix-manifest.json, from where they can be injected with cache-busting into the HTML, but the cache-busting string still doesn't match up with what's in the CSS.
// mix.version(['web/assets/fonts/**']);

// Generate source maps
mix.webpackConfig({
	devtool: 'source-map'
});

mix.sourceMaps();

// mix.browserSync({
// 	proxy: process.env.PRIMARY_SITE_URL,
// 	// if 'files' isn't specified, it will auto-reload when the processed files (CSS & JS) are changed. It won't detect the templates folder however. Specifying this option manually means you need to include ALL the paths you want to watch for changes, not just the ADDITIONAL paths.
// 	files: [
// 		'/public/css/**/*.css',
// 		'/public/js/**/*.js'
// 	],
// 	browser: "chrome"
// });

// Shows one 'Build Success' message and goes silent unless there's an error.
mix.disableSuccessNotifications();