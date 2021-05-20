<?php 
/**
 Template Name: Generic page
 *
 * 
 */

get_header( 'home' ); ?>


<header class="page-header generic background-tgc-salmon">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell small-12 medium-shrink position-relative">
				<div class="box flex-container align-center align-middle position-relative">
					<h1 class="text-white"><?php the_title(); ?></h1>
				</div>

				<div class="image">
					<svg viewBox="0 0 100 100">
	                    <circle cx="48" cy="50" r="46" class="stroke-white fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

	                    <circle cx="52" cy="50" r="46" class="stroke-white fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
	                </svg>
				</div>
			</div>
		</div>
	</div>
</header>

<?php get_footer(); ?>