<?php

/**
 * [LATEST POSTS]
 */

function kemosite_shortcode_latest_post( $attributes, $content ) {

    // $attributes: type, post_number, category, text_length

    // global $post;

    $args = array(
        'numberposts' => $attributes['post_number'],
        'offset' => 0,
        'category' => $attributes['category'],
        'orderby' => 'post_date',
        'order' => 'DESC',
        'include' => '',
        'exclude' => '',
        'meta_key' => '',
        'meta_value' =>'',
        'post_type' => 'post',
        'post_status' => 'publish',
        'suppress_filters' => true
    );

    $recent_posts = wp_get_recent_posts($args);

    $output = "";

    foreach ( $recent_posts as $post ) :

        /*
        $permalink = get_permalink($post['ID']);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post['ID'] ), 'single-post-thumbnail' );
        $image_src = esc_url($image[0]);
        */

        $permalink = get_permalink($post['ID']);
        $image = wp_get_attachment_image_src( get_post_thumbnail_id($post['ID']), 'single-post-thumbnail');

        if (is_array($image)):
            $image_src = esc_url($image[0]);
        endif;

        $image_srcset = wp_get_attachment_image_srcset( get_post_thumbnail_id($post['ID']), 'single-post-thumbnail', wp_get_attachment_metadata($post['ID']) );
        $image_sizes = wp_get_attachment_image_sizes( get_post_thumbnail_id($post['ID']), 'single-post-thumbnail', wp_get_attachment_metadata($post['ID']) );

        /*
        echo "<pre>";
        print_r($post);
        echo "</pre>";      
        */

        /*
        echo '<div class="cropped image" style="max-width:' . esc_attr( $dimensions['width'] ) . 'px; width: 100%; height:' . esc_attr( $dimensions['width'] ) . 'px; background-image: url(\'' . esc_url( $image ) . '\');"><img src="' . esc_url( $image ) . '" alt="' . esc_attr( $category->name ) . '"></div>';

        <?php if ($image && $image_srcset && $image_sizes): ?>
                            <div class="featured image"><img style="width: 100%;" src="<?php echo $image[0]; ?>" srcset="<?php echo esc_attr( $image_srcset ); ?>" sizes="<?php echo esc_attr( $image_sizes ); ?>"></div>
                        <?php endif; ?>

        */
        
        $output .= '<div class="media-object stack-for-small">'."\n";

       if (is_array($image)):
            $output .= '<div class="media-object-section">
                <div class="thumbnail" style="background-image: url(\'' . esc_url( $image_src ) . '\')">
                <a href="'.$permalink.'"><img src="' . esc_url( $image_src ) . '" srcset="' . esc_attr( $image_srcset ) . '" sizes="' . esc_attr( $image_sizes ) . '" alt="' . $post['post_title'] . '"></a>
                </div>
            </div>';
        endif;
        $output .= '<div class="media-object-section main-section">
            <h4><a href="'.$permalink.'">'.$post['post_title'].'</a></h4>
            <p class="span-all-columns">'.kemosite_custom_excerpt($post['ID']).'</p>
          </div>
        </div>
        <br>';

    endforeach;

    return $output;

}
add_shortcode('latest_post', 'kemosite_shortcode_latest_post');

?>