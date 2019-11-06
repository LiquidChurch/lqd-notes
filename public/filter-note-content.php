<?php
/**
 * Filters Notes CPT Public View
 *
 * Replaces <span> elements with <input> elements where appropriate to add interactivity.
 */
function lqdnotes_enqueue_filters() {
	$lqdfilterspanversion = filemtime( LQDNOTES_DIR .'public/js/lqdnotes-filter-span.js' );
	wp_enqueue_script(
		'lqdnotes-filter-spans',
		plugin_dir_url( __FILE__ ) . 'js/lqdnotes-filter-span.js',
		array(),
		$lqdfilterspanversion
	);

	$lqdfilterinputversion = filemtime( LQDNOTES_DIR . 'public/js/lqdnotes-filter-inputs.js' );
	wp_enqueue_script(
		'lqdnotes-filter-inputs',
		// TODO: Should use LQDNOTES_DIR instead, add admin
		plugin_dir_url( __FILE__ ) . 'js/lqdnotes-filter-inputs.js',
		array(),
		$lqdfilterinputversion
	);
}
add_action( 'wp_enqueue_scripts', 'lqdnotes_enqueue_filters' );

/**
 * Add an Email Field and Submit Button for the User.
 *
 * If the user fills out the email field and clicks "Send Notes" they will receive an HTML
 * copy of the message notes with their answers filled in.
 */
function lqdnotes_add_email_submit( $content ) {
	$content .= '<input type="email" class="lqdnotes-email">';
	$content .= '<input type="submit" value="Send Notes" onclick="prepareNotes()">';
	return $content;
}
add_filter( 'the_content', 'lqdnotes_add_email_submit' );