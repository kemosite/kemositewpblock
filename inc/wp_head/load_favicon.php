<?php

/**
 * [LOAD FAVICON]
 */

function kemosite_wordpress_load_favicon() {
	echo '<link rel="shortcut icon" href="' . get_template_directory_uri() . '/images/favicon.ico" />' . "\n";
}

?>
