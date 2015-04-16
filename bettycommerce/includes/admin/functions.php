<?php 


/**
 * Partial
 * View File Loader
 *
 * Used to load a file in and send data to this file
*/

function partial ( $_file_, $_view_data_ = array(), $__return__as__string__ = false )
{
	// Create path to file to include
	$_include_view_file_ = TEMPLATEPATH . '/' . $_file_ . '.php';

	if ( file_exists ( $_include_view_file_ ) )
	{
		if ( is_array ( $_view_data_ ) )
		{
			extract ( $_view_data_, EXTR_PREFIX_SAME, 'data' );
		}
		else
		{
			$data = $_view_data_;
		}

		ob_start();
		ob_implicit_flush ( false );
       
		require $_include_view_file_;
       
        $_response = ob_get_clean();
        
        if ( $__return__as__string__ )
		{
			return $_response;
		}
		else
		{
			echo $_response;
		}
	}
}


/*****************************************
* Load Custom Logo
******************************************/
function pro_get_option_logo( $size = 'medium')
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['custom_logo'] ) )
	{
		return $pro['custom_logo'];
	}
	return false;
}

/*****************************************
* Loads the custom Favicon
******************************************/
function pro_favicon() {
	
	$pro = get_option ( 'up_themes_betty_commerce_wordpress_theme' );
	
	if ( !empty( $pro['custom_favicon'] ) ) {
		echo '<link rel="shortcut icon" href="' . $pro['custom_favicon'] . '"/>'."\n";
	}
} 

add_action('wp_head', 'pro_favicon');

/*****************************************
* Show Search bar in header
******************************************/
function pro_header_search_display()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['header_search'] ) )
	{
		return $pro['header_search'];
	}
	return false;
}

/*****************************************
* Loads the copyright information
******************************************/
function pro_copyright() {
	
	$pro = get_option ( 'up_themes_betty_commerce_wordpress_theme' );
	
	if( !empty( $pro['copyright_footer'] ) )
	{
		return $pro['copyright_footer'];
	}
	return false;
}

/*****************************************
* Show Slider on Homepage
******************************************/
function pro_slider_display()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['homepage_slider'] ) )
	{
		return $pro['homepage_slider'];
	}
	return false;
}

/*****************************************
* Homepage featured product title
******************************************/
function pro_featured_products_title()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['featured_products_title'] ) )
	{
		return $pro['featured_products_title'];
	}
	return false;
}

/*****************************************
* Homepage featured product categories
******************************************/
function pro_featured_products()
{
	$args = array( 'type' => 'product', 'orderby' => 'name', 'taxonomy' => 'product_cat' );
	$categories = get_categories( $args );
	$cats = array();
	
	foreach ( $categories as $category )
	{
		$cat_name = $category->name;
		$cats[$cat_name] = $cat_name;
	}
	
	return $cats;
}

function pro_get_featured_products()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if ( !empty( $pro['featured_products'] ) )
	{
		return $pro['featured_products'];
	}
	return false;
}

/*****************************************
* Bottom Newsletter Opt In
******************************************/
function pro_bottom_newsletter()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['bottom_newsletter_optin'] ) )
	{
		return $pro['bottom_newsletter_optin'];
	}
	return false;
}

/*****************************************
* Load Site Wide Footer Scripts
******************************************/
function pro_get_option_footer_scripts()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['custom_js'] ) )
	{
		return $pro['custom_js'];
	}
	return false;
}

/*****************************************
* Load Custom CSS
******************************************/
function pro_get_option_custom_css()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['custom_css'] ) )
	{
		return $pro['custom_css'];
	}
	return false;
}

/*****************************************
* Show Shipping Promo
******************************************/
function pro_shipping_promo()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['shipping_promo'] ) )
	{
		return $pro['shipping_promo'];
	}
	return false;
}

/*****************************************
* Shipping Promo Text
******************************************/
function pro_shipping_promo_text()
{
	$pro = get_option('up_themes_betty_commerce_wordpress_theme');
	
	if( !empty( $pro['shipping_promo_text'] ) )
	{
		return $pro['shipping_promo_text'];
	}
	return false;
}