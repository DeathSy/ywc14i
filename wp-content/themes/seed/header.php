<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package seed
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<?php $bodyClass = ''; if (is_active_sidebar( 'headbar' )) { $bodyClass = 'has-headbar'; } ?>

<body <?php body_class($bodyClass); ?>>
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'seed' ); ?></a>
	<div id="page" class="site -layout-<?php echo SEED_LAYOUT; ?> -header-<?php echo SEED_HEADER; ?> -menu-<?php echo SEED_MENU; ?> -shop-layout-<?php echo SEED_SHOP_LAYOUT; ?>">
		
		<nav id="site-mobile-navigation" class="site-mobile-navigation sb-slidebar sb-right _heading" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'mobile', 'menu_id' => 'mobile-menu' ) ); ?>
			<div class="mobile-widget"><?php dynamic_sidebar( 'top-right' ); ?></div>
		</nav><!--main-navigation-->
		
		<header id="masthead" class="site-header sb-slide _heading " role="banner">
			<div class="container">
				
				<div class="site-branding">
					<div class="site-logo"><?php if(function_exists('the_custom_logo')) {the_custom_logo();} ?></div>
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif; ?>

					<?php 
					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
					<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p><?php endif; ?>
				</div><!--site-branding-->

				<a class="site-toggle sb-toggle-right _mobile"><i class="si-menu"></i> <?php esc_html_e( 'Menu', 'seed' ); ?></a>

				<?php if ($bodyClass == 'has-headbar'): ?>
					<div id="headbar" class="_desktop"><?php dynamic_sidebar( 'headbar' ); ?></div>
				<?php else: ?>
					<div class="site-top-right _desktop"><?php dynamic_sidebar( 'top-right' ); ?></div>
					<nav id="site-desktop-navigation" class="site-desktop-navigation _desktop" role="navigation">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
					</nav><!--main-navigation-->
				<?php endif; ?>
				
			</div><!--container-->
		</header><!--site-header-->

		<div id="sb-site" class="site-canvas">
			<div class="site-header-space"></div>
			<div id="content" class="site-content">
