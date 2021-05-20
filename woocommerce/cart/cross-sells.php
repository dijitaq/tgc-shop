<?php
/**
 * Cross-sells
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cross-sells.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

if ( $cross_sells ) : ?>
	<div class="grid-x align-center pt-19 pb-17">
		<div class="cell small-8 medium-6 large-4">
			<hr>
		</div>
	</div>

	<div class="grid-x grid-margin-x align-center">
		<div class="cell">
			<?php
			$heading = apply_filters( 'woocommerce_product_cross_sells_products_heading', __( 'You may be interested in&hellip;', 'woocommerce' ) );

			if ( $heading ) :
				?>
				<h3 class="text-center text-th-gold mb-5"><?php echo esc_html( $heading ); ?></h3>
			<?php endif; ?>
		</div>
	</div>

	<section class="up-sells upsells products grid-x medium-up-3">
			<?php foreach ( $cross_sells as $cross_sell ) : ?>

				<?php
					$post_object = get_post( $cross_sell->get_id() );

					setup_postdata( $GLOBALS['post'] =& $post_object ); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

					wc_get_template_part( 'content', 'product' );
				?>

			<?php endforeach; ?>
	</div>
	<?php
endif;

wp_reset_postdata();
