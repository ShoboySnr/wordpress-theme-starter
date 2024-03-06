<?php
/**
 *
 * This is the template that displays all of the <head> section and everything up until <main id="content">
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700&display=swap" rel="stylesheet">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>><?php wp_body_open(); ?>

	<?php 
    $custom_logo_id = get_theme_mod( 'custom_logo' );
	include( locate_template( 'template-parts/components/mobile-navigation.php' ) );
	?>

	<header id="masthead" class="site-header">

		<div class="header-inner">

			<a class="site-logo" href="<?php echo get_home_url(); ?>">
				<?php echo wp_get_attachment_image( $custom_logo_id ) ? wp_get_attachment_image( $custom_logo_id ) : '<span class="text-white font-300">' . get_bloginfo( 'name' ) . '</span>'; ?>
			</a>

			<nav id="site-navigation">
				<?php wp_nav_menu( array(
					'theme_location' => 'primary_nav',
					'menu_id'        => 'primary-menu',
					'container'      => false
                )); ?>
				<div class="menu-icon">
				    <div class="x1"></div>
					<div class="x2"></div>
					<div class="x3"></div>
				</div>
			</nav>

		</div>
		
	</header>

	<main id="content" class="site-content margin-for-header">