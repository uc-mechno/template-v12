<?php get_header(); ?>

<main class="l-main">
  <div class="l-page-header l-page-header--vertical js-mv-height">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => get_the_title(),
        'state'  => '--vertical'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <div class="p-kodawari-lead l-kodawari-sec js-blurTrigger is-show">
    <div class="p-kodawari-lead__inner l-inner">
      <p class="p-kodawari-lead__text"> 小さな町の寿司割烹。<br class="u-md-show" /> そのこだわりを多くの皆様に味わっていただきたく、回転寿司という形ではじめたのが、鼓響です。<br class="u-md-show" />全国から厳選のネタを築地や新潟卸売市場から直送し、ご提供しています。 </p>
    </div>
  </div>
  <div class="p-kodawari-pr-area l-kodawari-pr-area">
    <div class="p-kodawari-pr-area--bg01">
      <section class="p-kodawari-sec01">
        <div class="p-kodawari-sec01__img js-blurTrigger is-show">
          <img width="1000" height="1000" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/kodawari03.jpg" alt="マグロ握り" />
        </div>
        <div class="p-kodawari-sec01__body">
          <div class="u-flex">
            <h2 class="p-kodawari-sec01__title js-blurTrigger is-show">本物へのこだわり</h2>
          </div>
          <p class="p-kodawari-sec01__text js-blurTrigger is-show"> この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 </p>
          <p class="p-kodawari-sec01__text js-blurTrigger is-show"> この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。 </p>
        </div>
      </section>
    </div>
    <div class="p-kodawari-pr-area--bg02">
      <section class="p-kodawari-sec02">
        <div class="p-kodawari-sec02__img js-blurTrigger is-show">
          <img width="1000" height="1000" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/kodawari04.jpg" alt="日替わりおすすめ市場直送メニュー" />
        </div>
        <div class="p-kodawari-sec02__body">
          <div class="u-flex">
            <h2 class="p-kodawari-sec02__title js-blurTrigger is-show"> 新鮮なネタは<br /> 築地や県内の<br /> 卸売市場からの直送 </h2>
          </div>
          <p class="p-kodawari-sec02__text js-blurTrigger is-show"> この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れています。 </p>
        </div>
      </section>
    </div>
  </div>
</main>
<?php get_footer(); ?>
