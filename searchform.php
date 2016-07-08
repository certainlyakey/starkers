<form role="search" method="get" class="c-search-form" action="<?php echo home_url( '/' ); ?>">
  <label>
    <span class="u-screenreader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
    <input type="search" class="c-search-form__input"
      placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
      value="<?php echo get_search_query() ?>" name="s"
      title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
  </label>
  <input type="submit" class="c-search-form__submit" value="<?php echo esc_attr_x( 'OK', 'submit button' ) ?>" />
</form>