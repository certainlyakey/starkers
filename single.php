<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on Starkers_Utilities::get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

<article>

	<h1><?php the_title(); ?></h1>
	<time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time>
	<?php the_content(); ?>

</article>
<?php endwhile; ?>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>