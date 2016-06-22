<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package   WordPress
 * @subpackage  Starkers
 * @since     Starkers 4.0
 */
?>
<?php include(locate_template('parts/html-header.php')); include(locate_template('parts/header.php')); ?>

<div class="c-central-col">
  
  <article class="c-single-content">
    <header class="c-single-content__header">
      <h1 class="c-single-content__heading-primary">Page 404</h1>
    </header>
    <div class="c-single-content__post-content s-textcontent">
    <p>Sorry, page not found</p>
    </div>
  </article>

</div>

<?php include(locate_template('parts/footer.php')); include(locate_template('parts/html-footer.php')); ?>