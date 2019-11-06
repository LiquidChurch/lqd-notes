<?php
/**
 * Registers our Gutenberg Liquid Notes Button in the Gutenberg Editor.
 *
 */

function lqdnotes_add_button_script_register() {
	// Its annoying having to change the version of the JS file every time one uploads it
	// to cache break. This automatically sets the version to the file modified time.
	$lqdjsversion = filemtime( LQDNOTES_DIR .'admin/js/lqdnotes-guten-button.js' );
	wp_register_script(
		'add-notes-button',
		plugins_url( 'js/lqdnotes-guten-button.js', __FILE__ ),
		array( 'wp-rich-text', 'wp-element', 'wp-editor' ),
		$lqdjsversion
	//
	);
}
add_action( 'init', 'lqdnotes_add_button_script_register' );

function lqdnotes_button_script_enqueue() {
	wp_enqueue_script( 'add-notes-button' );
}
add_action( 'enqueue_block_editor_assets', 'lqdnotes_button_script_enqueue' );