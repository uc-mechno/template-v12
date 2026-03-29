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
          <img width="137" height="54" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_header.svg?var=20231120105551" alt="" />
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
              <img width="137" height="54" loading="eager" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_header.svg" alt="" />
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
