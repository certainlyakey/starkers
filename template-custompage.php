<?php
/**
 * Template name: Custom template
 */
?>
<?php include(locate_template('parts/html-header.php')); include(locate_template('parts/header.php')); ?>

<div class="c-central-col">
    <?php if ( have_posts() ) while ( have_posts() ) : the_post();
      include(locate_template('parts/post.php'));
    endwhile; ?>

  <?php 
  //custom template code
  ?>
  </article>
</div>
<?php include(locate_template('parts/footer.php')); include(locate_template('parts/html-footer.php')); ?>