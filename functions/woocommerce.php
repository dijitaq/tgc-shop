<?php

/***** INIT *****/
add_action( 'after_setup_theme', 'woocommerce_support' );
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

function woocommerce_support() {
   add_theme_support( 'woocommerce' );
}


//
add_filter( 'woocommerce_breadcrumb_defaults', 'wcc_change_breadcrumb_home_text' );
function wcc_change_breadcrumb_home_text( $defaults ) {
    // Change the breadcrumb home text from 'Home' to 'Apartment'
    $defaults['home'] = 'Shop TGC';
    return $defaults;
}

//
add_filter( 'woocommerce_breadcrumb_home_url', 'woo_custom_breadrumb_home_url' );
function woo_custom_breadrumb_home_url() {
    return '/shop';
}

//
add_filter( 'woocommerce_get_breadcrumb', 'custom_breadcrumb', 10, 2 );
function custom_breadcrumb( $crumbs, $object_class ) {
    if ( is_shop() ) {
        array_shift( $crumbs );

    } else if ( is_tax( 'pwb-brand' ) ) {
        unset( $crumbs[1] );

        $crumbs = array_values( $crumbs );

    } else if ( is_product() ) {
        $id = get_queried_object_id();

        $term = wp_get_post_terms( $id, 'pwb-brand' );

        //var_dump( $term[0]->slug );
        $crumbs[1][0] = $term[0]->name;
        $crumbs[1][1] = '/brand/' . $term[0]->slug;
    }

    return $crumbs;
}

//
//remove_filter( 'wc_add_to_cart_message_html', 'filter_wc_add_to_cart_message_html', 10, 2 ); 
add_filter( 'wc_add_to_cart_message_html', 'tgc_add_to_cart_message', 10 , 2 );
 
function tgc_add_to_cart_message( $message, $products) {
    foreach( $products as $product_id => $quantity ){
        $query = wc_get_product( $product_id );

        $message = $query->get_title() . ' has been added to your cart. <a href="/cart" class="button tgc-button">View cart</a>';
    }
    
    return $message;
    
}


/***** SINGLE PRODUCT *****/
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);

add_action( 'woocommerce_single_product_summary', 'tgc_template_single_product_title', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 10);

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10);
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
//remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

add_action( 'woocommerce_after_single_product_summary', 'tgc_output_social_media_sharing', 10);

function tgc_template_single_product_title() {
    echo '<h2 class="text-tgc-red mt-n75 mb-100">' . get_the_title() . '</h2>';
}

function tgc_output_social_media_sharing() {
    global $wp;
    
    $id = get_queried_object_id();
    
    $query = wc_get_product( $id );

    //var_dump( $query );

    $facebook_share = 'https://www.facebook.com/sharer.php?u=' . home_url( add_query_arg( $_GET, $wp->request ) );

    $twitter_share = 'https://twitter.com/intent/tweet?url=' . home_url( add_query_arg( $_GET, $wp->request ) ) . '/&text=' . str_replace( " ", "%20", "Check out " . $query->get_title() . " on Shop TGC!" );

    $linkedin_share = 'https://www.linkedin.com/shareArticle?url=' . home_url( add_query_arg( $_GET, $wp->request ) ) . '/&title=' . str_replace( " ", "%20", "Check out " . $query->get_title() . " on Shop TGC!" );

    $share_array = array(
        array(
            'url' => $facebook_share,
            'icon' => '<i class="fab fa-lg fa-facebook-f"></i>',
        ),

        array(
            'url' => $twitter_share,
            'icon' => '<i class="fab fa-lg fa-twitter"></i>',
        ),

        array(
            'url' => $linkedin_share,
            'icon' => '<i class="fab fa-lg fa-linkedin-in"></i>',
        ),
    );

    echo '<div class="grid-x align-center">';
         echo '<div class="cell small-8 medium-6 large-4">';
                 echo '<hr class="mb-450">';
             echo '</div>';
         echo '</div>';

         echo '<div class="grid-x grid-margin-x align-center">';
             echo '<div class="cell">';
                 echo '<h3 class="text-center text-tgc-red mb-137">Share this product</h3>';
             echo '</div>';
         echo '</div>';

    echo '<div class="grid-x grid-margin-x align-center mb-500">';
        echo '<div class="cell flex-container align-center">';
            echo '<ul class="navigation social-media flex-container shrink">';
                foreach ( $share_array as $share ) {
                    //var_dump( $share['url'] );
                    echo '<li>';
                        echo '<a href="' . $share['url'] . '" target="_blank" rel="nofollow">';
                            echo '<svg viewBox="0 0 100 100">';
                                echo '<circle cx="48" cy="50" r="46" class="stroke-tgc-salmon fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />';

                                echo '<circle cx="52" cy="50" r="46" class="stroke-tgc-salmon fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />';
                            echo '</svg>';

                            echo  $share['icon'];
                        echo '</a>';
                    echo '</li>';
                }
            echo '</ul>';
        echo '</div>';
    echo '</div>';

    wp_reset_postdata();
}
/***** SINGLE PRODUCT *****/


/***** CART *****/

/***** CART *****/


/***** CHECKOUT *****/

/***** CHECKOUT *****/


/***** THANK YOU *****/
//remove_action('woocommerce_thankyou', 'woocommerce_order_details_table', 10); 
/***** THANK YOU *****/


//
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action( 'woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);

//
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);
add_action( 'woocommerce_shop_loop_item_title', 'tgc_template_loop_product_title', 10 );

//
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'tgc_template_loop_price', 10 );

remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );



function tgc_template_loop_product_title() {
	echo '<div data-equalizer-watch><p class="text-center text-tgc-salmon mt-50 mb-0">' . get_the_title() . '</p></div>';
}

function tgc_template_loop_price() {
	$price = get_post_meta( get_the_ID(), '_regular_price', true);

	echo '</a>';
	echo '<div class="grid-x grid-margin-x align-center mt-75">';
	echo '<div class="cell small-12 large-shrink grid-y align-center">';
	echo '<p class="price">' . get_woocommerce_currency_symbol() . $price . '</p>';
	echo '</div>';
}


//
add_action('wp_footer', 'spinners_example_on_checkout_jquery_script');
function spinners_example_on_checkout_jquery_script() {
    if ( is_checkout() && ! is_wc_endpoint_url() ) :
    ?>
    <script type="text/javascript">
    jQuery( function($){
        // Targeting checkout checkout payment and Review order table like Woocommerce does.
        var a = '.woocommerce-checkout-payment, .woocommerce-checkout-review-order-table';

        // Starting spinners with a delay of 2 seconds
        setTimeout(function() {
            // Starting spinners
            $(a).block({
                message: null,
                overlayCSS: {
                    background: "#fff",
                    opacity: .6
                }
            });

            console.log('start');

            // Stop spinners after 3 seconds
            setTimeout(function() {
                // Stop spinners
                $(a).unblock();

                console.log('stop');
            }, 5000);
        }, 2000);
    });
    </script>
    <?php
    endif;
}