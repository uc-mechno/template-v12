<?php get_header(); ?>

<main class="l-main">
  <div class="l-page-header l-page-header--horizontal p-menus-mv js-mv-height js-blurTrigger is-show">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => get_the_title(),
        'state'  => '--horizontal'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>

  <?php
  // cfsから値を取得
  $background = CFS()->get('background');
  $color = CFS()->get('color');
  $opacity = CFS()->get('opacity');
  $text_color = CFS()->get('text_color');

  // テキストシャドウは一旦保留
  // $shadow_x = CFS()->get('shadow_x');
  // $shadow_y = CFS()->get('shadow_y');
  // $shadow_blur = CFS()->get('shadow_blur');
  // $shadow_color = CFS()->get('shadow_color');
  // $shadow_opacity = CFS()->get('shadow_opacity');

  // 16進数から10進数に変換
  $code_red = hexdec(substr($color, 1, 2));
  $code_green = hexdec(substr($color, 3, 2));
  $code_blue = hexdec(substr($color, 5, 2));
  $color_rgb = 'rgba(' . $code_red . ', ' . $code_green . ', ' . $code_blue . ', ' . $opacity . ')';

  // $shadow_code_red = hexdec(substr($shadow_color, 1, 2));
  // $shadow_code_green = hexdec(substr($shadow_color, 3, 2));
  // $shadow_code_blue = hexdec(substr($shadow_color, 5, 2));
  // $shadow_color_rgb = 'rgba(' . $shadow_code_red . ', ' . $shadow_code_green . ', ' . $shadow_code_blue . ', ' . $shadow_opacity . ')';

  // スタイル属性を変数に代入
  $style_image = 'style="background-image: url(\'' . esc_url($background) . '\');"';
  $style_bg_color = 'style="background-color: ' . $color_rgb . ';"';
  $style_text_color = 'style="color: ' . $text_color . ' ;"';
  // $style_text_shadow = 'style="text-shadow: ' . $shadow_x . 'px ' . $shadow_y . 'px ' . $shadow_blur . 'px ' . $shadow_color_rgb . ';"';
  ?>

  <div class="p-osusume-bg" <?php if ($background) echo $style_image; ?>>

    <span class="p-osusume-bg__after" <?php if ($color && $opacity) echo $style_bg_color; ?>></span>

    <section class="p-osusume-sec p-osusume-sec--primary l-menus-sec" id="osusume">
      <div class="p-osusume-sec__inner l-inner">
        <div class="p-osusume-sec__title-lv2-wrap p-osusume-sec__title-lv2-wrap--01 js-blurTrigger is-show">
          <h2 class="p-osusume-sec__title-lv2 js-blurTrigger is-show">季節のおすすめ</h2>
        </div>
        <ul class="p-osusume-sec__list" <?php if ($text_color) echo $style_text_color; ?>>

          <?php
          $args = [
            'menu-name' => 'osusume',
            'image-size' => 'menu-primary'
          ];
          get_template_part('template-parts/loop', 'menus', $args); ?>

        </ul>
      </div>
    </section>

    <div class="l-menus-bnr l-menus-bnr--secondary">
      <div class="l-menus-bnr__inner l-inner">
        <div class="l-menus-bnr__list">

          <p class="l-menus-bnr__item js-blurTrigger is-show">
            <a href="<?php echo esc_url(home_url('/takeout/')); ?>">
              <img width="688" height="160" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/bnr_takeout01.jpg" alt="お持ち帰りメニュー">
            </a>
          </p>

          <p class="l-menus-bnr__item js-blurTrigger is-show">
            <a href="<?php echo esc_url(home_url('/menus/')); ?>">
              <img width="688" height="160" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/bnr_teiban01.jpg" alt="定番メニュー">
            </a>
          </p>

        </div>
      </div>
    </div>

  </div>
</main>
<?php get_footer(); ?>
