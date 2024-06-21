<?php
//WooCommerce

//disabling woocmerce styling
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
//removing woocommerce breadcrumb
remove_action('woocommerce_before_main_content','woocommerce_breadcrumb',20);
//removing category description
remove_action('woocommerce_archive_description','woocommerce_taxonomy_archive_description',10);
//removing found one of 4 resutls
remove_action('woocommerce_before_shop_loop','woocommerce_result_count',20);
// Display filter button mobile
add_action('woocommerce_archive_description','woocommerce_product_archive_filter',20);
function woocommerce_product_archive_filter() {
	echo '<div class="denward__mobile">';
	echo '<a id="denward__mobile-refine" class="denward__mobile-btn denward__mobile-btn--filter">Refine search <i class="denward__mobile-icon fa fa-edit"></i></a>';
	echo '</div>';
}
// Removes category count
function sd_remove_woocommerce_category_products_count() {
  return;
}
add_filter( 'woocommerce_subcategory_count_html', 'sd_remove_woocommerce_category_products_count' );

// Adding div row around product price and info
add_action('woocommerce_before_subcategory_title','insert_hr');
function insert_hr() {
	echo '<hr class="denward__line">';
}
//Adding category icon button
add_action('woocommerce_after_subcategory','insert_arrow');
function insert_arrow($category) {
	echo '<div class="denward__view">';
	echo '<a href=' . get_term_link($category->term_id) . ' class="denward__view-btn">';
	echo '<i class="denward__view-icon fas fa-chevron-right"></i>';
	echo '</a>';
	echo '</div>';
}
//adding add to view product btn
add_action('woocommerce_after_shop_loop_item', 'add_a_custom_button', 5 );
function add_a_custom_button() {
    global $product;
    // Output the custom button linked to the product
    echo '<div>
        <a class="denward__view-product" href="' . esc_attr( $product->get_permalink() ) . '">' . __('View product') . '</a>
    </div>';
}

//removing upsells
// remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );


// // To change add to cart text on product archives page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );
function woocommerce_custom_product_add_to_cart_text() {
    return __( 'Buy Now', 'woocommerce' );
}

// Inserting heart products page
add_action('woocommerce_after_shop_loop_item_title','insert_heart',10);
function insert_heart() {

	global $product;
	global $post;

	$ajax_nonce_remove = wp_create_nonce( 'wishlist_remove' );
	$ajax_nonce_add = wp_create_nonce( 'wishlist_add' );

	$in_watchlist = is_product_in_wishlist($product->get_id());

	if (is_page(298)) // Is Watchlist Page - Switch Button to remove
	{
		echo '<div class="denward__wish"><i class="denward__heart fal fa-times" data-nonce="' . $ajax_nonce_remove . '" data-wishlist-code="' . $post->wishlist_code . '"></i></div>';
	}
	else
	{
		if ($in_watchlist == true)
		{
			echo '<a href="' . esc_url(home_url('/my-account/wishlist/')) . '" class="denward__wish denward__wish--added"><i class="denward__heart fal fa-heart"></i></a>';
		}
		else
		{
			echo '<div class="denward__wish"><i class="denward__heart fal fa-heart" data-nonce="' . $$ajax_nonce_add . '" data-product-id="' . $product->get_id() . '"></i></div>';
		}

	}
}

// Inserting line separteing image and price products page
add_action('woocommerce_before_shop_loop_item_title','insert_line',20);
function insert_line() {
	echo '<hr class="denward__line">';
}

// Inserting vat to products page
add_action('woocommerce_after_shop_loop_item_title','insert_vat',10);
function insert_vat() {
	global $product;

	echo '<p class="denward__vat">(' . wc_price( wc_get_price_including_tax( $product ) ) .  ' inc VAT)</p>';
}

