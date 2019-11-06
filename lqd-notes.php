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

// Add code from other files by include.
require_once LQDNOTES_DIR . 'includes/create-notes-role.php';
require_once LQDNOTES_DIR . 'includes/create-notes-cpt.php';
require_once LQDNOTES_DIR . 'admin/settings-page.php';

// Hook our code to create a custom role and cpt for Liquid Notes into the plugin initialization.
// TODO: This only needs to run once, abstract into lqdnotes_activate() function.
add_action( 'init', 'createNotesRole' );
add_action( 'init', 'createNotesCPT' );
