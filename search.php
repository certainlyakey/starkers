<?php
/**
 * Search results page
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
<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
<?php while ( have_posts() ) : the_post(); ?>
	<?php Starkers_Utilities::get_template_parts( array( 'parts/post' ) ); ?>
<?php endwhile; ?>
<?php else: ?>
<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
<?php endif; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>