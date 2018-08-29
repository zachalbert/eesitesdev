<?php
/*
Plugin Name:  FT Custom Features
Plugin URI:   http://foliotwist.com/
Description:  Adds custom functionality for Foliotwist users
Version:      1.0
Author:       Dan
Network:	  true
*/

defined( 'ABSPATH' ) or die( '' );

/**
 * Registers the art post type
 */
function ft_art_post_type() {
	$labels = array(
		'name'               => _x( 'Art', 'post type general name', 'textdomain' ),
		'singular_name'      => _x( 'Art', 'post type singular name', 'textdomain' ),
		'menu_name'          => _x( 'Art', 'admin menu', 'textdomain' ),
		'name_admin_bar'     => _x( 'Art', 'add new on admin bar', 'textdomain' ),
		'add_new'            => _x( 'Add New', 'artwork', 'textdomain' ),
		'add_new_item'       => __( 'Add New Artwork', 'textdomain' ),
		'new_item'           => __( 'New Artwork', 'textdomain' ),
		'edit_item'          => __( 'Edit Artwork', 'textdomain' ),
		'view_item'          => __( 'View Artwork', 'textdomain' ),
		'view_items'         => __( 'View Art', 'textdomain' ),
		'all_items'          => __( 'All Art', 'textdomain' ),
		'search_items'       => __( 'Search Artwork', 'textdomain' ),
		'parent_item_colon'  => __( 'Parent Artwork:', 'textdomain' ),
		'not_found'          => __( 'No artworks found.', 'textdomain' ),
		'not_found_in_trash' => __( 'No artworks found in Trash.', 'textdomain' )
	);
	$supports = array(
		'title',
		'editor',
		'author',
		'thumbnail',
		'excerpt',
		'comments'
	);
	$args = array(
		'labels'            	=> $labels,
		'supports'           	=> $supports,
		'public'      	    	=> true,
		'publicly_queryable'	=> true,
		'show_ui'           	=> true,
		'show_in_menu'      	=> true,
		'query_var'         	=> true,
		'capability_type'   	=> 'post',
		'rewrite'            	=> array( 'slug' => 'art' ),
		'has_archive'        	=> true,
		'hierarchical'       	=> false,
		'menu_position'      	=> 5, 
		'menu_icon'          	=> 'dashicons-art',
		'register_meta_box_cb'	=> 'ft_add_art_metaboxes',
	);
	register_post_type( 'art', $args );
}
add_action( 'init', 'ft_art_post_type' );
/**
 * Registers the gallery taxonomy
 */
function ft_art_taxonomy() {
	$labels = array(
		'name'              => _x( 'Galleries', 'taxonomy general name', 'textdomain' ),
		'singular_name'     => _x( 'Gallery', 'taxonomy singular name', 'textdomain' ),
		'search_items'      => __( 'Search Galleries', 'textdomain' ),
		'all_items'         => __( 'All Galleries', 'textdomain' ),
		'parent_item'       => __( 'Parent Gallery', 'textdomain' ),
		'parent_item_colon' => __( 'Parent Galleries:', 'textdomain' ),
		'edit_item'         => __( 'Edit Gallery', 'textdomain' ),
		'update_item'       => __( 'Update Gallery', 'textdomain' ),
		'add_new_item'      => __( 'Add New Gallery', 'textdomain' ),
		'new_item_name'     => __( 'New Gallery Name', 'textdomain' ),
		'menu_name'         => __( 'Gallery', 'textdomain' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'gallery' ),
	);

	register_taxonomy( 'gallery', array( 'art' ), $args );
	}	
add_action( 'init', 'ft_art_taxonomy' );
/**
 * Adds two metaboxes to the right side of the screen under the “Publish” box
 */
