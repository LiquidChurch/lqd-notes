<?php
/**
 * Modifies the Initial Display of the Message Notes
 *
 * Functions here are related to modifying the display of the message notes.
 *
 * @since 0.0.1
 */

/**
 * Display Blanks in Message Notes
 *
 * Replaces <span> elements with <input> elements where appropriate to add interactivity.
 *
 * @since 0.0.1
 */
function lqdnotes_enqueue_display_blanks() {
	$lqdfilterspanversion = filemtime( LQDNOTES_DIR .'public/js/lqdnotes-filter-span.js' );
	wp_enqueue_script(
		'lqdnotes-filter-spans',
		plugin_dir_url( __FILE__ ) . 'js/lqdnotes-filter-span.js',
		array(),
		$lqdfilterspanversion
	);
}
add_action( 'wp_enqueue_scripts', 'lqdnotes_enqueue_display_blanks' );

/**
 * Add Wrapping Div for Message Content.
 *
 * @param $content
 *
 * @return string
 *
 * @since 0.0.1
 */
function lqdnotes_add_div( $content ) {
	$updated_content = '<div id="message-notes" class="message-notes">' . $content . '</div>';
	return $updated_content;
}
add_filter( 'the_content', 'lqdnotes_add_div' );
