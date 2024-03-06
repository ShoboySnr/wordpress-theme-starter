
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
	<div class="search-form-flex">
        <label>
            <span class="screen-reader-text"><?php _x( 'Search for:', 'label' )?></span>
            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Enter keyword', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
            <input type="hidden" name="post_type" value="post" />
        </label>
        <button type="submit" class="theme-button">Search</button>
    </div>
</form>