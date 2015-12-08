<?php
/**
 * Search results page
 * 
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php include(locate_template('parts/html-header.php')); include(locate_template('parts/header.php')); ?>

<div class="central-col">

	<?php if ( have_posts() ): ?>

		<h1>Search Results for '<?php echo get_search_query(); ?>'</h1>	

		<?php while ( have_posts() ) : the_post(); ?>
			<?php include(locate_template('parts/post.php')); ?>
		<?php endwhile; ?>

	<?php else: ?>

		<h1>No results found for '<?php echo get_search_query(); ?>'</h1>
		
	<?php endif; ?>

</div>

<?php include(locate_template('parts/html-footer.php')); include(locate_template('parts/footer.php')); ?>