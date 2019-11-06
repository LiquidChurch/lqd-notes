<?php
/**
 * Define and Create Liquid Notes Custom Role.
 *
 */

/**
 * Create a Custom Role: Liquid Notes Editor
 *
 * @since       0.0.1
 */
function createNotesRole()
{
	// Set capabilities for role
	$capabilities = array(
		// Permissions for LqdNotes CPT
		'edit_other_lqdnotes' => true,
		'delete_other_lqdnotes' => true,
		'delete_private_lqdnotes' => true,
		'edit_private_lqdnotes' => true,
		'read_private_lqdnotes' => true,
		'edit_published_lqdnotes' => true,
		'publish_lqdnotes' => true,
		'delete_published_lqdnotes' => true,
		'edit_lqdnotes' => true,
		'delete_lqdnotes' => true,
		'edit_lqdnote' => true,
		'read_lqdnote' => true,
		'delete_lqdnote' => true,
		'read' => true,
		// TODO: Do we need to provide permissions for each taxonomy?
		'manage_lqdnote_types' => true,
		'edit_lqdnote_types' => true,
		'delete_lqdnote_types' => true,
		'assign_lqdnote_types' => true
		// Add Speaker
		// Add Scriptures
		// Add Series
	);

	$role = 'lqdnotes_editor';
	$display_name = __('Liquid Notes Editor', 'lqdnotes');
	// Create Our Liquid Notes role and assign the custom capabilities to it.
	add_role($role, $display_name, $capabilities);

	// Add Custom Capabilities to Admin and Editor Roles
	$roles = array('administrator', 'editor');
	foreach ($roles as $roleName) {
		// Get role
		// $role = get_role ( string $role );
		$role = get_role($roleName);

		// Check role exists
		if ( is_null($role) ) {
			continue;
		}

		// Iterate through our custom capabilities, adding them
		// to this role if they are enabled
		foreach ($capabilities as $capability => $enabled) {
			if ( $enabled ) {
				// Add capability to role
				// WP_Role::add_cap( string $cap, bool $grant = true )
				$role->add_cap( $capability );
			}
		}
	}
}
