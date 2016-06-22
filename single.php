<?php
/**
 * The Template for displaying all single posts (pages do not count)
 *
 * @package   WordPress
 * @subpackage  Starkers
 * @since     Starkers 4.0
 */
?>
<?php include(locate_template('parts/html-header.php')); include(locate_template('parts/header.php')); ?>

<div class="c-central-col c-single-post">

  <?php if ( have_posts() ) while ( have_posts() ) : the_post();
    include(locate_template('parts/post.php'));
  endwhile; ?>

</div>

<?php include(locate_template('parts/footer.php')); include(locate_template('parts/html-footer.php')); ?>