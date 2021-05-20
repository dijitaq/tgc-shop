<?php
    $term = get_term_by( 'slug', $args['brand']->slug ,'pwb-brand' );
    $image_id = get_term_meta( $term->term_id, 'pwb_brand_banner', true );
    $image = wp_get_attachment_url( intval( $image_id ) );

    $full = wp_get_attachment_image_src( intval( $image_id ), 'full' );
    $large = wp_get_attachment_image_src( intval( $image_id ), 'page-header-image-large' );
    $medium = wp_get_attachment_image_src( intval( $image_id ), 'page-header-image-medium' );
    $small = wp_get_attachment_image_src( intval( $image_id ), 'page-header-image-small' );
?>

<div id="brand-<?php echo $args['brand']->slug; ?>"> 
    <header class="hero-image">
        <div class="container title text-center">
            <div class="grid-container full subtitle">
                <div class="grid-x grid-margin-x align-center">
                    <div class="cell large-10 text-center">
                        <h1 class="entry-title single-title text-white" itemprop="headline"><?php echo $term->name; ?></h1>
                    
                        <?php $paragraphs = explode( "&nbsp;" ,  $args['brand']->description); ?>

                        <?php foreach ($paragraphs as $paragraph ) { ?>
                            <p class="text-white"><?php echo $paragraph; ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

        <img data-interchange="[<?php echo $small[0]; ?>, small], [<?php echo $medium[0]; ?>, medium], [<?php echo $full[0]; ?>, large], [<?php echo $full[0]; ?>, xlarge]">

        <a class="button tgc-button mb-0 trigger-brand-accordion" data-element="#accordion-<?php echo $args['brand']->slug; ?>" data-target="#accordion-content-<?php echo $args['brand']->slug; ?>">Shop <?php echo $args['brand']->name; ?> products</a>
    </header>

    <div class="grid-container">
        <?php
            $term = get_term_by( 'slug', $args['brand']->slug, 'pwb-brand' );

            $query = new WP_Query( $tax_args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => 8, // Limit: two products
                'tax_query'             => array( array(
                    'taxonomy'      => 'pwb-brand',
                    'field'         => 'term_id', // can be 'term_id', 'slug' or 'name'
                    'terms'         => $term->term_id,
                ), ),
            ));

            $all = new WP_Query( $tax_args = array(
                'post_type'             => 'product',
                'post_status'           => 'publish',
                'ignore_sticky_posts'   => 1,
                'posts_per_page'        => -1, // Limit: two products
                'tax_query'             => array( array(
                    'taxonomy'      => 'pwb-brand',
                    'field'         => 'term_id', // can be 'term_id', 'slug' or 'name'
                    'terms'         => $term->term_id,
                ), ),
            ));
        ?>

        <div id="accordion-<?php echo $args['brand']->slug; ?>" class="accordion" data-accordion data-allow-all-closed="true">
            <div class="accordion-item" data-accordion-item>
                <div id="accordion-content-<?php echo $args['brand']->slug; ?>" class="accordion-content <?php echo $args['class']; ?>" data-tab-content>
                    <div class="grid-x grid-margin-x small-up-2 medium-up-4" data-equalizer>
                        <?php if( $query->have_posts()) : while( $query->have_posts() ) : $query->the_post(); ?>
                            <?php
                                do_action( 'woocommerce_shop_loop' );

                                wc_get_template_part( 'content', 'product_brand' );
                            ?>
                        <?php endwhile; endif; wp_reset_query(); ?>
                    </div>

                    <?php if( $all->post_count > 8) { ?>
                        <div class="grid-x grid-margin-x">
                            <div class="cell text-center">
                                <p><a href="<?php echo home_url() . '/brand/' . $args['brand']->slug; ?>" class="button large tgc-button mb-0">View all <?php echo $args['brand']->name; ?> products</a></p>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>