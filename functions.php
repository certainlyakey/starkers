<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );



	/* ========================================================================================================================
	
	Register scripts and CSS
	
	======================================================================================================================== */

	function starkers_script_enqueuer() {
		wp_register_script( 'site', get_template_directory_uri().'/js/scripts.min.js', array( 'jquery' ) );
		wp_enqueue_script( 'site' );

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

	//Register widget areas
	function widgets_init_now() {
		register_sidebar( array(
			'name' => 'Правая колонка'
			,'id' => 'aside-right'
		) );
	}
	add_action( 'widgets_init', 'widgets_init_now' );


	/* ========================================================================================================================
	
	Reusable functions
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'starkers_script_enqueuer' );


	add_filter( 'body_class', array( 'Starkers_Utilities', 'add_slug_to_body_class' ) );


	add_filter('show_admin_bar', '__return_false');


	//makes all classes in custom menu dissappear, except noted
	add_filter('nav_menu_css_class', 'css_attributes_filter', 100, 1); 
	add_filter('nav_menu_item_id', 'css_attributes_filter', 100, 1);
	function css_attributes_filter($var) {
		return is_array($var) ? array_intersect($var, array('current-menu-item','current_page_item','current-page-ancestor','current-menu-ancestor','current-menu-parent')) : '';
	}


	//Custom content function with words manual limit
	function content($limit, $postid, $showmorelink = true, $allowshortcodes = true) {
		$result = '';
		$content_full = get_post_field('post_content', $postid);
		if ($allowshortcodes === false) {
			$content_full = preg_replace('/\[.+\]/','', $content_full);
		}
		$content_full = apply_filters('the_content', $content_full);
		$content_full = str_replace(']]>', ']]&gt;', $content_full);
		$totalWordsAsArray = explode(' ', $content_full, $limit);
		if (count($totalWordsAsArray)>=$limit) {
			$imploded = implode(" ",$totalWordsAsArray);
			$result .= strip_tags($imploded,'<br />');
			$result .= '&hellip;';
			if ($showmorelink) {$result .= ' <a class="more-link" href="'. get_permalink($postid) . '">Читать далее...</a>';}
		} else {
			$result .= $content_full;
		}
		return $result;
	}



	/* ========================================================================================================================
	
	Register additional custom post types and taxonomies
	
	======================================================================================================================== */




	/* ========================================================================================================================
	
	Customized functions
	
	======================================================================================================================== */



