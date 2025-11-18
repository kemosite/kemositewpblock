<?php

function kemosite_register_menus() {

	// Unset menus from parent theme.
	unregister_nav_menu( 'top' );
	unregister_nav_menu( 'social' );
	
	register_nav_menu( 'top-bar-menu', __( 'Top Bar Menu', 'kemosite-wp-block' ) );
	register_nav_menu( 'off-canvas-menu', __( 'Off Canvas Menu', 'kemosite-wp-block' ) );
	register_nav_menu( 'footer-column-one', __( 'Footer Column One', 'kemosite-wp-block' ) );
	register_nav_menu( 'footer-column-two', __( 'Footer Column Two', 'kemosite-wp-block' ) );
	register_nav_menu( 'footer-menu', __( 'Footer Menu', 'kemosite-wp-block' ) );
	register_nav_menu( 'off-canvas-footer-menu', __( 'Off Canvas Footer Menu', 'kemosite-wp-block' ) );
	

}
