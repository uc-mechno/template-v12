<?php
get_header();
$category = get_the_category()[0];
$cat_name = $category->cat_name;
$cat_slug = $category->slug;
$cat_id   = $category->cat_ID;
$cat_link = get_category_link($cat_id);
?>
<main class="l-main">
  <div class="l-page-header l-page-header--vertical js-mv-height">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => $cat_name,
        'state'  => '--vertical'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <section class="l-news-single-body p-news-single-body">
    <div class="p-news-single-body__inner l-news-single-body__inner l-inner">
      <div class="p-news-single-body__head js-blurTrigger is-show">
      <?php if (in_category('news')):?>
        <div class="p-news-single-body__meta">
          <time datetime="<?php the_time('Y-m-d'); ?>" class="p-news-single-content__date"><?php the_time('Y.m.d'); ?></time>
        </div>
      <?php endif; ?>
        <div class="p-news-single-body__title-lv1-wrap">
          <h1 class="p-news-single-body__title-lv1"><?php the_title(); ?></h1>
        </div>
      </div>

      <div <?php post_class('p-news-single-content js-blurTrigger is-show'); ?>>
        <?php if (have_posts()) : ?>
          <?php while (have_posts()) : the_post(); ?>
            <?php the_content(); ?>
          <?php endwhile; ?>
        <?php endif; ?>
      </div>

      <div class="l-page-link">

        <div class="c-page-link js-blurTrigger is-show">
          <div class="c-page-link__flex">

            <?php
            $next_post = get_next_post(true);
            $prev_post = get_previous_post(true);
            if ($next_post) :
            ?>
              <div class="c-page-link__prev">
                <a class="another-link" href="<?php echo esc_url(get_permalink($next_post->ID)); ?>">
                  <?php if (in_category('news')) {
                    echo '前の記事';
                  } else {
                    echo '前のおすすめ';
                  }
                  ?>
                </a>
              </div>
            <?php endif;
            if ($prev_post) : ?>
              <div class="c-page-link__next">
                <a class="another-link" href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>">
                  <?php if (in_category('news')) {
                    echo '次の記事';
                  } else {
                    echo '次のおすすめ';
                  }
                  ?>
                </a>
              </div>
            <?php endif; ?>

          </div>
          <div class="c-page-link__archive">
            <?php if (in_category('news')) : ?>
              <a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ一覧</a>
            <?php else : ?>
              <a href="<?php echo esc_url(home_url('/')); ?>">トップへ戻る</a>
            <?php endif; ?>
          </div>
        </div>

      </div>
    </div>
  </section>

  <?php get_footer(); ?>
