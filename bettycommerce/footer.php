	</div><!-- End of #content-bg -->

	<div class="footer-border">&nbsp;</div>

	<div id="footer-container" class="clearfix">
	
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
			
		<?php endif; ?>
	
	</div>

<div id="footer-navigation-divider">&nbsp;</div>

<div id="footer-navigation-container" class="clearfix">
	
	<div id="footer-navigation-copyright">
		<?php $copyright_info = pro_copyright(); ?>
		<?php if ( !empty( $copyright_info ) ) { echo $copyright_info; } else { echo '<p>&copy; 2012 Betty Commerce All Rights Reserved.  <a href="http://www.mojo-themes.com/categories/wordpress/ecommerce-wordpress/woocommerce-themes/">Woocommerce Themes</a> from Mojo-Themes.'; } ?></p>
	</div>
	
	<div id="footer-navigation-links">
		<?php 
		if ( has_nav_menu( 'footer' ) )
		{
			wp_nav_menu ( array( 'theme_location' => 'footer', 'menu_class' => 'nav' ) );
		}
		?>
	</div>
</div>

<?php wp_footer(); ?>

<?php $custom_scripts = pro_get_option_footer_scripts(); ?>
<?php if ( !empty( $custom_scripts ) ) { ?>
<script type="text/javascript">
	<?php echo $custom_scripts; ?>
</script>
<?php } ?>

<?php if ( is_front_page() ) : ?>
<script type="text/javascript">
jQuery('#slider').s3Slider({
        timeOut: 3000
    });
</script>
<?php endif; ?>
</body>
</html>