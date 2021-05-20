<?php
	//var_dump( $args );
?>

<div class="brand grid-x grid-margin-x align-center mb-large-200" data-equalizer data-equalize-on="small">
    <div class="image cell small-6 medium-4 large-3">
        <div class="position-relative">
        	<svg viewBox="0 0 100 100">
                <circle cx="48" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

                <circle cx="52" cy="50" r="46" class="stroke-tgc-red fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
            </svg>

            <img src="<?php echo $args['image']; ?>">
        </div>
    </div>

    <div class="cell small-12 medium-6 large-5 text-center medium-text-left flex-container align-middle">
        <div class="cell">
        	<h3 class="text-tgc-red text-center"><?php echo $args['brand']->name; ?></h3>

        	<?php $paragraphs = explode( "&nbsp;" ,  $args['brand']->description); ?>

            <?php foreach ($paragraphs as $paragraph ) { ?>
                <p class="text-center large-text-left"><?php echo $paragraph; ?></p>
            <?php } ?>
        </div>
    </div>
</div>

<?php
    $term = get_term_by( 'slug', $args['brand']->slug, 'pwb-brand' );

    $query = new WP_Query( $tax_args = array(
        'post_type'             => 'product',
        'post_status'           => 'publish',
        'ignore_sticky_posts'   => 1,
        'posts_per_page'        => 4, // Limit: two products
        'post__not_in'          => array( get_the_id() ), // Excluding current product
        'tax_query'             => array( array(
            'taxonomy'      => 'pwb-brand',
            'field'         => 'term_id', // can be 'term_id', 'slug' or 'name'
            'terms'         => $term->term_id,
        ), ),
    ));
?>

<div class="grid-x grid-margin-x small-up-2 medium-up-4 mb-300" data-equalizer>
    <?php if( $query->have_posts()) : while( $query->have_posts() ) : $query->the_post(); ?>
        <?php
            do_action( 'woocommerce_shop_loop' );

            wc_get_template_part( 'content', 'product_brand' );
        ?>

        <?php wp_reset_query(); ?>
    <?php endwhile; endif; ?>
</div>

<div class="grid-x grid-margin-x mb-650">
    <div class="cell text-center">
        <p><a href="<?php echo home_url() . '/brand/' . $args['brand']->slug; ?>" class="button large tgc-button mb-0">Shop <?php echo $args['brand']->name; ?> products</a></p>
    </div>
</div>