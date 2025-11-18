
<?php

/**
 * [FUNCTIONS.PHP]
 * Functions.php lets you add custom PHP functions, classes, interfaces, and more. It opens up the entirety of the PHP programming language to your theme.
 * @link https://developer.wordpress.org/themes/core-concepts/custom-functionality/
 * 
 * kemositewpblock functions and definitions
 * A key distinction between functions.php and debug.php is that while debug focuses on WordPress, functions focuses on the theme.
 *
 * @package kemositewpblock
 */

/**
 * [Theme Constants and Helpers]
 */

// Override Dot Org will skip any updates from wordpress.org for plugins with identical slugs.
define( 'GITHUB_UPDATER_OVERRIDE_DOT_ORG', true );
if (!defined( 'SAVEQUERIES' )): define( 'SAVEQUERIES', true ); endif;
define('DISABLE_NAG_NOTICES', true);

if ( get_theme_mod('custom_logo') && !defined( 'KEMOSITE_THEME_LOGO' ) ):
	define("KEMOSITE_THEME_LOGO", wp_get_attachment_image_src(get_theme_mod('custom_logo'))[0] );
elseif ( !defined( 'KEMOSITE_THEME_LOGO' ) ):
	define("KEMOSITE_THEME_LOGO", "" );
endif;

// Default handling method
if ( !function_exists('kemosite_debug_to_console') ): require get_template_directory() . '/inc/function-helpers/kemosite_debug_to_console.php'; endif;
set_error_handler( 'kemosite_debug_to_console' );

// Option to diagnose functions, and report on failures.
if ( !function_exists('kemosite_try_function') ): require get_template_directory() . '/inc/function-helpers/kemosite_try_function.php'; endif;

// Define is_plugin_active
if ( !function_exists('is_plugin_active') ): include ABSPATH . 'wp-admin/includes/plugin.php'; endif;

// Check for Woocommerce, Define Woocommerce constant, append appropriate styles
if (is_plugin_active('woocommerce/woocommerce.php')): define('KEMOSITE_WOOCOMMERCE_ACTIVE', true); else: define('KEMOSITE_WOOCOMMERCE_ACTIVE', false); endif;

// Check for Learnpress, Define Learnpress constant, append appropriate styles
if (is_plugin_active('learnpress/learnpress.php')): define('KEMOSITE_LEARNPRESS_ACTIVE', true); else: define('KEMOSITE_LEARNPRESS_ACTIVE', false); endif;

/**
 * Check to see if the current page is the login/register page.
 *
 * Use this in conjunction with is_admin() to separate the front-end
 * from the back-end of your theme.
 *
 * @return bool
 */
if ( !function_exists( 'is_login_page' ) ):
	require get_template_directory() . '/inc/function-helpers/is_login_page.php';
endif;

/**
 * [Filter Reference]
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference
 * Filters are functions that WordPress passes data through, at certain points in execution, just before taking some action with the data
 */

// Shortcodes (behave similarly to filters)
require get_template_directory() . '/inc/shortcodes/shortcodes.php';

// SRI, Defer and Async external scripts

if ( !function_exists( 'kemosite_wordpress_defer_async_scripts' ) ):
	require get_template_directory() . '/inc/script_loader_tag/kemosite_wordpress_defer_async_scripts.php';
endif;
add_filter( 'script_loader_tag', 'kemosite_wordpress_defer_async_scripts', 10, 3 );

if ( !function_exists( 'kemosite_wordpress_resource_hints' ) ):
	require get_template_directory() . '/inc/style_loader_tag/kemosite_wordpress_resource_hints.php';
endif;
// Load if not admin page.
if ( !is_admin() && !is_login_page() ):
	add_filter( 'wp_resource_hints', 'kemosite_wordpress_resource_hints', 10, 4 );
endif;


/**
 * [Action Reference]
 * @link https://codex.wordpress.org/Plugin_API/Action_Reference
 */

/**
 * after_setup_theme
 * Generally used to initialize theme settings/options.
 * This is the first action hook available to themes, triggered immediately after the active theme's functions.php file is loaded.
 * add_theme_support() should be called here
 */

if ( ! function_exists( 'kemosite_wordpress_theme_setup' ) ):
	require get_template_directory() . '/inc/after_setup_theme/kemosite_wordpress_theme_setup.php';
endif;
add_action( 'after_setup_theme', 'kemosite_wordpress_theme_setup' );

// Menus
if ( ! function_exists( 'kemosite_register_menus' ) ):
	require get_template_directory() . '/inc/after_setup_theme/kemosite_register_menus.php';
endif;
add_action( 'after_setup_theme', 'kemosite_register_menus' );