// Change sale to save percentage
add_filter( 'woocommerce_sale_flash', 'add_percentage_to_sale_badge', 20, 3 );
function add_percentage_to_sale_badge( $html, $post, $product ) {
	if( $product->is_type('grouped') ) return;
    if( $product->is_type('variable')){
        $percentages = array();

        // Get all variation prices
        $prices = $product->get_variation_prices();

        // Loop through variation prices
        foreach( $prices['price'] as $key => $price ){
            // Only on sale variations
            if( $prices['regular_price'][$key] !== $price ){
                // Calculate and set in the array the percentage for each variation on sale
                $percentages[] = round(100 - ($prices['sale_price'][$key] / $prices['regular_price'][$key] * 100));
            }
        }
        $percentage = max($percentages) . '%';
    } else {
        $regular_price = (float) $product->get_regular_price();
        $sale_price    = (float) $product->get_sale_price();

        $percentage    = round(100 - ($sale_price / $regular_price * 100)) . '%';
    }
    return '<span class="onsale">' . esc_html__( 'Save', 'woocommerce' ) . ' ' . $percentage . '</span>';
}
//removing link around single product image
function e12_remove_product_image_link( $html, $post_id ) {
    return preg_replace( "!<(a|/a).*?>!", '', $html );
}
add_filter( 'woocommerce_single_product_image_thumbnail_html', 'e12_remove_product_image_link', 10, 2 );
// Removing reviews gravatar
remove_action('woocommerce_review_before','woocommerce_review_display_gravatar',10);

// Removing price
remove_action('woocommerce_single_product_summary','woocommerce_template_single_price',10);
// Moving price below brand,rating and share.
add_action('woocommerce_single_product_summary','woocommerce_template_single_price',13);

// Removing Meta - SKU
remove_action('woocommerce_single_product_summary','woocommerce_template_single_meta',40);
// Moving - SKU (single product)
add_action('woocommerce_single_product_summary','woocommerce_template_single_meta',15);


add_action('woocommerce_single_product_summary','insert_open_div', 6);
function insert_open_div() {
	echo '<div class="item__row">';
}
add_action('woocommerce_single_product_summary','insert_close_div', 12);
function insert_close_div() {
	echo '</div>';
}

// displaying brand attribute
add_action( 'woocommerce_single_product_summary', 'product_attribute_brand', 7 );
function product_attribute_brand(){
    global $product;

    $taxonomy = 'pa_brand';
    $value = $product->get_attribute( $taxonomy );

    if ( $value ) {
        $label = get_taxonomy( $taxonomy )->labels->singular_name;

        echo '<p class="item__brand">' . $label . ': ' . $value . '</p>';
    }
}
// Add share buttons single product
add_action('woocommerce_single_product_summary','product_social_share',11);
function product_social_share() {
	echo '<div class="item__share-block">
		<ul class="item__share">
			<li class="item__share-item item__share-item--text">Share:</li>
			<li class="item__share-item"><div data-href="' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '" data-layout="button" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse"><i class="item__share-icon fab fa-facebook-f"></i></a></div></li>
			<li class="item__share-item"><a href="https://twitter.com/share" class="item__share-link" target="_blank" data-show-count="false"><i class="item__share-icon fab fa-twitter"></i></a><script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script></li>
			<li class="item__share-item"><a class="item__share-link" href="https://www.pinterest.com/pin/create/button/" data-pin-custom="true"><i class="item__share-icon fab fa-pinterest-p"></i></a></li>
			<li class="item__share-item"><a class="item__share-link" href="mailto:?Subject=' . get_the_title($product_id) . '&body=' . get_permalink($product_id) . '"><i class="item__share-icon fa fa-envelope" aria-hidden="true"></i></a></li>
		</ul>
	</div>';
}

// Add download button
add_action('woocommerce_single_product_summary','product_download_option',100);
function product_download_option() {
	if(get_field('include_download_product')) {
	echo '<div class="item__share-block">';
		$file = get_field('download_button_file');
		if( $file ): ?>
			<a href="<?php echo $file['url']; ?>" download class="item__download-product"><?php the_field('download_button_text'); ?></a>
		<?php endif;
		echo '</div>';
	}
}

// If required fields show message
add_action('woocommerce_single_product_summary','product_required',20);
function product_required() {
	echo '<p class="addon-required-notice"><i class="fal fa-exclamation-circle"></i> Please fill out all required fields before adding to basket.</p>';
}

// Add vat below price
add_action('woocommerce_single_product_summary','product_vat',14);
function product_vat() {
	global $product;
	echo '<p class="item__vat">(' . wc_price( wc_get_price_including_tax( $product ) ) .  ' inc VAT)</p>';
}

// Add heart icon next to add to cart
add_action('woocommerce_single_product_summary','product_wish',65);
function product_wish() {
	global $product;

	$ajax_nonce = wp_create_nonce( 'wishlist_remove' );
	$in_watchlist = is_product_in_wishlist($product->get_id());

	if ($in_watchlist)
	{
		echo '<a href="' . esc_url(home_url('/my-account/wishlist/')) . '" class="item__wish item__wish--added"><i class="item__wish-heart fal fa-heart"></i></a>';
	}
	else
	{
		echo '<div class="item__wish"><i class="item__wish-heart fal fa-heart" data-nonce="' . $ajax_nonce . '" data-product-id="' . get_the_ID() . '"></i></div>';
	}

}

