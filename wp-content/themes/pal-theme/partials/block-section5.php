<?php if( have_rows('section_5') ): ?>
<section class="section5">
  <div class="container">
    <div class="section5__rows">
      <?php while( have_rows('section_5') ): the_row(); ?>
      <div class="section5__row">
        <div class="section5__icon">
          <figure>
            <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" />
          </figure>
        </div>
        <div class="section5__dscr">
          <h4 class="section5__dscr-title"><?php the_sub_field('title'); ?></h4>
          <p class="section5__dscr-text"><?php the_sub_field('text'); ?></p>
        </div>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>