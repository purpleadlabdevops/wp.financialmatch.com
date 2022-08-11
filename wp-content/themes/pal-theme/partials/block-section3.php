<?php if( have_rows('section_3') ): ?>
<section class="section3">
  <div class="section3__grid">
    <?php while( have_rows('section_3') ): the_row(); ?>
    <div class="section3__grid-row">
      <div class="section3__grid-img-col">
        <figure>
          <img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('title'); ?>" />
        </figure>
      </div>
      <div class="section3__grid-dscr-col">
        <h4 class="section3__grid-title"><?php the_sub_field('title'); ?></h4>
        <p class="section3__grid-text"><?php the_sub_field('text'); ?></p>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</section>
<?php endif; ?>