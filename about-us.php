<?php 
/**
 Template Name: About Us
 *
 * 
 */

get_header( 'generic' ); ?>

<header class="page-header mt-500 mt-large-0 mb-600 mb-large-550">
	<div class="grid-container">
		<div class="grid-x grid-margin-x align-center">
			<div class="cell small-12 small-order-2 large-shrink large-order-1 flex-container align-center align-middle">
				<div class="text-center">
					<h1 class="text-tgc-red">About TGC</h1>

					<p class="text-tgc-red">The Global Collective is about championing <br class="hide-for-medium-only">beautifully crafted brands, <br>with amazing stories of provenance <br class="hide-for-medium-only">and connecting them to buyers, distributors <br>and agents throughout the world. </p>
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
	<div class="grid-container">
		<div class="grid-x grid-margin-x align-center">
			<div class="image cell small-8 medium-5 large-4">
				<svg viewBox="0 0 100 100">
					<circle cx="48" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

					<circle cx="52" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
				</svg>

                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us-vision.webp">
			</div>

			<div class="cell small-12 medium-5 large-6 text-center medium-text-left flex-container align-middle">
				<div class="cell">
					<h3 class="text-tgc-red">Our Vision</h3>

					<p>To grow the value of premium brands in our ecosystem.</p>
				</div>
			</div>
		</div>

		<div class="grid-x grid-margin-x align-center mt-175">
			<div class="cell small-12 medium-5 large-6 small-order-2 medium-order-1 text-center medium-text-right flex-container align-middle">
				<div class="cell">
					<h3 class="text-tgc-red">Our Mission</h3>

					<p class="text-center large-text-right">To digitally transform the way premium brands connect.</p>
				</div>
			</div>

			<div class="image cell small-8 medium-5 large-4 small-order-1 medium-order-2">
				<svg viewBox="0 0 100 100">
					<circle cx="48" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

					<circle cx="52" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
				</svg>

                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us-mission.webp">
			</div>
		</div>

		<div class="grid-x grid-margin-x align-center mt-175">
			<div class="image cell small-8 medium-5 large-4">
				<svg viewBox="0 0 100 100">
					<circle cx="48" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

					<circle cx="52" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
				</svg>

                 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/about-us-vision.webp">
			</div>

			<div class="cell small-12 medium-5 large-6 text-center medium-text-left flex-container align-middle">
				<div class="cell">
					<h3 class="text-tgc-red">Partnerships are key</h3>

  					<p>We have the best partners across the globe. Specialist in their service and product offering. Covering every aspect of the export chain to guarantee a seemles export process.</p>
				</div>
			</div>
		</div>
	</div>

	<div class="grid-container mt-875 pb-1000">
		<div class="grid-x grid-margin-x align-center">
			<div class="cell text-center">
				<h3 class="text-tgc-red">Follow us on</h3>
			</div>
		</div>

		<?php get_template_part( 'parts/content-social-media-sharing', null, array( 'facebook' => 'https://www.facebook.com/The-Global-Collective-106900211275035', 'twitter' => 'https://facebook.com', 'linkedin' => 'https://www.linkedin.com/company/the-global-collective' ) ); ?>
	</div>
</section>

<?php get_footer(); ?>