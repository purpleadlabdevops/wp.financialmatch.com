<?php
/*
 * The template for displaying 404 pages (not found)
 */
get_header(); ?>

<section class="page404">
	<div class="container">
		<h1>Error <span>404</span></h1>
		<h2>Page not found!!!</h2>
		<a href="<?php echo home_url(); ?>" class="btn">Back to home page</a>
	</div>
</section>

<?php get_footer(); ?>