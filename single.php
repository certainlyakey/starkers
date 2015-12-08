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
<?php include(locate_template('parts/html-header.php')); include(locate_template('parts/header.php')); ?>

<div class="central-col">

	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		include(locate_template('parts/post.php'));
	endwhile; ?>

</div>

<?php include(locate_template('parts/html-footer.php')); include(locate_template('parts/footer.php')); ?>