function ft_add_art_metaboxes() {
	add_meta_box('ft_art_price_box','Art Price','ft_art_price','art','normal','high');
	add_meta_box('ft_art_medium_box','Art Medium','ft_art_medium','art','normal','high');
	add_meta_box('ft_art_details_box', 'Optional Details', 'ft_art_details', 'art', 'normal', 'high');
	add_meta_box('ft_art_prints_info_box', 'Prints Info', 'ft_art_prints_info', 'art', 'normal', 'high');
}
/**
 * Output the HTML for art_price and save
 */
function ft_art_price() {
	global $post;
	$meta = get_post_meta( $post->ID, 'art_price', true ); ?>

	<input type="hidden" name="ft_art_price_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

	<p>
		<label for="art_price[price]">Price in {US Dollars} (do not include currency sign)</label>
		<br>
		<input type="text" name="art_price[price]" id="art_price[price]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['price'])){ echo (int)$meta['price']; } ?>">
	</p>

	<?php
}

function ft_save_art_price( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['ft_art_price_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	$old = get_post_meta( $post_id, 'art_price', true );
	$new = $_POST['art_price'];
	// validate input as safe, or replace with nothing
	$safe_price = intval( $_POST['art_price'] );
		if ( ! $safe_price ) {
		$safe_price = '';
		$new = $safe_price;
		}
	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'art_price', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'art_price', $old );
	}
}
/**
 * Output the HTML for art_medium and save
 */
function ft_art_medium() {
	global $post;
	$meta = get_post_meta( $post->ID, 'art_medium', true ); ?>

	<input type="hidden" name="ft_art_medium_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

	<p>
		<label for="art_medium[medium]">Medium used</label>
		<br>
		<input type="text" name="art_medium[medium]" id="art_medium[medium]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['medium'])){ echo esc_textarea($meta['medium']); } ?>">
	</p>

	<?php
}

function ft_save_art_medium( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['ft_art_medium_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	$old = get_post_meta( $post_id, 'art_medium', true );
	// SECURITYQ should I escape code or validate here?
	$new = $_POST['art_medium'];
	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'art_medium', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'art_medium', $old );
	}
}
/**
 * Output the HTML for art_details and save
*/
function ft_art_details() {
	global $post;
	$meta = get_post_meta( $post->ID, 'art_details', true ); ?>

	<input type="hidden" name="ft_art_details_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

	<p>
		Dimensions in {centimeters}<br>
		<label for="art_details[height]">height</label>
		<input type="text" name="art_details[height]" id="art_details[height]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['height'])){ echo esc_textarea($meta['height']); } ?>">

		<label for="art_details[width]">width</label>
		<input type="text" name="art_details[width]" id="art_details[width]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['width'])){ echo esc_textarea($meta['width']); } ?>">

		<label for="art_details[depth]">depth</label>
		<input type="text" name="art_details[depth]" id="art_details[depth]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['depth'])){ echo esc_textarea($meta['depth']); } ?>">
	</p>


	<p>
	    <label for="art_details[framing]">Framing status</label>
        <br />  
        <input type="radio" name="art_details[framing]" value="framed" <?php if ( isset ( $meta['framing'] ) ) checked( $meta['framing'], 'framed' ); ?> >framed<br>
        <input type="radio" name="art_details[framing]" value="unframed" <?php if ( isset ( $meta['framing'] ) ) checked( $meta['framing'], 'unframed' ); ?> >unframed<br>
        <input type="radio" name="art_details[framing]" value="gallery wrap" <?php if ( isset ( $meta['framing'] ) ) checked( $meta['framing'], 'gallery wrap' ); ?> >gallery wrap<br>
        <input type="radio" name="art_details[framing]" value="n/a" <?php if ( isset ( $meta['framing'] ) ) checked( $meta['framing'], 'n/a' ); ?> >n/a<br>
	</p>
	
	<p>
	    <label for="art_details[availability]">Availability</label>
        <br />  
        <input type="radio" name="art_details[availability]" value="for sale" <?php if ( isset ( $meta['availability'] ) ) checked( $meta['availability'], 'for sale' ); ?> >for sale<br>
        <input type="radio" name="art_details[availability]" value="not for sale" <?php if ( isset ( $meta['availability'] ) ) checked( $meta['availability'], 'not for sale' ); ?> >not for sale<br>
        <input type="radio" name="art_details[availability]" value="contact me" <?php if ( isset ( $meta['availability'] ) ) checked( $meta['availability'], 'contact me' ); ?> >contact me<br>
        <input type="radio" name="art_details[availability]" value="sold" <?php if ( isset ( $meta['availability'] ) ) checked( $meta['availability'], 'sold' ); ?> >sold<br>
        <input type="radio" name="art_details[availability]" value="n/a" <?php if ( isset ( $meta['availability'] ) ) checked( $meta['availability'], 'n/a' ); ?> >n/a<br>
	</p>
	
	<p>
	<label for="art_details[featured]">Feature this artwork?
		<input type="checkbox" name="art_details[featured]" value="featured" <?php if ( $meta['featured'] === 'featured') { echo 'checked'; } ?>> Featured art is displayed more prominently throughout your website
	</label>
	</p>
	
	<?php
}
function ft_save_art_details( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['ft_art_details_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	$old = get_post_meta( $post_id, 'art_details', true );
	// SECURITYQ should I escape code or validate here?
	$new = $_POST['art_details'];
	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'art_details', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'art_details', $old );
	}
}

