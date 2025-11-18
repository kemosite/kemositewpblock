<?php

function kemosite_widgets_init() {

	register_sidebar( array(
		'name'          => 'Copyright Widget',
		'id'            => 'copyright_widget',
		'before_widget' => '<div class="copyright">',
		'after_widget'  => '</div>',
		'before_title'  => '<span style="display: none;">',
		'after_title'   => '</span>'
	) );

	register_sidebar( array(
		'name'          => 'Social Widget',
		'id'            => 'social_widget',
		'before_widget' => '<div class="social media">',
		'after_widget'  => '</div>',
		'before_title'  => '<span style="display: none;">',
		'after_title'   => '</span>'
	) );

}
