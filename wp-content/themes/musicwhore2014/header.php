<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Musicwhore2014
 * @since Musicwhore2014 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
	<link href='http://fonts.googleapis.com/css?family=Merriweather&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Merriweather+Sans&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/typography.css">
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site container">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<div class="hidden-xs">
				<h1 class="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
					<?php

						$description = get_bloginfo( 'description', 'display' );
						if ( ! empty ( $description ) ) :
					?>
						<small class="site-description"><?php echo esc_html( $description ); ?></small>
					<?php endif; ?>
				</h1>
			</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation navbar navbar-default" role="navigation">
				<div class="container-fluid">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-nav"><?php /*_e( 'Primary Menu', 'musicwhore2014' );*/ ?>
							<a class="screen-reader-text skip-link sr-only" href="#content"><?php _e( 'Skip to content', 'musicwhore2014' ); ?></a>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="visible-xs">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="navbar-brand"><?php bloginfo( 'name' ); ?></a>
						</div>
					</div>
					<div class="collapse navbar-collapse" id="bs-nav">
						<?php wp_nav_menu( array( 'theme_location' => 'primary', 'fallback_cb' => 'musicwhore2014_page_menu' ) ); ?>
						<?php get_search_form(); ?>
						<ul class="nav navbar-nav">
							<li><a href="http://twitter.com/MusicwhoreOrg/" title="[Twitter]"><img src="http://vigilante.vigilantmedia.com/images/icons/twitter.png" alt="[Twitter]" /></a></li>
							<li><a href="https://www.facebook.com/pages/Musicwhoreorg/109288145780351" title="[Facebook]"><img src="http://vigilante.vigilantmedia.com/images/icons/facebook.png" alt="[Facebook]" /></a></li>
							<li><a href="http://last.fm/user/NemesisVex/" title="[Last.fm]"><img src="http://vigilante.vigilantmedia.com/images/icons/lastfm.png" alt="[Last.fm]" /></a></li>
							<li><a href="/feed/" title="[Feed]"><img src="http://vigilante.vigilantmedia.com/images/icons/feed.png" alt="[Feed]" /></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</div>

		<div class="search-box">
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
