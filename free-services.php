<?php

add_shortcode('free-services','free_services');

function free_services($atts, $content = null){
	extract(shortcode_atts(array('service' => 'likes'), $atts));
	if($service=='likes'){
		$placeholder = 'Enter Post URL';
		$cta = 'Get Likes Now!';
	} else {
		$placeholder = 'Enter Instagram Username';
		$cta = 'Get Followers Now!';
	}
	ob_start();
	?>

	<form action="#" class="checkout-form-free">
		<span style="display:none;" id="error">Your Instagram username has already redeemed it's free <?php echo $service; ?>!</span>
	    <div class="form-group">
	      <label for="username">Instagram Username</label>
	      <input type="text" name="username" id="username" class="form-control" placeholder="Type your Instagram Username">
	    </div>
	    <div class="form-group">
	      <label for="">Email Address</label>
	      <input type="email" name="email" id="email" class="form-control" placeholder="Type your email here">
	    </div>
	    <div class="newsletter text-center">
	      <p>
	        By clicking on Continue, you agree to our <a href="#">terms of service</a> and confirm that you've read our <a href="#">privacy policy</a>.
	      </p>
	      <label class="checkbox-inline">
	        <input type="checkbox" id="subscribe" name="subscribe" value="subscribe" checked>
	        <span class="ml-2 d-inline-block">Subscribe for Newsletter and offers</span>
	      </label>
	    </div>
		<div class="g-recaptcha" data-sitekey="6LdO6b8UAAAAAL4DaG8Lvv07BED6zmdTZJInPD5S" data-callback="enableBtn"></div>
	    <button class="btn btn-magenta btn-block text-uppercase" type="submit" id="free-submit">Continue</button>
	</form>

	<div id="free-thanks" style="display:none;">
		<h2>Congrats!</h2>
		<p>You've got 50 free <?php echo $service; ?> on the way!</p>
		<p>Check out some of our <a href="/">other services</a> in the mean time.</p>
	</div>
	<script type="text/javascript">
		var free_services_obj = {
		    "ajaxurl": "<?php echo admin_url('admin-ajax.php') ?>",
		    "free_services_nonce": "<?php echo wp_create_nonce('free_services_nonce') ?>"
		};
		var mailchimp_obj = {
		    "ajaxurl": "<?php echo get_stylesheet_directory_uri() ?>/mailchimp-signup.php",
		    "free_services_nonce": "<?php echo wp_create_nonce('mailchimp_nonce') ?>"
		};
		function enableBtn(){
			jQuery('#free-submit').prop('disabled',false);
		}
	</script>
	<?php
	return ob_get_clean();
}