/**
 * Debouncer v1.0
 *
 * Returns a function, that, as long as it continues to be invoked, will not
 * be triggered. The function will be called after it stops being called for
 * N milliseconds. If `immediate` is passed, trigger the function on the
 * leading edge, instead of the trailing.
 *
 * Note: debounced functions are only called once during a given period of time,
 * N milliseconds after its last invocation.
 *
 * Throttled functions, which we're not using here, is limited to be called no more
 * than once every N milliseconds.
 *
 * @link http://davidwalsh.name/javascript-debounce-function
 *
 * Technique taken from Underscore.js: http://underscorejs.org (The MIT License)
 *
 * @package Business_Identity
 * @since   Business Identity 1.0
 */
function debounce( func, wait, immediate ) {
	var timeout;
	return function() {
		var context = this,
			args = arguments;
		clearTimeout( timeout );
		timeout = setTimeout( function() {
			timeout = null;
			if ( !immediate ) func.apply( context, args );
		}, wait);
		if ( immediate && !timeout ) func.apply( context, args );
	};
};