<?php
/* Template Name: Sepcial Offers */
get_header(); ?>
<?php get_template_part('inc/page-banner'); ?>
<div class="denward">
    <div class="container-fluid denward__container">
        <?php get_template_part('sidebars/sale-sidebar'); ?>
        <div class="denward__block">
            <?php do_action( 'woocommerce_before_shop_loop' );
            woocommerce_product_loop_start();
            $args = array(
    			'post_type' => 'product',
    			'post__in' => get_field('special_offers', 'option'),
    			'posts_per_page' => -1,
    		);
    		$loop = new WP_Query( $args );
    		while ( $loop->have_posts() ) : $loop->the_post();
    		global $product;

            include(locate_template('woocommerce/content-product.php'));
            endwhile; ?>
            <?php woocommerce_product_loop_end();
            do_action( 'woocommerce_after_shop_loop' ); ?>
    		<?php wp_reset_query(); ?>
        </div>
    </div>
</div>

<?php get_template_part('inc/cta'); ?>
<?php get_footer();
