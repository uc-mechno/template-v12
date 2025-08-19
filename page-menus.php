<?php get_header(); ?>

<main class="l-main">
  <div class="l-page-header l-page-header--horizontal p-menus-mv js-mv-height">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => get_the_title(),
        'state'  => '--horizontal'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>

  <div class="p-menus-nav l-menus-nav js-blurTrigger is-show">
    <div class="p-menus-nav__inner l-inner">
      <ul class="p-menus-nav__list">

        <li class="p-menus-nav__item"><a href="<?php echo esc_url(home_url('/pickup/')); ?>">季節のおすすめ</a></li>
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

  <div class="l-menus-bnr l-menus-bnr--primary">
    <div class="l-menus-bnr__inner l-inner">
      <div class="l-menus-bnr__list">

        <p class="l-menus-bnr__item js-blurTrigger is-show">
          <a href="<?php echo esc_url(home_url('/takeout/')); ?>">
            <img width="688" height="160" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/bnr_takeout01.jpg" alt="お持ち帰りメニュー">
          </a>
        </p>

        <p class="l-menus-bnr__item js-blurTrigger is-show">
          <a href="<?php echo esc_url(home_url('/pickup/')); ?>">
            <img width="688" height="160" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/bnr_osusume01.jpg" alt="季節のおすすめ">
          </a>
        </p>

      </div>
    </div>
  </div>

  <?php /* 季節のおすすめページに移動

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="osusume">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--01 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">旬のおすすめ</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'osusume',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  */ ?>

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="zanmai">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--02 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">三昧盛り</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'zanmai',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="teiban">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--03 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">定番にぎり</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'teiban',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="makimono">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--04 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">巻物・軍艦</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'makimono',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="aburi">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--05 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">炙り・びっくり寿司</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'aburi',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="ippin">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--06 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">一品料理</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'ippin',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--primary l-menus-sec" id="drink">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--07 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">ドリンク・デザート</h2>
      </div>
      <ul class="p-menus-sec__list js-accordion-area">

        <?php
        $args = [
          'menu-name' => 'drink',
          'image-size' => 'menu-primary'
        ];
        get_template_part('template-parts/loop', 'menus', $args); ?>

      </ul>
    </div>
  </section>

  <section class="p-menus-sec p-menus-sec--secondary l-menus-sec" id="lunch">
    <div class="p-menus-sec__inner l-inner">
      <div class="p-menus-sec__title-lv2-wrap p-menus-sec__title-lv2-wrap--08 js-accordion-title js-blurTrigger is-show">
        <h2 class="p-menus-sec__title-lv2">ランチメニュー</h2>
      </div class="p-menus-sec__lead">
      <div class="js-accordion-area">
        <div class="p-menus-sec__lead-wrap">
          <p class="p-menus-sec__lead">平日限定(AM11時～PM3時まで)の<br class="">ランチメニュー</p>
        </div>
        <ul class="p-menus-sec__list">

          <?php
          $args = [
            'menu-name' => 'lunch',
            'image-size' => 'menu-secondary'
          ];
          get_template_part('template-parts/loop', 'menus', $args); ?>

        </ul>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
