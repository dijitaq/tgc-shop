<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>
<html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">

		<!-- Open Graph -->
		<?php
			$image = get_the_post_thumbnail_url( get_the_ID(), 'open-graph' );
		?>
		
		<meta property="og:url"	content="<?php global $wp; echo home_url( add_query_arg( $_GET, $wp->request ) );  ?>" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="<?php echo get_the_title(); ?>" />
		<meta property="og:description" content="<?php echo strip_tags( get_the_content() ); ?>" />
		<meta property="og:image" content="<?php echo $image; ?>" />
		<meta name="twitter:card" content="<?php echo $image; ?>">

		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	
	    	<?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		
		<?php wp_head(); ?>
	</head>
			
	<body <?php body_class(); ?>>
		<?php echo '<!-- ' . basename( get_page_template() ) . ' -->'; ?> 
		<header id="main-header">
		    <div id="trigger-container" class="show-for-small hide-for-large">
		        <a data-toggle="off-canvas">
		            <span></span>
		            <span></span>
		        </a>
		    </div>
		    
		    <div class="grid-container">
		        <div class="grid-x grid-margin-x">
		            <div class="cell small-12 large-4 text-center large-text-left">
		                <a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-tgc.svg" alt="The Global Collective" class="logo"></a>
		            </div>

		            <div class="cell medium-8 flex-container align-right align-middle hide-for-small-only hide-for-medium-only">
		                <ul class="navigation main flex-container shrink" id="main-navigation">
		                	<?php joints_top_nav(); ?>

		                	<li>
		                		<a href="<?php echo home_url(); ?>/cart">
	    							<i class="fas fa-shopping-cart"></i>

	    							<?php 

	    								$cart_count = WC()->cart->get_cart_contents_count();

	    								if ($cart_count) {
	    									echo '<span class="cart-count">' . $cart_count . '</span>';
	    								}

	    							 ?>
	    						</a>
	    					</li>

	    					<li>
	    						<?php if( wp_get_current_user()->user_login ) { ?>
		    						<a href="/my-account">
		    							<i class="fas fa-user-alt"></i>&nbsp;
		    						</a>

		    						<a href="<?php echo wp_logout_url( home_url() ); ?>">
		    							<i class="fas fa-sign-out-alt"></i>
		    						</a>

		    					<?php } else { ?>
		    						<a href="/my-account">
		    							<i class="fas fa-user-alt"></i>&nbsp;
		    						</a>
		    					<?php } ?>
	    					</li>
		                </ul>
		            </div>
		        </div>
		    </div>
		</header>

	    	<!-- Start off-canvas wrapper -->
	    	<div class="off-canvas-wrapper" data-magellan>
	         	<div class="off-canvas position-right" id="off-canvas" data-off-canvas>
	         		<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
	         	</div>

	          	<!-- Start off canvas content -->
	         	<div class="off-canvas-content" data-off-canvas-content>
		