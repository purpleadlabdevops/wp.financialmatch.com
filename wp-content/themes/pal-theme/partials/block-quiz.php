<div class="top__quiz">
  <form @submit.prevent="submit" class="form">
  <div class="form-progress" :style="`width: ${((step + 1) * 100) / (quiz.length + 1)}%`"></div>

  <?php if( have_rows('questions') ): ?>
    <?php $i = 0; while( have_rows('questions') ): the_row(); $i++; ?>
    <div class="step step-<?php echo $i; ?><?php if($i === 1): ?> step-active<?php endif; ?>">
      <h2><?php the_sub_field('question'); ?></h2>

      <?php if($i === 1): ?>
      <h3>
        <svg width="17" height="23" viewBox="0 0 17 23" fill="none"  xmlns="http://www.w3.org/2000/svg"><path d="M16.5306 1.22407C6.19336 0.0793971 -9.40939 2.75616 10.8777 22.6206M9.29278 14.5903C9.328 16.6859 9.68373 21.2153 10.8249 22.5678C9.59215 21.8458 5.38329 20.5602 2.68891 20.296" stroke="#75A7EF" /></svg>
        Please Select One
        <svg width="18" height="23" viewBox="0 0 18 23" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0.999659 1.22407C11.3369 0.0793971 26.9397 2.75616 6.65257 22.6206M8.2375 14.5903C8.20227 16.6859 7.84655 21.2153 6.7054 22.5678C7.93812 21.8458 12.147 20.5602 14.8414 20.296" stroke="#75A7EF" /></svg>
      </h3>
      <?php endif; ?>

      <?php if(get_sub_field('type') === 'number'): ?>
      <div class="form-options">
        <input type="number" min="1" max="<?php the_sub_field('max_number'); ?>" placeholder="Enter number" data-id="Employ QTA" id="maxNumber" />
        <div class="buttons">
          <button class="yellow chooseAnswer" data-number data-q="<?php the_sub_field('question'); ?>" data-a="#maxNumber" data-i="<?php echo $i; ?>" >
            <?php the_sub_field('button'); ?>
          </button>
          <button class="back" @click.prevent="stepBack">
            <img src="<?php echo IMG; ?>/arrow-back.svg" />
          </button>
        </div>
      </div>
      <?php else: ?>
      <div class="form-options">
        <?php if( have_rows('answers') ): ?>
          <?php while( have_rows('answers') ): the_row(); ?>
            <button class="chooseAnswer" data-q="<?php the_sub_field('question'); ?>" data-a="<?php the_sub_field('text'); ?>" data-i="<?php echo $i; ?>">
              <?php the_sub_field('text'); ?>
            </button>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>
      <?php endif; ?>
      <?php // the_sub_field('rules'); ?>
    </div>
    <?php endwhile; ?>
  <?php endif; ?>

  <?php if( have_rows('form_fields') ): ?>
  <div class="step step-<?php echo count(get_field('questions')) + 1; ?>">
    <h2>Enter info below to get your results.</h2>
    <?php while( have_rows('form_fields') ): the_row(); ?>
      <?php if(get_sub_field('type') === 'textarea'): ?>
        <textarea
          name="<?php the_sub_field('name'); ?>"
          id="<?php the_sub_field('name'); ?>"
          placeholder="<?php the_sub_field('placeholder'); ?>"
          required >
        </textarea>
      <?php elseif(get_sub_field('type') === 'select'): ?>
        we don't have select type
      <?php elseif(get_sub_field('type') === 'checkbox'): ?>
        we don't have checkbox type
      <?php elseif(get_sub_field('type') === 'radio'): ?>
        we don't have radio type
      <?php else: ?>
        <input
          type="<?php the_sub_field('type'); ?>"
          name="<?php the_sub_field('name'); ?>"
          id="<?php the_sub_field('name'); ?>"
          placeholder="<?php the_sub_field('placeholder'); ?>"
          <?php if(get_sub_field('type') === 'tel'): ?>
            minlength="8"
            maxlength="14"
          <?php else: ?>
            minlength="2"
            maxlength="155"
          <?php endif; ?>
          required />
      <?php endif; ?>
    <?php endwhile; ?>
    <input type="submit" value="<?php the_field('form_button'); ?>" />
  </div>
  <?php endif; ?>

  <div class="step step-not">
    <h2>You Do Not Qualify for ERC</h2>
    <p>
      Unfortunately based on your answers, it appears that you do not qualify
      for the Employee Retention Tax Credit program.
    </p>
  </div>

  <input
    ref="leadid_token"
    id="leadid_token"
    name="universal_leadid"
    type="hidden"
  />
</form>