<?php 
/**
 * The template for displaying all single posts and attachments
 */

	get_header( 'shop' );

	$obj = get_queried_object();

?>

	<p><?php print_r( $obj ); ?></p>
			

<?php get_footer(); ?>