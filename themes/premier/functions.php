<?php
/**
 *
 * This theme uses PSR-4 and OOP logic instead of procedural coding
 * Every function, hook and action is properly divided and organized inside related folders and files
 * Use the file `config/Custom/Custom.php` to write your custom functions
 *
 * @package awps
 */

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) :
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
endif;

if ( class_exists( 'Awps\\Init' ) ) :
	Awps\Init::register_services();
endif;

/** Additional functions below - need organizing via the above method, or put into a plugin */

add_filter('wp_nav_menu_items','add_search_box_to_menu', 10, 2);
function add_search_box_to_menu( $items, $args ) {
    if( $args->theme_location == 'primary' )
        return $items."<li class='menu-header-search'>".get_search_form(false)."</li><li class='cart-icon desktop-only'><i class='fa fa-shopping-cart default-cursor' title='Your cart is empty'></i></li>";
    return $items;
}

add_filter( 'author_link', 'new_author_link', 10, 1 );

function new_author_link( $link ) {
    $link = home_url( '/' );

    return $link;
}

add_filter( 'kdmfi_featured_images', function( $featured_images ) {
  $args_1 = array(
    'id' => 'featured-image-2',
    'desc' => 'Your description here.',
    'label_name' => 'Featured Image 2',
    'label_set' => 'Set featured image 2',
    'label_remove' => 'Remove featured image 2',
    'label_use' => 'Set featured image 2',
    'post_type' => array( 'art' ),
  );
  $args_2 = array(
    'id' => 'featured-image-3',
    'desc' => 'Your description here.',
    'label_name' => 'Featured Image 3',
    'label_set' => 'Set featured image 3',
    'label_remove' => 'Remove featured image 3',
    'label_use' => 'Set featured image 3',
    'post_type' => array( 'art' ),
  );
  $args_3 = array(
    'id' => 'featured-image-4',
    'desc' => 'Your description here.',
    'label_name' => 'Featured Image 4',
    'label_set' => 'Set featured image 4',
    'label_remove' => 'Remove featured image 4',
    'label_use' => 'Set featured image 4',
    'post_type' => array( 'art' ),
  );
  $args_4 = array(
    'id' => 'featured-image-5',
    'desc' => 'Your description here.',
    'label_name' => 'Featured Image 5',
    'label_set' => 'Set featured image 5',
    'label_remove' => 'Remove featured image 5',
    'label_use' => 'Set featured image 5',
    'post_type' => array( 'art' ),
  );

  $featured_images[] = $args_1;
  $featured_images[] = $args_2;
  $featured_images[] = $args_3;
  $featured_images[] = $args_4;

  return $featured_images;
});
