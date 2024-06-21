<?php
/**
 * Review order table
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/review-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

defined( 'ABSPATH' ) || exit;
?>
<table class="checkout__table shop_table woocommerce-checkout-review-order-table">
	<thead class="checkout__thead">
		<tr class="checkout__tr">
			<th class="checkout__th checkout__th--first product-name"><?php esc_html_e( 'Product', 'woocommerce' ); ?></th>
			<th class="checkout__th product-quantity"><?php esc_html_e( 'Quantity', 'woocommerce' ); ?></th>
			<th class="checkout__th product-weight"><?php esc_html_e( 'Weight', 'woocommerce' ); ?></th>
			<th class="checkout__th product-total"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
		</tr>
	</thead>
	<tbody class="checkout__tbody">
		<?php
		do_action( 'woocommerce_review_order_before_cart_contents' );

		foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
			$_product = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );

			if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_checkout_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
				?>
				<tr class="checkout__tr <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
					<td class="checkout__td product-name">
						<?php
						$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

						if ( ! $product_permalink ) {
							echo $thumbnail; // PHPCS: XSS ok.
						} else {
							printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
						}
						?>

						<?php echo apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key ) . '&nbsp;'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						<?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>

					<td class="checkout__td checkout__td--qty product-quantity">
						<?php echo apply_filters( 'woocommerce_checkout_cart_item_quantity', ' <span class="woocommerce__quantity product-quantity">' . sprintf( '%s', $cart_item['quantity'] ) . '</span', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>

					<td class="checkout__td product-weight">
						<?php echo $_product->get_weight(); ?>kg
					</td>


					<td class="checkout__td product-total">
						<?php echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
					</td>
				</tr>
				<?php
			}
		}


		?>
	</tbody>
	<tfoot class="checkout__footer">
		<tr class="checkout__summary-title checkout__total-tr">
			<th class="checkout__entry checkout__summary">Order summary</th>
			<td class="checkout__entry"> </td>
		</tr>
		<tr class="checkout__total-tr cart-subtotal">

			<th class="checkout__entry"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></th>
			<td class="checkout__entry"><?php wc_cart_totals_subtotal_html(); ?></td>
		</tr>

		<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
			<tr class="checkout__total-tr cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
				<th class="checkout__entry"><?php wc_cart_totals_coupon_label( $coupon ); ?></th>
				<td class="checkout__entry"><?php wc_cart_totals_coupon_html( $coupon ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

			<?php do_action( 'woocommerce_review_order_before_shipping' ); ?>

			<?php wc_cart_totals_shipping_html(); ?>

			<?php do_action( 'woocommerce_review_order_after_shipping' ); ?>

		<?php endif; ?>

		<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
			<tr class="checkout__total-tr fee">
				<th class="checkout__entry"><?php echo esc_html( $fee->name ); ?></th>
				<td class="checkout__entry"><?php wc_cart_totals_fee_html( $fee ); ?></td>
			</tr>
		<?php endforeach; ?>

		<?php if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) : ?>
			<?php if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) : ?>
				<?php foreach ( WC()->cart->get_tax_totals() as $code => $tax ) : // phpcs:ignore WordPress.WP.GlobalVariablesOverride.OverrideProhibited ?>
					<tr class="checkout__total-tr tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
						<th class="checkout__entry"><?php echo esc_html( $tax->label ); ?></th>
						<td class="checkout__entry"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else : ?>
				<tr class="checkout__total-tr tax-total">
					<th class="woocommerce__entry"><?php echo esc_html( WC()->countries->tax_or_vat() ); ?></th>
					<td class="woocommerce__entry"><?php wc_cart_totals_taxes_total_html(); ?></td>
				</tr>
			<?php endif; ?>
		<?php endif; ?>

		<?php do_action( 'woocommerce_review_order_before_order_total' ); ?>

		<tr class="checkout__total-tr woocommerce__inner--total order-total">
			<th class="checkout__entry checkout__entry--bold"><?php esc_html_e( 'Total', 'woocommerce' ); ?></th>
			<td class="checkout__entry"><?php wc_cart_totals_order_total_html(); ?></td>
		</tr>

		<?php do_action( 'woocommerce_review_order_after_order_total' ); ?>

	</tfoot>
</table>
