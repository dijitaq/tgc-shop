<?php //global $wp; echo home_url( add_query_arg( $_GET, $wp->request ) );  ?>
<?php
/**
 * Template part for displaying a single post
 */
	global $wp;

	$slug = get_queried_object()->post_name;

	$facebook_share = 'https://www.facebook.com/sharer.php?u=' . home_url( add_query_arg( $_GET, $wp->request ) );
		
	$twitter_share = 'https://twitter.com/intent/tweet?url=' . home_url( add_query_arg( $_GET, $wp->request ) ) . '/&text=' . str_replace( " ", "%20", "Read our article: " . get_the_title() . " on Shop TGC!" );
	
	$linkedin_share = 'https://www.linkedin.com/shareArticle?url=' . home_url( add_query_arg( $_GET, $wp->request ) ) . '/&title=' . str_replace( " ", "%20", "Read our article: " . get_the_title() . " on Shop TGC!" );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(' mb-600'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

	<?php if ( has_post_thumbnail() ) { 
		$id = get_post_thumbnail_id();

		$full = wp_get_attachment_image_src( $id, 'full' );
		$large = wp_get_attachment_image_src( $id, 'page-header-image-large' );
		$medium = wp_get_attachment_image_src( $id, 'page-header-image-medium' );
		$small = wp_get_attachment_image_src( $id, 'page-header-image-small' );
	?>
		<header class="hero-image mb-912">
		    <div class="container title text-center">
		        <div class="container subtitle">
		            <h1 class="entry-title single-title text-white" itemprop="headline"><?php the_title(); ?></h1>
		        
		            <p class="text-white">Posted on <?php echo get_the_time( __('F j, Y', 'jointswp') ); ?> by <?php echo get_the_author_posts_link(); ?></p>
		        </div>
		    </div>

		    <img data-interchange="[<?php echo $small[0]; ?>, small], [<?php echo $medium[0]; ?>, medium], [<?php echo $full[0]; ?>, large], [<?php echo $full[0]; ?>, xlarge]">
		</header>

	<?php } else { ?>
		<section class="page-header generic background-tgc-salmon mb-912">
			<div class="grid-container full">
				<div class="grid-x align-center">
					<div class="cell small-12 medium-shrink position-relative">
						<div class="box flex-container align-center align-middle position-relative">
							<div class="text-center">
								<h1 class="text-white"><?php the_title(); ?></h1>

								<p class="text-white">Posted on <?php echo get_the_time( __('F j, Y', 'jointswp') ); ?> by <?php echo get_the_author_posts_link(); ?></p>
							</div>
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
		</section>
	<?php } ?>

    <section class="entry-content" itemprop="text">
    	<div class="grid-container">
			<div class="grid-x align-center mb-250">
				<div class="cell large-10">
					<?php the_content(); ?>
				</div>
			</div>
			
			<div class="grid-x grid-margin-x align-center">
				<div class="cell small-6">
					<hr class="mb-350">
				</div>
			</div>
		</div>
	</section> <!-- end article section -->
						
	<footer class="article-footer">
		<?php if ( get_the_tags() ) { ?>
			<div class="grid-container">
				<div class="grid-x align-center mb-250">
					<div class="cell medium-6">
						<p class="tags"><?php the_tags('<span class="tags-title">' . __( 'Tags:', 'jointswp' ) . '</span> ', ', ', ''); ?></p>
					</div>
				</div>

				<div class="grid-x grid-margin-x align-center">
					<div class="cell small-6">
						<hr class="mb-350">
					</div>
				</div>
			</div>
		<?php } ?>

		<div class="grid-container">
			<div class="grid-x grid-margin-x align-center">
				<div class="cell text-center">
					<h3 class="text-tgc-red mb-125">Share this article</h3>
				</div>
			</div>

			<?php get_template_part( 'parts/content-social-media-sharing', null, array( 'facebook' => $facebook_share, 'twitter' => $twitter_share, 'linkedin' => $linkedin_share ) ); ?>

			<div class="grid-x grid-margin-x align-center mt-400">
				<div class="cell small-6">
					<hr class="mb-350">
				</div>
			</div>
		</div>

		<?php 
			$prev_post = get_adjacent_post( false, '', true );
			$next_post = get_adjacent_post( false, '', false );
		?>

		<?php if ( $prev_post || $next_post ) { ?>
			<div class="grid-container">
				<div class="grid-x align-center">
					<div class="cell large-10">
						<h3 class="text-tgc-red text-center mb-125">Other articles</h3>
					</div>
				</div>

				<div class="grid-x align-center mb-350">
					<div class="cell medium-5 large-4">
						<?php
							

							if ( $prev_post ) {
								echo '<a href="' . get_permalink( $prev_post->ID ) . '" class="text-tgc-salmon"><i class="fas fa-chevron-left"></i> ' . $prev_post->post_title . '</a>';
							}
						?>
					</div>

					<div class="cell medium-5 large-4 text-right">
						<?php
							

							
							if ( $next_post ) {
								echo '<a href="' . get_permalink( $next_post->ID ) . '" class="text-tgc-salmon">' . $next_post->post_title . ' <i class="fas fa-chevron-right"></i></a>';
							}
						?>
					</div>
				</div>

				<div class="grid-x grid-margin-x align-center">
					<div class="cell small-6">
						<hr class="mb-350">
					</div>
				</div>
			</div>
		<?php } ?>
	</footer> <!-- end article footer -->
						
	<?php //comments_template(); ?>	
													
</article> <!-- end article -->