/**
 * Output the HTML for art_prints and save
*/
function ft_art_prints_info() {
	global $post;
	$meta = get_post_meta( $post->ID, 'art_prints_info', true ); ?>

	<input type="hidden" name="ft_art_prints_info_nonce" value="<?php echo wp_create_nonce( basename(__FILE__) ); ?>">

	<p>
		<label for="art_prints_info[url]">Got prints (etc.) for sale? Add a link here</label>
		<input type="text" name="art_prints_info[url]" id="art_prints_info[url]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['url'])){ echo esc_url($meta['url']); } ?>">
		<br>
		<label for="art_prints_info[link_text]">What should the link text be?</label>
		<input type="text" name="art_prints_info[link_text]" id="art_prints_info[link_text]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['link_text'])){ echo esc_textarea($meta['link_text']); } ?>">
		<br>
		Include a price range if you like
		<label for="art_prints_info[price_low]"></label>
		<input type="text" name="art_prints_info[price_low]" id="art_prints_info[price_low]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['price_low'])){ echo esc_textarea($meta['price_low']); } ?>">
		 to 
		<label for="art_prints_info[price_high]"></label>
		<input type="text" name="art_prints_info[price_high]" id="art_prints_info[price_high]" class="regular-text" value="<?php  if (is_array($meta) && isset($meta['price_high'])){ echo esc_textarea($meta['price_high']); } ?>">
		</p>
	
	<?php
}

function ft_save_art_prints_info( $post_id ) {   
	// verify nonce
	if ( !wp_verify_nonce( $_POST['ft_art_prints_info_nonce'], basename(__FILE__) ) ) {
		return $post_id; 
	}
	// check autosave
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return $post_id;
	}
	// check permissions
	if ( 'page' === $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		} elseif ( !current_user_can( 'edit_post', $post_id ) ) {
			return $post_id;
		}  
	}
	$old = get_post_meta( $post_id, 'art_prints_info', true );
	// SECURITYQ should I escape code or validate here?
	$new = $_POST['art_prints_info'];
	if ( $new && $new !== $old ) {
		update_post_meta( $post_id, 'art_prints_info', $new );
	} elseif ( '' === $new && $old ) {
		delete_post_meta( $post_id, 'art_prints_info', $old );
	}
}

add_action( 'save_post', 'ft_save_art_price' );
add_action( 'save_post', 'ft_save_art_medium' ); 
add_action( 'save_post', 'ft_save_art_details' );
add_action( 'save_post', 'ft_save_art_prints_info' );
/**
 * Next up: move featured image/s above post editor (aka, artwork description)
*/


























?>