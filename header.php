<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>

	<title><?php bloginfo('title'); wp_title(); ?></title>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="description" content="<?php bloginfo('description'); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">

	<?php if( is_singular() && pings_open( get_queried_object() )): ?>
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">	
	<?php endif; ?>

	<?php wp_head(); ?>
</head>

<body>

	<header class="site-header">
		<h1 class="logo"><?php bloginfo('title'); ?></h1>
				
			<div class="mobile-nav-toggle">
			    <span></span>
			 </div>

	</header>
			<nav class="mobile-navigation">
				<?php wp_nav_menu(); ?>
			</nav>

	<!-- Navigation (Primary Menu) -->
	<nav class="desktop-nav">
		<?php wp_nav_menu(); ?>
		<div class="search-form-container">
			<?php get_search_form(); ?>
		</div>
	</nav>


		<!--Left Fixed Banners -->
	<aside class="left-add">
		<img src="<?php echo get_template_directory_uri().'/img/side-adds.png' ?>">
	</aside>
	


