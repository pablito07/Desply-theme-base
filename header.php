<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset') ?>" />
	<?php if(is_search()):?>
		<meta name="robots" content="noindex, nofollw" />
	<?php endif; ?>
	<title>
		<?php
		//echo bloginfo('name');
		//echo wp_title();
		if(is_archive()) {
			echo ucfirst(trim(wp_title('', false))) . ' - ';
		} else
		if(!(is_404()) && (is_single()) || (is_page())) {
			$title = wp_title('', false);
			if(!empty($title)) {
				echo $title . ' - ';
			}
		} else
		if(is_404()) {echo 'Nie znaleziono strony';	}
		if(is_home()) {
			bloginfo('name');
			echo ' - ';
			bloginfo('description');
		} else {echo bloginfo('name');}
		global $paged;
		if($paged > 1) {echo ' - strona ' . $paged;}
		?>
	</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/screen.css?ver=1">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/fonts/fonts.css">
	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/myscript.js"></script>
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" >
	<?php wp_head() ?>
</head>
<body <?php body_class()?>>
<div class="container">
	<header id="header">
		<h1><a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/logo.png"/></a></h1>
		<nav id="main-nav">
			<?php wp_nav_menu(array('theme_location' => 'header-menu', 'container' => 'nav'));?>
		</nav>
	</header>