<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

<?php if(is_page('kodawari')): ?>
  <meta name="robots" content="noindex" />
<?php endif; ?>

  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <?php wp_head(); ?>
</head>

<body <?php body_class('l-body');
      if (is_page()) : ?> id="<?php echo esc_attr($post->post_name); ?>" <?php endif; ?>>
  <?php wp_body_open(); ?>

  <div class="l-wrapper">

    <?php /*
    if(is_front_page()) : ?>
    <div id="js-splash" class="l-splash">
      <div id="js-splash_logo" class="l-splash__logo">
        <svg id="js-mask" class="l-splash__mask" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="712.8" height="279.2" viewBox="0 0 712.8 279.2" style="enable-background: new 0 0 712.8 279.2" xml:space="preserve">
          <image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo GET_PATH(); ?>/common/splash.svg" width="712.8" height="279.2" mask="url(#clipmask)"></image>
          <mask id="clipmask" maskUnits="objectBoundingBox">
            <path class="st0" d="m205.5,70.7s-25.4-20.8-42.2-24.5c-40.3-8.9-128,35-117.4,109.5,9.9,70.1,74.5,80.9,102.9,78.1s77.8-14.9,78.3-90.5-82.2,29.9-43.5,28.3" />
            <path class="st0" d="m303,89.4s52.4-26.3,54.9-16.5-40.6,47.5-41.1,49.6,32.2-1.4,41.2-10.5-14.3-90.3-20.1-68.1-1.1,79.6-1.1,83.9-32.6,22.5-28.1,28.4,15.7,21.2,20.3,21.2-11.7-21.6-3.3-26.4,25.8-21.3,29.5-7.8-17.9,40.5-23.7,39.4-18,2.1-19.1,11.1,10,13.2,13.7,14.8,13.2-26.4,21.6-24.3,18.9-2,14.5,11.1-31.9,48.7-44.5,48.9-29.5-1.4,1.1-11.7,45.9-24.5,51.2-33.5,20.3-93.4,18.1-106-28.1-5.8-16.5,3.2,75.2-13.9,78.6-25.5-28-45.2-31.6-36.2-9,80.2-11.1,84.9-9.2,34.3-19.4,33.2,51-26.1,52.1-20.7-41.7,83.5-55.9,87.7,0-46.9,9.5-41.7,59.1,57.7,82.3,57.6c0,0,92.3-181.4,86.5-189.4s-36.7,31.1-32.3,32.9,27.8,7.9,30.3,6.5-42.7,11.6-33.9,20.3,18.7,11.3,30.5,8.9,6.8-13.5-3.3-3.6-15.3,32.2-15.3,32.2c0,0,30-52.3,37.9-57.8s26-29.9,34.3-20.5,22.6,16.6,9.6,24.4-34.2,15.7-39.9,12-8.9-25.1-4.1-18.7-1.7,33.4-2.5,41.9,47.9,6.6,45.4,0-31.5-12.7-25.9-6.6,26.5-52.4,41.6-56.1,59.9-16.9,49.6-3.2-29.4,20-23.8,24,42.5,14.5,31.4,25.8-59.7-22.2-59.1-27,6.7-11.4,10.6-2.5,2.1,56.1-1.1,60.6-49.1,7.3-47.5-1.1,12.7,4,12.7,8.2-30.1,19.3-31.5,8.9,50.2.1,58.5-3.6-72.8,5.6-69.7,14.9,14.3,16.7,18.4,17.8,21-30.5,33.9-21.3,9.4,12.2,3.8,17.5-91.4,16-91.2,9.5,2.1-10.8,11.4-4.5,137,4.1,136.2-.7-15.4-2.5-23.9-4.1,21.1,11.1,20.4,22.9-74.1,43-90.8,40.3-47.8-16.1-19.3-33.9,67.5-18.1,82.8-7.8,32.1,27.1-1,35.5-89.2-4.6-81.6-10.5,39.4-9.7,50.8-7.5" />
          </mask>
        </svg>
      </div>
    </div>
    <?php endif; */
    ?>

    <header <?php // ヘッダーの背景画像を設定
            if (is_front_page() || is_page(['takeout', 'menus', 'pickup']) || is_404()) {
              echo 'class="l-header p-header"';
            } elseif (is_single() || is_home() || is_archive()) {
              $image_url = GET_PATH() . '/hero_no-image.jpg';
              echo 'class="l-header p-header p-header--bg" style="background-image: url(\'' . $image_url . '\')"';
            } else {
              $eyecatch = get_eyecatch_with_default('hero');
              $image_url = esc_url($eyecatch[0]);
              echo 'class="l-header p-header p-header--bg" style="background-image: url(\'' . $image_url . '\')"';
            }
            ?>>

      <div class="p-header__inner">
        <?php if (is_front_page()) {
          echo '<h1 class="p-header__logo">';
        } else {
          echo '<p class="p-header__logo">';
        } ?>
        <a href="<?php echo esc_url(home_url('/')); ?>" class="p-header__logoLink">
          <img width="137" height="54" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_header.svg?var=20231120105551" alt="廻る鼓響（こきょう） 回転寿司" />
        </a>
        <?php if (is_front_page()) {
          echo '</h1>';
        } else {
          echo '</p>';
        } ?>
        <button type="button" id="js-hamburger" class="c-hamburger" aria-label="メニューを開く" aria-controls="js-gnav" aria-expanded="false">
          <span class="c-hamburger__line" aria-hidden="true"></span>
        </button>

        <nav id="js-gnav" class="p-gnav" aria-label="メインメニュー">
          <div class="p-gnav__inner">

            <div class="p-gnav-wrap__logo js-blurTrigger is-show">
              <img width="137" height="54" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_header.svg" alt="廻る鼓響（こきょう） 回転寿司" />
            </div>

            <ul class="p-gnav__list" id="menu">

              <?php
              $items = get_nav_menu('global_nav');
              if (!$items == '') : ?>
                <?php foreach ($items as $item) : ?>
                  <li class="p-gnav__item js-gnav-trigger">
                    <a class="p-gnav__link" href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
                  </li>
                <?php endforeach; ?>
              <?php endif; ?>

            </ul>
          </div>
        </nav>
      </div>

    </header>
