<?php

/**
 * [REGISTER DASHBOARD WIDGET]
 */

// HTML
function kemosite_wordpress_nextsteps_widget_display() { ?>
	
	<h1>Accessibility</h1>
	
	<h3><strong>WCAG 2.0 Level AA</strong></h3>
	
	<p>This theme is regularly tested for WCAG 2.0 Level AA compliance</p>
	
	<p>For more info: <a href="https://www.w3.org/WAI/standards-guidelines/wcag/">https://www.w3.org/WAI/standards-guidelines/wcag/</a></p>
	
	<h1>Plug-Ins</h1>
	
	<h3><strong>Required Plugins</strong></h3>
	
	<p>kemosite typography plug-in for Wordpress<br>
	<?php
	// Detect kemosite_typography_plugin
	if ( is_plugin_active( 'kemosite-typography-plugin/index.php' ) ): ?><em>Active</em><?php else: ?><em>Inactive</em><?php endif; ?>
	</p>
	
	<p>GitHub Updater<br>
	<?php
	/* [DETECT GITHUB UPDATER PLUGIN] */
	if ( is_plugin_active( 'git-updater/git-updater.php' ) ): ?><em>Active</em><?php else: ?><em>Inactive</em><?php endif; ?>
	</p>
	
	<h3><strong>Supported Plugins</strong></h3>
	
	<p>WooCommerce<br>
	<?php
	/* [DETECT GITHUB UPDATER PLUGIN] */
	if ( is_plugin_active( 'woocommerce/woocommerce.php' ) ): ?><em>Active</em><?php else: ?><em>Inactive</em><?php endif; ?>
	</p>
	
	<p>LearnPress<br>
	<?php
	/* [DETECT GITHUB UPDATER PLUGIN] */
	if ( is_plugin_active( 'learnpress/learnpress.php' ) ): ?><em>Active</em><?php else: ?><em>Inactive</em><?php endif; ?>
	</p>
	
	<h1>Security</h1>
    
    <h3><strong>wp-config.php</strong></h3>
	
	<p>If you ever need to regenerate the secret keys, you can visit the official generator provided by WordPress.org at <a href="https://api.wordpress.org/secret-key/1.1/salt/">https://api.wordpress.org/secret-key/1.1/salt/</a>.</p>
	
	<h3><strong>iThemes SSL</strong></h3>
	
	<p>Do not force site to use iThemes Security SSL feature. It's breaking pages with infinite redirects!</p>

<?php }

function kemosite_wordpress_dashboard_widget() {

	global $wp_meta_boxes;

	wp_add_dashboard_widget(
		'kemosite_wordpress_nextsteps',
		'kemosite-wp-block',
		'kemosite_wordpress_nextsteps_widget_display'
	);

	$dashboard = $wp_meta_boxes['dashboard']['normal']['core'];

	$my_widget = array( 'kemosite_wordpress_nextsteps' => $dashboard['kemosite_wordpress_nextsteps'] );
 	unset( $dashboard['kemosite_wordpress_nextsteps'] );

 	$sorted_dashboard = array_merge( $my_widget, $dashboard );
 	$wp_meta_boxes['dashboard']['normal']['core'] = $sorted_dashboard;

}

?>