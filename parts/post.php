<article class="post-item">
	<header>
		<time datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('d.m.Y'); ?></time>
		<h1><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
	</header>
	<div class="post-content">
		<?php echo get_the_post_thumbnail($post->ID,'thumbnail');
		if (!has_excerpt()) {
			echo content(200,$post->ID); 
		} else {
			echo get_the_excerpt($post->ID);
			echo '<a class="more-link" href="'.get_permalink($post->ID).'">Читать далее...</a>';
		} 
		?>
	</div>
</article>