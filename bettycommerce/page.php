<?php get_header(); ?>

<div class="content-container">

	<div class="full-page-wrap">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="page-content">
			
			<?php the_title( '<h1>', '</h1>' ); ?>
			<?php the_content(); ?>
			
		</div>

		<?php endwhile; ?>

		<?php endif; ?>

	</div>
	
</div><!-- End of .content-container -->

<?php get_footer(); ?>