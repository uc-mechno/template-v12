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
  <section class="p-store-sec01 l-store-sec" id="yoshida">
    <div class="p-store-sec01__inner">
      <div class="p-store-sec01__title-lv2-wrap p-store-sec01__title-lv2-wrap--under-line js-blurTrigger is-show">
        <h2 class="p-store-sec01__title-lv2 p-store-sec01__title-lv2--serif">
          <img width="121" height="45" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_yoshida.svg" alt="廻る鼓響（こきょう）" title="廻る鼓響（こきょう）" aria-label="廻る鼓響（こきょう）" /> 吉田店
        </h2>
      </div>
      <div class="p-store-sec01__body">
        <div class="p-store-sec01__unit">
          <div class="p-store-sec01__item01">
            <div class="p-store-sec01__img js-blurTrigger is-show">
              <img width="666" height="401" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/exterior01.jpg?ver=202308311458" alt="廻る鼓響（こきょう）吉田店外観">
            </div>
            <div class="p-store-sec01__content js-blurTrigger is-show">
              <p class="p-store-sec01__text">カウンター席の他、ボックス席、座敷席、バリアフリー対応のトイレなど、 ご家族・お友達揃って楽しくご利用いただけます。お客様のご来店を心よりお待ちしております。</p>
            </div>
          </div>
        </div>

        <div class="p-store-sec01__unit">

          <div class="p-store-sec01__button js-blurTrigger is-show">
            <a href="https://lin.ee/RQi1V6h" target="_blank"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>

            <?php
            $args = [
              'link'   => 'https://kokyou-sushi.take-eats.jp/select-shop-info/2219',
              'text'   => '吉田店のお持ち帰り<br>ネット注文はこちら',
              'state'  => '--accent',
              'size'   => '--sm',
              'br'     => true,
              'icon'   => true,
              'target' => true
            ];
            get_template_part('components/button', null, $args); ?>

          </div>

        </div>
        <div class="p-store-sec01__unit">
          <div class="p-store-sec01__item02">
            <div class="p-store-sec01__list02 js-blurTrigger is-show">
              <div class="p-store-sec01__title-lv3-wrap">
                <h3 class="p-store-sec01__title-lv3">店舗情報</h3>
              </div>

              <?php
              $items = [
                [
                  'term' => '住所',
                  'desc' => '新潟県燕市吉田3520-1',
                ],
                [
                  'term' => '営業時間',
                  'desc' => '11:00～22:00　年中無休',
                ],
                [
                  'term' => 'TEL',
                  'desc' => '0256-92-5414',
                ],
                [
                  'term' => 'FAX',
                  'desc' => '0256-92-5322',
                ],
              ];
              if (!empty($items)) {
                foreach ($items as $item) {
                  get_template_part('components/definition', null, $item);
                }
              } ?>

            </div>
            <div class="p-store-sec01__list02 js-blurTrigger is-show">
              <div class="p-store-sec01__title-lv3-wrap">
                <h3 class="p-store-sec01__title-lv3">店舗詳細・設備</h3>
              </div>

              <?php
              $items = [
                [
                  'term' => '座席',
                  'desc' => '88席',
                ],
                [
                  'term' => 'カウンター',
                  'desc' => '12席',
                ],
                [
                  'term' => 'BOX',
                  'desc' => '6卓',
                ],
                [
                  'term' => '小上がり',
                  'desc' => '6卓',
                ],
                [
                  'term' => 'フリーWi-Fi',
                  'desc' => 'あり',
                ],
                [
                  'term' => 'ドリンクバー',
                  'desc' => 'あり',
                ],
                [
                  'term' => '店内禁煙',
                  'desc' => '全席禁煙',
                ],
              ];
              if (!empty($items)) {
                foreach ($items as $item) {
                  get_template_part('components/definition', null, $item);
                }
              } ?>

            </div>
          </div>
          <div class="p-store-sec01__item03 js-blurTrigger is-show">
            <figure class="p-store-sec01__figure">
              <img width="320" height="225" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/inside01.jpg?ver=202308311458" alt="ウンター席" />
            </figure>
            <figure class="p-store-sec01__figure">
              <img width="320" height="225" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/inside02.jpg?ver=202308311458" alt="BOX席" />
            </figure>
            <figure class="p-store-sec01__figure">
              <img width="320" height="225" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/inside03.jpg?ver=202308211756" alt="小上がり席" />
            </figure>
          </div>
        </div>
        <div class="p-store-sec01__unit">
          <div class="p-store-sec01__item04 js-blurTrigger is-show">
            <div class="p-store-sec01__title-lv3-wrap">
              <h3 class="p-store-sec01__title-lv3">アクセスマップ</h3>
            </div>
            <div class="p-store-sec01__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6180.462166362378!2d138.8826116343482!3d37.69651624610706!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5ff4e5d937b98f3b%3A0xadf07be313ea4aad!2z5bu744KL6byT6Z-_IOWQieeUsOW6lw!5e0!3m2!1sja!2sjp!4v1688537676995!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-store-sec02 l-store-sec" id="tubamesanjo">
    <div class="p-store-sec02__inner">
      <div class="p-store-sec02__title-lv2-wrap p-store-sec02__title-lv2-wrap--under-line js-blurTrigger is-show">
        <h2 class="p-store-sec02__title-lv2 p-store-sec02__title-lv2--serif">
          <img width="148" height="39" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/common/logo_tsubasan.svg" alt="回転寿司鼓響（こきょう）" title="回転寿司鼓響（こきょう）" aria-label="回転寿司鼓響（こきょう）" /> 燕三条店
        </h2>
      </div>
      <div class="p-store-sec02__body">
        <div class="p-store-sec02__unit">
          <div class="p-store-sec02__item01">
            <div class="p-store-sec02__img js-blurTrigger is-show">
              <img width="666" height="401" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/exterior02.jpg?ver=202308311458" alt="回転寿司鼓響（こきょう）燕三条店外観">
            </div>
            <div class="p-store-sec02__content js-blurTrigger is-show">
              <p class="p-store-sec02__text">カウンター席の他、ボックス席、座敷席、バリアフリー対応のトイレなど、 ご家族・お友達揃って楽しくご利用いただけます。お客様のご来店を心よりお待ちしております。</p>
            </div>
          </div>
        </div>
        <div class="p-store-sec01__unit">

          <div class="p-store-sec01__button js-blurTrigger is-show">

            <a href="https://lin.ee/sFXnIz8" target="_blank"><img src="https://scdn.line-apps.com/n/line_add_friends/btn/ja.png" alt="友だち追加" height="36" border="0"></a>

            <?php
            $args = [
              'link'   => 'https://kokyou-sushi.take-eats.jp/select-shop-info/2220',
              'text'   => '燕三条店のお持ち帰り<br>ネット注文はこちら',
              'state'  => '--accent',
              'size'   => '--sm',
              'br'     => true,
              'icon'   => true,
              'target' => true
            ];
            get_template_part('components/button', null, $args); ?>

          </div>

        </div>
        <div class="p-store-sec02__unit">
          <div class="p-store-sec02__item02">
            <div class="p-store-sec02__list02 js-blurTrigger is-show">
              <div class="p-store-sec02__title-lv3-wrap">
                <h3 class="p-store-sec02__title-lv3">店舗情報</h3>
              </div>

              <?php
              $items = [
                [
                  'term' => '住所',
                  'desc' => '新潟県三条市須頃2-110-1',
                ],
                [
                  'term' => '営業時間',
                  'desc' => '11:00～22:00　年中無休',
                ],
                [
                  'term' => 'TEL',
                  'desc' => '0256-64-8263',
                ],
                [
                  'term' => 'FAX',
                  'desc' => '0256-64-8706',
                ],
              ];
              if (!empty($items)) {
                foreach ($items as $item) {
                  get_template_part('components/definition', null, $item);
                }
              } ?>

            </div>
            <div class="p-store-sec02__list02 js-blurTrigger is-show">
              <div class="p-store-sec02__title-lv3-wrap">
                <h3 class="p-store-sec02__title-lv3">店舗詳細・設備</h3>
              </div>

              <?php
              $items = [
                [
                  'term' => '座席',
                  'desc' => '81席',
                ],
                [
                  'term' => 'カウンター',
                  'desc' => '15席',
                ],
                [
                  'term' => 'BOX',
                  'desc' => '7卓',
                ],
                [
                  'term' => '小上がり',
                  'desc' => '4卓',
                ],
                [
                  'term' => 'フリーWi-Fi',
                  'desc' => 'あり',
                ],
                [
                  'term' => 'ドリンクバー',
                  'desc' => 'あり',
                ],
                [
                  'term' => '店内禁煙',
                  'desc' => '全席禁煙',
                ],
              ];
              if (!empty($items)) {
                foreach ($items as $item) {
                  get_template_part('components/definition', null, $item);
                }
              } ?>

            </div>
          </div>
          <div class="p-store-sec02__item03 js-blurTrigger is-show">
            <figure class="p-store-sec02__figure">
              <img width="320" height="225" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/inside04.jpg?ver=202308211756" alt="ウンター席" />
            </figure>
            <figure class="p-store-sec02__figure">
              <img width="320" height="225" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/inside05.jpg?ver=202308211756" alt="BOX席" />
            </figure>
            <figure class="p-store-sec02__figure">
              <img width="320" height="225" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/inside06.jpg?ver=202308211756" alt="小上がり席" />
            </figure>
          </div>
        </div>
        <div class="p-store-sec02__unit">
          <div class="p-store-sec02__item04 js-blurTrigger is-show">
            <div class="p-store-sec02__title-lv3-wrap">
              <h3 class="p-store-sec02__title-lv3">アクセスマップ</h3>
            </div>
            <div class="p-store-sec02__map">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9851.704929988855!2d138.93410721419565!3d37.6454889475269!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x5ff4e35fe57a6b89%3A0xb579767d266a4d44!2z5Zue6Lui5a-_5Y-4IOm8k-mfvyDnh5XkuInmnaHlupc!5e0!3m2!1sja!2sjp!4v1688549551348!5m2!1sja!2sjp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-store-sec03 l-store-sec" id="payment">
    <div class="p-store-sec03__inner">
      <div class="p-store-sec03__title-lv2-wrap p-store-sec03__title-lv2-wrap--under-line js-blurTrigger is-show">
        <h2 class="p-store-sec03__title-lv2 p-store-sec03__title-lv2--serif">ご利用可能なお支払方法</h2>
      </div>
      <div class="p-store-sec03__body">
        <ul class="p-store-sec03__item">
          <li class="p-store-sec03__list js-blurTrigger is-show"><img width="450" height="200" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/payment01.png" alt="ご利用可能なクレジットカード"></li>
          <li class="p-store-sec03__list js-blurTrigger is-show"><img width="451" height="213" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/payment02.png" alt="ご利用可能な電子マネー"></li>
          <li class="p-store-sec03__list js-blurTrigger is-show"><img width="451" height="236" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/payment03.png" alt="ご利用可能なQR・バーコード決済"></li>
        </ul>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
