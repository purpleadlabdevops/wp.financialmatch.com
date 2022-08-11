
<section class="faq">
  <div class="faq__container">
    <h3 class="faq__title">Frequently Asked Questions</h3>
    <ul class="faq__nav">
      <li><a href="#faq-qualification">Qualification</a></li>
      <li><a href="#faq-tax-credit">Tax Credit</a></li>
    </ul>

    <?php if( have_rows('qualification') ): ?>
    <div id="faq-qualification" class="faq__group">
      <h3 class="faq__group-title">Qualification</h3>
      <div class="faq__block">
        <?php while( have_rows('qualification') ): the_row(); ?>
          <div class="faq__item">
            <div class="faq-q">
              <h5><?php the_sub_field('question'); ?></h5>
            </div>
            <div class="faq-a"><?php the_sub_field('answer'); ?></div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

    <?php if( have_rows('tax_credit') ): ?>
    <div id="faq-tax-credit" class="faq__group">
      <h3 class="faq__group-title">Tax Credit</h3>
      <div class="faq__block">
        <?php while( have_rows('tax_credit') ): the_row(); ?>
          <div class="faq__item">
            <div class="faq-q">
              <h5><?php the_sub_field('question'); ?></h5>
            </div>
            <div class="faq-a"><?php the_sub_field('answer'); ?></div>
          </div>
        <?php endwhile; ?>
      </div>
    </div>
    <?php endif; ?>

  </div>
</section>
