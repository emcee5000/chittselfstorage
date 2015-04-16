<?php get_header(); ?>

<div class="content-container clearfix">
	
	<?php pro_breadcrumbs(); ?>
	
	<div class="sidebar-right">
		
		<?php get_sidebar( 'blog' ); ?>
	
	</div>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
	<div class="post-wrap">
	
		<div class="post-heading clearfix">
			
			<div class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</div>
			
		</div>
		
		<div class="post-meta">
			<p>Written by <?php the_author(); ?> on <?php the_date(); ?>. Posted in <?php the_category(' ') ?></p>
		</div>
		
		<div class="post-content-wrap clearfix">
			
			<div class="post-content">
				
				<?php if ( has_post_thumbnail() ) { ?>
					
					<div class="single-post-thumbnail">
						
						<?php the_post_thumbnail('thumbnail'); ?>
						
					</div>
					
				<?php } ?>
				
				<?php the_content(); ?>
				
			</div>
			
		</div>
	
	</div><!-- End of .post-wrap -->

	<?php endwhile; ?>

	<?php endif; ?>
	
	<div id="comments-box" class="clearfix">
	
		<?php comments_template(); ?>
		
	</div>
	
</div><!-- End of .content-container -->

<?php get_footer(); ?>