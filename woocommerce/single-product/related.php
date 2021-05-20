<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>
	<div class="grid-x align-center">
		<div class="cell small-8 medium-6 large-4">
			<hr class="mb-450">
		</div>
	</div>

	<div class="grid-x grid-margin-x align-center">
		<div class="cell">
			<?php
			$heading = apply_filters( 'woocommerce_product_related_products_heading', __( 'Related products', 'woocommerce' ) );

			if ( $heading ) :
				?>
				<h3 class="text-center text-tgc-red mb-137"><?php echo esc_html( $heading ); ?></h3>
			<?php endif; ?>

			<div class="product-grid grid-x grid-margin-x small-up-2 medium-up-4 mb-500" data-equalizer data-equalize-on="small">
				<?php foreach ( $related_products as $related_product ) : ?>

					<?php
					$post_object = get_post( $related_product->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
					?>

				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<?php
endif;

wp_reset_postdata();
