<?php
/**
 * JavaScript Detection
 *
 * @see     function add_filter
 * @package Business_Identity
 * @since   Business Identity 3.0.0
 */
function business_identity_js_detection() { ?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script><?php
} // end function business_identity_js_detection
add_filter( 'wp_enqueue_scripts', 'business_identity_js_detection' );