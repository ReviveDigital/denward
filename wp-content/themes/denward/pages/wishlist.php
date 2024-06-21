<?php
/* Template Name: Wishlist */
if (!is_user_logged_in()) header('Location:'. esc_url(home_url('/my-account/')));

global $wpdb, $woocommerce;
get_header();
?>
<?php include(locate_template('inc/page-banner.php')); ?>
<div class="wishlist">
    <div class="container">
        <div class="wish__intro">
            <?php the_content(); ?>
        </div>
            <?php

            if (is_user_logged_in())
            {
                $user_id = get_current_user_id();
                // $sql = 'SELECT * FROM denw_posts WHERE ID IN (SELECT product_id FROM denw_wishlist WHERE user_id = ' . $user_id . ')';
                $sql = 'SELECT * FROM denw_wishlist AS wl LEFT JOIN denw_posts AS p ON (wl.product_id=p.ID) WHERE wl.user_id = ' . $user_id;
                $result = $wpdb->get_results($sql);

                if ($result)
                {
                    do_action( 'woocommerce_before_shop_loop' );
                    woocommerce_product_loop_start();
                    foreach ($result as $post)
                    {
                        wc_setup_product_data($post);
                        include(locate_template('woocommerce/content-product.php'));

                    }
                    woocommerce_product_loop_end();
                    do_action( 'woocommerce_after_shop_loop' );
                }
            }

            ?>
    </div>
</div>

<?php include(locate_template('inc/cta.php')); ?>
<?php get_footer(); ?>
