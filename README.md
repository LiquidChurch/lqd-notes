# Liquid Notes
Version: 0.0.1 12/19/19

Authors: Liquid Church (liquidchurch), Dave Mackey (@davidshq)

## What Is?
Liquid Notes is a WordPress plugin that provides interactive fill-in-the-blank note capabilities. Its goal is to
facilitate speakers in engaging their audiences and increasing audience retention. This plugin can be used by pastors, teachers, lecturers, etc.

## Requirements
* WordPress 5.0+ - Liquid Notes utilizes Gutenberg for its fill-in-the-blank capabilities and as such requires Gutenberg to be active with WP.

## Installation
Download the files from this GitHub repository, compress them into a zip file, and upload them using the WordPress Admin Add Plugins screen. Click Activate once the plugin has been installed to make it active.

## Backend: Administering Liquid Notes
One should now see a "Liquid Notes" menu option on the WP Admin sidebar. The menu includes sub-items: All Notes and Add New. One can add/edit/delete notes as one would with WP's built in posts and pages.

Opening an existing note or adding a new one will pull up the editor screen with the Gutenberg editor enabled. Enter a title for the note, this will be transformed into a permalink, e.g. a title of "The World Ends" might result in a permalink like: https://nameofsite.com/notes/the-world-ends/

One can create the notes in the editor or one can paste in external content. Liquid Notes was specifically designed to work with Google Docs (see GOOGLE-DOCS.md) but should work with other content sources as well.

Once the note's content is complete one can set the "blanks" that will appear in the content on the frontend. This is accomplished by highlighting a desired word, clicking the dropdown next to the link icon, and choosing the Blank It option. The text should now be highlighted in yellow indicating that the blanking was successful. The word will continue to appear on the backend but will not appear on the front end to the user.

## Frontend: What the User Experiences
On the frontend a user can visit a Liquid Note and see the content of the note the administrator entered. It will appear with all text that has been blanked replaced by a text input. Below the notes proper will be a free-form section for notes as well as an email field and a send button.

If a user enters an email address and clicks send they can send themselves a copy of their filled-in and free-form notes.

## Roadmap
- Disable strict filters on paste content to allow styles and other useful HTML/CSS to be retained when pasting into
a note.
- Move Blank It out from under drop down
- Add a keyboard shortcut for Blank It.
- Merge code for existing taxonomy integration with notes.
- Allow customization of the permalink URL.
- Integrate override code to allow administrator to modify Notes template within their existing theme.
- Configure input boxes to be responsive to the notes content font sizes.
- Allow on/off toggles for free-form notes, fill-in-the-blank notes, and email capabilities.
- Use nonces and strip potentially unsafe html.

### Maybe Someday...
- Support integration with Google Drive, etc. to allow individuals to save a copy of the notes to their files rather
than / in addition to emailing it to themselves.

### Support
This plugin is available as-is with no guarantees. Use it at your own risk. You may contact Dave Mackey (@davidshq) if you need support, though support is not guaranteed.