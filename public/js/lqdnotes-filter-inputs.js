/**
 * Liquid Notes Filter Inputs
 *
 * Handles converting the text values in input boxes to spans, restricts the size of images to ensure email
 * compatibility, and send the content using jQuery to WP ajax-admin.php
 *
 * TODO: Add nonces, what about sanitization/validation?
 */

/**
 * Listen for Submit Button Click
 *
 * Android does not allow any inline JS, this means the onClick event won't work, use an eventListener to bypass
 * this limitation.
 */
document.addEventListener( "DOMContentLoaded", function(event) {
    document.getElementById('send_notes').addEventListener('click', prepareNotes);
});


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
        filledInput.outerHTML = '<span style="background-color:yellow" class="lqdnotes-filled">' + inputText + '</span>';
    });
    restrictImages();
    sendNotes();
    showSuccessMessage();
}

/**
 * We need to resize images to fit email.
 */
function restrictImages() {

    // Get the figures we are modifying.
    let figuresToRestrict = document.querySelectorAll( 'figure.wp-block-image');
    figuresToRestrict.forEach( figure => {
        // https://stackoverflow.com/questions/19261197/how-can-i-remove-wrapper-parent-element-without-removing-the-child
        figure.replaceWith(...figure.childNodes);
    });
    // Get the images we are modifying.
    let imagesToRestrict = document.querySelectorAll( 'img' );
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
    // Get the content within our entry-content div
    let theNoteContents = Array.from(document.getElementsByClassName( 'message_notes'));

    // Get the free form notes
    let freeFormNotes = document.getElementById( 'free_form_notes').value;

    // Get the email address to send notes to.
    let sendToEmail = document.getElementById( 'send_to_email' ).value;

    // Get the title of the Message
    let titleOfMessage = document.title;
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
        free_form_notes: freeFormNotes,
        send_to_email: sendToEmail,
        email_title: titleOfEmail
    };

    // Send the message to admin-ajax.php
    jQuery.post(lqdnotes_ajax.ajax_url, data, function(response) {
        console.log(response);
    });
    return false;
}

function showSuccessMessage() {
    let theContent = Array.from(document.getElementsByClassName( 'entry-content' ));
    theContent.forEach(entry => {
       entry.innerHTML = '<h3>Check your inbox...</h3>';
       entry.innerHTML += '<p>Your notes are on the way.</p>';
       entry.innerHTML += '<input id="refresh_page" type="submit" value="Back to Message Notes.">';
    });
    document.getElementById('refresh_page').addEventListener('click', refreshPage );
}

function refreshPage() {
    window.location.reload();
}