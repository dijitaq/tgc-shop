<?php
/**
 * Template part for displaying page content in page.php
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?> role="article" itemscope itemtype="http://schema.org/WebPage">
						
	<div class="grid-container mt-100">
		<div class="grid-x grid-margin-x align-center">
			<div class="cell">
				<h2 class="text-tgc-red"><?php the_title(); ?></h2>
			</div>
		</div>
	</div>

    <?php the_content(); ?>
					
</article> <!-- end article -->