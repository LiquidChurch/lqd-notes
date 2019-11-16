<?php
/**
 * Load CPT Template
 *
 * @param $originalTemplate
 *
 * @return string
 *
 * @link https://tommcfarlin.com/custom-templates-in-our-wordpress-plugin/
 */
function lqdnotes_add_single_template( $originalTemplate ) {
	$singleTemplate = LQDNOTES_DIR . 'public/templates/single-lqdnotes.php';
	// TODO: Do an echo on $singleTemplate, the result is funky! Why does this work?
	if ( 'lqdnotes' === get_post_type( get_the_ID() ) ) {
		if (file_exists( $singleTemplate ) ) {
			return $singleTemplate;
		}
	}

	return $originalTemplate;
}

add_action( 'single_template', 'lqdnotes_add_single_template' );
