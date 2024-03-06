<nav id="mobile-nav">

    <img src="<?php echo get_stylesheet_directory_uri(); ?>/dist/images/close-icon.svg" alt="close icon" id="nav-close">

    <div class="mobile-site-branding">

        <a class="site-logo" href="<?php echo get_home_url(); ?>">

            <?php echo wp_get_attachment_image( $custom_logo_id ) ? wp_get_attachment_image( $custom_logo_id ) : '<span class="text-white font-300">' . get_bloginfo( 'name' ) . '</span>'; ?>

        </a>

    </div>

    <?php
        wp_nav_menu( array (
            'theme_location' => 'mobile_nav',
            'menu_id'        => 'mobile-menu'
        ));
    ?>

</nav>