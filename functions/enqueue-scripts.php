<?php
/*function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
        
    // Adding scripts file in the footer
    //wp_enqueue_script( 'googlemap', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDKJIH7Ywy7JzOcsm9NhbpiRnCraSx5Dzk', null, null, false );
    wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), "1.8.1", false );
    wp_enqueue_script( 'lozad', 'https://cdn.jsdelivr.net/npm/lozad/dist/lozad.min.js', array(), "", false );
    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/scripts/app.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), false );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'adobe-fonts', 'https://use.typekit.net/maw4ezw.css', array(), '', 'screen' );
    wp_enqueue_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css');
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    wp_enqueue_style( 'style', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/css'), 'screen' );
    //wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/style/app.css', array(), filemtime(get_template_directory() . '/assets/css'), 'screen' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);

function smartwp_remove_wp_block_library_css(){
    wp_dequeue_style( 'wp-block-library' );
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
} 
add_action( 'wp_enqueue_scripts', 'smartwp_remove_wp_block_library_css', 100 );

function add_rel_preload( $html, $handle, $href, $media) {
    
    if ( is_admin() )
        return $html;

    $html = <<<EOT
        <link rel='preload' as='style' onload="this.onload=null;this.rel='stylesheet'" id='$handle' href='$href' type='text/css' media='all' />
    EOT;
    
    return $html;
}
add_filter( 'style_loader_tag', 'add_rel_preload', 10, 4 );


function add_defer( $html, $handle, $src ) {
    if ( is_admin() ) return $html; //don't break WP Admin

    if ( FALSE === strpos( $src, '.js' ) ) return $html;

    if ( "jquery-core" === $handle ) return $html;

    if ( "scripts" === $handle ) return $html;

    $html = '<script type="text/javascript" defer src="' . esc_url( $src ) . '" id="' . $handle . '"></script>';

    return $html;
}

add_filter( 'script_loader_tag', 'add_defer', 10, 3 );*/

function site_scripts() {
    global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

    //wp_deregister_script( 'jquery' );
          
    // Adding scripts file in the footer
    //wp_enqueue_script( 'jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), "3.6.0", false );
    wp_enqueue_script( 'lozad', 'https://cdnjs.cloudflare.com/ajax/libs/lozad.js/1.16.0/lozad.min.js', array(), "1.16.0", false );
    wp_enqueue_script( 'approve', 'https://cdnjs.cloudflare.com/ajax/libs/approvejs/3.1.2/approve.min.js', array(), "3.1.2", false );
    wp_enqueue_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array(), "1.8.1", false );
    wp_enqueue_script( 'sendmail', get_template_directory_uri() . '/assets/scripts/send-mail.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/scripts'), false );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/scripts'), false );
    wp_enqueue_script( 'app', get_template_directory_uri() . '/assets/scripts/app.js', array( 'jquery' ), filemtime( get_template_directory() . '/assets/scripts'), true );
   
    // Register main stylesheet
    wp_enqueue_style( 'fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css');
    wp_enqueue_style( 'slick-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css' );
    wp_enqueue_style( 'site-style', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (  get_option( 'thread_comments' ) == 1 ) ) {
        wp_enqueue_script( 'comment-reply' );
    }

    if ( is_page_template( 'contact-us.php' ) ) {
        wp_enqueue_script( 'gmap-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyDKJIH7Ywy7JzOcsm9NhbpiRnCraSx5Dzk', true );
    }

    wp_localize_script( 'sendmail', 'ajaxobject', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'site_scripts', 999 );

function add_defer( $html, $handle, $src ) {
    if ( is_admin() ) return $html; //don't break WP Admin

    if ( FALSE === strpos( $src, '.js' ) ) return $html;

    if ( "jquery-core" === $handle ) return $html;

    //if ( "sendmail" === $handle ) return $html;

    if ( "wpbs-script" === $handle ) return $html;

    if ( "app" === $handle ) return $html;

    $html = '<script type="text/javascript" defer src="' . esc_url( $src ) . '" id="' . $handle . '"></script>';

    return $html;
}

add_filter( 'script_loader_tag', 'add_defer', 10, 3 );