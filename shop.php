<?php
/**
 Template Name: Shop page
 *
 * 
 */

get_header( 'shop' ); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<!-- To see additional archive styles, visit the /parts directory -->
		<?php get_template_part( 'parts/loop', 'archive' ); ?>

	<?php endwhile; ?>	

		<?php //joints_page_navi(); ?>

	<?php else : ?>

		<?php get_template_part( 'parts/content', 'missing' ); ?>

	<?php endif; ?>

<?php get_footer(); ?>