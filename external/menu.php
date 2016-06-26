<?php
// usage: 
// custom_wp_nav_menu('frontmenu','c-assortedmenu','nav','frontmenu_thumb');
// or:
// custom_wp_nav_menu('frontmenu','c-assortedmenu','');
function custom_wp_nav_menu($menu_location, $menu_class_base, $container = 'nav', $image_size = null, $additional_classes = '') {
  if ($container === 'section') {
    echo '<section class="'.$menu_class_base.'__section">';
    $locations = get_nav_menu_locations();
    $menu_obj = wp_get_nav_menu_object($locations[$menu_location]);
    echo '<h1 class="c-section-heading '.$menu_class_base.'__section-heading">'.$menu_obj->name.'</h1>';
  }

  wp_nav_menu(
    array(
      'walker' => new CommonMenu_Walker(
        array(
          'container_class' => $menu_class_base, 
          'image_size' => $image_size 
        )
      ), 
      'container' => $container, 
      'container_class' => $menu_class_base.' '.$additional_classes,
      'items_wrap' => '<ul'.(($container === '') ? ' class="'.$menu_class_base.' '.$additional_classes.'"' : '').'>%3$s</ul>',
      'theme_location' => $menu_location 
    )
  );

  if ($container === 'section') {
    echo '</section>';
  }
}

// Common menu markup
class CommonMenu_Walker extends Walker_Nav_Menu {
  var $arguments;
  public function __construct($arguments) {
    $this->container_class = $arguments['container_class'];
    $this->image_size = $arguments['image_size'];
  }

  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // Passed classes.
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $classes = array_filter($classes, function($var) {
      $substring = 'menu-item';
      $does_contain = substr($var,0,strlen($substring)) === $substring;
      return(!$does_contain);
    });

    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    $bgimage = array();
    if ($this->image_size) {
      $attachment_id = get_post_thumbnail_id( $item->object_id );
      if ($attachment_id) {
        $bgimage = wp_get_attachment_image_src( $attachment_id, $this->image_size );
      }
    }

    // Build HTML.
    $output .= $indent . '<li class="'. $this->container_class . '__item ' . $class_names . '">';

    // Link attributes.
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= $bgimage ? ' style="background-image:url(' . $bgimage[0] . ');"' : '';

    // Build HTML output and pass through the proper filter.
    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
      $args->before,
      $attributes,
      $args->link_before,
      apply_filters( 'the_title', $item->title, $item->ID ),
      $args->link_after,
      $args->after
    );
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }

  function end_el( &$output, $item, $depth = 0, $args = array() ) {
    $output .= '';
  }

  function start_lvl( &$output, $depth = 0, $args = array() ) {
      $output .= '<ul class="'.$this->container_class.'__submenu">';
  }
}