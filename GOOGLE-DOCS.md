# Using Google Docs with Liquid Notes
Pasting from a Google Doc into Liquid Notes works well. It transfers the content, including images[1], but may lose some formatting.

The Gutenberg editor currently pastes in content with semantic tags but does not retain styling without defined semantic meaning. This means text color, alignment, size, etc. does not come across but bold, italic, headers, etc. do.

To overcome this issue in the short-term the lqdnotes.css file (/lqdnotes/public/css) includes rules that add formatting back to the text on the front-end (client side).

Unfortunately, this does not resolve all issues. One may have to redo some text formatting after pasting the content into Gutenberg.

We have submitted a ticket to the Gutenberg repository in hopes of seeing a resolution to this problem: https://github.com/WordPress/gutenberg/issues/18381

We also have an open WordPress StackExchange question on the topic open: https://wordpress.stackexchange.com/questions/352134/how-would-one-modify-the-filtering-gutenberg-applies-to-pasted-content


Notes:

[1]The images are still hosted on Google's servers.
