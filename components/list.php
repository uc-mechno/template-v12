<li class="c-list">
  <a href="<?php the_permalink(); ?>">
    <div class="c-list__body">
      <time datetime="<?php the_time('Y-m-d'); ?>" class="c-list__date"><?php the_time('Y.m.d'); ?></time>
      <p class="c-list__text"><?php the_title(); ?></p>
    </div>
  </a>
</li>
