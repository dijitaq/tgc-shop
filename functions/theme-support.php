<?php

///
use Carbon_Fields\Container;
use Carbon_Fields\Field;

//
add_action( 'after_setup_theme', 'crb_load' );
function crb_load() {
    require_once ( get_template_directory() . '/vendor/autoload.php' );
    \Carbon_Fields\Carbon_Fields::boot();
}


function get_brands_count() {
	$hide_empty = false;
	$cat_args = array(
	    'hide_empty' => $hide_empty,
	);

	$array = [];

	$brands = get_terms( 'pwb-brand', $cat_args );

	$count = 1;
	foreach( $brands as $brand ) {
		array_push( $array, $count++ );
	}

	return $array;
}


function wpdocs_remove_plugin_image_sizes() {
    remove_image_size( 'post-thumbnail' );
    //remove_image_size( 'woocommerce_thumbnail' );
    //remove_image_size( 'woocommerce_gallery_thumbnail' );
    //remove_image_size( 'shop_catalog' );
    //remove_image_size( 'shop_thumbnail' );
}
add_action('init', 'wpdocs_remove_plugin_image_sizes');

//
//
function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );


//** *Enable upload for webp image files.*/
function webp_upload_mimes($existing_mimes) {
    $existing_mimes['webp'] = 'image/webp';
    return $existing_mimes;
}
add_filter('mime_types', 'webp_upload_mimes');


//** * Enable preview / thumbnail for webp image files.*/
function webp_is_displayable($result, $path) {
    if ($result === false) {
        $displayable_image_types = array( IMAGETYPE_WEBP );
        $info = @getimagesize( $path );

        if (empty($info)) {
            $result = false;
        } elseif (!in_array($info[2], $displayable_image_types)) {
            $result = false;
        } else {
            $result = true;
        }
    }

    return $result;
}
add_filter('file_is_displayable_image', 'webp_is_displayable', 10, 2);


function preload_fonts() {
    echo '
        <link rel="preload" href="' . get_template_directory_uri() . '/assets/fonts/renogare-regular-webfont.woff2" as="font" type="font/woff2" crossorigin="anonymous">
    ';
}
add_action( 'wp_head', 'preload_fonts' );

	
// Adding WP Functions & Theme Support
function joints_theme_support() {

	// Add WP Thumbnail Support
	add_theme_support( 'post-thumbnails' );

	//
	add_image_size( 'page-header-image-small', 480, 480, true );
	add_image_size( 'page-header-image-medium', 768, 576, true );
	add_image_size( 'page-header-image-large', 1280, 720, true );
	//add_image_size( 'page-body-image', 480, 480, true );
	add_image_size( 'open-graph', 1200, 630, true );
	add_image_size( 'open-graph-single-product', 600, 315, true );
	//add_image_size( 'brand-header-image', 1920, 640, true );
	//
	// Default thumbnail size
	set_post_thumbnail_size( 125, 125, true );

	// Add RSS Support
	add_theme_support( 'automatic-feed-links' );
	
	// Add Support for WP Controlled Title Tag
	add_theme_support( 'title-tag' );
	
	// Add HTML5 Support
	add_theme_support( 'html5', 
	         array( 
	         	'comment-list', 
	         	'comment-form', 
	         	'search-form', 
	         ) 
	);
	
	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-height' => true,
		'flex-width'  => true,
		'header-text' => array( 'site-title', 'site-description' ),
	) );
	
	// Adding post format support
	 add_theme_support( 'post-formats',
		array(
			'aside',             // title less blurb
			'gallery',           // gallery of images
			'link',              // quick link to other site
			'image',             // an image
			'quote',             // a quick quote
			'status',            // a Facebook like status update
			'video',             // video
			'audio',             // audio
			'chat'               // chat transcript
		)
	); 
	
	// Set the maximum allowed width for any content in the theme, like oEmbeds and images added to posts.
	$GLOBALS['content_width'] = apply_filters( 'joints_theme_support', 1200 );	
	
} /* end theme support */

add_action( 'after_setup_theme', 'joints_theme_support' );