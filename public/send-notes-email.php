<?php
/**
 * Set from email address
 *
 * TODO: Make setting
 */
function lqdnotes_set_from_email( $original_email_address ) {
	return 'noreply@liquidchurch.com';
}
add_filter( 'wp_mail_from', 'lqdnotes_set_from_email' );

/**
 * Set from name
 *
 * TODO: Make setting
 */
function lqdnotes_set_from_name( $original_email_from ) {
	return 'Liquid Church';
}
add_filter( 'wp_mail_from_name', 'lqdnotes_set_from_name' );

/**
 * Sends our email using wp_mail
 *
 * @param $message_notes
 * @param $free_form_notes
 * @param $send_to_email
 * @param $title_of_email
 */
function send_notes_email( $message_notes, $free_form_notes, $send_to_email, $title_of_email ) {
	$to = $send_to_email;
	$subject = $title_of_email;
	// We need to manually set the headers to support HTML.
	$headers = array( 'Content-Type: text/html; charset=UTF-8' );
	$message_notes = '<div style="margin: auto; max-width:600px;">' . $message_notes . '</div>';
	// If the submitter has entered free form notes we append them to the end of the email.
	if( isset($free_form_notes) and !empty($free_form_notes) ) {
		$message_notes .= '<div style="margin:auto; max-width:600px;"><h3>Your Notes</h3>' . $free_form_notes . '</div>';
	}

	wp_mail( $to, $subject, $message_notes, $headers );
}