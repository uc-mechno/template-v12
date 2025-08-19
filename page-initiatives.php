<?php get_header(); ?>

<main class="l-main">
  <div class="l-page-header l-page-header--vertical js-mv-height l-mv">

    <div class="l-page-header__title js-blurTrigger is-show">
      <?php
      $args = [
        'text'   => get_the_title(),
        'state'  => '--vertical'
      ];
      get_template_part('components/title', null, $args); ?>
    </div>

  </div>
  <div class="p-initiatives-lead l-initiatives-sec js-blurTrigger is-show">
    <div class="p-initiatives-lead__inner l-inner">
      <p class="p-initiatives-lead__text"> 鼓響では国連が提唱する「SDGs（持続可能な開発目標）」に賛同します。<br class="u-md-show" />国際社会の一員としてより良い社会の実現に向け、事業を通して貢献していきます。<br class="u-md-show" />各店舗で共通の目標を持ち、目標達成に向けた課題解決に取り組み、HPでの情報発信を行うことで、<br class="u-md-show" />SDGsを地域の皆様にも広げ、手を取り合い、持続可能な社会の実現を目指していきます。 </p>
    </div>
  </div>
  <div class="p-initiatives-pr-area l-initiatives-pr-area">
    <div class="p-initiatives-pr-area--bg01">
      <section class="p-initiatives-sec01">
        <div class="p-initiatives-sec01__img js-blurTrigger is-show">
          <img width="1000" height="1000" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/initiatives01.jpg" alt="金屏風" />
        </div>
        <div class="p-initiatives-sec01__body">
          <h2 class="p-initiatives-sec01__title js-blurTrigger is-show">持続可能な社会の<br />実現を目指して</h2>
          <div class="p-initiatives-sec01__images js-blurTrigger is-show">
            <img width="700" height="417" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs01.png" alt="SDGS GOALS" />
          </div>
          <dl class="p-initiatives-sec01__list js-blurTrigger is-show">
            <dt class="p-initiatives-sec01__term">◆正社員にSDGsバッジを配布します</dt>
            <dd class="p-initiatives-sec01__desc">白衣の名札の横に装着します</dd>
          </dl>
          <dl class="p-initiatives-sec01__list js-blurTrigger is-show">
            <dt class="p-initiatives-sec01__term">◆ホームページにて情報発信します</dt>
            <dd class="p-initiatives-sec01__desc">ＳＤＧｓに関する取り組みについて情報発信を行い、地域の皆様と共に目標達成を目指します。</dd>
          </dl>
        </div>
      </section>
    </div>
  </div>
  <section class="p-initiatives-sec02 l-initiatives-sec">
    <div class="p-initiatives-sec02__inner l-inner">
      <div class="p-initiatives-sec02__title-lv3-wrap js-blurTrigger is-show">
        <h3 class="p-initiatives-sec02__title-lv2">1.女性も男性も共に活躍できる職場環境づくりに努めます。</h3>
      </div>
      <div class="p-initiatives-sec02__body js-blurTrigger is-show">
        <div class="p-initiatives-sec02__text-wrwp">
          <p class="p-initiatives-sec02__text">男性も女性も平等に、出産や育児・介護をしながら仕事を続けていけるよう全ての従業員が共に活躍できる働きやすい職場環境づくりに努めています。</p>
        </div>
        <div class="p-initiatives-sec02__img-wrap">
          <div class="p-initiatives-sec02__img">
            <img width="250" height="250" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs05.png" alt="5ジェンダー平等を実現しよう">
          </div>
          <div class="p-initiatives-sec02__img">
            <img width="250" height="250" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs03.png" alt="8働きがいも経済成長も">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-initiatives-sec03 l-initiatives-sec">
    <div class="p-initiatives-sec03__inner l-inner">
      <div class="p-initiatives-sec03__title-lv3-wrap js-blurTrigger is-show">
        <h3 class="p-initiatives-sec03__title-lv2">2.太陽光パネルで自家発電にて環境負荷を削減し、地球環境保全に貢献します。</h3>
      </div>
      <div class="p-initiatives-sec03__body js-blurTrigger is-show">
        <div class="p-initiatives-sec03__text-wrwp">
          <p class="p-initiatives-sec03__text">太陽光パネルにおいて、クリーンなエネルギーを供給することで、気候変動対策に貢献します。100%再生可能エネルギーを目指し、永久持続可能な消費と再生のサイクルを作り出すことを目標に掲げます。屋根に太陽光パネルを設置し電力を消費、売電などを通じて、低炭素社会の実現に向けて努力しています。</p>
        </div>
        <div class="p-initiatives-sec03__img-wrap">
          <div class="p-initiatives-sec03__img">
            <img width="250" height="250" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs04.png" alt="13機構変動に具体的な対策を">
          </div>
          <div class="p-initiatives-sec03__img">
            <img width="250" height="250" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs06.png" alt="7エネルギーをみんなにそしてクリーンに">
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="p-initiatives-sec04 l-initiatives-sec">
    <div class="p-initiatives-sec04__inner l-inner">
      <div class="p-initiatives-sec04__title-lv3-wrap js-blurTrigger is-show">
        <h3 class="p-initiatives-sec04__title-lv2">3.つくる責任つかう責任</h3>
      </div>
      <div class="p-initiatives-sec04__body js-blurTrigger is-show">
        <div class="p-initiatives-sec04__text-wrwp">
          <p class="p-initiatives-sec04__text">廃油を各店舗で回収し、産業廃棄物収集業者を通じてトイレットペーパーやバイオ燃料として、再利用させて頂いています。</p>
        </div>
        <div class="p-initiatives-sec04__img-wrap">
          <div class="p-initiatives-sec04__img">
            <img width="250" height="250" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs08.png" alt="5ジェンダー平等を実現しよう">
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="p-initiatives-sec05 l-initiatives-sec">
    <div class="p-initiatives-sec05__inner l-inner">
      <div class="p-initiatives-sec05__title-lv3-wrap js-blurTrigger is-show">
        <h3 class="p-initiatives-sec05__title-lv2">4.海の豊かさを守ろう</h3>
      </div>
      <div class="p-initiatives-sec05__body js-blurTrigger is-show">
        <div class="p-initiatives-sec05__text-wrwp">
          <p class="p-initiatives-sec05__text">温暖化や乱獲等で生態系が崩れ、同時に食品ロスなどが大きな社会問題となっております。海への感謝と現在の海産資源を守るため、小社でも食材廃棄削減に努めて参ります。</p>
        </div>
        <div class="p-initiatives-sec05__img-wrap">
          <div class="p-initiatives-sec05__img">
            <img width="250" height="250" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/sdgs07.png" alt="5ジェンダー平等を実現しよう">
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php get_footer(); ?>
