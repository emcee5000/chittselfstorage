<?php global $woocommerce; ?>
<?php 

$custom_css = pro_get_option_custom_css();
$custom_logo = pro_get_option_logo();
$header_search = pro_header_search_display();
$shipping_promo = pro_shipping_promo();
$shipping_promo_text = pro_shipping_promo_text();

?>

<!DOCTYPE html>

<!-- BEGIN html -->
<html <?php language_attributes(); ?>>
<!-- BEGIN head -->
<head>

	<!-- Meta Tags -->
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<!-- Title -->
	<title><?php wp_title('|', true, 'right'); ?><?php bloginfo('name'); ?></title>
	
	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	
	<!-- RSS & Pingbacks -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

	<?php if ( !empty( $custom_css ) ) { ?>
		<style>
			<?php echo $custom_css; ?>
		</style>
	<?php } ?>

	<?php wp_head(); ?>

<!-- END head -->
</head>

<!-- BEGIN body -->
<body <?php body_class(); ?>>
	<div id="header-container" class="clearfix">
					
		<div id="account-container-left" class="clearfix">
			
			<div id="top-menu-links">
				<?php 
				if ( is_user_logged_in() )
				{
					wp_nav_menu( array( 'theme_location' => 'top-header', 'container' => '' ) );
				}
				else
				{ ?>
					<a href="<?php echo get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ); ?>" title="<?php _e( 'Login','woothemes' ); ?>"><?php _e( 'Login','woothemes' ); ?></a>
				<?php }
			
				?>
			</div>
			
		</div>
		<?php if ( isset($woocommerce) ) : ?>
		<div id="account-container-right" class="clearfix">
			<div id="free-shipping">
				<p><?php if ( !$shipping_promo == 'Yes' ) { echo $shipping_promo_text; } ?></p>
			</div>				
			<div id="cart-items">
				<a class="cart-contents" href="<?php echo $woocommerce->cart->get_cart_url(); ?>" title="<?php _e('View your shopping cart', 'woothemes'); ?>"><?php echo sprintf(_n('%d item in cart', '%d items in cart', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?></a>
			</div>
			<div id="checkout">
				<img src="<?php bloginfo('stylesheet_directory'); ?>/images/rounded-arrow-right.png">
				<a href="<?php echo $woocommerce->cart->get_checkout_url(); ?>">Checkout</a>
			</div>
		</div>
		<?php endif; ?>
		
	</div><!-- End of #header-container -->
	
	<div id="content-bg">
	
	<div class="header-border">&nbsp;</div>
	
	<div id="top-menu" class="clearfix">
		<div id="logo">
			<?php if ( !empty( $custom_logo ) ) { ?>
			<a href="<?php echo home_url( '/' ); ?>">
				<img src="<?php echo $custom_logo; ?>" border="" alt="<?php bloginfo('site_title'); ?>" />
			</a>
			<?php } else { ?>
			<h2><?php bloginfo('site_title'); ?></h2>
			<?php } ?>
		</div>
		
		<div id="menu-divider">&nbsp;</div>
		
		<div id="menu-links">
			<?php
			
			if ( has_nav_menu( 'header' ) )
			{
				wp_nav_menu( array( 'theme_location' => 'header', 'container' => '' ) );
			}
			
			?>
		</div>
		


	<?php if ( !$header_search == 'Yes') : ?>
		<div id="header-search">
			<?php get_search_form(); ?>
		</div>
	<?php endif; ?>
		
	</div>