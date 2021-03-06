<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Oria
 */
 remove_action( 'wp_head', 'jetpack_og_tags' ); // Remove JetPack Open Graph
 apply_filters( 'jetpack_enable_opengraph', false );
 apply_filters( 'jetpack_open_graph_image_height', 1000000000 );
?><!DOCTYPE html>
<html <?php language_attributes(); ?> <?php echo (is_single() == true ? '' : 'itemscope itemtype="https://schema.org/Blog"'); ?> >
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta content='n_67_dgiTFxsVagGrMYRNoODeZt3vQCZkXrpOQ8SH1o' name='google-site-verification'/>
<meta name='yandex-verification' content='6586ff46a18607a5' />
<link rel="profile" href="https://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') && 1 == 2 ) : ?>
  <!-- TODO: Do we really need this hook 1 == 2 ???? -->
  <link rel='mask-icon' href='https://onceingermany.ru/wp-content/themes/oria/images/favicon.svg' color='braun'>
  <link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<?php include('header_ogp.php');?>
<?php include('header_meta.php');?>

<?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>

<div class="cookie-warning">
  Для того, чтобы этот сайт работал должным образом, мы должны хранить маленькие файлы (называемые Cookies) на вашем компьютере.
  <i class="fa fa-times"></i>
</div>

<?php

if ( ! is_customize_preview() ) :

    $oria_disable_preloader = get_theme_mod( 'oria_disable_preloader' );

    if ( isset( $oria_disable_preloader ) && ($oria_disable_preloader != 1) ) :

        echo '<div class="preloader" style="opacity: 0; display: none;">';
        echo '<div id="preloader-inner">';
        echo '<div class="preload">&nbsp;</div>';
        echo '</div>';
        echo '</div>';

    endif;

endif;

?>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oria' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="top-bar clearfix <?php oria_sidebar_mode(); ?>">
			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation clearfix">
					<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
				</nav>
			<?php endif; ?>

			<div class="header-search-button js-header-search-button">
				<i class="fa fa-search" aria-hidden="true"></i>
			</div>

			<div class="header-search js-header-search">
				<form role="search" method="get" class="header-search-form js-header-search-form" action="https://onceingermany.ru/">
					<input type="search" class="search-field" placeholder="Поиск…" value="" name="s">
				</form>
			</div>

			<?php if ( is_active_sidebar( 'sidebar-1' ) && !is_singular() && is_404() === false ) : ?>
	  			<div class="sidebar-toggle">
	  				<i class="fa fa-bars"></i>
	  			</div>
			<?php endif; ?>
		</div>

		<div class="container">
			<div class="site-branding">
				<?php oria_branding(); ?>
			</div><!-- .site-branding -->
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu clearfix', ) ); ?>
		</nav><!-- #site-navigation -->
		<nav class="mobile-nav">
    <?php if (function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('primary') ) : ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
    <?php endif; ?>
</nav>
	</header><!-- #masthead -->

	<?php if ( ( get_theme_mod('carousel_display_front') && is_front_page() ) || ( get_theme_mod('carousel_display_archives', '1') && ( is_home() || is_archive() ) ) || ( ( get_theme_mod('carousel_display_singular') && is_singular() ) ) ) : ?>
		<?php oria_slider_template(); ?>
	<?php endif; ?>

	<div id="content" class="site-content clearfix">
		<?php if ( is_singular() ) : ?>
		<div class="container content-wrapper">
		<?php endif; ?>
