<?php get_header(); ?>

<main class="l-main">

  <section class="p-top-mv js-mv-height">
    <div class="p-top-mv__inner">
      <div class="p-top-mv__header">

        <h2 class="p-top-mv__title">
          <span class="p-top-mv__title-col01">厳選された素材の</span>
          <br>
          <?php if (is_sp()) : ?>
            <span class="p-top-mv__title-col02">本物の味をご賞味ください</span>
          <?php else : ?>
            <span class="p-top-mv__title-col02">本物の味を</span>
            <br>
            <span class="p-top-mv__title-col03">ご賞味ください</span>
          <?php endif; ?>
        </h2>

      </div>
      <div class="p-top-mv__video">
        <video src="<?php echo get_template_directory_uri(); ?>/dist/assets//video/mv01.mp4" autoplay="" muted="" playsinline="" loop=""></video>
      </div>

      <?php /* スライダー一旦、コメントアウト
      <div class="swiper p-top-mv-swiper js-top-mv-swiper">
        <div class="swiper-wrapper p-top-mv-swiper__wrapper">
          <div class="swiper-slide p-top-mv-swiper__slide">
            <div class="swiper-img p-top-mv-swiper__img p-top-mv-swiper__img--slide01"></div>
          </div>
          <div class="swiper-slide p-top-mv-swiper__slide">
            <div class="swiper-img p-top-mv-swiper__img p-top-mv-swiper__img--slide02"></div>
          </div>
          <div class="swiper-slide p-top-mv-swiper__slide">
            <div class="swiper-img p-top-mv-swiper__img p-top-mv-swiper__img--slide03"></div>
          </div>
        </div>
        <div class="swiper-pagination p-top-mv-swiper__pagination"></div>
      </div>
      */ ?>

      <div class="p-top-mv__scroll"><span>SCROLL</span></div>
    </div>
  </section>
  <!-- /p-mv -->

  <section class="p-top-gentei">
    <div class="p-top-gentei__inner">

      <div class="p-top-gentei__header js-blurTrigger is-show">

        <?php
        $args = [
          'text'   => 'おすすめ企画<br>限定メニュー',
          'level'  => '--lv2--primary',
          'order'  => '--indent'
        ];
        get_template_part('components/heading', null, $args); ?>

      </div>

      <div class="p-top-gentei__wrap">

        <div class="swiper p-top-gentei__list js-top-gentei-swiper js-blurTrigger is-show">
          <ul class="swiper-wrapper p-top-gentei__items">

            <?php
            $posts = get_primary_posts('post', 'osusume');
            if ($posts) :
              foreach ($posts as $post) : setup_postdata($post);
            ?>

                <li class="swiper-slide p-top-gentei__item">
                  <a href="<?php the_permalink(); ?>">
                    <div class="p-top-gentei__img">
                      <?php get_eyecatch_default(get_the_ID(), 'menu-gentei', 'eager'); ?>
                    </div>
                  </a>
                </li>

            <?php wp_reset_postdata();
              endforeach;
            endif; ?>
          </ul>

        </div>

        <div class="p-top-gentei__controller js-blurTrigger is-show">
          <div class="p-top-gentei__controller-wrap">
            <div class="swiper-button-prev p-top-gentei__button-prev"></div>
            <div class="swiper-pagination p-top-gentei__pagination"></div>
            <div class="swiper-button-next p-top-gentei__button-next"></div>
          </div>
        </div>

      </div>

    </div>

  </section>
  <!-- /p-top-gentei -->

  <section class="p-top-news l-news-archive">
    <div class="l-news-archive__inner l-news-archive__inner--full">

      <div class="p-top-news__header js-blurTrigger is-show">
        <?php
        $args = [
          'text'   => 'お知らせ',
          'level'  => '--lv2',
          'order'  => '--horizontal'
        ];
        get_template_part('components/heading', null, $args); ?>
      </div>

      <div class="l-news-archive__list js-blurTrigger is-show">
        <ul class="l-news-archive__items">

          <?php
          $posts = get_primary_posts('post', 'news', 3);
          if ($posts) :
            foreach ($posts as $post) : setup_postdata($post); ?>

              <?php get_template_part('components/list', null); ?>

          <?php wp_reset_postdata();
            endforeach;
          endif; ?>
        </ul>
      </div>
    </div>
    <p class="p-top-news__link js-blurTrigger is-show">
      <a href="<?php echo esc_url(home_url('/news/')); ?>">お知らせ一覧</a>
    </p>

  </section>
  <!-- /p-top-news -->

  <div class="p-top-menu-area p-top-bg">

    <section class="p-top-menu">

      <div class="p-top-menu__inner l-inner">
        <div class="p-top-menu__wrap">
          <div class="p-top-menu__header js-blurTrigger is-show">

            <?php
            $args = [
              'text'   => '定番メニュー',
              'level'  => '--lv2--primary',
              'order'  => null
            ];
            get_template_part('components/heading', null, $args); ?>

          </div>

          <div class="p-top-menu__body">

            <div class="p-top-menu__list">

              <div class="p-top-menu-item p-top-menu-item--1col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/menus/#zanmai')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">三昧盛り・づくし</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item01.jpg" alt="三昧盛り・づくし">
                    </div>
                  </div>
                </a>
              </div>

              <div class="p-top-menu-item p-top-menu-item--2col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/menus/#teiban')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">握り</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item02.jpg?var=20231201142446" alt="握り">
                    </div>
                  </div>
                </a>
              </div>

              <div class="p-top-menu-item p-top-menu-item--2col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/menus/#makimono')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">軍艦・巻物</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item03.jpg" alt="三昧盛り・づくし">
                    </div>
                  </div>
                </a>
              </div>

              <div class="p-top-menu-item p-top-menu-item--2col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/menus/#aburi')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">炙り・びっくり</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item04.jpg" alt="三昧盛り・づくし">
                    </div>
                  </div>
                </a>
              </div>

              <div class="p-top-menu-item p-top-menu-item--2col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/menus/#ippin')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">サイドメニュー</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item05.jpg" alt="三昧盛り・づくし">
                    </div>
                  </div>
                </a>
              </div>

              <div class="p-top-menu-item p-top-menu-item--2col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/menus/#lunch')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">ランチメニュー</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item06.jpg" alt="三昧盛り・づくし">
                    </div>
                  </div>
                </a>
              </div>

              <div class="p-top-menu-item p-top-menu-item--2col js-blurTrigger is-show">
                <a href="<?php echo esc_url(home_url('/takeout/')); ?>">
                  <div class="p-top-menu-item__inner">
                    <div class="p-top-menu-item__title js-blurTrigger is-show">
                      <h3 class="p-top-menu-item__heading">お持ち帰り</h3>
                    </div>
                    <div class="p-top-menu-item__img">
                      <img width="" height="" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/menu_item07.jpg" alt="三昧盛り・づくし">
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>

        <div class="p-top-bg__block">
          <img width="1920" height="790" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/common/bg03.png" alt="" />
        </div>

      </div>

    </section>
    <!-- /p-top-menu -->

  </div>
  <!-- /p-top-bg -->

  <div class="p-top-pr-area">

    <section class="p-top-kodawari">
      <div class="p-top-kodawari__inner">
        <div class="p-top-kodawari__body">
          <div class="p-top-kodawari__title js-blurTrigger is-show">
            <?php
            $args = [
              'text'   => '新潟の旬を味わう<br>心に響く匠の寿司',
              'level'  => '--lv2--secondary',
              'order'  => '--indent'
            ];
            get_template_part('components/heading', null, $args); ?>

            <?php /*
            <p class="p-top-kodawari__link p-top-kodawari__link--pc js-blurTrigger is-show"><a href="<?php echo esc_url(home_url('/kodawari/')); ?>">鼓響のこだわり</a></p>
            */ ?>
          </div>
          <div class="p-top-kodawari__img js-blurTrigger is-show">
            <img width="1200" height="750" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/pr_kodawari01.jpg?var=20231129110956" alt="職人が寿司を握る" />
          </div>
        </div>
      </div>
      <?php /*
      <p class="p-top-kodawari__link p-top-kodawari__link--sp js-blurTrigger is-show"><a href="<?php echo esc_url(home_url('/kodawari/')); ?>">鼓響のこだわり</a></p>
       */ ?>
    </section>
    <!-- /p-top-kodawari -->

    <section class="p-top-osusume">
      <div class="p-top-osusume__inner">
        <div class="p-top-osusume__body">
          <div class="p-top-osusume__img js-blurTrigger is-show">
            <img width="1200" height="750" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/pr_osusume01.jpg?var=20231129110956" alt="日替わりおすすめ心に響く匠の寿司" />
          </div>
          <div class="p-top-osusume__title js-blurTrigger is-show">
            <?php
            $args = [
              'text'   => '日替わりおすすめ<br>心に響く匠の寿司',
              'level'  => '--lv2--secondary',
              'order'  => '--indent'
            ];
            get_template_part('components/heading', null, $args); ?>
            <p class="p-top-osusume__link p-top-osusume__link--2line p-top-osusume__link--pc js-blurTrigger is-show">
              <a href="<?php echo esc_url(home_url('/menus/')); ?>">季節のおすすめ・<br>通常メニューはこちら</a>
            </p>
          </div>
        </div>
      </div>
      <p class="p-top-osusume__link p-top-osusume__link--2line p-top-osusume__link--sp js-blurTrigger is-show">
        <a href="<?php echo esc_url(home_url('/menus/')); ?>">季節のおすすめ・通常メニューはこちら</a>
      </p>
    </section>
    <!-- /p-top-osusume -->

    <div class="p-top-sdgs js-blurTrigger is-show">
      <div class="p-top-sdgs__inner l-inner">
        <div class="p-top-sdgs__img">
          <a href="<?php echo esc_url(home_url('/initiatives/')); ?>">
            <img width="654" height="320" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs.png" alt="sdgsへの取り組み">
          </a>
        </div>
      </div>
    </div>

  </div>
  <!-- /l-top-pr-area -->

  <div class="p-top-info-area p-top-bg">

    <section class="p-top-recruit" id="recruit">
      <div class="p-top-recruit__inner l-inner">
        <div class="p-top-recruit__body">
          <div class="p-top-recruit__title-lv2-wrap js-blurTrigger is-show">
            <h2 class="p-top-recruit__title-lv2">採用情報</h2>
          </div>
          <div class="p-top-recruit__wrap js-blurTrigger is-show">
            <div class="p-top-recruit__img">
              <img width="666" height="401" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/recruit01.png" alt="採用情報イメージ">
            </div>
            <div class="p-top-recruit__content">
              <p class="p-top-recruit__button"><a href="https://arwrk.net/recruit/r8s9rlk5zhwahme" target="_blank" rel="noopener noreferrer">正社員採用</a></p>
              <p class="p-top-recruit__button"><a href="https://kokyou-recruit.jp/" target="_blank" rel="noopener noreferrer">アルバイト採用</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- /p-top-recruit -->

    <div class="p-top-bg__block">
      <img width="1920" height="790" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/common/bg03.png" alt="" />
    </div>

  </div>
  <!-- /p-top-info-area -->

</main>
<?php get_footer(); ?>
