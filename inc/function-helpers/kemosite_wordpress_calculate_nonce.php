<?php

// https://www.sitesecurityscore.com/learning-center/how-to-write-csp-for-wordpress

// Generate a nonce once per request
function csp_get_nonce() {

	static $nonce = null;
    
    if ($nonce === null) {

    	$nonce = wp_create_nonce( 'csp-nonce-' . time() );
        // $nonce = bin2hex(random_bytes(16));
    
    }
    
    return $nonce;

}

// Add nonce to enqueued script tags (WP 6.1+)
add_filter('wp_script_attributes', function($attributes) {
	
	$attributes['nonce'] = csp_get_nonce();
	return $attributes;

});

// Add nonce to inline script tags
add_filter('wp_inline_script_attributes', function($attributes) {

	$attributes['nonce'] = csp_get_nonce();
	return $attributes;

});

// Add nonce to style tags
add_filter('wp_style_attributes', function($attributes) {

	$attributes['nonce'] = csp_get_nonce();
	return $attributes;

});

// Send CSP header (only on frontend, not admin)
add_action('send_headers', function() {

	if (is_admin()):
        return; // Skip admin area
    endif;

    $nonce = csp_get_nonce();

    header(sprintf(
        "Content-Security-Policy-Report-Only: " .
        "default-src 'self'; " .
        "script-src 'self' 'nonce-%s'; " .
        "style-src 'self' 'unsafe-inline'; " .
        "img-src 'self' data: https:; " .
        "font-src 'self' data: https:; " .
        "connect-src 'self'; " .
        "worker-src blob: https: 'self' 'unsafe-inline'; " .
        "frame-src 'self'; ",
        $nonce
    ));
    
});