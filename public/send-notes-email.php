<?php
function send_notes_email( $message_notes, $send_to_email, $title_of_email ) {
	$to = $send_to_email;
	$subject = $title_of_email;
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );
	$message_notes = '<div style="margin: auto; max-width:600px;">' . $message_notes . '</div>';
	wp_mail( $to, $subject, $message_notes, $headers );
}