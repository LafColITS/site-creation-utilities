<?php
/**
 * Plugin Name: Site Creation Utilities
 * Version: 1.0.3
 * Description: This plugin improves the Multisite site creation process by eliminating undesired features.
 * Author: Charles Fulton
 * Author URI: https://www.lafayette.edu
 * Plugin URI: https://github.com/LafColITS/site-creation-utilities
 * Text Domain: site-creation-utilities
 * Domain Path: /languages
 * @package Site-creation-utilities
 */

class Site_Creation_Utilities {

	// Prevents the creation of a local user account when creating a new site.
	public static function disable_user_creation( $args ) {
		wp_die( __( 'The requested user does not exist and automatic user creation is disabled', 'site-creation-utilities' ) );
	}

	// Suppress welcome email on site creation.
	public static function disable_welcome_email( $blog_id, $user_id, $password, $title, $meta ) {
		return false;
	}

	// Flush rewrite rules on site creation.
	public static function flush_rewrite_rules( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {
		switch_to_blog( $blog_id );
		update_option( 'rewrite_rules', array() );
		restore_current_blog();
	}
}

add_action( 'pre_network_site_new_created_user', array( 'Site_Creation_Utilities', 'disable_user_creation' ) );
add_filter( 'wpmu_welcome_notification', array( 'Site_Creation_Utilities', 'disable_welcome_email' ), 10, 5 );
add_action( 'wpmu_new_blog', array( 'Site_Creation_Utilities', 'flush_rewrite_rules' ), 10, 6 );
