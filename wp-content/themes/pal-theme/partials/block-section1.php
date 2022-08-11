<?php if( have_rows('section_1') ): ?>
<section class="section1">
  <div class="container">
    <div class="section1__inner">
      <?php while( have_rows('section_1') ): the_row(); ?>
        <div class="section1__num-item">
          <div class="section1__num"><?php the_sub_field('title'); ?></div>
          <div class="section1__num-title"><?php the_sub_field('text'); ?></div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>