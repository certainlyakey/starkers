<?php
/**
 * The template used to display Tag Archive pages
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<?php if ( have_posts() ): ?>
<h2>Tag Archive: <?php echo single_tag_title( '', false ); ?></h2>
<?php while ( have_posts() ) : the_post(); ?>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/post' ) ); ?>
<?php endwhile; ?>
<?php else: ?>
<h2>No posts to display in <?php echo single_tag_title( '', false ); ?></h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>