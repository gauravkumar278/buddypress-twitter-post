<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;
 require_once(BP_TWI_POST_PLUGIN_DIR .'/includes/twitter_post_action.php');
global $current_user;
?>
<div class="<?php echo $msg_class; ?>"><?php echo $msg; ?></div>
<form name="post_twitter" id="post_twitter" method="POST" role="form">
<?php wp_nonce_field('post_twitter', 'post_twitter_submitted'); ?>
	 <input type="hidden" class="form-control" name="userid" value="<?php echo $current_user->ID; ?>"/>
	<div class="form-group">
		<label for="Enter Post Content">Enter Tweet Content:</label>
		<textarea class="form-control" id="post_content" maxlength="140" name="post_content" placeholder="Maximum Characters 140 Words." required></textarea>
		<div class="counter" id="counter"></div>
	</div>
	<button type="submit" class="btn btn-info">Tweet</button>
</form>
<script type="text/javascript">
jQuery('#post_content').keyup(function () {
    var left = 140 - jQuery(this).val().length;
    if (left < 0) {
        left = 0;
    }
    jQuery('#counter').text('Characters left: ' + left);
});
</script>