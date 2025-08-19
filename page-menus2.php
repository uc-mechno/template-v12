<?php get_header(); ?>

<main class="l-main">
  <div class="p-menus-mv js-mv-height">

    <div class="p-menus-mv__title">
      <?php
      $args = [
      'text'   => get_the_title(),
      'state'  => '--horizontal'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <div class="p-menus-nav l-menus-nav" id="a">
    <div class="p-menus-nav__inner l-inner">
      <ul class="p-menus-nav__list">

        <li class="p-menus-nav__item"><a href="#osusume">旬のおすすめ</a></li>
        <li class="p-menus-nav__item"><a href="#zanmai">三昧盛り</a></li>
        <li class="p-menus-nav__item"><a href="#teiban">定番にぎり</a></li>
        <li class="p-menus-nav__item"><a href="#makimono">巻物・軍艦</a></li>
        <li class="p-menus-nav__item"><a href="#aburi">炙り・びっくり寿司</a></li>
        <li class="p-menus-nav__item"><a href="#ippin">一品料理</a></li>
        <li class="p-menus-nav__item"><a href="#drink">ドリンク・デザート</a></li>
        <li class="p-menus-nav__item"><a href="#lunch">ランチメニュー</a></li>

      </ul>
    </div>
  </div>
  <div class="p-menus-takeout l-menus-takeout">
    <div class="p-menus-takeout__inner l-inner">
      <a href="<?php echo esc_url(home_url('/takeout/')); ?>">
        <p class="p-menus-takeout__content"><img width="688" height="160" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/bnr_takeout01.jpg?ver=202308221030" alt="お持ち帰りメニュー"></p>
      </a>
    </div>
  </div>
  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="osusume">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--01 js-accordion-title">
        <h2 class="p-menus-sec__title-lv2">旬のおすすめ</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $fields = CFS()->get('items');
        if ($fields) :
          foreach ($fields as $field) :
        ?>

            <li class="p-menus-sec__item">
              <div class="p-menus-sec__img">

                <?php if ($field['image']) :
                  $image = wp_get_attachment_image_src($field['image'], 'menu-primary'); ?>

                  <img width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" loading="lazy" decoding="async" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($field['title']); ?>">

                <?php else : ?>

                  <img width="4" height="3" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image353x265.gif" alt="no image" />

                <?php endif; ?>

              </div>

              <?php if ($field['title'] || $field['price'] || $field['description']) : ?>
                <div class="p-menus-sec__body">
                  <?php if ($field['title']) : ?>
                    <h3 class="p-menus-sec__title-lv3"><?php echo esc_html($field['title']); ?></h3>
                  <?php endif;
                  if ($field['price']) : ?>
                    <p class="p-menus-sec__price"><?php echo esc_html($field['price']); ?></p>
                  <?php endif;
                  if ($field['description']) : ?>
                    <p class="p-menus-sec__text"><?php echo wp_kses($field['description'], $allowed_html); ?></p>
                  <?php endif; ?>
                </div>
              <?php endif; ?>

            </li>

          <?php endforeach; ?>
        <?php endif; ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--secondary l-menus-sec" id="lunch">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--08 js-accordion-title">
        <h2 class="p-menus-sec__title-lv2">ランチメニュー</h2>
      </div class="p-menus-sec__lead">
      <div class="js-accordion-area">
        <div class="p-menus-sec__lead-wrap">
          <p class="p-menus-sec__lead">平日限定(AM11時～PM3時まで)の<br class="">ランチメニュー</p>
        </div>
        <ul class="p-menus-sec__list">

          <?php /*
          $fields = CFS()->get('lunch');
          if ($fields) :
            foreach ($fields as $field) :
          ?>

              <li class="p-menus-sec__item">
                <div class="p-menus-sec__img">

                  <?php if ($field['image']) :
                    $image = wp_get_attachment_image_src($field['image'], 'menu-secondary'); ?>

                    <img width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" loading="lazy" decoding="async" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($field['title']); ?>">

                  <?php else : ?>

                    <img width="4" height="3" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image353x265.gif" alt="no image" />

                  <?php endif; ?>

                </div>

                <?php if ($field['title'] || $field['price'] || $field['description']) : ?>
                  <div class="p-menus-sec__body">
                    <?php if ($field['title']) : ?>
                      <h3 class="p-menus-sec__title-lv3"><?php echo esc_html($field['title']); ?></h3>
                    <?php endif;
                    if ($field['price']) : ?>
                      <p class="p-menus-sec__price"><?php echo esc_html($field['price']); ?></p>
                    <?php endif;
                    if ($field['description']) : ?>
                      <p class="p-menus-sec__text"><?php echo wp_kses($field['description'], $allowed_html); ?></p>
                    <?php endif; ?>
                  </div>
                <?php endif; ?>

              </li>

            <?php endforeach; ?>
          <?php endif; */ ?>

        </ul>
      </div>
    </div>
  </section>

  <?php get_footer(); ?>
