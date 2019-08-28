<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	
	<meta name="description" content="<?php bloginfo('description'); ?>" />
	<meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1, user-scalable=no" />
	<!-- favicons -->
	<?php if (get_theme_mod( 'futura_favicon')) : ?>
		<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('futura_favicon')); ?>">
	<?php else : ?>
		<link rel="shortcut icon" href="<?php print THEMEROOT ?>/favicon.ico">
	<?php endif; ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	
	<?php wp_head() ?>
</head>
<body <?php body_class(); ?>>
	<!-- start header -->
	<header class="main-header">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<!-- start logo -->
					<?php if (get_theme_mod( 'futura_logo')) : ?>
						<a class="branding" href="<?php echo home_url(); ?>"><img src="<?php echo esc_url(get_theme_mod('futura_logo')); ?>" alt="<?php bloginfo('name'); ?>"></a>
					<?php else : ?>
						<a class="branding" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
					<?php endif; ?>
					<!-- end logo -->
				</div>
			</div>
		</div>
	</header>
	<!-- end header -->
	<!-- start navigation -->
	<nav class="main-navigation">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="navbar-header">
						<span class="nav-toggle-button collapsed" data-toggle="collapse" data-target="#main-menu">
						<span class="sr-only">Toggle navigation</span>
						<i class="fa fa-bars"></i>
						</span>
					</div>
					<div class="collapse navbar-collapse" id="main-menu">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'main-menu',
						'container' => '',
						'menu_class' => 'menu'
					));
					?>
					</div>
				</div>
			</div>
		</div>
	</nav>
	<!-- end navigation -->