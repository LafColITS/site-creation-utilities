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

// Require class.
require( 'includes/class-site-creation-utilities.php' );

add_action( 'pre_network_site_new_created_user', array( 'Site_Creation_Utilities', 'disable_user_creation' ) );
add_filter( 'wpmu_welcome_notification', array( 'Site_Creation_Utilities', 'disable_welcome_email' ), 10, 5 );
add_action( 'wpmu_new_blog', array( 'Site_Creation_Utilities', 'flush_rewrite_rules' ), 10, 6 );
