<?php
/**
* Handle AJAX Request
*/
function lqdnotes_ajax_process_request() {
	if ( isset( $_POST["notes"] ) ) {
		// Set our response equal to that of the POST variable
		$message_notes   = $_POST["notes"];
		$send_to_email   = $_POST["send_to_email"];
		$title_of_email  = $_POST["email_title"];
		$free_form_notes = $_POST["free_form_notes"];
		send_notes_email( stripslashes( $message_notes ), stripslashes( $free_form_notes ), stripslashes( $send_to_email ),
			stripslashes( $title_of_email ) );
		echo $message_notes, $send_to_email, $title_of_email, $free_form_notes;
		die();
	}
}
add_action( 'wp_ajax_email_notes', 'lqdnotes_ajax_process_request' );
add_action( 'wp_ajax_nopriv_email_notes', 'lqdnotes_ajax_process_request' );