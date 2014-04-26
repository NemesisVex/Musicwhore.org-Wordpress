<!DOCTYPE html>
<html>
	<head>
		<title><?php bloginfo( 'name' ); ?> <?php wp_title(); ?></title>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="alternate" type="application/rss+xml" title="Musicwhore.org RSS" href="<?php bloginfo( 'siteurl' ); ?>/feed/" />
		<link rel="icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
		<link rel="shortcut icon" href="<?php bloginfo('stylesheet_directory'); ?>/favicon.ico" type="image/x-icon" />
		<link rel="stylesheet" href="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/css/blueprint/screen.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/css/blueprint/print.css" type="text/css" media="print" />
		<!--[if lt IE 8]><link rel="stylesheet" href="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/css/blueprint/ie.css" type="text/css" media="screen, projection" /><![endif]-->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/typography.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/layout.css" type="text/css" media="screen, projection" />
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/mobile.css" type="text/css" media="screen and (max-width: 600px)" />
		<script type="text/javascript" src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
		<script type="text/javascript" src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script type="text/javascript" src="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/js/modernizr-1.6.min.js"></script>
		<!--[if lt IE 9]><script type="text/javascript" src="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/js/html5.js"></script><![endif]-->
	<?php
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		wp_head();
	?>
	</head>
	<body>
		<div id="container">
			<div id="masthead">
				<header id="masthead-title">
					<hgroup>
						<h1 id="title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<h2 id="subtitle"><?php bloginfo( 'description' ); ?></h2>
					</hgroup>
				</header>

			</div>

			<div id="main-nav">
				<nav id="social-list">
					<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
					<ul class="nav-icon-list">
						<li><a href="https://www.facebook.com/pages/Musicwhoreorg/109288145780351" title="[Musicwhore.org Official Facebook Page]"><img src="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/images/icons/facebook.png"/></a></li>
						<li><a href="http://www.twitter.com/#!/MusicwhoreOrg/" title="[Twitter]"><img src="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/images/icons/twitter.png"/></a></li>
						<li><a href="http://www.last.fm/user/NemesisVex/" title="[Last.fm]"><img src="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/images/icons/lastfm.png"/></a></li>
						<li><a href="<?php bloginfo( 'siteurl' ); ?>/feed/" title="[Musicwhore.org Feed]"><img src="<?php echo VIGILANTMEDIA_CDN_BASE_URI; ?>/web/images/icons/feed.png"/></a></li>
					</ul>
				</nav>

				<nav id="search-box">
					<?php get_search_form(); ?>
				</nav>
			</div>

			<div id="content">