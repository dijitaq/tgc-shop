<?php
/** 
 * For more info: https://developer.wordpress.org/themes/basics/theme-functions/
 *
 */

	
// Theme support options
require_once(get_template_directory().'/functions/theme-support.php'); 

// WP Head and other cleanup functions
require_once(get_template_directory().'/functions/cleanup.php'); 

// Register scripts and stylesheets
require_once(get_template_directory().'/functions/enqueue-scripts.php'); 

// Register custom menus and menu walkers
require_once(get_template_directory().'/functions/menu.php');

// Replace 'older/newer' post links with numbered navigation
require_once(get_template_directory().'/functions/page-navi.php'); 

// Make theme compatible with WooCommerce
require_once(get_template_directory().'/functions/woocommerce.php'); 

// Register sidebars/widget areas
//require_once(get_template_directory().'/functions/sidebar.php'); 

// Makes WordPress comments suck less
//require_once(get_template_directory().'/functions/comments.php'); 

// Adds support for multiple languages
//require_once(get_template_directory().'/functions/translation/translation.php'); 

// Adds site styles to the WordPress editor
// require_once(get_template_directory().'/functions/editor-styles.php'); 

// Remove Emoji Support
// require_once(get_template_directory().'/functions/disable-emoji.php'); 

// Related post function - no need to rely on plugins
// require_once(get_template_directory().'/functions/related-posts.php'); 

// Use this as a template for custom post types
// require_once(get_template_directory().'/functions/custom-post-type.php');

// Customize the WordPress login menu
// require_once(get_template_directory().'/functions/login.php'); 

// Customize the WordPress admin
// require_once(get_template_directory().'/functions/admin.php');


///
function agency3_send_email () {
    
    $name = strip_tags( trim( $_POST["name"] ) );
    $name = str_replace( array("\r","\n"), array( " ", " " ), $name );
    $company = strip_tags( trim( $_POST["name"] ) );
    $business_type = strip_tags( trim( $_POST["business_type"] ) );
    $email = filter_var( trim( $_POST["email"] ), FILTER_SANITIZE_EMAIL );
    $phone = strip_tags( trim( $_POST["telephone"] ) );
    $message = trim( $_POST["message"] );

    //$to = get_option('admin_email');
    $to = 'firdaus@agency3.com.au';
    $headers = 'From: ' . $name . ' <"' . $email . '">';
    $subject = "Agency3 website message from " . $name;
    
    ob_start();
    
    //
    $email_content = "Name: $name \n";
    $email_content = "Company: $company \n";
    $email_content .= "Email: $email \n\n";
    $email_content .= "Phone: $phone \n\n";
    $email_content .= "Message:\n $message \n";

    // Build the email headers.
    $email_headers = array( 'From: ' . $name . ' <' . $email . '>' );
    
    $message = ob_get_contents();
    
    ob_end_clean();

    $mail = wp_mail( $to, $subject, $email_content, $email_headers );
    
    if($mail){
        $returns = array(
            'success' => '1',
            'message' => "Thank You! Your message has been sent.",
        );

    } else {
        $returns = array(
            'success' => '0',
            'message' => "Oops! Something went wrong and we could not send your message.",
        );
    }

    echo json_encode($returns); 

    wp_die();
}

function agency3_mail_content_type() {
    return "text/html";
}

add_action( 'wp_ajax_agency3_send_email', 'agency3_send_email' );
add_action( 'wp_ajax_nopriv_agency3_send_email', 'agency3_send_email' );
add_action( 'wp_mail_content_type', 'agency3_mail_content_type' );