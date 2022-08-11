<?php if( have_rows('section_2') ): ?>
<section class="section2">
  <div class="container">
    <ul class="section2__list">
      <?php while( have_rows('section_2') ): the_row(); ?>
      <li class="section2__item">
        <figure class="section2__item-logo">
          <img src="<?php the_sub_field('icon'); ?>" alt="<?php the_sub_field('title'); ?>" />
        </figure>
        <div class="section2__item-dscr">
          <h4 class="section2__item-title"><?php the_sub_field('title'); ?></h4>
          <p class="section2__item-text"><?php the_sub_field('text'); ?></p>
        </div>
      </li>
      <?php endwhile; ?>
    </ul>
  </div>
</section>
<?php endif; ?>