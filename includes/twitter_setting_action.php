<?php
require_once(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter-api/autoload.php');
use Abraham\TwitterOAuth\TwitterOAuth;
if (isset( $_POST['save_twitter_settings_submitted'] ) && wp_verify_nonce($_POST['save_twitter_settings_submitted'], 'save_twitter_settings') ){

//get all value from form fields
$consumer_key = trim($_POST['consumer_key']);
$consumer_secret = trim($_POST['consumer_secret']);
$access_token = trim($_POST['access_key']);
$access_token_secret = trim($_POST['access_token_secret']);
$userid = trim($_POST['userid']);

$connection = new TwitterOAuth($consumer_key, $consumer_secret, $access_token, $access_token_secret);
$content = $connection->get("account/verify_credentials");

if(isset($content->errors)){
   $msg = 'Invalid Token Please check Your All Key.';
   $msg_class = 'alert alert-danger';
}
else{
  $value = array();
  $value[0] = $consumer_key;
  $value[1] = $consumer_secret;
  $value[2] = $access_token;
  $value[3] = $access_token_secret;
  
  $id = update_user_meta( $userid , '_buddypress_twitter_setting_key', $value );
  if($id){
      $msg = 'Your Twitter Key Saved Successfully.Now You Can Post On Twitter.';
      $msg_class = 'alert alert-success';
  }
  
}




}