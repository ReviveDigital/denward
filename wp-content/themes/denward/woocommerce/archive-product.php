<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' ); ?>
<?php $term = get_term_by('slug', get_query_var('product_cat'), 'product_cat'); ?>
<?php if (is_product_category()) { ?>
	<?php $image = wp_get_attachment_image_src( get_field('page_banner_image', 'option'), 'full' ); ?>
	<div class="banner" style="background-image:url(<?php echo $image[0] ?>);">
		<div class="banner__container container">
			<div class="banner__block">
				<h1 class="banner__title"><?php woocommerce_page_title();?></h1>
				<div class="banner__contnet">
					<?php echo '' . the_field('product_banner_description','product_cat_' . $term->term_id) . ''; ?>
				</div>
				<?php if (get_field('extra_information','product_cat_' . $term->term_id)) {
					echo '<div class="banner__dropdown">';
					echo '<a id="banner__link" class="banner__link">More information</a>';
					echo '</div>';
					echo '<div id="banner__extra" class="banner__extra">';
					echo '' . the_field('extra_information','product_cat_' . $term->term_id) . '';
					echo '</div>';
				 } ?>
				<?php woocommerce_breadcrumb(); ?>
			</div>
		</div>
	</div>
	<?php } else { ?>
		<?php $image = wp_get_attachment_image_src( get_field('page_banner_image', 'option'), 'full' ); ?>
		<div class="banner" style="background-image:url(<?php echo $image[0] ?>);">
			<div class="banner__container container">
				<div class="banner__block">
					<h1 class="banner__title"><?php woocommerce_page_title(); ?></h1>
					 <?php woocommerce_breadcrumb(); ?>
				 </div>
			 </div>
		</div>
	<?php } ?>

<div class="denward">
	<div class="denward__container container-fluid">
<?php if (is_product_category() || is_shop()) { ?>
	<?php get_template_part('sidebars/woocommerce-sidebar'); ?>
	<?php } else {} ?>
	<?php if (is_search()) { ?>
		<?php get_template_part('sidebars/search-sidebar'); ?>
	<?php } ?>
	<div class="denward__block <?php if(is_shop()) { echo 'denward__block--shop';} ?>">
		<?php if (get_field('include_advert_banner','product_cat_' . $term->term_id)) { ?>
			<?php $image = wp_get_attachment_image_src( get_field('advert_banner', 'product_cat_' . $term->term_id), 'full' ); ?>
			<div class="denward__advert" style="background-image:url(<?php echo $image[0] ?>);">
			</div>
	<?php } ?>


<?php /**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>
<header class="woocommerce-products-header">
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>
</header>
<?php
if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	do_action( 'woocommerce_before_shop_loop' );

	woocommerce_product_loop_start();

	if ( wc_get_loop_prop( 'total' ) ) {
		while ( have_posts() ) {
			the_post();

			/**
			 * Hook: woocommerce_shop_loop.
			 */
			do_action( 'woocommerce_shop_loop' );

			wc_get_template_part( 'content', 'product' );
		}
	}

	woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	do_action( 'woocommerce_after_shop_loop' );
} else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	do_action( 'woocommerce_no_products_found' );
}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
do_action( 'woocommerce_sidebar' ); ?>

</div>
</div>
</div>
<?php get_template_part('inc/cta'); ?>
<?php get_footer( 'shop' );
