/**
 *
 * @type {{}}
 *
 */

var simpleMdeConfig = {
	element: null,
};

/**
 *
 * @param id
 *
 */

function initBootstrapMarkDownEditor(id) {

	var $element = $(id);

	return new SimpleMDE({
		element: $element[0],
		forceSync: true
	});
}