jQuery('#contact-form')
	.bind('submit', function(e) {
		e.preventDefault();
		
		var name_rules = {
    		required: true,
		}
		
		var company_rules = {
    		required: true,
		}

		var businesstype_rules = {
    		required: true,
		}

		var email_rules = {
    		email: {
	    		required: true,
	    		email: true,
    		}
		}
		
		var message_rules = {
    		required: true,
		}
		
		var name_result = approve.value(jQuery('[name="name"]').val(), name_rules);
		var company_result = approve.value(jQuery('[name="company"]').val(), company_rules);
		var businesstype_result = approve.value(jQuery('[name="business_type"]').val(), businesstype_rules);
		var email_result = approve.value(jQuery('[name="email"]').val(), email_rules);
		var message_result = approve.value(jQuery('[name="message"]').val(), message_rules);
		
		if (name_result.required.approved && company_result.required.approved && businesstype_result.required.approved && email_result.email.approved) {
    		jQuery('[name="name"]').removeClass('is-invalid-input');
    		jQuery('[name="company"]').removeClass('is-invalid-input');
    		jQuery('[name="business_type"]').removeClass('is-invalid-input');
    		jQuery('[name="email"]').removeClass('is-invalid-input');
    		jQuery('[name="message"]').removeClass('is-invalid-input');
    		
    		console.log('valid!');
    
	        thisForm = jQuery(this);
	        formData = thisForm.serialize();
	        	        
	        thisForm.find('[name="name"]').attr('disabled', true);
	        thisForm.find('[name="company"]').attr('disabled', true);
	        thisForm.find('[name="business_type"]').attr('disabled', true);
			thisForm.find('[name="email"]').attr('disabled', true);
			thisForm.find('[name="telephone"]').attr('disabled', true);
			thisForm.find('[name="message"]').attr('disabled', true);
			thisForm.find('button').html('<i class="fa fa-spinner fa-spin"></i> sending inquiry').attr('disabled', true);
			
			jQuery('#email-status').addClass('hide').find('p').text("");
	        
	        jQuery.ajax({
	            type: 'POST',
	            dataType: 'json',
	            data: formData,
	            url: ajaxobject.ajaxurl,
	            success: function(response){
	            	if (response) {
	            		thisForm.find('[name="name"]').removeAttr('disabled').val("").blur();
            			thisForm.find('[name="company"]').removeAttr('disabled').val("").blur();
            			thisForm.find('[name="business_type"]').removeAttr('disabled').val("").blur();
            			thisForm.find('[name="email"]').removeAttr('disabled').val("").blur();
            			thisForm.find('[name="telephone"]').removeAttr('disabled').val("").blur();
            			thisForm.find('[name="message"]').removeAttr('disabled').val("").blur();
            			thisForm.find('button').html('Submit').attr('disabled', false);
            			thisForm.blur();

            			console.log(response);
	            		
	            		if (response.success == "1") {
	            			jQuery('#email-status').addClass('success');

	            		} else {
	            			jQuery('#email-status').addClass('alert');
	            		}

	            		jQuery('#email-status').removeClass('hide').find('p').text(response.message);
	            	}
	            },
			    error : function(jqXHR, textStatus, errorThrown) {
			        console.log(jqXHR + " :: " + textStatus + " :: " + errorThrown)
			    }
	        });
    		
		} else {
    		if(!name_result.required.approved) {
	    		jQuery('[name="name"]').addClass('is-invalid-input');
    		}

    		if(!company_result.required.approved) {
	    		jQuery('[name="company"]').addClass('is-invalid-input');
    		}

    		if(!businesstype_result.required.approved) {
	    		jQuery('[name="business_type"]').addClass('is-invalid-input');
    		}
    		
    		if(!email_result.email.approved) {
	    		jQuery('[name="email"]').addClass('is-invalid-input');
    		}
    		
    		if(!message_result.required.approved) {
	    		jQuery('[name="message"]').addClass('is-invalid-input');
    		}
		}
	});