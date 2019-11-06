document.addEventListener( 'DOMContentLoaded', function() {
    // Get spans to be replaced
    let blankSpans = Array.from(document.getElementsByClassName( 'lqdnotes-blank-it' ) );

    // Iterate through instances of span and replace with input
    blankSpans.forEach( blankSpan => {
            // Get span text
            let blankText = blankSpan.innerHTML;
            // Create variable to hold input text box
            let blankInput = '<input type="text" id="' + blankText + '" class="lqdnotes-blank-input">';
            // Replace span with input box.
            blankSpan.outerHTML = blankInput;
    }
    )
}
);