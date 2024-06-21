<?php

if ( ! function_exists( 'denward_setup' ) ) :

function denward_setup() {

	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'widgets' );

}
endif;
add_action( 'after_setup_theme', 'denward_setup' );

	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'denward' ),
		'secondary' => __( 'Footer Menu', 'denward' ),
		'third' => __( 'Footer Menu Two', 'denward' )
	) );

/// Disable Head Code
function remove_head_mess() {

  remove_action('admin_print_styles','print_emoji_styles' );
  remove_action('wp_head','print_emoji_detection_script', 7 );
  remove_action('admin_print_scripts','print_emoji_detection_script' );
  remove_action('wp_print_styles','print_emoji_styles' );
  remove_action('wp_head','wp_shortlink_wp_head', 10, 0);
  remove_action('wp_head','wp_generator');
  remove_action('wp_head','wp_oembed_add_discovery_links', 10 );
  remove_action('wp_head','wp_oembed_add_host_js');
  remove_action('wp_head','rsd_link');
  remove_action('wp_head','wlwmanifest_link');
  remove_action('wp_head','rest_output_link_wp_head');
  remove_action('wp_head', 'wp_resource_hints', 2 );
  remove_filter('wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter('the_content_feed', 'wp_staticize_emoji' );
  remove_filter('comment_text_rss', 'wp_staticize_emoji' );
  remove_action('wp_head', 'feed_links', 2);
  remove_action('wp_head', 'feed_links_extra', 3);

}
add_action( 'init', 'remove_head_mess' );

/* Enqueue admin scripts and styles */
function denward_admin_scripts() {
	wp_enqueue_style( 'denward-admin-style', get_template_directory_uri() . '/admin/admin-styles.css', array(),'1.0.0',true);
}
add_action( 'admin_enqueue_scripts', 'denward_admin_scripts' );

/* Enqueue Scripts and Styles. */
function denward_scripts() {
wp_enqueue_style( 'denward-style', get_stylesheet_uri() , array(), '0.0.5' );
// jQuery
wp_enqueue_script( 'jquery' );
// Range Sliders
wp_enqueue_script( 'slick-slider', get_template_directory_uri() . '/js/slick.min.js',array(),'1.0.0',true);
//Google maps
if (is_page(110)) {
	wp_enqueue_script( 'google-js', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyAT1NngNu3dQWI0jwCs5zQ7RjVVAM9K5xA', '', '' );
}
// Main JS
wp_enqueue_script( 'general-js', get_template_directory_uri() . '/js/general.min.js',array(),'1.1.0',true);
// wp_enqueue_script( 'general-js', get_template_directory_uri() . '/js/general.min.js',array(),'1.0.0',true);
}
add_action( 'wp_enqueue_scripts', 'denward_scripts' );



//Google maps API
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyAT1NngNu3dQWI0jwCs5zQ7RjVVAM9K5xA');
}
add_action('acf/init', 'my_acf_init');

//News excerpt Length
function excerpt($limit) {
      $excerpt = explode(' ', get_the_excerpt(), $limit);

      if (count($excerpt) >= $limit) {
          array_pop($excerpt);
          $excerpt = implode(" ", $excerpt) . '...';
      } else {
          $excerpt = implode(" ", $excerpt);
      }

      $excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

      return $excerpt;
}

function content($limit) {
    $content = explode(' ', get_the_content(), $limit);

    if (count($content) >= $limit) {
        array_pop($content);
        $content = implode(" ", $content) . '...';
    } else {
        $content = implode(" ", $content);
    }

    $content = preg_replace('/\[.+\]/','', $content);
    $content = apply_filters('the_content', $content);
    $content = str_replace(']]>', ']]&gt;', $content);

    return $content;
}

// News breadcrumb
add_filter( 'wpseo_breadcrumb_links', 'add_blog_term_to_yoast', 1, 1 );
function add_blog_term_to_yoast($crumbs) {

  $term = [];

	if (is_singular('post'))
  {
	    $term[] = [
	        'url' => esc_url(home_url('/News/')),
	        'text' => 'News',
	        'allow_html' => true
	    ];
	}
	elseif (is_archive('post'))
  {
		  $term[] = [
	        'url' => esc_url(home_url('/News/')),
	        'text' => 'News',
	        'allow_html' => true
	    ];
	}

  if ($term)
  {
    array_splice( $crumbs, 1, 0, $term );
  }
  return $crumbs;
}


// if its users first time of loggin in send password reset email
add_action('wp_authenticate', 'force_user_password_reset', 30, 2);
function force_user_password_reset($email_address, $password) {

	if (!empty($email_address) && !empty($password))
	{
		$user = get_user_by('email', $email_address);

		if ($user)
		{
			$needs_password_reset = (bool) get_user_meta($user->ID,'password_needs_resetting',true);

			if ($needs_password_reset == true)
			{
				$reset_key = get_password_reset_key( $user );

				if ($reset_key)
				{
					// Trigger Email to reset password
					$wc_emails = WC()->mailer()->get_emails();
					$wc_emails['WC_Email_Customer_Reset_Password']->trigger( $user->user_login, $reset_key );
				}
			}
		}
	}
}

// Show a better error message for when user logs in for the first time to reset password
add_filter( 'wp_authenticate_user', 'send_force_password_reset_message_to_browser', 20, 3 );
function send_force_password_reset_message_to_browser($user)
{
	$need_to_force_pw_change = (bool) get_user_meta( $user->ID, 'password_needs_resetting', true);

	if ($need_to_force_pw_change == true)
	{
		return new WP_Error('force_password_reset', 'As this is your first time logging into the new website we have requested you to reset your password. Please check your inbox.');
	}

	return $user;

}

// once user has reset password for the first time remove the flag for them to do so
add_action( 'password_reset', 'remove_forced_password_change', 10, 2);
function remove_forced_password_change( $user, $pass )
{
	$forced_password_change = (bool) get_user_meta($user->ID, 'password_needs_resetting', true);

    if ($forced_password_change == true)
    {
    	delete_user_meta($user->ID, 'password_needs_resetting');
    }

};


///Function Includes
require_once('functions/woocommerce.php');
require_once('functions/widgets.php');
require_once('functions/options.php');
require_once('functions/images.php');

// Removing from user profiles
function update_contact_methods( $contactmethods ) {

    unset( $contactmethods['instagram'] );
    unset( $contactmethods['facebook'] );
    unset( $contactmethods['linkedin'] );
	unset( $contactmethods['myspace'] );
	unset( $contactmethods['pinterest'] );
	unset( $contactmethods['tumblr'] );
	unset( $contactmethods['twitter'] );
	unset( $contactmethods['youtube'] );
	unset( $contactmethods['wikipedia'] );
	unset( $contactmethods['soundcloud'] );
	unset( $contactmethods['website'] );

    return $contactmethods;

}
add_filter( 'user_contactmethods', 'update_contact_methods' );

function shop_manager_delete_users_cap() {
    // gets the user role
    $role = get_role( 'shop_manager' );
    // Add the new capability
    $role->add_cap( 'delete_users' );
}
add_action( 'admin_init', 'shop_manager_delete_users_cap');

//Adding revisions to woocmmerce products
add_filter( 'woocommerce_register_post_type_product', 'wc_modify_product_post_type' );

function wc_modify_product_post_type( $args ) {
     $args['supports'][] = 'revisions';

     return $args;
}


// Allow editors to see Appearance menu
$role_object = get_role( 'shop_manager' ); 
$role_object->add_cap( 'edit_theme_options' );

// function hide_menu() {

// 	// Hide theme selection page
// 	remove_submenu_page( 'themes.php', 'themes.php' );

// 	// Hide widgets page
// 	remove_submenu_page( 'themes.php', 'widgets.php' );

// 	// Hide customize page
// 	global $submenu;
// 	unset($submenu['themes.php'][6]);

// }


// add_action('admin_head', 'hide_menu');


?>
