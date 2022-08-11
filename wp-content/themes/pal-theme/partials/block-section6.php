<?php if( have_rows('section_6') ): ?>
<section class="section6">
  <div class="container">
    <h2 class="section6__title"><?php the_field('section_6_title'); ?></h2>
    <div class="section6__steps">
      <?php $i = 0; while( have_rows('section_6') ): the_row(); $i++; ?>
      <div class="section6__step">
        <div class="section6__step-num"><?php echo $i; ?></div>
        <h4 class="section6__step-title"><?php the_sub_field('title'); ?></h4>
      </div>
      <?php endwhile; ?>
    </div>
  </div>
</section>
<?php endif; ?>