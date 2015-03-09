<article class="<?php 
	if (is_singular()) {
		echo " single-content";
	}
	if (custom_is_archive()) {
		echo " post-item";
	}
	?>">
	<header>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('d.m.Y'); ?></time>
		<h1><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>
	<div class="post-content">
		<?php 
		echo get_the_post_thumbnail($post->ID,'thumbnail');

		if (!has_excerpt() && !is_singular()) {
			echo content(200,$post->ID); 
		} else if (has_excerpt()) {
			echo get_the_excerpt($post->ID);
		}
		if (is_singular()) {
			the_content();
		} else {
			echo '<a class="more-link" href="'.get_permalink($post->ID).'">Читать далее...</a>';
		}
		?>
	</div>
<?php 
//do not close article yet if custom page template is shown
if (!get_page_template_slug($post->ID)) { ?>
	</article>
<?php } ?>