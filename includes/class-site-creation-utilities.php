<?php

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
	public static function flush_rewrite_rules( $site ) {
		switch_to_blog( $site->blog_id );
		delete_option( 'rewrite_rules' );
		restore_current_blog();
	}

	// Flush rewrite rules on site creation.
	// This is for compatibility with 5.0 and below.
	public static function flush_rewrite_rules_50( $blog_id, $user_id, $domain, $path, $site_id, $meta ) {
		switch_to_blog( $blog_id );
		update_option( 'rewrite_rules', array() );
		restore_current_blog();
	}
}
