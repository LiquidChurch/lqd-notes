<?php
/**
* Handle AJAX Request
*/
function lqdnotes_ajax_process_request() {
	// Check if data is being sent and that it is our data
	if ( isset( $_POST["notes"] ) ) {
		// Set our response equal to that of the POST variable
		$message_notes = $_POST["notes"];
		$send_to_email = $_POST["sendToEmail"];
		$title_of_email = $_POST["titleOfEmail"];
		send_notes_email( stripslashes($message_notes), stripslashes($send_to_email), stripslashes($title_of_email) );
		echo $message_notes;
		die();
	}

}
add_action( 'wp_ajax_email_notes', 'lqdnotes_ajax_process_request' );