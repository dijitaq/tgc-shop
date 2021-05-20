<?php 
/**
 Template Name: News & Blog page
 *
 * 
 */

get_header( 'generic' ); ?>

<header class="page-header generic background-tgc-salmon mb-912">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell small-12 medium-shrink position-relative">
				<div class="box flex-container align-center align-middle position-relative">
					<h1 class="text-white">News &amp; Blog</h1>
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

<section>
	<div class="grid-container posts mb-650">
		<div class="grid-x grid-margin-x align-center">
			<?php
				$args = array(
					'posts_per_page' => 10, 
				    'post_type' => 'post', 
				    'post_status' => 'publish' 
				);

				$loop = new WP_Query( $args );
			?>

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<div class="cell large-10 post">
					<h4 class="title lead"><a href="<?php the_permalink(); ?>" class="text-tgc-red"><?php echo get_the_title(); ?></a></h4>

					<p class="meta mt-n75 mb-75">Posted by <?php the_author(); ?> on <?php the_date(); ?></p>
					
					<p><?php echo get_the_excerpt(); ?></p>
			 		
			 		<a href="<?php the_permalink(); ?>" class="button tgc-button mb-400">Read</a>

			 		<div class="grid-x grid-margin-x align-center">
			 			<div class="cell medium-6">
			 				<hr class="mb-350">
			 			</div>
			 		</div>
				</div>
			<?php endwhile; wp_reset_query(); ?>
		</div>
	</div>
</section>

<?php get_footer(); ?>