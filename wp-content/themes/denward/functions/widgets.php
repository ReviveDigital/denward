<?php
//Add widgets product filter sidebar
if ( function_exists('register_sidebar') )
  register_sidebar(array(
    'name' => 'Sidebar',
    'id' => 'sidebar-widget',
    'before_widget' => '<div class = "denward__widgets">',
    'after_widget' => '</div>',
    'before_title' => '<p class="denward__sidebar-title">',
    'after_title' => '</p>',
  )
);
add_action( 'widgets_init', 'search_widget' );


// Adding search widget header
function search_widget() {
    register_sidebar( array(
        'name'          => 'Header Search',
        'id'            => 'search-widget',
        'before_widget' => '<div class="header__search">',
        'after_widget'  => '</div>'
    ) );

}
add_action( 'widgets_init', 'search_widget' );


// Adding search widget header
function sidebar_search_widget() {
    register_sidebar( array(
        'name'          => 'Sidebear Search',
        'id'            => 'sidebar-search-widget',
        'before_widget' => '<div class="denward__widgets">',
        'after_widget'  => '</div>',
        'before_title' => '<p class="denward__sidebar-title">',
        'after_title' => '</p>',
    ) );

}
add_action( 'widgets_init', 'sidebar_search_widget' );

// Adding sale sidebar
function sale_sidebar_widget() {
    register_sidebar( array(
        'name'          => 'Sale Sidebar',
        'id'            => 'sale-sidebar-widget',
        'before_widget' => '<div class="denward__widgets">',
        'after_widget'  => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

}
add_action( 'widgets_init', 'sale_sidebar_widget' );

?>
