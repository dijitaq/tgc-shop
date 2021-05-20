<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$feature_image_id = $product->get_image_id();
$feature_image = wp_get_attachment_image_src( $feature_image_id, 'full', true );
$feature_image_tn = wp_get_attachment_image_src( $feature_image_id, 'shop_thumbnail', true );

$gallery_image_ids = $product->get_gallery_image_ids();

//echo $feature_image_id;
//echo sizeof( $gallery_image_ids );
if ( $gallery_image_ids && $feature_image_id ) { ?>
	<div class="cell medium-6 mb-400">
		<div id="product-carousel">
			<div data-thumbnail="<?php echo $feature_image_tn[0]; ?>">
				<img src="<?php echo $feature_image[0]; ?>">
			</div>

			<?php foreach( $gallery_image_ids as  $gallery_image_id ) { ?>
				<?php
					$gallery_image = wp_get_attachment_image_src( $gallery_image_id, 'full', true );
					$gallery_image_tn = wp_get_attachment_image_src( $gallery_image_id, 'shop_thumbnail', true );
				?>

				<div data-thumbnail="<?php echo $gallery_image_tn[0]; ?>">
					<img src="<?php echo $gallery_image[0]; ?>">
				</div>
			<?php } ?>
		</div>

		<div id="product-carousel-dots-container" class="flex-container align-center"></div>
	</div>

<?php } else { ?>
	<div class="cell medium-6 mb-400">
		<img src="<?php echo $feature_image[0]; ?>">
	</div>
<?php } ?>