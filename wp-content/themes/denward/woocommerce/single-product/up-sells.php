<?php
/**
 * Single Product Up-Sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/up-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $upsells ) : ?>

<div class="up-sell extra-products products">
	<div class="container">
		<div class="up-sell__relative">
			<div class="up-sell__row">
				<div class="up-sell__col">
				<?php
				$heading = apply_filters( 'woocommerce_product_upsells_products_heading', __( 'You may also like&hellip;', 'woocommerce' ) );
				
				if ( $heading ) : ?>
					<h2><?php echo esc_html( $heading ); ?></h2>
				<?php endif; ?>
				</div>
				<div class="up-sell__col up-sell__col--nav">
					<span class="up-sell__arrow up-sell__arrow--prev"><i class="fas fa-long-arrow-left"></i></span>
					<span class="up-sell__arrow up-sell__arrow--next"><i class="fas fa-long-arrow-right"></i></span>
				</div>
			</div>

			<?php woocommerce_product_loop_start(); ?>
			<div class="upsell__slider">
			<?php foreach ( $upsells as $upsell ) :

				$post_object = get_post( $upsell->get_id() );

				setup_postdata( $GLOBALS['post'] =& $post_object ); 

				wc_get_template_part( 'content', 'product' );

			endforeach; ?>
			</div>

			<?php woocommerce_product_loop_end(); ?>
		</div>
	</div>
</div>

<?php endif;
wp_reset_postdata();
