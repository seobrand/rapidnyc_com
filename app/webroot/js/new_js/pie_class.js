jQuery(function() {
    if (window.PIE) {
	jQuery('.header_main').each(function(){PIE.attach(this);});
	jQuery('input.form_input').each(function(){PIE.attach(this);});
	jQuery('.contact_area').each(function(){PIE.attach(this);});
    }
});