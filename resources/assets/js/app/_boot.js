$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).ready(function () {
	"use strict";
	/**
	 * Init select2
	 */
	$(".js-example-basic-single").select2();
	$(".selectWithSearch").select2({allowClear: true});

	// initAjaxContactSelect2();

	/**
	 * Init toggle menu
	 */
	$("#menu-toggle").click(function (e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled");
	});
	$("#menu-toggle-2").click(function (e) {
		e.preventDefault();
		$("#wrapper").toggleClass("toggled-2");
		$('#menu ul').hide();
	});
	initMenu();

	/**
	 * Init popup de confirmation de suppression
	 */
	$(".delete-confirm").on("submit", function (e) {
		return confirm("Souhaitez-vous vraiment supprimer ?");
	})


	/**
	 * Collapsing single
	 */
	$('.collapse').on('show.bs.collapse', function () {
		$('.collapse.in').collapse('hide');
	});
});
