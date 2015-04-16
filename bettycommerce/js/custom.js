jQuery(document).ready(function() {
	
	var removeproductclass = jQuery('ul.products li.product');
		jQuery(removeproductclass).removeClass('first last');
	
	jQuery('form.woocommerce_ordering').each( function() {
		jQuery(this).children('select').addClass('select');
		jQuery('select').wrap('<div>');
	})
	
	jQuery('form.shipping_calculator').each( function() {
		jQuery(this).children('select').addClass('select');
		jQuery('select').wrap('<div>');
	})
	
	if (!jQuery.browser.opera) {
		
		jQuery('select.select').each(function() {
			var title = jQuery(this).attr('title');
			if ( jQuery('option:selected', this).val() != '' ) title = jQuery('option:selected', this).text();
			jQuery(this)
				.css( {'z-index':10, 'opacity':0, '-khtml-appearance':'none'})
				.after('<span class="select">' + title + '</span>')
				.change(function() {
					val = jQuery('option:selected', this).text();
					jQuery(this).next().text(val);
				})
		})
	
	}

	jQuery('ul.product_list_widget li a').each(function() {
		var length = jQuery(this).text().length;
		if ( jQuery(length) > '17' ) {
			jQuery(length).text( jQuery(length).text().substring(0, 25) + "..." );
		}
	})

});