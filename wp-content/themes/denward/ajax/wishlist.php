<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/wp-load.php');

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


// Remove From Watchlist
if (isset($_POST['action']) && $_POST['action'] == 'wishlist_remove')
{
	$verify = wp_verify_nonce($_POST['security'], 'wishlist_remove');

	if ($verify == false)
	{
		$response = [
			'action' => 'refused'
		];
	}

	if (isset($_POST['code']) && $_POST['code'] != '')
	{
		$wpdb->delete( 'denw_wishlist', array( 'wishlist_code' => $_POST['code'] ), array( '%s' ) );

		$response = [
			'action' => 'removed',
			'code' => $_POST['code']
		];

		echo json_encode($response);
		exit();

	}
}

// Add to Watchlist
if (isset($_POST['action']) && $_POST['action'] == 'wishlist_add')
{
	$verify = wp_verify_nonce($_POST['security'], 'wishlist_add');

	if ($verify == false)
	{
		$response = [
			'action' => 'refused'
		];
	}

	if (isset($_POST['product']) && $_POST['product'] != '')
	{

		if (!is_user_logged_in()) return;

		$wishlist_code = generateRandomString();

		// Does it already exist in users watchlist
		$sql = 'SELECT wishlist_id, wishlist_code FROM denw_wishlist WHERE product_id = ' . $_POST['product'] . ' AND user_id = ' . get_current_user_id();
    	$check_exists = $wpdb->get_row($sql);

    	if (is_null($check_exists))
    	{
    		$insert = $wpdb->insert(
				'denw_wishlist',
				array(
					'wishlist_code' => $wishlist_code,
					'product_id' => $_POST['product'],
					'user_id' => get_current_user_id()
				),
				array(
					'%s',
					'%d',
					'%d'
				)
			);

			if ($insert)
			{
				$response = [
					'action' => 'added',
					'product_id' => $_POST['product']
				];

				echo json_encode($response);
				exit();
			}
    	}
    	else
    	{
    		$response = [
				'action' => 'already_exists',
				// 'code' => $check_exists->wishlist_code
			];

			echo json_encode($response);
			exit();
    	}

	}
}
