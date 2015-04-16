<?php
/*
* Template Name: Page with Sidebar
*/
?>

<?php get_header(); ?>

<div class="content-container clearfix">
	
	<?php pro_breadcrumbs(); ?>
	
	<div class="sidebar-right">
		
		<?php get_sidebar( 'page' ); ?>
	
	</div>
	
	<div class="page-wrap">
	
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
	
</div><!-- End of .content-container -->

<?php get_footer(); ?>