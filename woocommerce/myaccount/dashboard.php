<?php
/**
 * My Account Dashboard
 *
 * Shows the first intro screen on the account dashboard.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/dashboard.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 4.4.0
 */

defined( 'ABSPATH' ) || exit;

$allowed_html = array(
	'a' => array(
		'href' => array(),
	),
);
?>

<div class="grid-container mb-900">
	<div class="grid-x grid-margin-x align-center">
		<div class="cell">
			<p class="lead">
				<?php
				printf(
					/* translators: 1: user display name 2: logout url */
					wp_kses( __( 'Hello %1$s', 'woocommerce' ), $allowed_html ),
					'<strong>' . esc_html( $current_user->display_name ) . '</strong>',
					esc_url( wc_logout_url() )
				);
				?>
			</p>
		</div>
	</div>

	<div class="grid-x grid-margin-x align-center">
		<div class="cell">
			<?php
				$args = array(
					'customer_id' => get_current_user_id(),
				);

				$query = new WC_Order_Query( $args );

				$orders = $query->get_orders();
			?>

			<h3 class="text-tgc-red">Your orders</h3>

			<table class="shop_table shop_table_responsive my_account_orders" width="100%">
				<thead>
					<tr>
						<?php foreach ( wc_get_account_orders_columns() as $column_id => $column_name ) : ?>
							<th class="woocommerce-orders-table__header <?php echo esc_attr( $column_id ); ?>"><span class="nobr"><?php echo esc_html( $column_name ); ?></span></th>
						<?php endforeach; ?>
					</tr>
				</thead>

				<tbody>
					<?php foreach ($orders as $order ) { ?>
						<tr>
							<td class="text-center">
								<?php echo $order->get_order_number(); ?>
							</td>

							<td class="text-center">
								<time datetime="<?php echo esc_attr( $order->get_date_created()->date( 'c' ) ); ?>"><?php echo esc_html( wc_format_datetime( $order->get_date_created() ) ); ?></time>
							</td>

							<td class="text-center">
								<?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?>
							</td>

							<td class="text-center">
								<?php
								$item_count = $order->get_item_count() - $order->get_item_count_refunded();
								/* translators: 1: formatted order total 2: total order items */
								echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );
								?>
							</td>

							<td class="text-center">
								<?php
								$actions = wc_get_account_orders_actions( $order );

								if ( ! empty( $actions ) ) {
									foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
										echo '<a href="' . esc_url( $action['url'] ) . '" class="text-tgc-red ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
									}
								}
								?>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php
	/**
	 * My Account dashboard.
	 *
	 * @since 2.6.0
	 */
	do_action( 'woocommerce_account_dashboard' );

	/**
	 * Deprecated woocommerce_before_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_before_my_account' );

	/**
	 * Deprecated woocommerce_after_my_account action.
	 *
	 * @deprecated 2.6.0
	 */
	do_action( 'woocommerce_after_my_account' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
