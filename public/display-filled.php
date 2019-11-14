<?php
/**
 * Display Filled in Message Notes
 *
 * Replaces <input> elements where appropriate with <span> elements.
 *
 * Create localized variable to pass admin_url to JS.
 */
function lqdnotes_enqueue_display_filled() {
	$lqdfilterinputversion = filemtime( LQDNOTES_DIR . 'public/js/lqdnotes-filter-inputs.js' );
	wp_enqueue_script(
		'lqdnotes-filter-inputs',
		LQDNOTES_URL . 'public/js/lqdnotes-filter-inputs.js',
		array( 'jquery' ),
		$lqdfilterinputversion
	);

	$ajax_array = array(
		'ajax_url' => admin_url( 'admin-ajax.php' )
	);

	wp_localize_script(
		'lqdnotes-filter-inputs',
		'lqdnotes_ajax',
		$ajax_array );
}
add_action( 'wp_enqueue_scripts', 'lqdnotes_enqueue_display_filled' );