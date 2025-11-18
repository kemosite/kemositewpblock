<?php

/**
 * [ADD IMAGE THUMBNAIL TO RSS FEED]
 */

function kemosite_wordpress_rss_post_thumbnail( $content ) {
    global $post;
    if( has_post_thumbnail($post->ID) ):
        $content = '<p>' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
    endif;
    return $content;
}
