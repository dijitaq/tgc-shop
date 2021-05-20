<?php 
/**
 Template Name: Landing page
 *
 * 
 */

get_header( 'generic' ); ?>

<section id="hero-image" class="has-dot-animation" data-interchange="[<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-image-small.jpg, small], [<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-image-medium.jpg, medium], [<?php echo get_template_directory_uri(); ?>/assets/images/home-hero-image-large.jpg, large]">
    <div class="container title text-center">
        <p class="title">Shop</p>

        <div class="container subtitle">
            <p class="subtitle">The Global Collective</h2>
        
            <p>We’re a digital marketplace connecting brands to partners globally</p>
        </div>
    </div>

    <canvas id="dot-animation"></canvas>
</section>

<section id="as-used-by">
    <div class="grid-container pt-950 pb-950">
        <div class="grid-x grid-margin-x align-center">
            <div class="cell large-3 grid-y align-center">
                <h2 class="text-center large-text-right text-tgc-red">Brands on board</h2>
            </div>

            <div class="cell large-8 large-offset-1">
                <?php
                    $orderby = 'name';
                    $order = 'asc';
                    $hide_empty = false ;
                    $cat_args = array(
                        'orderby'    => $orderby,
                        'order'      => $order,
                        'hide_empty' => $hide_empty,
                    );

                    $brands = get_terms( 'pwb-brand', $cat_args );
                ?>

                <div id="brand-carousel" class="carousel">
                    <?php foreach( $brands as $brand ) { ?>
                        <div class="slide position-relative">
                            <div class="grid-x grid-margin-x align-center">
                                <div class="cell small-8 medium-5 large-4 grid-y align-center image">
                                    <svg viewBox="0 0 100 100">
                                        <circle cx="48" cy="50" r="46" class="stroke-tgc-sand fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

                                        <circle cx="52" cy="50" r="46" class="stroke-tgc-sand fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
                                    </svg>

                                    <?php 
                                        $thumbnail_id = get_term_meta( $brand->term_id, 'pwb_brand_image', true );

                                        $image = wp_get_attachment_url( intval( $thumbnail_id ) );
                                    ?>

                                    <img data-lazy="<?php echo $image; ?>">
                                </div>

                                <div class="cell small-12 medium-7 large-8 grid-y align-center">
                                    <p class="lead"><?php echo $brand->name; ?></p>

                                    <?php $paragraphs = explode( "&nbsp;" ,  $brand->description); ?>

                                    <?php foreach ($paragraphs as $paragraph ) { ?>
                                        <p><?php echo $paragraph; ?></p>
                                    <?php } ?>

                                    <?php if( $brand->count ) { ?>
                                        <p><a href="<?php echo home_url() . '/brand/' . $brand->slug; ?>" class="button tgc-button">Shop <?php echo $brand->name; ?> products</a></p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="grid-x grid-margin-x align-center">
            <div class="cell large-8 large-offset-4 text-center large-text-left">
                <div id="brand-carousel-dots-container"></div>
            </div>
        </div>
    </div>
</section>

<section id="about-tgc">
    <div class="grid-container pt-950 pb-950">
        <div class="grid-x align-center">
            <div class="cell small-12 small-offset-0 large-6 grid-y align-center">
                <h3 class="text-center large-text-left text-color-tgc-red">About Us</h3>

                <p class="text-center large-text-left">The Global Collective team is a bunch of marketers and strategists passionate about seeing beautifully produced products being experienced by people all over the world.</p>

                <p class="text-center large-text-left">So it made sense to create a platform where people can discover these amazing brands and buy them.</p>

                <p class="text-center large-text-left">So go ahead, Shop The Global Collective of greatness and let us know what you think.</p>
            </div>

            <div class="cell small-8 medium-6 large-5 large-offset-1 image">
                <svg viewBox="0 0 100 100">
                    <circle cx="48" cy="50" r="46" class="stroke-white fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />

                    <circle cx="52" cy="50" r="46" class="stroke-white fill-transparent" stroke-width="1" vector-effect="non-scaling-stroke" />
                </svg>

                <img data-src="<?php echo get_template_directory_uri(); ?>/assets/images/home-about-tgc-large.webp" class="lozad">
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>