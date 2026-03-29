<?php get_header(); ?>

<main class="l-main">
  <div class="l-page-header l-page-header--vertical js-mv-height">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => get_the_archive_title(),
        'state'  => '--vertical'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <div class="p-news-archive l-news-archive">
    <div class="p-news-archive__inner l-inner">

      <?php if (have_posts()) : ?>

        <div class="p-news-archive__list js-blurTrigger is-show">

          <?php while (have_posts()) : the_post(); ?>

            <?php get_template_part('components/card', null); ?>

          <?php endwhile; ?>

        <?php else : ?>

          <p>まだ投稿がありません。</p>

        </div>

      <?php endif; ?>

    </div>
  </div>

  <?php if (have_posts()) : ?>

    <div class="l-paginavi">
      <div class="c-pagenation js-blurTrigger is-show">
        <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); ?>
      </div>
    </div>

  <?php endif; ?>

  <?php get_footer(); ?>
