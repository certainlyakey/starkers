<?php
/**
 * Template name: Custom template
 */
?>
<?php Starkers_Utilities::get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div class="central-col">
	<?php if ( have_posts() ) while ( have_posts() ) : the_post();
		Starkers_Utilities::get_template_parts( array( 'parts/post' ) );
	endwhile; ?>

	<?php 
	//custom template code
	?>
	</article>
</div>
<?php Starkers_Utilities::get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>