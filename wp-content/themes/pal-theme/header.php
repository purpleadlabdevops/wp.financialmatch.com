<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="keywords" content="<?php bloginfo('keywords'); ?>"/>
		<meta name="description" content="<?php bloginfo('description'); ?>"/>
		<meta name="copyright" content="<?php bloginfo('copyright'); ?>">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		<meta name="viewport" content="width=device-width, user-scalable=no, user-scalable=0, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0 user-scalable=0">
		<meta name="author" content="MaxGloba">
		<meta name="theme-color" content="#000">

		<title><?php wp_title( '|', true, 'right' ); echo get_bloginfo('name'); ?></title>

		<link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" />

		<meta name="format-detection" content="telephone=no">
		<meta name="robots" content="nofollow" />
		<script>
			let vh = window.innerHeight * 0.01;
			document.documentElement.style.setProperty('--vh', `${vh}px`);
		</script>
		<script>
			let pageID = <?php echo get_the_ID(); ?>;

			<?php
				$current_user = wp_get_current_user();
				if (user_can( $current_user, 'administrator' )):
			?>
				const wp_user = 'administrator';
			<?php else: ?>
				const wp_user = 'client';
			<?php endif; ?>
		</script>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> >
		<?php get_template_part( 'partials/block', 'header' ); ?>