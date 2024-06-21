<?php

ini_set('max_execution_time', '0'); // for infinite time of execution 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// echo $_SERVER['DOCUMENT_ROOT'];
// exit();

include_once($_SERVER['DOCUMENT_ROOT'] . '/denward/wp-load.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/denward/wp-admin/includes/post.php');

$args = [
	'post_type' => 'product',
	'posts_per_page' => -1
];

$the_query = new WP_Query( $args );

if ( $the_query->have_posts() )
{
	while ( $the_query->have_posts() )
	{

      $the_query->the_post();

      // the_content();
      $stipped_content = strip_tags(get_the_content(),'<p><a><table><tr><td><tbody><thead>');
      
      $update = [
      	'ID' => get_the_ID(),
      	'post_content' => $stipped_content
      ];

      wp_update_post($update);

	}
}

// Reset Post Data
wp_reset_postdata();