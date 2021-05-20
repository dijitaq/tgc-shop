<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
 				<footer id="main-footer">
 					<div class="grid-container">
 						<div class="grid-x grid-margin-x">
 							<div class="cell medium-4 large-3 mb-300 mb-medium-0">
 								<a href="<?php echo home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo-tgc.svg" alt="The Global Collective" class="logo"></a>

 								<p class="info">
 									<i class="fas fa-map-marker-alt"></i>
 									45 Lime Street Sydney<br>NSW Australia
 								</p>

 								<p class="info">
 									<i class="fas fa-envelope"></i>
 									info@theglobalcollective.co
 								</p>

 								<p class="info">
 									<i class="fas fa-phone"></i>
 									+615551234
 								</p>
 							</div>

 							<div class="cell medium-8 large-9">
 								<div class="grid-x grid-margin-x">
 									<div class="cell medium-6 large-4 mb-0 mb-medium-300 mb-medium-0">
 										<p class="text-tgc-red mt-n50 lead">Quick links</p>

 										<ul class="vertical menu">
 											<?php joints_footer_main_nav(); ?>
 										</ul>
 									</div>

 									<div class="cell medium-6 large-4 mb-300 mb-large-0">
 										<p class="text-tgc-red mt-n50 lead hide-for-small-only">Quick links</p>

 										<ul class="secondary vertical menu">
 											<?php joints_footer_secondary_nav(); ?>
 										</ul>
 									</div>

 									<div class="cell medium-12 large-4">
 										<p class="text-tgc-red mt-n50 lead">Newsletter</p>

 										<form class="mb-300">
 											<div class="input-group">
 											  	<input class="input-group-field" type="email" placeholder="Your email">
 											  	
 											  	<div class="input-group-button">
 											   		<input type="submit" class="button tgc-button" value="Subscribe">
 											  	</div>
 											</div>
 										</form>

 										<p class="text-tgc-red mt-n50 lead">Follow us</p>
 									</div>
 								</div>
 							</div>
 						</div>
 					</div>
 				</footer>
			</div>
		    <!-- End off-canvas content -->
		</div>
		<!-- End off-canvas wrapper -->
			
		<?php wp_footer(); ?>
	</body>
</html> 