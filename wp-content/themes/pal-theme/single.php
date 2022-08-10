<?php get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="container">
			<div class="row">
				<div class="offset-xxl-1 col-12 col-xxl-10">
					<h1 class="page-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

<?php get_footer(); ?>