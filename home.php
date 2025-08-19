<?php
get_header();
$wp_obj = get_queried_object();
$post_id = $wp_obj->ID;
$post_title = apply_filters('the_title', $wp_obj->post_title);
?>
<main class="l-main">
  <div class="l-page-header l-page-header--vertical js-mv-height">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => $post_title,
        'state'  => '--vertical'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <div class="p-news-archive l-news-archive">
    <div class="l-news-archive__inner">

      <div class="l-news-archive__list js-blurTrigger is-show">
        <?php if (have_posts()) : ?>

          <ul class="l-news-archive__items">

            <?php while (have_posts()) : the_post(); ?>

              <?php get_template_part('components/list', null); ?>

            <?php endwhile; ?>

          </ul>

        <?php endif; ?>
      </div>
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
