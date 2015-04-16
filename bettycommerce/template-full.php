<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<div class="content-container clearfix">
	
	<?php pro_breadcrumbs(); ?>
	
	<div class="full-page-wrap">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<div class="page-title">
			
			<?php the_title(); ?>
			
		</div>
		
		<div class="page-content">
			
			<?php the_content(); ?>
			
		</div>
		
	<?php endwhile; ?>
	
	<?php endif; ?>
	
	</div><!-- End of .page-wrap -->

	<?php if ( function_exists ( 'mojo_newsletter' ) ) { ?>
		<?php echo mojo_newsletter(); ?>
	<?php } ?>
	
</div><!-- End of .content-container -->

<?php get_footer(); ?>