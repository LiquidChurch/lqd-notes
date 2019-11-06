// When someone enters an email address and clicks submit we use JS to take the input values and return them as
// regular text in place of the inputs.
function prepareNotes() {
    // Get input boxes we are replacing
    let filledInputs = Array.from(document.getElementByClassName( 'lqdnotes-blank-input' ) );

    // Iterate through instances of input box
    // TODO: If input not filled, return a blank space equivalent to the # of characters in correct answer
    filledInputs.forEach( filledInput => {
        // Get the input value
        let inputText = filledInput.value;

        // Create variable to hold regular text code
        let spanText = '<span class="lqdnotes-filled">' + inputText + '</span>';

        // Set outerHTML to our regular text.
        filledInput.outerHTML = spanText;
    })
}