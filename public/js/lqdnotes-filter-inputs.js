/**
 * Liquid Notes Filter Inputs
 *
 * Handles converting the text values in input boxes to spans, restricts the size of images to ensure email
 * compatibility, and send the content using jQuery to WP ajax-admin.php
 */

/**
 * Convert Input Text Values to Spans
 *
 * When someone enters an email address and clicks submit we use JS to take the input values and return them as
 * regular text in place of the inputs.
 */
function prepareNotes() {
    // Get input boxes we are replacing
    let filledInputs = Array.from(document.getElementsByClassName( 'lqdnotes-blank-input' ) );

    // Iterate through instances of input box
    // TODO: If input not filled, return a blank space equivalent to the # of characters in correct answer
    filledInputs.forEach( filledInput => {
        // Get the input value
        let inputText = filledInput.value;

        // Set outerHTML to our regular text.
        filledInput.outerHTML = '<span class="lqdnotes-filled">' + inputText + '</span>';
    });
    sendNotes();
}

/**
 * We need to resize images to fit email.
 */
function restrictImages() {

    // Get the figures we are modifying.
    let figuresToRestrict = document.querySelectorAll( 'figure .wp-block-image');
    // Get the images we are modifying.
    let imagesToRestrict = document.querySelectorAll( '.wp-block-image img' );

    imagesToRestrict.forEach( image => {
        image.style.maxWidth = '600px';
    });

}

/**
 * Handles sending our data from JS to PHP via admin-ajax.php, where we pick up with PHP again for wp_mail()
 *
 * @returns {boolean}
 */
function sendNotes() {
    restrictImages();
    // Get the content within our entry-content div
    let theNoteContents = Array.from(document.getElementsByClassName( 'entry-content') );

    // Get the email address to send notes to.
    let sendToEmail = document.getElementById( 'send_to_email' );

    // Get the title of the Message
    let titleOfMessage = document.getElementsByTagName( 'title' )[0].innerHTML;
    let titleOfEmail = 'Message Notes for ' + titleOfMessage;

    // Start off with an empty string.
    let theHTMLToSend = '';

    // Add the contents of the notes to our string.
    theNoteContents.forEach( theNoteContent => {
            theHTMLToSend += theNoteContent.innerHTML;
        }
    );

    // Setup variable containing POST variables/values.
    let data = {
        action: 'email_notes',
        notes: theHTMLToSend,
        send_to_email: sendToEmail,
        email_title: titleOfEmail
    };

    // Send the message to admin-ajax.php
    jQuery.post(lqdnotes_ajax.ajax_url, data, function(response) {
        console.log(response);
    });
    return false;
}