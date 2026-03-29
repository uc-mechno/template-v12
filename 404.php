<?php get_header(); ?>
<main class="l-main">
<div class="l-page-header l-page-header--horizontal p-menus-mv js-mv-height">

<div class="l-page-header__title">
  <?php
  $args = [
    'text'   => '404 NOT FOUND',
    'state'  => '--horizontal'
  ];
  get_template_part('components/title', null, $args); ?>
</div>

</div>

  <div class="p-404-sec01">
    <div class="p-404-sec01__inner l-inner">
      <div class="p-404-sec01__body">
        <h2 class="p-404-sec01__text">ページが見つかりませんでした。</h2>
        <p class="p-404-sec01__small"><small>お探しのページは一時的にアクセスができない状況にあるか、移動、もしくは削除された可能性があります。</small></p>
      </div>

      <div class="l-button l-button--center l-button--mt-md">
        <?php
        $args = [
          'link'   => home_url('/'),
          'text'   => 'Topページはこちら',
          'state'  => '--accent',
          'size'   => '--md',
          'br'     => false,
          'icon'   => false,
          'target' => false
        ];
        get_template_part('components/button', null, $args); ?>
      </div>

    </div>
  </div>

</main>
<?php get_footer(); ?>
