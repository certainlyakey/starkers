<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
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

	<?php if ( have_posts() ): ?>

		<h1>Latest Posts</h1>

		<?php while ( have_posts() ) : the_post(); ?>
				<?php Starkers_Utilities::get_template_parts( array( 'parts/post' ) ); ?>
		<?php endwhile; ?>

	<?php else: ?>

		<h1>No posts to display</h1>
	
	<?php endif; ?>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer') ); ?>