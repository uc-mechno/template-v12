<?php if (!is_front_page()) : ?>
  <div class="c-breadcrumb" typeof="BreadcrumbList" vocab="https://schema.org/">
    <div class="l-inner">
      <?php if (in_category('osusume')) : ?>

        <span property="itemListElement" typeof="ListItem">
          <a property="item" typeof="WebPage" title="廻る鼓響へ移動する" href="<?php echo esc_url(home_url('/')); ?>" class="home">
            <span property="name">ホーム</span>
          </a>
          <meta property="position" content="1">
        </span>
        &gt;
        <span property="itemListElement" typeof="ListItem">
          <span property="name" class="post post-post current-item"><?php the_title(); ?></span>
          <meta property="url" content="<?php the_permalink(); ?>">
          <meta property="position" content="2">
        </span>

        <?php else: ?>

        <?php if(function_exists('bcn_display')) bcn_display(); ?>

      <?php endif; ?>
    </div>

  </div>
<?php endif; ?>

<footer class="l-footer p-footer">
  <div class="c-to-top js-page-top">
    <a href="#top"><span></span></a>
  </div>
  <div class="p-footer__inner l-inner">
    <div class="p-footer__item">

      <div class="p-footer__logo">
        <a href="<?php echo esc_url(home_url('/store/#yoshida')); ?>">
          <img width="135" height="66" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_footer.svg?var=20231120105551" alt="廻る鼓響（こきょう） 回転寿司" />
        </a>
      </div>

      <div class="p-footer-nav">
        <ul class="p-footer-nav__list">

          <?php
          $items = get_nav_menu('footer_nav');
          if (!$items == '') : ?>
            <?php foreach ($items as $item) : ?>
              <li class="p-footer-nav__item">
                <a href="<?php echo esc_attr($item->url); ?>"><?php echo esc_html($item->title); ?></a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>

        </ul>
        <!-- <p class="l-button l-button--center">
          <a href="https://dmrotyvp.jbplt.jp/" class="c-button c-button--icon01 c-button--sm" href="https://dmrotyvp.jbplt.jp/">採用情報</a>
        </p> -->
      </div>
    </div>
    <div class="p-footer__copyright">
      <small>&copy; <?php echo date_i18n(__('Y', 'blankslate')); ?> <?php echo get_bloginfo('name'); ?> All Rights Reserved.</small>
    </div>
  </div>
</footer>
</div>
<!-- /l-wrapper -->

<?php wp_footer(); ?>

</body>

</html>
