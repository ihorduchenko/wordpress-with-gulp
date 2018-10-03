<?php
/**
 * The header for our theme
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 * @package Frontend Portfolio
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> dir="ltr">
<head>
  <meta charset="utf-8">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="IjJfGuhMiGpDKegf83vREOsjLAcddn3rnGcMsBcwMlM"/>
  <meta name="author" content="<?php echo get_bloginfo( 'name' ); ?>"/>
  <meta name="keywords" content="<?php the_field( 'keywords', 'option' ) ?>">
  <meta name="apple-mobile-web-app-capable" content="yes">

  <meta name="twitter:card" value="summary">
  <meta property="og:title" content="<?php echo get_bloginfo( 'name' ); ?>">
  <meta property="og:type" content="article"/>
  <meta property="og:url" content="<?php echo get_home_url(); ?>">
  <meta property="og:image" content="<?php the_field( 'media_sharing_image', 'option' ); ?>">
  <meta property="og:description" content="<?php echo get_bloginfo( 'description' ); ?>">

  <link rel="shortcut icon" href="<?php the_field( 'favicon', 'option' ); ?>" type="image/x-icon">

  <link rel="apple-touch-icon" sizes="60x60" href="<?php the_field( 'apple_touch_icon', 'option' ); ?>"
        type="image/x-icon">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php the_field( 'apple_touch_icon', 'option' ); ?>">

	<?php wp_head(); ?>

	<?php the_field( 'google_analytics_code', 'option' ); ?>
</head>

<body <?php body_class(); ?>>
<?php if (is_page('cases')) { $header_container = "container-fluid"; } else { $header_container="container"; } ?>

<div id="preloder"
     style="position: fixed; width: 100%; height: 100%; top: 0; left: 0; z-index: 999999; background: #fff;">
  <div class="loader"
       style="width: 50px; height: 50px; position: absolute; left: 50%; top: 50%; margin: -25px 0 0 -25px; ">
		<?php the_field( 'preloader_animation', 'option' ); ?>
  </div>
</div>

<header class="site-header navbar navbar-light navbar-expand-sm">
  <div class="<?php echo $header_container; ?> position-relative">
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
      <img height="48" src="<?php the_field( 'logo_big', 'option' ); ?>"
           alt="<?php echo get_bloginfo( 'name' ); ?> Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <nav class="collapse navbar-collapse justify-content-sm-end" id="navbarNav">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'main',
					'container'      => false,
					'echo'           => true,
					'menu_class'     => 'navbar-nav',
					'walker'         => new wp_bootstrap_navwalker()
				)
			); ?>
    </nav>
  </div>
</header>
<main class="site-content">