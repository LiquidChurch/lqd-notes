<?php
/**
 * Display Blanks in Message Notes
 *
 * Replaces <span> elements with <input> elements where appropriate to add interactivity.
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
 * @param $content
 *
 * @return string
 */
function lqdnotes_add_div( $content ) {
	$updated_content = '<div id="message_notes" class="message_notes">' . $content . '</div>';
	return $updated_content;
}
add_filter( 'the_content', 'lqdnotes_add_div' );

/**
 * Add Freeform Notes Area.
 *
 * @param $content
 *
 * @return string
 */
function lqdnotes_add_freeform_notes( $content ) {
	$content .= '<h3>Add Your Own Notes Here</h3>';
	$content .= '<textarea id="free_form_notes" rows="5"></textarea>';
	return $content;
}
add_action( 'the_content', 'lqdnotes_add_freeform_notes');

/**
 * Add an Email Field and Submit Button for the User.
 *
 * If the user fills out the email field and clicks "Send Notes" they will receive an HTML
 * copy of the message notes with their answers filled in.
 *
 * @param $content
 *
 * @return string
 */
function lqdnotes_add_email_submit( $content ) {
	$content .= '<h3>Enter email address and click Send Notes button</h3>';
	$content .= '<input id="send_to_email" type="email" class="lqdnotes-email">';
	$content .= '<input id="send_notes" type="submit" value="Send Notes">';
	return $content;
}
add_filter( 'the_content', 'lqdnotes_add_email_submit' );