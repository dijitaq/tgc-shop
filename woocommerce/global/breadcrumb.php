<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

echo '<div class="grid-container mt-675 mt-large-175 mb-175">';
	echo '<div class="grid-x grid-margin-x align-center">';
		echo '<div class="cell">';
			if ( ! empty( $breadcrumb ) ) {
				echo $wrap_before;

				echo '<ul class="flex-container">';

				if ( is_shop() ) {
					foreach ( $breadcrumb as $key => $crumb ) {
						echo '<li class="text-tgc-red">' . esc_html( $crumb[0] ) . '</li>';
					}

				} else {
					foreach ( $breadcrumb as $key => $crumb ) {

						echo $before;

						if ( ! empty( $crumb[1] ) && sizeof( $breadcrumb ) !== $key + 1 ) {
							echo '<li><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a></li>';

						} else {
							echo '<li class="current">' . esc_html( $crumb[0] ) . '</li>';
						}

						echo $after;

						if ( sizeof( $breadcrumb ) !== $key + 1 ) {
							echo '<li>' . $delimiter . '</li>';
						}
					}
				}

				echo '</ul>';
				echo $wrap_after;

			}
		echo '</div>';
	echo '</div>';
echo '</div>';
