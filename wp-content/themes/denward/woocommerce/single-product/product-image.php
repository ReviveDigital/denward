<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$attachment_ids = $product->get_gallery_attachment_ids(); ?>

	<div class="item__slider">

		<div class="item__product-slider">

			<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->image_ID), 'product-images' ); ?>

			<?php if ( get_post_thumbnail_id() ) { ?>
		    	<div class="item__main-img"><img src="<?php  echo $image[0]; ?>" alt="<?php the_title(); ?>"></div>
		    <?php } else { ?>
			  <img src="<?php echo get_template_directory_uri(); ?>/images/default.jpg" alt="<?php the_title(); ?>" />
			<?php } ?>

			<?php foreach( $attachment_ids as $attachment_id ) {
				$image_link = wp_get_attachment_image_url( $attachment_id, 'product-images' ); ?>
				<div class="item__main-img"><?php echo '<img src="' .$image_link. '" alt="' .$title . '"/>'; ?></div>
			<?php } ?>
		</div>


		<!-- Thumbnails -->
		<?php if( count($attachment_ids) > 0) { ?>
			<div class="item__product-nav">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $product->image_ID), 'thumbnail' );?>
		   			<div class="woocommerce-product-gallery__image">
						<img src="<?php  echo $image[0]; ?>" alt="<?php the_title(); ?>">
					</div>
			   <?php foreach( $attachment_ids as $attachment_id ) {
			       $image_link = wp_get_attachment_image_url( $attachment_id, 'thumbnail' ); ?>
				   <div class="woocommerce-product-gallery__image">
				       <?php echo '<img src="' .$image_link. '" alt="' . $title . '"/>'; ?>
				   </div>
			 	<?php } ?>
			</div>
		<?php } ?>
	</div>
