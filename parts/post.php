<?php 
  $class_prefix = '';
  if (is_singular()) {
    $class_prefix = "c-single-content";
  }
  if (custom_is_archive()) {
    $class_prefix = "c-post-item";
  }
?>
<article class="<?php echo $class_prefix; ?>">
  <header class="<?php echo $class_prefix.'__header'; ?>">
    <time class="<?php echo $class_prefix.'__date'; ?>" datetime="<?php the_time( 'Y-m-d' ); ?>"><?php the_time('d.m.Y'); ?></time>
    <h1 class="<?php echo $class_prefix.'__heading-primary'; ?>"><a href="<?php esc_url( the_permalink() ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
  </header>
  <div class="<?php echo $class_prefix; ?>__post-content<?php
  if (is_singular()) {
    echo " s-textcontent";
  }
  ?>">
    <?php 
    echo get_the_post_thumbnail( $post->ID, 'thumbnail', array('class' => $class_prefix.'__thumbnail'));

    if (!has_excerpt() && !is_singular()) {
      echo content(200,$post->ID); 
    } else if (has_excerpt()) {
      echo get_the_excerpt();
    }
    if (is_singular()) {
      the_content();
    } else {
      echo '<a class="c-more-link" href="'.get_permalink($post->ID).'">Читать далее...</a>';
    }
    ?>
  </div>
<?php 
//do not close article yet if custom page template is shown
if (!get_page_template_slug($post->ID)) { ?>
  </article>
<?php } ?>