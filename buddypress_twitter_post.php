<?php
/*
Plugin Name: Buddypress Twitter Post
Plugin URI: http://wordpress.org/plugins/buddypress-twitter-post/
Description: Twitter Post For Buddypress Users
Version: 1.0.0
Requires at least:  WP 4.2.2, BuddyPress 1.5
License: GNU General Public License 2.0 (GPL) http://www.gnu.org/licenses/gpl.html
Author: gauravbittu278 
Author URI: http://www.skillworld.in
Network: true
*/

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;


define( 'BP_TWI_POST_IS_INSTALLED', 1 );
define( 'BP_TWI_POST_VERSION', '1.0.0' );
define( 'BP_TWI_POST_PLUGIN_DIR', dirname( __FILE__ ) );
define( 'BP_TWI_POST_PLUGIN_FILE_LOADER',  __FILE__ );
define( 'BP_TWI_POST_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define ( 'BP_TWI_POST_DB_VERSION', '1.0.0' );

require_once('includes/buddypress_setup.php');

# Activation & Deactivation 
register_activation_hook(__FILE__,  'buddypress_twi_post_activate' );

// All Actions
add_action( 'add_css_js_bp_twitter', 'cssjs' );
add_action( 'bp_setup_nav', 'buddypress_setup_nav', 1000 );



/* Put setup procedures to be run when the plugin is activated in the following function */
function buddypress_twi_post_activate() {
	global $bp;
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( !is_plugin_active( 'buddypress/bp-loader.php' ) ) {
		die( _e( 'You cannot enable Buddypress Twitter Post <strong><a target="_blank" href="https://wordpress.org/plugins/buddypress/">BuddyPress</a></strong> is not active. Please install and activate BuddyPress before trying to activate Buddypress Twitter Post.' , 'bp-wall' ) );
	}
}

//include css and js file
function cssjs(){
  // Your css file is reachable at site.url/wp-content/plugins/buddypress-twitter-post/css/bootstrap.css
  wp_enqueue_style( 'bp-twitter-css', BP_TWI_POST_PLUGIN_URL . "assets/css/bootstrap.css", array(), BP_TWI_POST_DB_VERSION );
  
}	