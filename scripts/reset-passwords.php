<?php
    require_once '../wp-config.php';

/*
    global $wpdb;

    $users = $wpdb->get_results(
        $wpdb->prepare(
            "SELECT * FROM $wpdp->users WHERE user_email = %s", 'rhys.ruffell@revive.digital'
        )
    );

    print_r($users);
	*/
	
	
	
$user_data = get_user_by( 'email', 'rhys.ruffell@revive.digital' );

//var_dump($user_data);


$user_login = $user_data->user_login;

do_action( 'retrieve_password', $user_login );

$allow = apply_filters( 'allow_password_reset', true, $user_data->ID );

if ( ! $allow ) {

    //wc_add_notice( __( 'Password reset is not allowed for this user', 'woocommerce' ), 'error' );
    //return false;

    echo ('ERROR NOT ALLOWED');

} elseif ( is_wp_error( $allow ) ) {

    //wc_add_notice( $allow->get_error_message(), 'error' );
    //return false;

    echo ('ERROR');

} else {

    // Get password reset key (function introduced in WordPress 4.4).
    $key = get_password_reset_key( $user_data );

    // Send email notification.
    WC()->mailer(); // Load email classes.
    do_action( 'woocommerce_reset_password_notification', $user_login, $key );
}