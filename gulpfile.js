// require: $ npm install --save-dev del
var elixir = require('laravel-elixir');
var del = require('del');
var gulp = require('gulp');

elixir.extend('remove', function (path) {
	new elixir.Task('remove', function () {
		del(path);
	});
});

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {

	// mix.remove([
	// 	'public/css',
	// 	'public/js',
	// 	'public/build',
	// 	'public/scripts',
	// 	'public/fonts' ])
	//mix.remove([ /*'public/css',*/ 'public/js', /*'public/scripts',*/ 'public/fonts' ])

	mix.sass('app.scss', 'public/css/app.css')

	/**
	 * vendor
	 */
		.scripts([
				'../bower/jquery/dist/jquery.min.js',
				'../bower/bootstrap-sass/assets/javascripts/bootstrap.min.js',
				'../bower/typeahead.js/dist/typeahead.bundle.min.js',
				'../bower/jquery-treegrid/js/jquery.treegrid.js',
				'../bower/jquery-treegrid/js/jquery.treegrid.bootstrap3.js',
				'../bower/select2/dist/js/select2.js',
				'../bower/select2/dist/js/i18n/fr.js',
				'../bower/bootstrap-fileinput/js/plugins/*',
				'../bower/bootstrap-fileinput/js/fileinput.js',
				'../js/vendor/bootstrap-fileinput/js/locales/fr.js',
				'../bower/bootstrap-fileinput/themes/fa/theme.js',
				'../bower/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js',
				'../bower/bootstrap-datepicker/dist/locales/bootstrap-datepicker.fr.min.js',
				'../bower/lobibox/dist/js/lobibox.js',
				'../bower/lobibox/dist/js/notifications.js',
				'../bower/lobibox/dist/js/messageboxes.js',
				'../bower/clockpicker/dist/bootstrap-clockpicker.js',
				'../bower/simplemde/dist/simplemde.min.js'
			],
			'public/js/vendor.js'
		)

		/**
		 *  debug minmaps
		 */
		.copy('resources/assets/bower/jquery/dist/jquery.min.map', 'public/js/')

		/**
		 * fonts
		 */
		//.copy('resources/assets/bower/jquery-ui/themes/base/images', 'public/css/images/')
		.copy('resources/assets/bower/bootstrap-sass/assets/fonts', 'public/fonts')
		.copy('resources/assets/fonts', 'public/fonts')
		.copy('resources/assets/bower/font-awesome-sass/assets/fonts', 'public/fonts')
		.copy('resources/assets/scripts/public/', 'public/js')

		/**
		 * locales
		 */
		//.copy('resources/assets/bower/jquery-ui/ui/i18n/datepicker-fr.js', 'public/js/i18n/')

		/**
		 * landing page specifig css
		 */
		.copy('resources/assets/css/', 'public/css')
		/**
		 * app.js
		 */
		.scripts([
				'../scripts/app',
				'resources/assets/js/app',
			],
			'public/js/app.js'
		);
	/*.version([
	 'public/css/app.css',
	 'public/js/vendor.js',
	 'public/js/app.js',
	 ],
	 'public/');*/
});
