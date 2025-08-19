<article class="c-card">
  <a href="<?php the_permalink(); ?>">
    <div class="c-card__img">
      <?php get_eyecatch_default(get_the_ID()); ?>
    </div>
    <div class="c-card__body c-card__body--secondar">
      <time datetime="<?php the_time('Y-m-d'); ?>" class="c-card__date"><?php the_time('Y.m.d'); ?></time>
      <p class="c-card__text c-card__text--secondary">
        <?php
        if (is_sp()) {
          show_limit_title(36);
        } else {
          show_limit_title(26);
        }
        ?>
      </p>
    </div>
  </a>
</article>
