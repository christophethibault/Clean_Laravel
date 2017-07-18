/**
 * Bootstrap Ajax form submit on form change with file upload
 *
 * form-groups must be tagged with a class matching the field name
 * Ex: <input name="stuff" => <div class="form-group input-stuff-group"
 */
var errorModal = $("#error-modal");
var BSAjaxform = (function () {
	'use strict';

	/**
	 * Constructor
	 */
	function BSAjaxform(params) {
		var $form = $(params.form);
		// Test if the form must redirect
		var $redirect = true;
		if (params.redirect != undefined) {
			$redirect = params.redirect;
		}

		$form.submit(function (e) {
			e.preventDefault();
		});

		var cleanErrors = function () {
			$form.find('.form-group')
				.removeClass('has-error has-success has-warning')
				.find('.help-block')
				.addClass('hidden')
				.text('');
		};
		cleanErrors();

		$form.submit(function (e) {
			var formdata = (window.FormData) ? new FormData($form[0]) : null;
			// Si le navigateur ne supporte pas l'API FormData
			if (formdata !== null) {
				var data = formdata;
				// unchecked checkbox !
				// disabled checkbox !
				$form.find('input[type=checkbox]:not(:checked)').map(function () {
					data.append(this.name, 0);
				});
				$form.find('input[type=checkbox]:disabled').map(function () {
					data.append(this.name, this.value);
				});
				$form.find('input.date').map(function () {
					// data.delete(this.name);
					var dateUnformated = $form.find('input[name=' + this.name + ']').datepicker('getUTCDate');
					var dateFormated = null;
					if (dateUnformated != null) {
						dateFormated = dateUnformated.toCarbon();
						data.append(this.name, dateFormated);
					}
				});
			} else {
				var data = $form.not(':input.date').serializeArray();
				// unchecked checkbox !
				// disabled checkbox !
				data = data.concat(
					$form.find('input[type=checkbox]:not(:checked)').map(function () {
						return {
							name: this.name,
							value: 0
						}
					}).get()
				).concat(
					$form.find('input[type=checkbox]:disabled').map(function () {
						return {
							name: this.name,
							value: this.value
						}
					}).get()
				).concat(
					$form.find('input.date').map(function () {
						var dateUnformated = $form.find('input[name=' + this.name + ']').datepicker('getUTCDate');
						var dateFormated = null;
						if (dateUnformated != null) {
							dateFormated = dateUnformated.toCarbon();
							return {
								name: this.name,
								value: dateFormated
							}
						}
					}).get()
				)
			}

			if (params.progress) {
				params.progress();
			}

			$.ajax({
				method: $form.attr('method'),
				url: $form.attr('action'),
				contentType: false, // obligatoire pour de l'upload
				processData: false, // obligatoire pour de l'upload
				data: data,
				dataType: 'json',
				success: function (response) {
					cleanErrors();

					if (params.success) {
						params.success(response);
					}
				},
				error: function (response, json) {
					if (params.error) {
						params.error(response);
					}
					if (response.status == 500) {
						$("#error-modal").modal();
						$("#error-modal").find('.list-messages').text('');

						$("#error-modal").find('.modal-message').text("Une erreur est survenue.");
					}
					else if (response.status == 422) {
						var errors = response.responseJSON;
						cleanErrors();
						$("#error-modal").find('.list-messages').text('');
						$.each(errors, function (key, value) {
							var keyGroup = key.replace(/\./g, '-');
							//find each form group, which is given a unique id based on the form field's name
							var $group = $form.find('.input-' + keyGroup + '-group');
							var error = String(value).replace(/,/g, '');
							//add the error class and set the error text
							$group.addClass('has-error');
							$group.find('.help-block').removeClass('hidden').text(error);

							$("#error-modal").find('.list-messages').append("<li>" + error + "</li>")
						});
						$("#error-modal").modal();

					}
					else {
						// reload the current page
						if ($redirect && (response.status == 401 || !params.error)) {
							window.location = window.location;
						}
					}
				}
			})
		});
	}

	/**
	 * Don't forget the return
	 */
	return BSAjaxform;
})();

/**
 * Author : Cherfi Amine
 * Function : submitFormWithUpload
 * Generique function : Submit form with file upload
 *
 * @param formId string    : #formId
 * @param successCallback Array [callback]
 * @param isProgress
 *
 * @param errorCallback
 **/

function submitFormWithUpload(formId, successCallback, isProgress, errorCallback) {

	if (formId == null) {
		return -1;
	}
	// Required parameters
	var form = $(formId);

	form.submit(function (event) {

		event.preventDefault();

		form.find('.form-group')
			.removeClass('has-error has-success has-warning')
			.find('.help-block')
			.addClass('hidden')
			.text('');

		if (isProgress) {
			$('.modalContent').hide();
			$('.modal-wait').show();
		}

		var formData = new FormData(form[0]);

		var async = false;

		if (isProgress) {
			async = true;
		}

		var defaultErrorCallBack = function (response) {

			// default error handling
			switch (response.status) {
				case 500 :
					alert("Une erreur est survenue.");
					break;
				case 422 :
					// handling Laravel validation error
					handlValidationErrors(form, response);
					break;
			}

			// if custom error callback
			if (errorCallback) {
				errorCallback(response);
			}

		};
		// success callback
		var defaultSuccessCallback = function (response) {

			if ('msg' in response) {
				showNotification({
					msg: response.msg,
					type: 'success'
				});
			}

			// custom success callback
			if (successCallback) {
				successCallback(response);
			} else {
				// default success callback : reload current location after 5000
				setTimeout(
					function () {
						location.reload();
					}, 4000);

			}
		};

		// Complete callback
		var defaultCompleteCallback = function (response) {
			if (isProgress) {
				$('.modalContent').show();
				$('.modal-wait').hide();
			}
		};

		$.ajax({
			url: $(this).attr('action'),
			type: $(this).attr('method'),
			data: formData,
			async: async,
			cache: false,
			contentType: false,
			processData: false,
			complete: defaultCompleteCallback,
			success: defaultSuccessCallback,
			error: defaultErrorCallBack
		});


	});
}

/**
 *
 * Generique function : Handle Laravel error validation
 *
 * @param $form Jquery Object
 * @param response Ajax response
 *
 **/

function handlValidationErrors($form, response) {
	var errors = response.responseJSON;
	// Clean form errors
	$form.find('.form-group-sm')
		.removeClass('has-error has-success has-warning')
		.find('.help-block')
		.text('');
	$.each(errors, function (key, value) {
		//find each form group, which is given a unique id based on the form field's name
		var $group = $form.find('.input-' + key + '-group');

		//add the error class and set the error text
		$group.addClass('has-error');
		$group.find('.help-block').removeClass('hidden').text(value);
	});
}