// Special offers single product
add_action('woocommerce_single_product_summary','product_special_offers',21);
function product_special_offers() {
	global $product;

	$pricing_rules = get_post_meta($product->get_id(),'_pricing_rules',true);
	$price_ex_tax = wc_get_price_excluding_tax( $product );
	$price_inc_tax = wc_get_price_including_tax( $product );

	if (!empty($pricing_rules))
	{
		echo '<div class="item__specials">';
		echo '<ul class="item__specials-list">';

		$rules = reset($pricing_rules);

		if (!empty($rules['rules']))
		{
			foreach ($rules['rules'] as $key => $rule)
			{
				if ($rule['type'] == 'percentage_discount')
				{
					$bulk_price_ex_tax = number_format($price_ex_tax * ( (100 - (float)$rule['amount']) / 100),2);
					$bulk_price_inc_tax = number_format($price_inc_tax * ( (100 - (float)$rule['amount']) / 100),2);

					echo '<li class="item__specials-item">Buy <strong>' . $rule['from'] . '</strong> for <strong>&pound;' . $bulk_price_ex_tax . '</strong> (<strong>&pound;' . $bulk_price_inc_tax . '</strong> inc VAT) each and <strong>save!</strong> <strong>' . $rule['amount'] . '%</strong></li>';
				}
			}
		}

		echo '</ul>';
		echo '</div>';
	}

}

//Dusplaying lowest pirce on product archive-product.php
add_action('woocommerce_after_shop_loop_item_title','product_special_offers_test',10);
function product_special_offers_test() {
	global $product;

	$pricing_rules = get_post_meta($product->get_id(),'_pricing_rules',true);
	$price_ex_tax = wc_get_price_excluding_tax( $product );
	$price_inc_tax = wc_get_price_including_tax( $product );

	if (!empty($pricing_rules))
	{

		$rules = reset($pricing_rules);

		if (!empty($rules['rules']))
		{
			foreach ($rules['rules'] as $key => $rule)
			{
				if ($rule['type'] == 'percentage_discount')
				{
					$bulk_price_ex_tax = number_format($price_ex_tax * ( (100 - (float)$rule['amount']) / 100),2);

					echo '<p class="denward__low-as">As low as <strong>&pound;' . $bulk_price_ex_tax . '</strong></p>';
				}
			}
		}

	}

}


// CHANGE SINGLE PRODUCT PAGE TITLE HEADER TYPE
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );

add_action( 'woocommerce_single_product_summary', 'product_template_single_title', 5 );
function product_template_single_title() { 
    the_title( '<h2 class="product_title entry-title">', '</h2>' );
}



// Add another tab 'PDF's / downloads'

