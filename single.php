<?php
/**
 * The Template for displaying all single posts (pages do not count)
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="central-col">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		Starkers_Utilities::get_template_parts( array( 'parts/post' ) );
	endwhile; ?>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>