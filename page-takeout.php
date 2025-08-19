<?php get_header(); ?>

<main class="l-main">
  <div class="l-page-header l-page-header--horizontal js-mv-height">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => get_the_title() . 'メニュー',
        'state'  => '--horizontal'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <div class="p-takeout-sec01 l-takeout-sec">
    <div class="p-takeout-sec01__inner l-inner">
      <div class="p-takeout-sec01__body js-blurTrigger is-show">
        <p class="p-takeout-sec01__text">お持ち帰りは、待たずに便利な<br class="u-md-hidden">WEBでのご注文をご利用ください。</p>
        <p class="p-takeout-sec01__small"><small>※ご注文店舗をお間違いない様にご注意ください</small></p>
      </div>
    </div>
  </div>
  <div class="p-takeout-sec02 l-takeout-sec">
    <div class="p-takeout-sec02__inner l-inner">


      <div class="p-takeout-sec02__button l-button l-button--center l-button--cols2 l-button--gap-md">

        <div class="l-button__item js-blurTrigger is-show">
          <?php
          $args = [
            'link'   => 'https://kokyou-sushi.take-eats.jp/',
            'text'   => 'ネット注文はこちら',
            'state'  => '--accent',
            'size'   => '--md',
            'br'     => false,
            'icon'   => true,
            'target' => true
          ];
          get_template_part('components/button', null, $args); ?>
        </div>

        <div class="l-button__item js-blurTrigger is-show">
          <?php
          $args = [
            'link'   => '#order',
            'text'   => 'ネット注文方法について',
            'state'  => '--secondary',
            'size'   => '--md',
            'br'     => false,
            'icon'   => false,
            'target' => false
          ];
          get_template_part('components/button', null, $args); ?>
        </div>

      </div>
    </div>
  </div>
  <section class="p-takeout-sec03 l-takeout-sec u-pt0">
    <div class="p-takeout-sec03__title-lv2-wrap js-blurTrigger is-show">
      <h2 class="p-takeout-sec03__title-lv2 p-takeout-sec03__title-lv2--left">お持ち帰りメニュー</h2>
    </div>
    <div class="p-takeout-sec03__inner l-inner">
      <ul class="p-takeout-sec03__list">

        <?php
        $args = [
          'menu-name' => 'takeout',
          'image-size' => 'takeout'
        ];
        get_template_part('template-parts/loop', 'takeout', $args); ?>

      </ul>

      <div class="p-order-sec01__button l-button l-button--center l-button--mt-md js-blurTrigger is-show">
        <?php
        $args = [
          'link'   => 'https://kokyou-sushi.take-eats.jp/',
          'text'   => 'ネット注文はこちら',
          'state'  => '--accent',
          'size'   => '--md',
          'br'     => false,
          'icon'   => true,
          'target' => true
        ];
        get_template_part('components/button', null, $args); ?>
      </div>

    </div>
  </section>

  <section class="p-takeout-sec04 l-takeout-sec u-pt0" id="order">
    <div class="p-takeout-sec04__title-lv2-wrap js-blurTrigger is-show">
      <h2 class="p-takeout-sec04__title-lv2 p-takeout-sec04__title-lv2--center">お持ち帰りご注文方法</h2>
    </div>

    <section class="p-order-sec02 l-order-sec">

      <div class="p-order-sec02__inner">
        <div class="p-order-sec02__title-lv2-wrap p-order-sec02__title-lv2-wrap--line js-blurTrigger is-show">
          <h2 class="p-order-sec02__title-lv2 p-order-sec02__title-lv2--serif">WEBでらくらくご注文</h2>
        </div>
        <div class="p-order-sec02__body js-blurTrigger is-show">
          <div class="p-order-sec02__item">
            <div class="p-order-sec02__list">
              <figure class="p-order-sec02__img">
                <img width="80" height="146" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/phone01.png" alt="スマートフォンイラスト">
              </figure>
              <div class="p-order-sec02__content">
                <h3 class="p-order-sec02__title-lv3">スマホから簡単に<br>注文・決済</h3>
                <p class="p-order-sec02__text">事前に決済ならびに注文を行っていただけるので、待つことなく受け取りができます。</p>
              </div>
            </div>
            <div class="p-order-sec02__list">
              <figure class="p-order-sec02__img">
                <img width="80" height="146" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/time01.png" alt="お寿司と時計イラスト">
              </figure>
              <div class="p-order-sec02__content">
                <h3 class="p-order-sec02__title-lv3">会員登録なしで<br>いますぐ注文</h3>
                <p class="p-order-sec02__text">会員登録なしでいつでもが注文が可能で、初めてのご利用でも安心。</p>
              </div>
            </div>
          </div>

          <div class="p-order-sec02__button l-button l-button--center l-button--mt-md">
            <?php
            $args = [
              'link'   => 'https://kokyou-sushi.take-eats.jp/',
              'text'   => 'ネット注文はこちら',
              'state'  => '--accent',
              'size'   => '--md',
              'br'     => false,
              'icon'   => true,
              'target' => true
            ];
            get_template_part('components/button', null, $args); ?>
          </div>

        </div>
      </div>
    </section>

    <section class="p-order-sec03 l-order-sec">
      <div class="p-order-sec03__inner l-inner">
        <div class="p-order-sec03__title-lv2-wrap p-order-sec03__title-lv2-wrap--line js-blurTrigger is-show">
          <h2 class="p-order-sec03__title-lv2 p-order-sec03__title-lv2--serif">ご注文方法</h2>
        </div>
        <div class="p-order-sec03__body">
          <div class="p-order-sec03__img js-blurTrigger is-show">
            <picture>
              <source srcset="<?php echo GET_PATH(); ?>/order_pc.png.webp" media="(min-width: 768px)" type="image/webp" width="1034" height="632">
              <source srcset="<?php echo GET_PATH(); ?>/order_pc.png" media="(min-width: 768px)" type="image/png" width="1034" height="632">
              <img width="703" height="1848" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/order_sp.png" alt="ご注文の流れ">
            </picture>
          </div>

          <div class="p-order-sec03__button l-button l-button--center l-button--mt-md js-blurTrigger is-show">
            <?php
            $args = [
              'link'   => 'https://kokyou-sushi.take-eats.jp/',
              'text'   => 'ネット注文はこちら',
              'state'  => '--accent',
              'size'   => '--md',
              'br'     => false,
              'icon'   => true,
              'target' => true
            ];
            get_template_part('components/button', null, $args); ?>
          </div>

        </div>
      </div>
    </section>

    <section class="p-order-sec04 l-order-sec">
      <div class="p-order-sec04__inner l-inner">
        <div class="p-order-sec04__title-lv2-wrap p-order-sec04__title-lv2-wrap--line js-blurTrigger is-show">
          <h2 class="p-order-sec04__title-lv2 p-order-sec04__title-lv2--serif">お持ち帰り対応店舗</h2>
        </div>
        <div class="p-order-sec04__body">
          <div class="p-order-sec04__item">
            <div class="p-order-sec04__list js-blurTrigger is-show">
              <div class="p-order-sec04__title-lv3-wrap">
                <h3 class="p-order-sec04__title-lv3">廻る鼓響　吉田店</h3>
              </div>

              <?php
              $items = [
                [
                  'term' => '営業時間',
                  'desc' => '11:00～22:00'
                ],
                [
                  'term' => 'お支払方法',
                  'desc' => 'オンライン決済、店頭払い'
                ]
              ];
              if (!empty($items)) {
                foreach ($items as $item) {
                  get_template_part('components/definition', null, $item);
                }
              } ?>

              <div class="p-order-sec04__button l-button l-button--center l-button--mt-md js-blurTrigger is-show">
                <?php
                $args = [
                  'link'   => 'https://kokyou-sushi.take-eats.jp/select-shop-info/2219',
                  'text'   => '吉田店のお持ち帰り<br>ネット注文はこちら',
                  'state'  => '--accent',
                  'size'   => '--md',
                  'br'     => true,
                  'icon'   => true,
                  'target' => true
                ];
                get_template_part('components/button', null, $args); ?>
              </div>

            </div>
            <div class="p-order-sec04__list js-blurTrigger is-show">
              <div class="p-order-sec04__title-lv3-wrap">
                <h3 class="p-order-sec04__title-lv3">廻る鼓響　燕三条店</h3>
              </div>

              <?php
              $items = [
                [
                  'term' => '営業時間',
                  'desc' => '11:00～22:00'
                ],
                [
                  'term' => 'お支払方法',
                  'desc' => 'オンライン決済、店頭払い'
                ]
              ];
              if (!empty($items)) {
                foreach ($items as $item) {
                  get_template_part('components/definition', null, $item);
                }
              } ?>

              <div class="p-order-sec04__button l-button l-button--center l-button--mt-md js-blurTrigger is-show">
                <?php
                $args = [
                  'link'   => 'https://kokyou-sushi.take-eats.jp/select-shop-info/2220',
                  'text'   => '燕三条店のお持ち帰り<br>ネット注文はこちら',
                  'state'  => '--accent',
                  'size'   => '--md',
                  'br'     => true,
                  'icon'   => true,
                  'target' => true
                ];
                get_template_part('components/button', null, $args); ?>
              </div>

            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="p-order-sec05 l-order-sec">
      <div class="p-order-sec05__inner l-inner">

        <div class="p-order-sec05__title-lv2-wrap p-order-sec05__title-lv2-wrap--line js-blurTrigger is-show">
          <h2 class="p-order-sec05__title-lv2 p-order-sec05__title-lv2--serif">ご注意事項</h2>
        </div>

        <div class="p-order-sec05__body">
          <dl class="p-order-sec05__defi-list js-blurTrigger is-show">
            <div class="p-order-sec05__term-warp">
              <dt class="p-order-sec05__term">キャンセルについて</dt>
            </div>
            <dd class="p-order-sec05__desc">キャンセルは前日19時までとなります。当日のキャンセルをご希望の場合は直接店舗までお電話にてお問い合わせください。<br ca>注文IDがあればご注文内容の照会がスムーズになります。<br>尚、お受け取りご指定日に商品を受け取りに来られない場合はキャンセル料として全額をご負担いただきます。</dd>
          </dl>
          <dl class="p-order-sec05__defi-list js-blurTrigger is-show">
            <div class="p-order-sec05__term-warp">
              <dt class="p-order-sec05__term">注文確認メールが届かない場合</dt>
            </div>
            <dd class="p-order-sec05__desc">注文確認メールが届かない場合はお手数ですが、念のため各店舗へご確認をお願いいたします。<br>(ドメイン拒否をされている場合は受信できません。info@take-eats.jpからのメールが受信可能にしてください)</dd>
          </dl>
        </div>

      </div>
    </section>

  </section>
</main>
<?php get_footer(); ?>
