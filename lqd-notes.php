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
require_once LQDNOTES_DIR . 'admin/lqdnotes-guten-button.php';
require_once LQDNOTES_DIR . 'public/filter-note-content.php';
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

/**
 * Load CPT Template
 */
function lqdnotes_add_single_template( $originalTemplate ) {
	$singleTemplate = plugin_dir_path(
		\dirname(
			__DIR__
		)
	);
	$singleTemplate .= 'public/templates/single-lqdnote.php';

	if ( 'lqdnotes' === get_post_type( get_the_ID() ) ) {
		if (file_exists( $singleTemplate ) ) {
			return $singleTemplate;
		}
	}

	return $originalTemplate;
}

add_action( 'single_template', 'lqdnotes_add_single_template' );

/**
 * Load CPT Header Template
 */
function lqdnotes_add_header_template( $originalTemplate ) {
	$singleTemplate = plugin_dir_path(
		\dirname(
			__DIR__
		)
	);
	$singleTemplate .= '/public/templates/lqdnotes-header.php';

	if ( 'lqdnotes' === get_post_type( get_the_ID() ) ) {
		if (file_exists( $singleTemplate) ) {
			return $singleTemplate;
		}
	}

	return $originalTemplate;
}