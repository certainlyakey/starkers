<?php
/**
 * The Template for displaying all single posts (pages do not count)
 *
 * @package   WordPress
 * @subpackage  Starkers
 * @since     Starkers 4.0
 */
//this allows to output a default post archive (?post_type=post) without need to use a separate custom template
$news_archive_displayed = false;
if (get_query_var('post_type') === 'post') {
  add_filter('body_class','projectprefix_add_bodyclass_newsarchive');
  include get_stylesheet_directory() . '/index.php';
  //if (get_query_var('post_type') === 'post' && is_home()) {echo 'this is news page and not home page';}
} else { ?>

<?php include(locate_template('parts/html-header.php')); include(locate_template('parts/header.php')); ?>

<div class="c-central-col">

  <?php //or custom home page code
  if ( have_posts() ) while ( have_posts() ) : the_post();
    include(locate_template('parts/post.php'));
  endwhile; ?>

</div>

<?php include(locate_template('parts/footer.php')); include(locate_template('parts/html-footer.php')); ?>

<?php } ?>