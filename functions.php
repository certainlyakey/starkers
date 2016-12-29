<?php
  /**
   * Theme functions
   *
   */

  /* ========================================================================================================================
  
  Required external files
  
  ======================================================================================================================== */


  require_once( 'external/menu.php' );



  /* ========================================================================================================================
  
  Register scripts and CSS
  
  ======================================================================================================================== */


  function projectprefix_script_enqueuer() {
    wp_register_script( 'site', get_template_directory_uri().'/js/scripts.min.js', array( 'jquery3' ), false, true );
    wp_enqueue_script( 'site' );
    
    wp_register_script( 'jquery3', 'https://code.jquery.com/jquery-3.1.1.min.js', array( ), false, true );
    wp_enqueue_script( 'jquery3' );

    wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
    wp_enqueue_style( 'screen' );
  }
  add_action( 'wp_enqueue_scripts', 'projectprefix_script_enqueuer' );



  /* ========================================================================================================================
  
  Theme specific settings - theme support, menus, thumbnails

  ======================================================================================================================== */


  //Add theme support for various features
  add_theme_support('post-thumbnails');
  add_theme_support('menus');
  add_theme_support('widgets');
  add_theme_support( 'html5', array( 'search-form' ) );


  // Create menu locations
  register_nav_menus(
    array(
      'mainmenu' => __('Menu in the header','site_text_domain')
    )
  );


  // Main thumbnail size
  // set_post_thumbnail_size( 80, 80, true );
  //Custom post thumbnail sizes
  // add_image_size( 'miniposter', 96, 130, true ); //(cropped)

  // crop large thumbnail
  if(false === get_option('large_crop')) {
    add_option('large_crop', '1');
  } else {
    update_option('large_crop', '1');
  }


  //Register widget areas
  function projectprefix_widgets_init() {
    register_sidebar( array(
      'name' => __('Footer contacts','site_text_domain')
      ,'id' => 'footer-contacts-widget-area'
    ) );
  }
  add_action( 'widgets_init', 'projectprefix_widgets_init' );



  /* ========================================================================================================================
  
  Actions and filters
  
  ======================================================================================================================== */


  add_filter( 'body_class', array( 'projectprefix_add_slug_to_body_class' ) );
  function projectprefix_add_slug_to_body_class( $classes ) {
    global $post;

    if( is_singular() ) {
      $classes[] = sanitize_html_class( $post->post_name );
    };

    return $classes;
  }


  // Prepend to body classes prefix `p-`
  add_filter( 'body_class', 'projectprefix_add_namespaced_body_classes' );
  function projectprefix_add_namespaced_body_classes( $classes ) {

    if (is_array($classes)) {

      foreach ($classes as $k => $v) {
        $classes[$k] = 'p-'.$v;
      }

    }

    return $classes;
  }



  /* ========================================================================================================================
  
  Admin changes
  
  ======================================================================================================================== */


  //Remove comments from admin
  function projectprefix_remove_menus(){
    remove_menu_page( 'edit-comments.php' );//Comments
  }
  add_action( 'admin_menu', 'projectprefix_remove_menus' );



  /* ========================================================================================================================
  
  Custom functions
  
  ======================================================================================================================== */


  function projectprefix_is_post_listing() {
  return (is_archive() || is_search());} // || is_page_template('template-custompage.php')


  //Custom content function with words manual limit
  function projectprefix_content($limit, $postid, $readmorelink = true, $readmore_class = 'c-readmore', $allowshortcodes = true) { 
  //Normally, the second parameter provided is '$post->ID'

    $content = explode(' ', get_post_field('post_content', $postid), $limit);
    
    if (count($content) >= $limit) {

      array_pop($content);
      $content = implode(' ',$content);
      if ($allowshortcodes === false) {
        $content = preg_replace('/\[.+\]/','', $content);
      }
      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
      $content = strip_tags($content,'<br />');
      $content .= '&hellip;';
      if ( $readmorelink ) {
        $content .= ' <a class="'.$readmore_class.'" href="'. get_permalink( $postid ) . '">Читать далее...</a>';
      }

    } else {
      $content = implode(" ",$content);

      if ($allowshortcodes === false) {
        $content = preg_replace('/\[.+\]/','', $content);
      }

      $content = apply_filters('the_content', $content);
      $content = str_replace(']]>', ']]&gt;', $content);
    }

    return $content;
  }



  //Add custom body classes to the chosen templates. 
  //Usage: add_filter('body_class','add_bodyclass_customarchive'); in the template code
  function projectprefix_add_bodyclass_newsarchive($classes = '') {
    $classes[] = 'news';
    return $classes;
  }



  /* ========================================================================================================================
  
  Register additional custom post types and taxonomies
  
  ======================================================================================================================== */

  //



  /* ========================================================================================================================
  
  Customized functions (walkers etc.)
  
  ======================================================================================================================== */

  //


