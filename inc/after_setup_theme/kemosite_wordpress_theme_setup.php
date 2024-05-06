<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */

function kemosite_wordpress_theme_setup() {
	
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on kemosite-wordpress-theme, use a find and replace
	 * to change 'kemosite-wordpress-theme' to the name of your theme in all the template files.
	 */
	// load_theme_textdomain( 'kemosite-wordpress-theme', get_template_directory() . '/languages' );

	// This feature enables Post Formats support for a theme
	add_theme_support(
		'post-formats', array( 
			'aside',
			'gallery',
			'link',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat'
	) );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	/*
	 * This theme uses wp_nav_menu() in one location.
	 * This function automatically registers custom menu support for the theme, therefore you do not need to call add_theme_support( 'menus' );
	 */
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'kemosite-wordpress-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
		'meta',
		'style',
		'script'
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', array(
		'default-color' => 'efeff0',
	) );

	// Custom header is an image that is chosen as the representative image in the theme top header section.
	add_theme_support( 'custom-header', array(
		'header-text' => true,
		'default-text-color' => '242424',
		'flex-width' => true,
		'flex-height' => true,
		'uploads' => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support( 'custom-logo', array(
		'height'      => 256,
		'width'       => 256,
		'flex-width'  => true,
		'flex-height' => true,
		'header-text' => array( 'site-title', 'site-description' )
	) );
}
?>