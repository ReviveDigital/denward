<div class="popular">
    <div class="container">
        <div class="popular__container">
            <div class="popular__block">
                <h2 class="popular__title"><?php the_field('popular_products_title', 'option'); ?></h2>
                <div class="popular__content">
                    <?php the_field('popular_products_content', 'option'); ?>
                </div>
            </div>
            <div class="popular__arrows">
                <span class="popular__arrow popular__arrow--prev"><i class="popular__arrow-icon fa fa-long-arrow-left"></i></span>
                <span class="popular__arrow popular__arrow--next"><i class="popular__arrow-icon fa fa-long-arrow-right"></i></span>
            </div>
        </div>
        <div class="popular__slider">
            <?php do_action( 'woocommerce_before_shop_loop' );
            woocommerce_product_loop_start();
            $args = array(
    			'post_type' => 'product',
    			'post__in' => get_field('popular_products', 'option'),
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
