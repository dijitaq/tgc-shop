<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
do_action( 'woocommerce_before_main_content' );

?>

<?php if ( is_tax( 'pwb-brand' ) ) { ?>
	<?php
		$slug = get_queried_object()->slug;
		$term = get_term_by( 'slug', $slug ,'pwb-brand' );
		$image_id = get_term_meta( $term->term_id, 'pwb_brand_banner', true );
		$image = wp_get_attachment_url( intval( $image_id ) );

		$full = wp_get_attachment_image_src( intval( $image_id ), 'full' );
		$large = wp_get_attachment_image_src( intval( $image_id ), 'page-header-image-large' );
		$medium = wp_get_attachment_image_src( intval( $image_id ), 'page-header-image-medium' );
		$small = wp_get_attachment_image_src( intval( $image_id ), 'page-header-image-small' );

		$facebook_share = 'https://www.facebook.com/sharer.php?u=' . home_url( add_query_arg( $_GET, $wp->request ) );
		
		$twitter_share = 'https://twitter.com/intent/tweet?url=' . home_url( add_query_arg( $_GET, $wp->request ) ) . '/&text=' . str_replace( " ", "%20", "Check out " . $term->name . " on Shop TGC!" );
		
		$linkedin_share = 'https://www.linkedin.com/shareArticle?url=' . home_url( add_query_arg( $_GET, $wp->request ) ) . '/&title=' . str_replace( " ", "%20", "Check out " . $term->name . " on Shop TGC!" );
		//var_dump( $term );
	?>

	<header class="hero-image mb-1000">
	    <div class="container title text-center">
	        <div class="grid-container subtitle">
	        	<div class="grid-x grid-margin-x align-center">
	        		<div class="cell large-10 text-center">
			            <h1 class="entry-title single-title text-white" itemprop="headline"><?php echo $term->name; ?></h1>
			        
			            <?php $paragraphs = explode( "&nbsp;" ,  $term->description); ?>

                        <?php foreach ($paragraphs as $paragraph ) { ?>
                            <p class="text-white"><?php echo $paragraph; ?></p>
                        <?php } ?>
			        </div>
			    </div>
	        </div>
	    </div>

	    <img data-interchange="[<?php echo $small[0]; ?>, small], [<?php echo $medium[0]; ?>, medium], [<?php echo $full[0]; ?>, large], [<?php echo $full[0]; ?>, xlarge]">
	</header>

	<section>
		<?php echo do_shortcode( "[products brands=" . $slug . "]" ); ?>
	</section>

	<div class="grid-container mb-1000">
		<div class="grid-x grid-margin-x align-center">
			<div class="cell small-6">
				<hr class="mb-350">
			</div>
		</div>
		
		<div class="grid-x grid-margin-x align-center">
			<div class="cell text-center">
				<h3 class="text-tgc-red mb-125">Share this brand</h3>
			</div>
		</div>

		<?php get_template_part( 'parts/content-social-media-sharing', null, array( 'facebook' => $facebook_share, 'twitter' => $twitter_share, 'linkedin' => $linkedin_share ) ); ?>
	</div>

<?php } else if( is_shop() ) { ?>
	<header class="page-header mt-0 mb-600 mb-large-550">
		<div class="grid-container">
			<div class="grid-x grid-margin-x align-center">
				<div class="cell small-12 small-order-2 large-shrink large-order-1 flex-container align-center align-middle">
					<div class="text-center">
						<h1 class="text-tgc-red">SHOP TGC</h1>

						  <p>The Global Collective is all about championing <br class="hide-for-medium-only">beautifully crafted brands, <br class="show-for-medium-only">with authentic stories of <br class="hide-for-medium-only">uniqueness, purpose and provenance. <br>Below is our collective of brands, their stories <br class="show-for-large">and products for you to purchase. Enjoy!</p>
					</div>
				</div>

				<div class="image cell small-10 small-order-1 medium-6 large-order-2 large-5">
					<svg viewBox="0 0 100 100">
						<circle cx="48" cy="50" r="46" class="stroke-tgc-sand fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

						<circle cx="52" cy="50" r="46" class="stroke-tgc-sand fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
					</svg>

	                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-about-tgc-large.webp">
				</div>
			</div>
		</div>
	</header>

	<section>
		<div class="grid-container full mb-950">
			<div class="grid-x grid-margin-x">
				<div class="cell brands">
					<?php
						//$orderby = '_crb_term_order';
						$args = array(
							'taxonomy' => 'pwb-brand',
							'orderby' => 'name',
							'order' => 'asc',
							'hide_empty' => true,
						);

						$brands = get_terms( 'pwb-brand', $args );

						$counter = 0;

						foreach( $brands as $brand ) {
							$thumbnail_id = get_term_meta( $brand->term_id, 'pwb_brand_banner', true );

							$image = wp_get_attachment_image_src( $thumbnail_id, 'page-header-image-small', true );
							
							if ($counter == ( sizeof( $brands ) - 1 )) {
								get_template_part( 'woocommerce/content', 'category',  array( 'brand' => $brand, 'image' => $image[0], 'class' => "pt-300" ) );

							} else {
								get_template_part( 'woocommerce/content', 'category',  array( 'brand' => $brand, 'image' => $image[0], 'class' => "pt-300 pb-1000" ) );
							}

							$counter++;
						}
					?>
				</div>
			</div>
		</div>
	</section>

	<div class="grid-container mb-1000">
		<div class="grid-x grid-margin-x align-center">
			<div class="cell text-center">
				<h3 class="text-tgc-red">Follow us on</h3>
			</div>
		</div>

		<?php get_template_part( 'parts/content-social-media-sharing', null, array( 'facebook' => 'https://www.facebook.com/The-Global-Collective-106900211275035', 'twitter' => 'https://facebook.com', 'linkedin' => 'https://www.linkedin.com/company/the-global-collective' ) ); ?>
	</div>
<?php } ?>

<?php
/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
get_footer( 'shop' );
