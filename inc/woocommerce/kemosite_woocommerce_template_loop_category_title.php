<?php

/**
 * [Show the subcategory title in the product loop.]
 */

function kemosite_woocommerce_template_loop_category_title( $category ) { ?>
    <h3>
        <?php
            echo $category->name;
            if ( $category->count > 0 ):
                echo apply_filters( 'woocommerce_subcategory_count_html', '', $category );
            endif;
        ?>
    </h3>
<?php } ?>