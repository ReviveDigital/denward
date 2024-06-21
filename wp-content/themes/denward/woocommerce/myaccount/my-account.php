<?php
/**
 * My Account page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/my-account.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * My Account navigation.
 *
 * @since 2.6.0
 */
 ?>
 <ul class="woocommerce__account-list">
 	<li class="woocommerce__account-item">Account type: <span class="woocommerce__account-type">
        <?php
        $user = wp_get_current_user();
	    $account_type = get_user_meta($user->ID,'account_type',true);
        if ($account_type == 'credit') { ?>
            Credit Account
        <?php } elseif ($account_type == 'standard') { ?>
            Standard Account
        <?php } ?>
    </span></li>
    <?php
    $user = wp_get_current_user();
    $account_type = get_user_meta($user->ID,'account_type',true);
    if ($account_type == 'credit') { ?>
        <li class="woocommerce__account-item">Credit limit: <span class="woocommerce__account-type">
            <?php $user = wp_get_current_user();
    	    $account_type = get_user_meta($user->ID,'requested_credit_limit',true);
            if ($account_type == 'Up to £500') { ?>
                Up to £500
            <?php } elseif ($account_type == '£500 - £5,000') { ?>
                £500 - £5,000
            <?php } elseif ($account_type == '£1,000 - £5,000') { ?>
                £1,000 - £5,000
            <?php } elseif ($account_type == '£5000 - £10,000') { ?>
                £5000 - £10,000
            <?php } ?>
            </span></li>
    <?php } ?>

    <li class="woocommerce__account-item">Company: <span class="woocommerce__account-type">
            <?php $user = wp_get_current_user();
            $account_type = get_user_meta($user->ID,'billing_company',true);
            echo $account_type; ?>
        </span>
    </li>
 </ul>
 <div class="woocommerce__account">
	 <div class="woocommerce__nav">
		 <p class="woocommerce__nav-title">Navigation</p>
		 <?php do_action( 'woocommerce_account_navigation' ); ?>
	 </div>

	<div class="woocommerce__entry woocommerce-MyAccount-content">
		<?php
			/**
			 * My Account content.
			 *
			 * @since 2.6.0
			 */
			do_action( 'woocommerce_account_content' );
		?>
	</div>
</div>
