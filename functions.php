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


	//makes all classes in custom menu dissappear, except noted
	add_filter('nav_menu_css_class', 'css_attributes_filter', 100, 1); 
	add_filter('nav_menu_item_id', 'css_attributes_filter', 100, 1);
	function css_attributes_filter($var) {
		return is_array($var) ? array_intersect($var, array('current-menu-item','current_page_item','current-page-ancestor','current-menu-ancestor','current-menu-parent')) : '';
	}


	//Custom content function with words manual limit
	function content($limit, $postid, $showmorelink = 'Читать далее...') { //Normally, the second parameter provided is '$post->ID'
		$content = explode(' ', get_post_field('post_content', $postid), $limit);
		if (count($content)>=$limit) {
			array_pop($content);
			$content = implode(" ",$content);
			$content = preg_replace('/\[.+\]/','', $content);
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
			$content = strip_tags($content,'<br />');
			$content .= '&hellip;';
			if ($showmorelink) {$content .= ' <a class="more-link" href="'. get_permalink($postid) . '">'.$showmorelink.'</a>';}
		} else {
			$content = implode(" ",$content);
			$content = preg_replace('/\[.+\]/','', $content);
			$content = apply_filters('the_content', $content);
			$content = str_replace(']]>', ']]&gt;', $content);
		}
		return $content;
	}



	/* ========================================================================================================================
	
	Register additional custom post types and taxonomies
	
	======================================================================================================================== */




	/* ========================================================================================================================
	
	Customized functions
	
	======================================================================================================================== */



