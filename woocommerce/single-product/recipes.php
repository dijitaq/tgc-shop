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

$recipes = carbon_get_the_post_meta( 'recipes');

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

 if ( $recipes ) : ?>
	<div class="grid-x align-center pt-19 pb-17">
		<div class="cell small-8 medium-6 large-4">
			<hr>
		</div>
	</div>

	<div class="grid-x grid-margin-x align-center">
		<div class="cell">
			<h3 class="text-center text-th-gold mb-5">Recipes using this product</h3>
		</div>
	</div>

	<div class="recipes grid-x grid-margin-x small-up-2 medium-up-4 pb-2">
		<?php foreach( $recipes as $recipe) { ?>
			<div class="cell recipe">
				<a href="<?php echo wp_get_attachment_url( $recipe['recipe_file'] ); ?>" download>
					<img src="<?php echo $recipe['recipe_image']; ?>" class="mb-2">

					<p><?php echo $recipe['recipe_title']; ?></p>
				</a>
			</div>
		<?php } ?>
	</div>

	<div class="grid-x grid-margin-x align-center">
		<div class="cell">
			<p class="text-center text-th-gold">Click image to download recipes</p>
		</div>
	</div>
	<?php
endif;