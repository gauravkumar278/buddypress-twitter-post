<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
 require_once(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter_setting_action.php');
 global $current_user;
 $data = get_user_meta( $current_user->ID, '_buddypress_twitter_setting_key', true );
 $consumer_key = $data[0];
 $consumer_secret = $data[1];
 $access_key = $data[2];
 $access_token_secret = $data[3];
?>
				<div class="<?php echo $msg_class; ?>"><?php echo $msg; ?></div>
				<form name="save_twitter_settings" id="save_twitter_settings" method="POST" role="form">
				<?php wp_nonce_field('save_twitter_settings', 'save_twitter_settings_submitted'); ?>
					 <a target="_blank" href="https://dev.twitter.com/apps/new"> click here to create twitter app </a>
					 <input type="hidden" class="form-control" name="userid" value="<?php echo $current_user->ID; ?>"/>
					<div class="form-group">
						<label for="Consumer Key">Consumer Key:</label>
						<input type="text" class="form-control" id="consumer_key" name="consumer_key" value="<?php echo $consumer_key; ?>" required>
					</div>
					<div class="form-group">
						<label for="Consumer Secret">Consumer Secret:</label>
						<input type="text" class="form-control" id="consumer_secret" name="consumer_secret" value="<?php echo $consumer_secret; ?>" required>
					</div>
					<div class="form-group">
						<label for="Access Key">Access Key:</label>
						<input type="text" class="form-control" id="access_key" name="access_key" value="<?php echo $access_key; ?>" required>
					</div>
					<div class="form-group">
						<label for="Access Token Secret">Access Token Secret:</label>
						<input type="text" class="form-control" id="access_token_secret" name="access_token_secret" value="<?php echo $access_token_secret; ?>" required>
					</div>
  					<button type="submit" class="btn btn-info">Submit</button>
				</form>
		