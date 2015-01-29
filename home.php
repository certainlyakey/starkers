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
//this allows to output a default post archive (?post_type=post) without need to use a separate custom template
$news_archive_displayed = false;
if (get_query_var('post_type') === 'post') {
	$news_archive_displayed = true;
	include TEMPLATEPATH . '/index.php';
	//if (get_query_var('post_type') === 'post' && is_home()) {echo 'this is news page and not home page';}
} else {

Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="central-col">

	<?php //or custom home page code
	if ( have_posts() ) while ( have_posts() ) : the_post();
		Starkers_Utilities::get_template_parts( array( 'parts/post' ) );
	endwhile; ?>

</div>

<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); 

}
?>