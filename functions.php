<?php
  /**
   * Starkers functions and definitions
   *
   * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
   *
   * @package   WordPress
   * @subpackage  Starkers
   * @since     Starkers 4.0
   */

  /* ========================================================================================================================
  
  Required external files
  
  ======================================================================================================================== */

  require_once( 'external/starkers-utilities.php' );



  /* ========================================================================================================================
  
  Register scripts and CSS
  
  ======================================================================================================================== */

  function starkers_script_enqueuer() {
    wp_register_script( 'site', get_template_directory_uri().'/js/scripts.min.js', array( 'jquery3' ), false, true );
    wp_enqueue_script( 'site' );
    
    wp_register_script( 'jquery3', 'https://code.jquery.com/jquery-3.1.1.min.js', array( 'jquery3' ), false, true );
    wp_enqueue_script( 'jquery3' );

    wp_register_style( 'screen', get_stylesheet_directory_uri().'/style.css', '', '', 'screen' );
    wp_enqueue_style( 'screen' );
  } 



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
      'mainmenu' => 'Menu in the header'
      // ,'footermenu' => 'Menu in the footer'
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
  function widgets_init_now() {
    register_sidebar( array(
      'name' => 'Правая колонка'
      ,'id' => 'aside-right'
    ) );
  }
  add_action( 'widgets_init', 'widgets_init_now' );



  /* ========================================================================================================================
  
  Actions and filters
  
  ======================================================================================================================== */

  add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );


  add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


  // Prepend to body classes prefix `p-`
  add_filter( 'body_class', 'add_namespaced_body_classes' );
  function add_namespaced_body_classes( $classes ) {
    foreach ($classes as $k => $v) {
      $classes[$k] = 'p-'.$v;
    }
    return $classes;
  }


  //makes all classes in custom menu dissappear, except noted
  function css_attributes_filter($var) {
    return is_array($var) ? array_intersect($var, array('current-menu-item','current_page_item','current-page-ancestor','current-menu-ancestor','current-menu-parent')) : '';
  }
  add_filter('nav_menu_css_class', 'css_attributes_filter', 100, 1); 
  add_filter('nav_menu_item_id', 'css_attributes_filter', 100, 1);



  /* ========================================================================================================================
  
  Admin changes
  
  ======================================================================================================================== */

  //Remove comments from admin
  function remove_menus(){
    remove_menu_page( 'edit-comments.php' );//Comments
  }
  add_action( 'admin_menu', 'remove_menus' );



  /* ========================================================================================================================
  
  Reusable functions
  
  ======================================================================================================================== */

  function custom_is_archive() {return (is_archive() || is_search());} // || is_page_template('template-custompage.php')


  //Custom content function with words manual limit
  function content($limit, $postid, $showmorelink = true, $allowshortcodes = true) { //Normally, the second parameter provided is '$post->ID'
      $content = explode(' ', get_post_field('post_content', $postid), $limit);
      if (count($content)>=$limit) {
        array_pop($content);
        $content = implode(" ",$content);
        if ($allowshortcodes === false) {
        $content = preg_replace('/\[.+\]/','', $content);
        }
        $content = apply_filters('the_content', $content);
          $content = str_replace(']]>', ']]&gt;', $content);
        $content = strip_tags($content,'<br />');
        $content .= '&hellip;';
        if ($showmorelink) {$content .= ' <a class="c-more-link" href="'. get_permalink($postid) . '">Читать далее...</a>';}
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


  //Произвольная конвертация русских дат (например, в метах)
  function dateToRussian($date) {
    $month = array("january"=>"января", "february"=>"февраля", "march"=>"марта", "april"=>"апреля", "may"=>"мая", "june"=>"июня", "july"=>"июля", "august"=>"августа", "september"=>"сентября", "october"=>"октября", "november"=>"ноября", "december"=>"декабря");
    $days = array("monday"=>"Понедельник", "tuesday"=>"Вторник", "wednesday"=>"Среда", "thursday"=>"Четверг", "friday"=>"Пятница", "saturday"=>"Суббота", "sunday"=>"Воскресенье");
    return str_replace(array_merge(array_keys($month), array_keys($days)), array_merge($month, $days), strtolower($date));
  }

  //Add custom body classes to the chosen templates. 
  //Usage: add_filter('body_class','add_bodyclass_customarchive'); in the template code
  function add_bodyclass_newsarchive($classes = '') {
    $classes[] = 'news';
    return $classes;
  }

  //Get first paragraph
  function get_first_paragraph(){
    global $post;
    $str = wpautop( get_the_content() );
    $str = apply_filters('the_content', $str);
    preg_match('#<p>(.*?)</p>#i', $str, $matches);
    if (!empty($matches)) {
      $str = $matches[0];
      $str = strip_tags($str, '<a><strong><em>');
      return '<p>' . $str . '</p>';
    } else {
      return false;
    }
  }



  /* ========================================================================================================================
  
  Register additional custom post types and taxonomies
  
  ======================================================================================================================== */

  //



  /* ========================================================================================================================
  
  Customized functions (walkers etc.)
  
  ======================================================================================================================== */

  //


