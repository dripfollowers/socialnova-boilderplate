jQuery(document).ready(function(){
	console.log('I AM HERE');

	var $form = jQuery('.checkout-form-free');
	var $email = jQuery('.checkout-form-free #email');
	var $media = jQuery('.checkout-form-free #username');
	var $checkbox = jQuery('.checkout-form-free #subscribe');
	var $button = jQuery('.checkout-form-free button');

	// console.log($form,$email,$media,$checkbox,$button);

	//disable button until recaptcha
	$button.prop('disabled', true);


	var urlParams = new URLSearchParams(window.location.search);
	var mediaInput = urlParams.get('media');
	mediaInput ? $media.val(mediaInput) : ''


	$form.submit(function (event) {
		event.preventDefault();
		var email = $email.val();
		var media = $media.val();
	     
	    // This does the ajax request
	    jQuery.ajax({
	        url: free_services_obj.ajaxurl, // or example_ajax_obj.ajaxurl if using on frontend
	        data: {
	            'action': 'free_services_request',
	            'media' : media
	        },
	        success:function(data) {
	            // This outputs the result of the ajax request
	            if(data.includes('result:true')){
	            	mailchimp_subscribe(email);
	            } else {
	            	jQuery('#error').show();
	            }
	            console.log(data);
	        },
	        error: function(errorThrown){
	            console.log(errorThrown);
	        }
	    });


	})

	// Send data to PHP script via .ajax() of jQuery
	function mailchimp_subscribe(email){
		jQuery.ajax({
		    type: 'POST',
		    dataType: 'json',
		    url: mailchimp_obj.ajaxurl,
		    data: {
		    	'email' : email
		    },
		    success: function (results) {
		    	jQuery('#free-services').hide();
			    jQuery('#free-thanks').show();
		        console.log(results);
		    },
		    error: function (results) {
		      console.log(results);
		    }
		});			
	}

});