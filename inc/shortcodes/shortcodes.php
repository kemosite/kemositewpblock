<?php

/**
 * [SHORTCODES]
 * Some shortcodes from former Central theme; Convert to nearest Foundation equivalent.
 *
 */

// Apply certain shortcodes
add_filter( 'widget_text', 'do_shortcode' );
add_filter( 'the_excerpt', 'do_shortcode' );

// Rows and Columns are based on Foundation CSS, which ideally, should be moved away from for a standard like Flexbox.

// kemosite_shortcode_wpautop_fix
require_once( "kemosite_shortcode_wpautop_fix.php" );

// kemosite_shortcode_dropcaps
require_once ( "kemosite_shortcode_dropcaps.php" );

// kemosite_shortcode_blockquote
require_once ( "kemosite_shortcode_blockquote.php" );

// kemosite_shortcode_accordian
require_once ( "kemosite_shortcode_accordian.php" );

// kemosite_shortcode_list
require_once ( "kemosite_shortcode_list.php" );

// kemosite_shortcode_tabs
require_once ( "kemosite_shortcode_tabs.php" );

// kemosite_shortcode_progress_bars
require_once ( "kemosite_shortcode_progress_bars.php" );

// kemosite_shortcode_tables
require_once ( "kemosite_shortcode_tables.php" );

// kemosite_shortcode_woocommerce_recent_products
require_once( "kemosite_shortcode_woocommerce_recent_products.php" );

// kemosite_shortcode_latest_post
require_once( "kemosite_shortcode_latest_post.php" );

// kemosite_shortcode_callout
require_once( "kemosite_shortcode_callout.php" );

?>