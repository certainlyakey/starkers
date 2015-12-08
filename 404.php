<?php
/**
 * The template for displaying 404 pages (Not Found)
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
	
	<article class="single-content">
		<header>
			<h1>Page 404</h1>
		</header>
		<div class="post-content">
		<p>Sorry, page not found</p>
		</div>
	</article>

</div>

<?php include(locate_template('parts/html-footer.php')); include(locate_template('parts/footer.php')); ?>