<?php get_header(); ?>

<div class="content-container clearfix">
	
	<div class="full-page-wrap">
	
		<div class="page-title">
			
			Ooops, seems that your lost. This is our 404 page. Try clicking the logo to go back home.
			
		</div>
		
		<div class="page-content">
			
		</div>
	
	</div><!-- End of .page-wrap -->

	<?php if ( function_exists ( 'mojo_newsletter' ) ) { ?>
		<?php echo mojo_newsletter(); ?>
	<?php } ?>
	
</div><!-- End of .content-container -->

<?php get_footer(); ?>
