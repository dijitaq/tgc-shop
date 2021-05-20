<?php 
/**
 Template Name: Contact Us
 *
 * 
 */

get_header( 'generic' ); ?>

<header class="page-header generic background-tgc-salmon mb-962 ">
	<div class="grid-container">
		<div class="grid-x align-center">
			<div class="cell small-12 medium-shrink position-relative">
				<div class="box flex-container align-center align-middle position-relative">
					<h1 class="text-white">Contact Us</h1>
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
	<div class="grid-container mb-950">
		<div class="grid-x grid-margin-x align-center">
			<form id="contact-form" class="cell medium-6" novalidate="true">
				<div class="grid-x grid-margin-x align-center">
					<div class="cell text-center">
						<div class="callout success hide" id="email-status">
							<p></p>
						</div>
					</div>
				</div>

              	<div class="grid-x grid-margin-x">
					<div class="cell small-12 medium-auto">
						<label for="name">Name<sup>*</sup></label>

						<input id="name" type="text" name="name" required>
					</div>
				</div>

				<div class="grid-x grid-margin-x">
					<div class="cell small-12 medium-auto">
						<label for="company">Company<sup>*</sup></label>

						<input id="company" type="text" name="company" required>
					</div>

					<div class="cell small-12 medium-auto">
						<label for="business-type">Business Type<sup>*</sup></label>

						<select id="business-type" class="form-control" name="business_type" required>
							<option selected disabled>Select your company's business type</option>
							<option value="brand">Brand</option>
							<option value="servicer_provider">Service Provider</option>
							<option value="retailer">Retailer</option>
							<option value="buyer">Buyer</option>
						</select>
					</div>
				</div>

				<div class="grid-x grid-margin-x">
					<div class="cell small-12 medium-auto">
						<label for="email">Email<sup>*</sup></label>

						<input id="email" class="form-control" type="email" name="email" required>
					</div>

					<div class="cell small-12 medium-auto">
						<label for="telephone">Telephone</label>

						<input id="telephone" class="form-control" type="text" name="telephone" required>
					</div>
				</div>

				<div class="grid-x grid-margin-x">
					<div class="cell small-12 medium-auto">
						<label for="message">Message<sup>*</sup></label>

						<textarea id="message" class="form-control" name="message" rows="5" required></textarea>
					</div>
				</div>

				<div class="grid-x grid-margin-x">
					<div class="cell auto">
						<p><small><sup>*</sup> Required fields</small></p>
						<input type="hidden" name="action" value="agency3_send_email">
						<button type="submit" class="button tgc-button" id="submit">Submit</button>
					</div>
				</div>
			</form>

			<div class="cell medium-6 flex-container">
				<div id="gmap"></div>
			</div>
		</div>
	</div>
</section>

<div class="reveal small" id="email-response-reveal" data-reveal>
     <button class="close-button" data-close aria-label="Close modal" type="button">
          <i class="fas fa-times"></i>
     </button>

     <div class="container"></div>
</div>

<?php get_footer(); ?>