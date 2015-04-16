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
			
			<div class="post-comment-number">
				<?php comments_number( $zero, $one, $more ); ?>
			</div>
			
		</div>
		
		<div class="post-meta">
			<p>Written by <?php the_author(); ?> on <?php the_date(); ?>. Posted in <?php the_category(' ') ?></p>
		</div>
		
		<div class="post-content-wrap clearfix">
			
			<div class="post-content <?php if ( has_post_thumbnail() ) { ?> with-thumb <?php } ?>">
				<?php the_excerpt(); ?>
			</div>
			
			<?php if ( has_post_thumbnail() ) { ?>
				<div class="post-thumbnail">
				
					<?php the_post_thumbnail('thumbnail'); ?>
			
				</div>
			<?php } ?>
			
		</div>
		
		<div class="post-link">
			<a href="<?php the_permalink(); ?>">Continue Reading...</a>
		</div>
	
	</div><!-- End of .post-wrap -->

	<?php endwhile; ?>

	<?php endif; ?>
	
	<div class="blog-pagination">
		
		<?php
			global $wp_query;
			$total_pages = $wp_query->max_num_pages;
			
			if ($total_pages > 1){
				$current_page = max(1, get_query_var('paged'));
				
				echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => '/page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'next_text' => __('Next'),
					'prev_text' => __('Prev'),
				));
			}
		?>
	</div>
	

	
</div><!-- End of .content-container -->

<?php get_footer(); ?>