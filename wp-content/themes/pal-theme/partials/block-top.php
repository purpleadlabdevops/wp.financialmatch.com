<section id="quiz" class="top">
  <div class="container">
    <div class="top__inner">
      <div class="top__questions-col">
        <?php get_template_part( 'partials/block', 'quiz' ); ?>
      </div>
      <div class="top__title-col">
        <?php if(get_field('text')): ?>
          <h4 class="top__pre-title"><?php the_field('text'); ?></h4>
        <?php endif; ?>
        <?php if(get_field('title')): ?>
          <h1 class="top__title"><?php the_field('title'); ?></h1>
        <?php endif; ?>
        <?php if(get_field('subtitle')): ?>
          <h2 class="top__pre-title"><?php the_field('subtitle'); ?></h2>
        <?php endif; ?>
        <?php if( have_rows('list') ): ?>
          <ul class="top__list">
            <?php while( have_rows('list') ): the_row(); ?>
              <li><?php the_sub_field('text'); ?></li>
            <?php endwhile; ?>
          </ul>
        <?php endif; ?>
        <?php if(get_field('description')): ?>
          <h4 class="top__action-row"><?php the_field('description'); ?></h4>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>