function pdfs_tab( $tabs ) {
	if (get_field('display_pdf_tab')) {
		$tabs['brochures_tab'] = array(
			'title' 	=> __( 'PDFS', 'woocommerce' ),
			'priority' 	=> 30,
			'callback' 	=> 'pdfs_tab_content'
		);
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'pdfs_tab' );
function pdfs_tab_content() {
if (get_field('display_pdf_tab')) {
	echo '<h2>PDFS</h2>';
	echo '<ul class="tabs__download-list">';
	if( have_rows('pdfs') ):
		while ( have_rows('pdfs') ) : the_row();
		echo '<li class="tabs__download-item">';
			$file = get_sub_field('pdf_file','product_' . $term->term_id);
			if( $file ): ?>
				<a class="tabs__download" href="<?php echo $file['url']; ?>" target="_blank"><?php the_sub_field('pdf_name'); ?></a>
			<?php endif;
		echo '</li>';
		endwhile; endif;
		echo '</ul>';
	}
}


// Add another tab videos

function videos_tab( $tabs ) {
	if (get_field('display_videos_tab')) {
		$tabs['videos_tab'] = array(
			'title' 	=> __( 'Videos', 'woocommerce' ),
			'priority' 	=> 40,
			'callback' 	=> 'videos_tab_content'
		);
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'videos_tab' );
function videos_tab_content() {
if (get_field('display_videos_tab')) {
	echo '<h2>Videos</h2>';
	echo '<ul class="tabs__video-list">';
	if( have_rows('videos') ):
		while ( have_rows('videos') ) : the_row();
		echo '<li class="tabs__video-item">';
			the_sub_field('video','product_' . $term->term_id);
		echo '</li>';
		endwhile; endif;
		echo '</ul>';
	}
}


// Add another tab downloads
function downloads_tab( $tabs ) {
	if (get_field('display_downloads_tab')) {
		$tabs['downloads_tab'] = array(
			'title' 	=> __( 'Downloads', 'woocommerce' ),
			'priority' 	=> 50,
			'callback' 	=> 'downloads_tab_content'
		);
	}
	return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'downloads_tab' );
function downloads_tab_content() {
if (get_field('display_downloads_tab')) {
	echo '<ul class="tabs__download-list">';
	if( have_rows('downloads') ):
		while ( have_rows('downloads') ) : the_row();
		echo '<li class="tabs__download-item">';
		if( get_sub_field('file_type') == 'upload' ) {

			$file = get_sub_field('download_file','product_' . $term->term_id);
			if( $file ): ?>
				<a class="tabs__download" href="<?php echo $file['url']; ?>" download><i class="tabs__download-icon fas fa-cloud-download"></i> <?php the_sub_field('title','product_' . $term->term_id); ?></a>
			<?php endif;

		} elseif( get_sub_field('file_type') == 'url' ) { ?>
			<a class="tabs__download" href="<?php the_sub_field('download_url','product_' . $term->term_id); ?>" target="_blank"><i class="tabs__download-icon fas fa-cloud-download"></i> <?php the_sub_field('title','product_' . $term->term_id); ?></a>
		<?php }



		echo '</li>';
		endwhile; endif;
		echo '</ul>';

}
}


// Changing proceed to checkout text button.
function woocommerce_button_proceed_to_checkout() {
	 $checkout_url = WC()->cart->get_checkout_url(); ?>
	 <a href="<?php echo esc_url( wc_get_checkout_url() );?>" class="checkout-button button alt wc-forward">
	 	<?php esc_html_e( 'Checkout', 'woocommerce' ); ?>
	 </a>
	 <?php
}
//Changing woocommerce placholder image
add_filter('woocommerce_placeholder_img_src', 'custom_woocommerce_placeholder_img_src');

function custom_woocommerce_placeholder_img_src( $src ) {
	$upload_dir = wp_upload_dir();
	$uploads = untrailingslashit( $upload_dir['baseurl'] );
	// replace with path to your image
	$src = $uploads . '/2020/06/default.jpg';

	return $src;
}


//add placeholders to woocommerce fields
add_filter('woocommerce_default_address_fields', 'override_default_address_checkout_fields', 20, 1);
function override_default_address_checkout_fields( $address_fields ) {
    $address_fields['first_name']['placeholder'] = 'First Name';
    $address_fields['last_name']['placeholder'] = 'Last Name';
    $address_fields['company']['placeholder'] = 'Company Name';
    $address_fields['address_1']['placeholder'] = 'Street Address';
    $address_fields['address_2']['placeholder'] = 'Apartment, suite, unit etc. (optional)';
    $address_fields['state']['placeholder'] = 'County';
    $address_fields['postcode']['placeholder'] = 'Postcode';
    $address_fields['city']['placeholder'] = 'Town/City';
	return $address_fields;
}
add_filter( 'woocommerce_billing_fields' , 'override_billing_fields' );
function override_billing_fields( $fields ) {
    $fields['billing_phone']['placeholder'] = 'Phone Number';
    $fields['billing_email']['placeholder'] = 'Email';
    return $fields;
}

/**
 * Disable WooCommerce block styles (front-end).
 */
function slug_disable_woocommerce_block_styles() {
  wp_dequeue_style( 'wc-block-style' );
}
add_action( 'wp_enqueue_scripts', 'slug_disable_woocommerce_block_styles' );

//Checkout moving payment above order review.
remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );
add_action( 'woocommerce_after_order_notes', 'woocommerce_checkout_payment', 20 );

//Removing 'Downloads' from MyAccount
add_filter( 'woocommerce_account_menu_items', 'custom_remove_downloads_my_account', 999 );
function custom_remove_downloads_my_account( $items ) {
unset($items['downloads']);
return $items;
}

//adding wishlist to my account
function my_custom_my_account_menu_items( $items ) {
	// Remove the logout menu item.
	$logout = $items['customer-logout'];
	unset( $items['customer-logout'] );

	// Insert your custom endpoint.
	$items['wishlist'] = __( 'Wishlist', 'woocommerce' );

	// Insert back the logout item.
	$items['customer-logout'] = $logout;

	return $items;
}

add_filter( 'woocommerce_account_menu_items', 'my_custom_my_account_menu_items' );

/**
 * Hide shipping rates when free shipping is available.
 * Updated to support WooCommerce 2.6 Shipping Zones.
 *
 * @param array $rates Array of rates found for the package.
 * @return array
 */
function my_hide_shipping_when_free_is_available( $rates ) {
	$free = array();
	foreach ( $rates as $rate_id => $rate ) {
		if ( 'free_shipping' === $rate->method_id ) {
			$free[ $rate_id ] = $rate;
			break;
		}
	}
	return ! empty( $free ) ? $free : $rates;
}
add_filter( 'woocommerce_package_rates', 'my_hide_shipping_when_free_is_available', 100 );

/**
 * Check if a user has product in wishlist
 *
 * @param post_id of the product.
 * @return bool
 */
function is_product_in_wishlist($post_id) {

	global $wpdb;

	$sql = 'SELECT wishlist_id FROM denw_wishlist WHERE product_id = ' . $post_id . ' AND user_id = ' . get_current_user_id();
    $result = $wpdb->get_row($sql);

    if (!is_null($result))
    {
    	return true;
    }

    return false;

}

//Ireland field Eircode required
add_filter( 'woocommerce_checkout_fields', 'custom_override_default_address_fields' );
function custom_override_default_address_fields($fields){
    global $woocommerce;
    $country = $woocommerce->customer->get_billing_country();
    if($country == 'IE'){
        $fields['billing']['billing_postcode']['required'] = true;
        $fields['shipping']['shipping_postcode']['required'] = true;
		// $fields['billing']['billing_postcode']['label'] = 'Eircode';  // Was Postcode
		// $fields['billing']['billing_postcode']['placeholder'] = 'Eircode';  // Was Postcode
		// $fields['shipping']['billing_postcode']['label'] = 'Eircode';  // Was Postcode
		// $fields['shipping']['billing_postcode']['placeholder'] = 'Eircode';  // Was Postcode
    }
    return $fields;
}

add_filter('woocommerce_default_address_fields', 'customize_default_address_fields', 10000, 1 );
function customize_default_address_fields( $address_fields ) {
    // $address_fields['state']['placeholder'] = __('State', 'woocommerce');
    $address_fields['postcode']['placeholder'] = __('Postcode / Eircode', 'woocommerce');
    return $address_fields;
}


/**
 * ADDING EORI Number when Ireland is selected
 */
add_action( 'woocommerce_before_order_notes', 'my_custom_checkout_field' );

function my_custom_checkout_field( $checkout ) {
	    echo '<div id="eori_no">';

	    woocommerce_form_field( 'eori_number', array(
	        'type'          => 'text',
	        'class'         => array('eori_number_input form-row-wide'),
	        'label'         => __('EORI number'),
	        'placeholder'   => __('EORI number'),
		), $checkout->get_value( 'eori_number' ));

	    echo '</div>';

}
//
// /**
//  * Process the checkout
//  */
add_action('woocommerce_checkout_process', 'my_custom_checkout_field_process');

function my_custom_checkout_field_process() {
	global $woocommerce;
    $country = $woocommerce->customer->get_billing_country();
    if($country == 'IE'){
    // Check if set, if its not set add an error.
    if ( ! $_POST['eori_number'] )
        wc_add_notice( __( '<strong>EORI number</strong> is a required field.' ), 'error' );
	}
}

// /**
//  * Update the order meta with field value
//  */
add_action( 'woocommerce_checkout_update_order_meta', 'my_custom_checkout_field_update_order_meta' );

function my_custom_checkout_field_update_order_meta( $order_id ) {
    if ( ! empty( $_POST['eori_number'] ) ) {
        update_post_meta( $order_id, 'EORI Number', sanitize_text_field( $_POST['eori_number'] ) );
    }
}
//
// /**
//  * Display field value on the order edit page
//  */
add_action( 'woocommerce_admin_order_data_after_billing_address', 'my_custom_checkout_field_display_admin_order_meta', 10, 1 );

function my_custom_checkout_field_display_admin_order_meta($order){
    echo '<p><strong>'.__('EORI Number').':</strong> ' . get_post_meta( $order->id, 'EORI Number', true ) . '</p>';
}
/**
 * END OF EORI Number when Ireland is selected
 */

 /*
 * Add customer email to Cancelled Order recipient list
 */
 function wc_cancelled_order_add_customer_email( $recipient, $order ){
     return $recipient . ',' . $order->billing_email;
 }
 add_filter( 'woocommerce_email_recipient_cancelled_order', 'wc_cancelled_order_add_customer_email', 10, 2 );

 // Set Approval status depending on account type
 add_action( 'gform_user_registered', 'set_user_active_state', 10, 4 );
 function set_user_active_state( $user_id, $feed, $entry, $user_pass )
 {
 	$account_type = rgar($entry,'16');

 	if ($account_type == 'standard')
 	{
 		update_user_meta( $user_id, 'approval_status', 1 );
 	}
 	else
 	{
 		update_user_meta( $user_id, 'approval_status', 0 );
 	}
 }

 // When loggin in check a user is approved
add_filter('authenticate', 'check_users_account_is_approved', 21, 3);
function check_users_account_is_approved($user, $username, $password){

    $approved = get_user_meta($user->ID,'approval_status',true);

    if (!is_null($user->roles))
    {
    	if ($approved == false && in_array('customer',$user->roles))
	    {
	    	return new WP_Error('not_approved', 'Your trade account is not yet approved.');
	    }
    }

    return $user;

}




//  //Credit customer/Trade
//  // remove payment gateway if credit customer
//  if (is_user_logged_in())
//  {
//  	global $is_trade_user;
//  	$user = wp_get_current_user();
//  	$account_type = get_user_meta($user->ID,'account_type',true);

//  	if ($account_type == 'credit')
//  	{
//  		$is_trade_user = true;

// 		add_filter( 'woocommerce_cart_needs_payment', '__return_true' );

//  	}
//  }


add_filter( 'woocommerce_available_payment_gateways', 'remove_non_trade_payment_option' );

function remove_non_trade_payment_option($available_gateways)
{
	global $is_trade_user;

	$is_trade_user = false;

	if (is_user_logged_in())
	{
		$user = wp_get_current_user();
		$account_type = get_user_meta($user->ID,'account_type',true);

		if ($account_type == 'credit')
		{
			$is_trade_user = true;
		}
	}

	if(!$is_trade_user)
	{
		unset($available_gateways['trade_account']);
	}

	return $available_gateways;
}











// Dispaying country on orders
add_filter( 'woocommerce_formatted_address_force_country_display', '__return_true' );



# For Remove Flat Rate Shipping Label on Cart Page
add_filter( 'woocommerce_cart_shipping_method_full_label', 'wdo_remove_shipping_label_cart_page', 10, 2 );
function wdo_remove_shipping_label_cart_page($label, $method) {
    $shipping_label = preg_replace( '/^.+:/', '', $label );
    return $shipping_label;
}

# For Remove Flat Rate Shipping Label on Thank you ( Order Placed ) page and Email
add_filter( 'woocommerce_order_shipping_to_display_shipped_via', 'wdo_remove_shipping_label_thnakyou_page_cart', 10, 2 );
function wdo_remove_shipping_label_thnakyou_page_cart($label, $method) {
    $shipping_label = '';
    return $shipping_label;
}


// Display the mobile phone field (account)
// add_action( 'woocommerce_edit_account_form_start', 'add_billing_phone_to_edit_account_form' ); // At start
add_action( 'woocommerce_edit_account_form', 'add_billing_phone_to_edit_account_form' ); // After existing fields
function add_billing_phone_to_edit_account_form() {
    $user = wp_get_current_user();
    ?>
	<fieldset>
		<legend>Update phone number</legend>
	</fieldset>
     <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
        <label for="billing_phone"><?php _e( 'Phone Number', 'woocommerce' ); ?> <span class="required">*</span></label>
        <input type="text" class="woocommerce-Input woocommerce-Input--phone input-text" name="billing_phone" id="billing_phone" value="<?php echo esc_attr( $user->billing_phone ); ?>" />
    </p>
    <?php
}

// Check and validate the mobile phone
add_action( 'woocommerce_save_account_details_errors','billing_phone_field_validation', 20, 1 );
function billing_phone_field_validation( $args ){
    if ( isset($_POST['billing_phone']) && empty($_POST['billing_phone']) )
        $args->add( 'error', __( 'Please fill in your phone number', 'woocommerce' ),'');
}

// Save the mobile phone value to user data
add_action( 'woocommerce_save_account_details', 'my_account_saving_billing_phone', 20, 1 );
function my_account_saving_billing_phone( $user_id ) {
    if( isset($_POST['billing_phone']) && ! empty($_POST['billing_phone']) )
        update_user_meta( $user_id, 'billing_phone', sanitize_text_field($_POST['billing_phone']) );
}
