<?php
/*
Template Name: Home Page
*/
?>
<?php

$sliderOn = pro_slider_display();
$featured_product_title = pro_featured_products_title();
$pro_products = pro_get_featured_products();
$pro_newsletter = pro_bottom_newsletter();

?>

<?php get_header(); ?>

<div class="content-container">

	<?php if ( !$sliderOn == 'Yes') : ?>

	<div id="slider">
			
		<ul id="sliderContent">
		
		<?php
		$args = array( 'post_type' => 'slider' );
		$loop = new WP_Query( $args );

		while ( $loop->have_posts() ) : $loop->the_post();

			$atts = array('class' => $post->ID );
		
			if (has_post_thumbnail())
			{ ?>
				<li class="sliderImage">
					
					<?php the_post_thumbnail( 'full', $atts ); ?>
					<span></span>
				
				</li>

			<?php }
			
			endwhile; ?>
			
		<div class="clear sliderImage"></div>
		</ul>

	</div>

	<?php endif; ?>



	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<?php if(!empty($post->post_content)) { ?>
		
			<div class="grey-solid-divider-home"></div>
		
		<?php } ?>

		<?php the_content(); ?>
		
	<?php endwhile; ?>
	
	<?php endif; ?>	

	<div class="grey-solid-divider-home"></div>
	
	
	<div class="featured-products-container clearfix">
		
		<div class="product-row clearfix">
		
		<h3><?php if ( !empty($featured_product_title) ) { echo $featured_product_title; } else { echo 'FEATURED PRODUCTS'; } ?></h3>

		<?php
			
			global $wp_query;
			$args = array( 'product_cat' => $pro_products, 'post_type' => 'product' );
			$my_query = null;
			$my_query = new WP_Query($args);
			
			$n = 0;
			
			if ( $my_query->have_posts() ) : while ( $my_query->have_posts() ) : $my_query->the_post();
		?>

			<?php if ( $n>0 && $n%3 == 0 ) {

				echo "</div>";

				echo "<div class='product-row clearfix'>";

			} ?>
			
			<div class="featured-product">	
				<div class="featured-product-image">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'shop_catalog' ); ?></a>
				</div>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<h5><?php echo $product->get_price_html(); ?></h5>
			</div>
		
			<?php $n++; ?>
		
		<?php endwhile; endif; ?>
		<?php wp_reset_postdata(); ?>
		
	</div><!-- End of featured-products-container -->

	<?php if ( function_exists ( 'mojo_newsletter' ) && $pro_newsletter == 'Yes' ) { ?>
		<?php echo mojo_newsletter(); ?>
	<?php } ?>
	
</div>


<?php get_footer(); ?>