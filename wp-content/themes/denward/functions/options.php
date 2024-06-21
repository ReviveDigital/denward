<?php if( function_exists('acf_add_options_page') ) {

    acf_add_options_page(array(
			'page_title' 	=> 'Company Information',
			'menu_title'	=> 'Company Info',
			'menu_slug'		=> 'company-information',
			'icon_url' => 'dashicons-info',
			'position' => '2'
		));
		acf_add_options_page(array(
			'page_title' 	=> 'Homepage Slider',
			'menu_title'	=> 'Homepage Slider',
			'menu_slug'		=> 'slider',
			'icon_url' => 'dashicons-format-image',
			'position' => '3'
		));
        acf_add_options_page(array(
			'page_title' 	=> 'Special Offers',
			'menu_title'	=> 'Special Offers',
			'menu_slug'		=> 'special-offers',
			'icon_url' 		=> 'dashicons-star-filled',
			'position' => '4'
		));
        acf_add_options_page(array(
			'page_title' 	=> 'Popular Products',
			'menu_title'	=> 'Popular Products',
			'menu_slug'		=> 'popular-products',
			'icon_url' 		=> 'dashicons-products',
			'position' => '5'
		));
        acf_add_options_page(array(
			'page_title' 	=> 'Call to actions',
			'menu_title'	=> 'Call to actions',
			'menu_slug'		=> 'call-to-actions',
			'icon_url' 		=> 'dashicons-megaphone',
			'position' => '6'
		));
        acf_add_options_page(array(
			'page_title' 	=> 'Reviews',
			'menu_title'	=> 'Reviews',
			'menu_slug'		=> 'reviews',
			'icon_url' 		=> 'dashicons-format-quote',
			'position' => '7'
		));
}
?>
