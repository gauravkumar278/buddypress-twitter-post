<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

//ADD Menu to buddypress users profile.
function buddypress_setup_nav(){
	global $bp;
	if(bp_displayed_user_id() ==  bp_loggedin_user_id()) {
	bp_core_new_nav_item( array( 
       'name'  => __('My Twitter', 'my-twitter'),
       'slug' => 'bp-twitter', 
       'position' => 75,
       'screen_function' => 'bp_twitter_main_function',
	   'show_for_displayed_user' => true,
	   'default_subnav_slug' => 'my-twitter-sub',
	   'item_css_id' => 'my-twitter-sub'
      ));
	  }
	if(bp_displayed_user_id() ==  bp_loggedin_user_id()) {
	  bp_core_new_subnav_item( array(
        'name'                  => __( 'Post On Twitter', 'bp-twitter' ),
        'slug'                  => 'twitter-post',
        'parent_url'            => trailingslashit( bp_loggedin_user_domain() . 'bp-twitter' ),
        'parent_slug'           => 'bp-twitter',
        'screen_function'       => 'post_twitter',
        'position'              => 50
    ) );
	 bp_core_new_subnav_item( array(
        'name'                  => __( 'Twitter Setting', 'bp-twitter' ),
        'slug'                  => 'twitter-setting',
        'parent_url'            => trailingslashit( bp_loggedin_user_domain() . 'bp-twitter' ),
        'parent_slug'           => 'bp-twitter',
        'screen_function'       => 'twitter_setting_function',
        'position'              => 50
    ) );
	 
	
	}
	$bp->bp_nav['activity'] = false;
}
function bp_twitter_main_function () {
	bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
	
}
function twitter_setting_function()
{
  add_action( 'bp_template_content', 'twitter_setting_conetnt' );
  bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function twitter_setting_conetnt()
{
  if(file_exists(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter_setting.php'))
{
	  do_action('add_css_js_bp_twitter');
     require_once(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter_setting.php');
}
}
function post_twitter(){
  add_action( 'bp_template_content', 'post_twitter_conetnt' );
  bp_core_load_template( apply_filters( 'bp_core_template_plugin', 'members/single/plugins' ) );
}
function post_twitter_conetnt(){
  do_action('add_css_js_bp_twitter');
 require_once(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter_post.php');
}
?>