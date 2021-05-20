<?php
/**
 * Cart totals
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-totals.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 2.3.6
 */

defined( 'ABSPATH' ) || exit;

?>
<div class="cart_totals <?php echo ( WC()->customer->has_calculated_shipping() ) ? 'calculated_shipping' : ''; ?> mb-1000">

	<?php do_action( 'woocommerce_before_cart_totals' ); ?>

	<h3 class="text-tgc-red"><?php esc_html_e( 'Cart totals', 'woocommerce' ); ?></h3>

	<div class="grid-x grid-margin-x">
		<div class="cell small-7">
			<p class="text-tgc-salmon"><?php esc_html_e( 'Subtotal', 'woocommerce' ); ?></p>
		</div>

		<div class="cell small-5">
			<p class="text-right text-tgc-red" data-title="<?php esc_attr_e( 'Subtotal', 'woocommerce' ); ?>"><strong><?php wc_cart_totals_subtotal_html(); ?></strong></p>
		</div>

		<div class="cell">
			<hr class="hr">
		</div>
	</div>

	<?php if ( WC()->cart->get_coupons() ) : ?>
		<div class="cart-discount coupon-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
			<?php foreach ( WC()->cart->get_coupons() as $code => $coupon ) : ?>
				<div class="grid-x grid-margin-x">
					<div class="cell small-7">
						<p class="text-tgc-salmon"><?php wc_cart_totals_coupon_label( $coupon ); ?></p>
					</div>

					<div class="cell small-5">
						<p class="text-right text-tgc-red" data-title="<?php echo esc_attr( wc_cart_totals_coupon_label( $coupon, false ) ); ?>"><?php wc_cart_totals_coupon_html( $coupon ); ?></p>
					</div>

					<div class="cell">
						<hr class="hr">
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
	
	<?php if ( WC()->cart->needs_shipping() && WC()->cart->show_shipping() ) : ?>

		<?php do_action( 'woocommerce_cart_totals_before_shipping' ); ?>

		<?php wc_cart_totals_shipping_html(); ?>

		<?php do_action( 'woocommerce_cart_totals_after_shipping' ); ?>

		<div class="grid-x grid-margin-x">
			<div class="cell">
				<hr class="hr">
			</div>
		</div>

	<?php elseif ( WC()->cart->needs_shipping() && 'yes' === get_option( 'woocommerce_enable_shipping_calc' ) ) : ?>

		<div class="grid-x grid-margin-x">
			<div class="cell">
				<p><?php esc_html_e( 'Shipping', 'woocommerce' ); ?></p>
			</div>

			<div class="cell" data-title="<?php esc_attr_e( 'Shipping', 'woocommerce' ); ?>">
				<?php woocommerce_shipping_calculator(); ?>
			</div>

			<div class="cell">
				<hr class="hr">
			</div>
		</div>

	<?php endif; ?>

	<?php if ( WC()->cart->get_fees() ) : ?>

		<div class="grid-x grid-margin-x">
			<div class="cell">
				<?php foreach ( WC()->cart->get_fees() as $fee ) : ?>
					<tr class="fee">
						<th><?php echo esc_html( $fee->name ); ?></th>
						<td data-title="<?php echo esc_attr( $fee->name ); ?>"><?php wc_cart_totals_fee_html( $fee ); ?></td>
					</tr>
				<?php endforeach; ?>
			</div>

			<div class="cell">
				<hr class="hr">
			</div>
		</div>

	<?php endif; ?>

	<?php
	if ( wc_tax_enabled() && ! WC()->cart->display_prices_including_tax() ) {

		$taxable_address = WC()->customer->get_taxable_address();
		$estimated_text  = '';

		if ( WC()->customer->is_customer_outside_base() && ! WC()->customer->has_calculated_shipping() ) {
			/* translators: %s location. */
			$estimated_text = sprintf( ' <small>' . esc_html__( '(estimated for %s)', 'woocommerce' ) . '</small>', WC()->countries->estimated_for_prefix( $taxable_address[0] ) . WC()->countries->countries[ $taxable_address[0] ] );
		}

		if ( 'itemized' === get_option( 'woocommerce_tax_total_display' ) ) {
			foreach ( WC()->cart->get_tax_totals() as $code => $tax ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
				?>
				<tr class="tax-rate tax-rate-<?php echo esc_attr( sanitize_title( $code ) ); ?>">
					<th><?php echo esc_html( $tax->label ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></th>

					<td data-title="<?php echo esc_attr( $tax->label ); ?>"><?php echo wp_kses_post( $tax->formatted_amount ); ?></td>
				</tr>
				<?php
			}

		} else {
			?>
			<div class="grid-x grid-margin-x">
				<div class="cell auto">
					<p><?php echo esc_html( WC()->countries->tax_or_vat() ) . $estimated_text; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
				</div>

				<div class="cell auto text-right">
					<p data-title="<?php echo esc_attr( WC()->countries->tax_or_vat() ); ?>"><?php wc_cart_totals_taxes_total_html(); ?></p>
				</div>

				<div class="cell">
					<hr class="hr">
				</div>
			</div>
			<?php
		}
	}
	?>

	<?php do_action( 'woocommerce_cart_totals_before_order_total' ); ?>

	<div class="grid-x grid-margin-x">
		<div class="cell small-7">
			<p class="lead text-tgc-salmon"><?php esc_html_e( 'Total', 'woocommerce' ); ?>:</p>
		</div>

		<div class="cell small-5">
			<p class="lead text-right text-tgc-red" data-title="<?php esc_attr_e( 'Total', 'woocommerce' ); ?>"><strong><?php wc_cart_totals_order_total_html(); ?></strong></p>
		</div>

		<div class="cell">
			<hr class="hr">
		</div>
	</div>

	<?php do_action( 'woocommerce_cart_totals_after_order_total' ); ?>

	<div class="grid-x grid-margin-x">
		<div class="cell auto text-right">
			<?php do_action( 'woocommerce_proceed_to_checkout' ); ?>
		</div>
	</div>

	<?php do_action( 'woocommerce_after_cart_totals' ); ?>
</div>
