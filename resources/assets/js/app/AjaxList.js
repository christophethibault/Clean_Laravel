/**
 *
 *  Ajax call for index controllers
 */

var AjaxList = (function () {
	'use strict';

	/**
	 * Constructor
	 */
	function AjaxList(params) {
		var $form = $(params.form);
		var loadCallback = params.load;
		var $content = $(params.content);

		/**
		 * bind the pager link to intercept event and load content in ajax
		 */
		var bindPagination = function () {
			var $pageElements = $content.find('.pagination a, thead th a');

			$pageElements.unbind('click');

			$pageElements.on('click', function (e) {
				var url = $(this).attr('href');
				loadContent(e, url);
			})
		};

		/**
		 * ajax call to load html $content
		 * @param  {event} e
		 * @param  {string} url
		 */
		var loadContent = function (e, url) {
			e.preventDefault();

			// get form data
			var data = $form.serializeArray();
			// map pages
			var page = getParameterByName('page', url); // "lorem"
			if (page === null) {
				page = 1;
			}
			// add page to the formdata
			data.push({name: 'page', value: page});
			data.push({name: 'partials', value: 1});

			loadCallback(true);
			// ajax request
			$.ajax({
				url: url,
				data: data,
				dataType: 'html',
				success: function (data) {
					// fill data
					$content.html(data);
					// intercept pagination links
					bindPagination();

					loadCallback(false);
				},
				error: function (data, json) {
					loadCallback(false);
					var errorModalElement = $('#error-modal');
					errorModalElement.modal();
					errorModalElement.find('.list-messages').text('');
					errorModalElement.find('.modal-message').text("Une erreur est survenue.");
				}
			});
		};

		bindPagination();

		var vm = this;
		$form.on('submit', function (e) {
			var url = $(this).attr('action');
			loadContent(e, url);
		});
	}

	return AjaxList;
})();