// Declare WooCommerce Support
if ( ! function_exists( 'kemosite_wordpress_add_woocommerce_support' ) ):
    require get_template_directory() . '/inc/after_setup_theme/kemosite_wordpress_add_woocommerce_support.php';
endif;
add_action( 'after_setup_theme', 'kemosite_wordpress_add_woocommerce_support' );

// Set up Widgets
if ( ! function_exists( 'kemosite_widgets_init' ) ):
	require get_template_directory() . '/inc/widgets_init/kemosite_widgets_init.php';
endif;
add_action( 'widgets_init', 'kemosite_widgets_init' );

/* [Add kemosite-wordpress-theme class to body tag ] */
if ( !function_exists('kemosite_wordpress_theme_class') ) :
	require get_template_directory() . '/inc/function-helpers/kemosite_wordpress_theme_class.php';
endif;

/**
 * [Register Widget Areas]
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */

/*function kemosite_wordpress_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'kemosite-wordpress-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'kemosite-wordpress-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'kemosite_wordpress_theme_widgets_init' );
*/

/**
 * [Helper Functions]
 */

// Colour Functions
require get_template_directory() . '/inc/function-helpers/function_helpers_colours.php';

// Calculate SRI
require get_template_directory() . '/inc/function-helpers/kemosite_wordpress_calculate_sri.php';

/* [Looks in Page "page_excerpt" field for Excerpt data] */
if ( !function_exists( 'kemosite_custom_excerpt' ) ) : 
	require get_template_directory() . '/inc/function-helpers/kemosite_custom_excerpt.php';
endif;

/**
 * [Theme Customization API]
 */
require get_template_directory() . '/inc/customize_register/functions-customize-register.php';
require get_template_directory() . '/inc/customize_register/functions-customize-sections.php';

/**
 * [Enqueue scripts and styles]
 */

// Universal theme colours, returns $kemosite_wordpress_universal_colours. Possibly depricated
require get_template_directory() . '/inc/customize_register/customize-register-universal-colours.php';

// Woocommerce modification functions
// require get_template_directory() . '/inc/woocommerce/functions_woocommerce.php';

// Enqueue theme styles (view) first
if ( !function_exists( 'kemosite_wordpress_enqueue_styles' ) ) :
	require get_template_directory() . '/inc/wp_enqueue_scripts/kemosite_wordpress_enqueue_styles.php';
endif;
add_action( 'wp_enqueue_scripts', 'kemosite_wordpress_enqueue_styles' );

// Then enqueue theme scripts (controller)
if ( !function_exists( 'kemosite_wordpress_enqueue_scripts' ) ) :
	require get_template_directory() . '/inc/wp_enqueue_scripts/kemosite_wordpress_enqueue_scripts.php';
endif;
add_action( 'wp_enqueue_scripts', 'kemosite_wordpress_enqueue_scripts' );

/**
 * [Print scripts or data in the head tag on the front end]
 */

// Load Site Description
if ( !function_exists( 'kemosite_site_description' ) ) :
	require get_template_directory() . '/inc/wp_head/kemosite_site_description.php';
endif;
add_action('wp_head', 'kemosite_site_description');

/* [ADD CUSTOMIZER CSS] */
if ( ! function_exists( 'kemosite_customizer_css' ) ): require get_template_directory() . '/inc/wp_head/kemosite_customizer_css.php'; endif;
add_action( 'wp_head', 'kemosite_customizer_css');

// Load Favicon
if ( !function_exists( 'kemosite_wordpress_load_favicon' ) ) :
	require get_template_directory() . '/inc/wp_head/load_favicon.php';
endif;
add_action('wp_head', 'kemosite_wordpress_load_favicon');

// Remove the generator from the head output
remove_action('wp_head', 'wp_generator');

/**
 * [Customization of Admin Dashboard]
 */

// Admin Footer
if ( !function_exists( 'kemosite_wordpress_admin_footer' ) ) :
	require get_template_directory() . '/inc/admin_footer/kemosite_admin_footer_function.php';
endif;
add_action('admin_footer', 'kemosite_wordpress_admin_footer');

// Register Dashboard Widget
if ( !function_exists( 'kemosite_wordpress_dashboard_widget' ) ) :
	require get_template_directory() . '/inc/wp_dashboard_setup/register_kemosite_dashboard_widget.php';
endif;
add_action( 'wp_dashboard_setup', 'kemosite_wordpress_dashboard_widget' );

/**
 * [Content Filters]
 */

// RSS Feed Image Thumbnail
if ( !function_exists( 'kemosite_wordpress_rss_post_thumbnail' ) ) :
	require get_template_directory() . '/inc/the_content_feed/kemosite_wordpress_rss_post_thumbnail.php';
endif;
add_filter('the_content_feed', 'kemosite_wordpress_rss_post_thumbnail');
