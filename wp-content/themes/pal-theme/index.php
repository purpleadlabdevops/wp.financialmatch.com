<?php
/*
 * Template Name: Main
 */
get_header();
?>

<main>
	<?php get_template_part( 'partials/block', 'top' ); ?>
	<?php get_template_part( 'partials/block', 'section1' ); ?>
	<?php get_template_part( 'partials/block', 'section2' ); ?>
	<?php get_template_part( 'partials/block', 'section3' ); ?>
	<?php get_template_part( 'partials/block', 'section4' ); ?>
	<?php get_template_part( 'partials/block', 'section5' ); ?>
	<?php get_template_part( 'partials/block', 'section6' ); ?>
	<?php get_template_part( 'partials/block', 'section7' ); ?>
	<?php get_template_part( 'partials/block', 'faq' ); ?>
</main>

<?php get_footer(); ?>