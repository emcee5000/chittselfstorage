<?php

/*****************************************
* Set Excerpt Length
******************************************/

function pro_excerpt_length( $length )
{
	return 50;
}

add_filter('excerpt_length', 'pro_excerpt_length');

/*****************************************
* Define image sizes / hard crop
******************************************/
function bettycommercewordpresstheme_woocommerce_image_dimensions()
{
	// Image sizes
	update_option( 'woocommerce_thumbnail_image_width', '200' ); // Image gallery thumbs
	update_option( 'woocommerce_thumbnail_image_height', '200' );
	update_option( 'woocommerce_single_image_width', '888' ); // Featured product image
	update_option( 'woocommerce_single_image_height', '888' ); 
	update_option( 'woocommerce_catalog_image_width', '290' ); // Product category thumbs
	update_option( 'woocommerce_catalog_image_height', '190' );

	// Hard Crop [0 = false, 1 = true]
	update_option( 'woocommerce_thumbnail_image_crop', 0 );
	update_option( 'woocommerce_single_image_crop', 0 ); 
	update_option( 'woocommerce_catalog_image_crop', 1 );
}
global $pagenow;
if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) 
	add_action( 'init', 'bettycommercewordpresstheme_woocommerce_image_dimensions', 1 );

/*****************************************
* Slider Post Type
******************************************/
function pro_slider_post_type() {
	register_post_type( 'slider',
		array(
			'labels' => array(
				'name' => __( 'Slider' ),
				'singular_name' => __( 'Slider Image' )
			),
		'public' => true,
        'menu_position' => 58,
        'rewrite' => array( 'slug' => 'slider' ),
		'supports' => array( 'title', 'thumbnail' ),
		// 'menu_icon' => get_stylesheet_directory_uri().'/images/background.png'
		)
	);
}

add_action( 'init', 'pro_slider_post_type' );

/*****************************************
* Post Comments
******************************************/
function pro_print_comments( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment; ?>
	<?php $depth_nice = ($depth > 3) ? 3 : $depth ; ?>
	<div class="comment <?php if( $depth_nice != 1 ) { echo 'comment-reply-'.( $depth_nice-1 ); } else { echo 'nb'; } ?>" id="comment-<?php echo $comment->comment_ID ?> clearfix">
		<div class="comment-divider-line"></div>
		<div class="comment-left-column">
			<div class="thumbnail-shadow-xsmall">
					<?php echo get_avatar( $comment, 56 ); ?>
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ) ?>
			</div>
		</div>
		<div class="comment-right-column">
			<h4><?php comment_author() ?> <span>says:</span></h4>
			<h5><?php comment_date( 'l, F jS, Y' ) ?> at <?php comment_time() ?></h5>
			<div class="clearfix"></div>
			<?php comment_text() ?>		
		</div>	
		<div class="clearfix"></div>
	<?php
}

/*****************************************
* Breadcrumbs
******************************************/
function pro_breadcrumbs() {
		echo '<ul id="crumbs" class="clearfix">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		echo 'Home';
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
	elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
	echo '</ul>';
}