<?php
require_once(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter-api/src/TwitterOAuths.php');

if (isset( $_POST['post_twitter_submitted'] ) && wp_verify_nonce($_POST['post_twitter_submitted'], 'post_twitter') ){
 global $current_user;
 
$twitter = get_user_meta( $current_user->ID, '_buddypress_twitter_setting_key', true );

//get all value from form fields
$post_content = trim($_POST['post_content']);
$userid = trim($_POST['userid']);
//check all key exist in database or not
if(isset($twitter[0]) && isset($twitter[1]) && isset($twitter[2]) && isset($twitter[3]) && isset($post_content) ){
$config =  array(
				'consumer_key' => $twitter[0],
				'consumer_secret' => $twitter[1],
				'token' => $twitter[2],
				'secret' => $twitter[3],
				'output_format' => 'array'
			       );


$obj = new TwitterOAuths($config);
$response = $obj->request('POST', $obj->url('1.1/statuses/update'), array('status' =>$post_content )); 
    if(isset($response['errors'][0]))
		{
			$msg = "Message: ".$response['errors'][0]['message']." code: ".$response['errors'][0]['code'];
			$msg_class = 'alert alert-danger';
		}
		else
		{
			$msg = "Tweeted successfully";
			$msg_class = 'alert alert-success';
		}    
}
else{
   $msg = 'Please Click to setting tab to set your key';
   $msg_class = 'alert alert-danger';
     
   }
   
}