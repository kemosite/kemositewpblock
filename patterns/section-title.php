<?php
/**
 * Title: Section Title
 * Slug: kemositewpblock/section-title
 * Categories: featured
 */
?>

<!-- wp:heading {"textAlign":"center","level":1} -->
<?php
if ( is_plugin_active('woocommerce/woocommerce.php') && is_cart() ):
	?><h1 class="has-text-align-center wp-block-site-title">Your Cart</h1><?php
elseif ( is_plugin_active('woocommerce/woocommerce.php') && ( is_shop() || is_product_category() ) ):
	?><h1 class="has-text-align-center wp-block-site-title"><?php woocommerce_page_title(); ?></h1><?php
elseif ( is_plugin_active('woocommerce/woocommerce.php') && is_woocommerce() ):
	the_title( '<h1 class="has-text-align-center wp-block-site-title">', '</h1>' );
elseif ( is_front_page() && is_page() ):
	the_title( '<h1 class="has-text-align-center wp-block-site-title">', '</h1>' );
elseif ( is_front_page() && is_home() ):
	?><h1 class="has-text-align-center wp-block-site-title"><?php bloginfo('name'); ?></h1><?php
elseif (  is_home() ):
	?><h1 class="has-text-align-center wp-block-site-title">Posts</h1><?php
elseif ( is_post_type_archive() ):
	?><h1 class="has-text-align-center wp-block-site-title"><?php post_type_archive_title(); ?></h1><?php
elseif ( is_archive() ):
	?><h1 class="has-text-align-center wp-block-site-title">Archive</h1><?php
elseif ( is_single() ):
	the_title( '<h1 class="has-text-align-center wp-block-site-title">', '</h1>' );
elseif ( is_tag() ):
	?>
	<h1 class="has-text-align-center wp-block-site-title">
		<?php
		/* translators: %s: search query. */
		// printf( esc_html__( 'Search Results for: %s', 'kemosite-wordpress-theme' ), '<span>' . get_search_query() . '</span>' );
		?>
		Results For Tag: <?php single_tag_title(); ?>
	</h1>
	<?php
elseif ( is_search() ):
	?>
	<h1 class="has-text-align-center wp-block-site-title">
		<?php
		/* translators: %s: search query. */
		// printf( esc_html__( 'Search Results for: %s', 'kemosite-wordpress-theme' ), '<span>' . get_search_query() . '</span>' );
		?>
		Search Results
	</h1>
	<?php
elseif ( is_404() ):
	?>
	<h1 class="has-text-align-center wp-block-site-title">
		4...OH...4
	</h1>
	<?php
else:
	the_title( '<h1 class="has-text-align-center wp-block-site-title">', '</h1>' );
endif;
?>
<!-- /wp:heading -->
