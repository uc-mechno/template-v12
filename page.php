<?php get_header(); ?>

<div class="l-page-header l-page-header--vertical js-mv-height">
  <div class="l-page-header__title">
    <div class="c-section-header c-section-header--vertical js-blurTrigger is-show">
      <h1 class="c-section-header__title"><?php the_title(); ?></h1>
    </div>
  </div>
</div>

<?php if (have_posts()) : ?>
  <?php while (have_posts()) : the_post(); ?>

    <section id="post-<?php the_ID(); ?>" <?php post_class('l-section'); ?>>
      <div class="l-inner">
        <?php the_content(); ?>
      </div>
    </section>

  <?php endwhile; ?>
<?php endif; ?>

<?php get_footer(); ?>
