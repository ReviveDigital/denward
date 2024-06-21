<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce/Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

<div class="related extra-products products">
	<div class="container">
		<div class="related__relative">
			<div class="related__row">
				<div class="related__col">
					<h2 class="related__title"><?php the_field('you_may_also_like_title', 'option'); ?></h2>
					<div class="related__content">
						<?php the_field('you_may_also_like_content', 'option'); ?>
					</div>
				</div>
				<div class="related__col related__col--nav">
					<span class="related__arrow related__arrow--prev"><i class="fas fa-long-arrow-left"></i></span>
					<span class="related__arrow related__arrow--next"><i class="fas fa-long-arrow-right"></i></span>
				</div>
			</div>
			<?php woocommerce_product_loop_start(); ?>
			<div class="related__slider">
				<?php foreach ( $related_products as $related_product ) : ?>
				<?php $post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object );

					wc_get_template_part( 'content', 'product' ); ?>

				<?php endforeach; ?>
			</div>
			<?php woocommerce_product_loop_end(); ?>
		</div>
	</div>
</div>

<?php endif;

wp_reset_postdata();
