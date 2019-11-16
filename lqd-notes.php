<?php
/**
 * Plugin Name: Liquid Notes
 * Author: Liquid Church
 * Plugin URI: https://github.com/liquidchurch/lqd-notes
 * Version: 0.0.1
 * License: GPL-2.0+
 * Text Domain: lqdnotes
 * Domain Path: /languages
 *
 * A fill-in-the-blank notes plugin that allows pastors, teachers, etc. to provide interactive notes to their
 * audience.
 */

// Don't allow access to this file except through WordPress
if ( ! defined( 'WPINC' ) ) {
	die;
}
// Instead of executing plugin_dir_path every time we want the plugin's path, we do it once here and call anywhere.
define( 'LQDNOTES_DIR', plugin_dir_path( __FILE__ ) );
define( 'LQDNOTES_URL', plugin_dir_url( __FILE__ ) );

// Add code from other files by include.
require_once LQDNOTES_DIR . 'includes/create-notes-role.php';
require_once LQDNOTES_DIR . 'includes/create-notes-cpt.php';
require_once LQDNOTES_DIR . 'admin/lqdnotes-guten-button.php';
require_once LQDNOTES_DIR . 'public/display-blanks.php';
require_once LQDNOTES_DIR . 'public/display-filled.php';
require_once LQDNOTES_DIR . 'public/handle-ajax.php';
require_once LQDNOTES_DIR . 'public/send-notes-email.php';
require_once LQDNOTES_DIR . 'public/template-loader.php';
// require_once LQDNOTES_DIR . 'admin/settings-page.php';

// Hook our code to create a custom role and cpt for Liquid Notes into the plugin initialization.
// TODO: This only needs to run once, abstract into lqdnotes_activate() function.
// The lqdnotes_activate() is not working currently b/c the referenced code is not
// in the same file, fix here:
// https://stackoverflow.com/questions/22953418/plugin-activation-hook-not-working-in-wordpress
add_action( 'init', 'createNotesRole' );
add_action( 'init', 'createNotesCPT' );

/**
 * Enqueue CSS we'll use to format Liquid Notes related pages.
 */
function lqdnotes_enqueue_css() {
	$lqdcssversion = filemtime( LQDNOTES_DIR . 'public/css/lqdnotes.css' );
	wp_enqueue_style(
		'lqdnotes-css',
		plugins_url(  'public/css/lqdnotes.css', __FILE__ ),
		array(),
		$lqdcssversion
	);
}
add_action( 'enqueue_block_assets', 'lqdnotes_enqueue_css' );