/* --------------------------------------------------------------
>>> TABLE OF CONTENTS:
----------------------------------------------------------------
# drawerMenu
# checkBreakPoint
# headerFixed
# smoothScroll
# accordionMenu
# fadeAnime
# swiper
  - topMvSwiper
  - topNewsSwiper
# Vivus
# switchViewport
*/

/**
 * ドロワーメニュー
 * @name drawerMenu
 */
function drawerMenu() {
  $('#js-hamburger').on('click', function () {
    const $expanded = $(this).attr('aria-expanded'); //aria-expandedの値を変数expandedに格納

    if ($expanded === 'false') {
      $(this).attr('aria-expanded', true).attr('aria-label', 'メニューを閉じる'); //対象メニューの展開ステートをtrueにし、labelを「閉じる」に変更
      $('#js-gnav').attr('aria-hidden', false).fadeIn(300); //メニューのhiddenステートをfalseにしてメニューを表示
      $('body').toggleClass('is-active');

      $('.blurTrigger').each(function () {
        $(this).addClass('blur');
      });
    } else {
      $(this).attr('aria-expanded', false).attr('aria-label', 'メニューを開く'); //対象メニューの展開ステートをfalseにし、labelを「開く」に変更
      $('#js-gnav').attr('aria-hidden', true).fadeOut(300); //メニューのhiddenステートをtrueにしてメニューを閉じる
      $('body').toggleClass('is-active');
    }
  });
};

/**
 * ブレイクポイントをまたいだ時にaria属性も動的に設定する関数
 * @name checkBreakPoint
 */
function checkBreakPoint() {
  const $windowWidth = $(window).width(); // 幅を一度だけ取得
  if ($windowWidth >= 768) {
    $('#js-gnav').attr('aria-hidden', false).show(); //グロナビを表示
  } else {
    //スマホレイアウトの初期状態にリセット
    $('#js-hamburger').attr('aria-expanded', false).attr('aria-label', 'メニューを開く');
    $('#js-gnav').attr('aria-hidden', true).hide();
  }
}

/**
 * ヘッダー固定
 * @name headerFixed
 */
function headerFixed(){
  const $hamburger = $('.c-hamburger');
  const $headerHeight = $('.p-header').height();
  const $height = $('.js-mv-height').height();

  if ($(this).scrollTop() > $height - $headerHeight) {
    $hamburger.addClass('is-fixed');
  } else {
    $hamburger.removeClass('is-fixed');
  }
}

/**
 * ページトップへ戻る
 * @name scrollTop
 */
function scrollTop () {
  $('.js-page-top').click(function () {
    $('body,html').animate(
      {
        scrollTop: 0,
      },
      800,
      'swing'
    );
    return false;
  });
};

/**
 * スムーススクロール
 * @name smoothScroll
 */
function smoothScroll() {
  $(function () {
    const $time = 800; // スクロールアニメーションにかかる時間（ミリ秒）
    const $headerHightPc = 40; // ヘッダーの高さ（ピクセル）
    const $headerHightSp = 8; // ヘッダーの高さ（ピクセル）
    // ヘッダーの高さの分の場合はこちらを使用
    // const $headerHight = $('header').innerHeight();

    $(document).on('click', 'a[href*="#"]', function () {
      const $target = $(this.hash); // クリックされたリンクのハッシュ部分の要素を取得
      if (!$target.length) return; // 要素が存在しない場合は処理を中断
      const $targetY = $target.offset().top - $headerHightPc; // 要素の位置までのスクロール量を計算
      $('html,body').animate({ scrollTop: $targetY }, $time, 'swing'); // スクロールアニメーションを実行
      return false;
    });

    const $urlHash = location.hash; // URLのハッシュ部分を取得
    if (!$urlHash.length) return; // ハッシュ部分が存在しない場合は処理を中断
    $('body,html').stop().scrollTop(0); // ページの先頭にスクロール
    setTimeout(function () {
      const $target = $($urlHash); // ハッシュ部分の要素を取得
      const $targetY = $target.offset().top - $headerHightSp; // 要素の位置までのスクロール量を計算
      $('body,html').stop().animate({ scrollTop: $targetY }, $time, 'swing'); // スクロールアニメーションを実行
    }, 100);

    // アコーディオンを開く
    $($urlHash).find('.js-accordion-title').addClass('is-open'); // アコーディオンの矢印を回転
    $($urlHash).find('.js-accordion-area').show(); // アコーディオンを開く
  });
}

/**
 * アコーディオン
 * @name accordionMenu
 */
function accordionMenu() {
  $('.js-accordion-title').on('click', function () {
    if ($(window).width() >= 768) {
      return; // ブレークポイントがマッチする場合は処理を終了
    }

    const $accordionAreaElm = $(this).next('.js-accordion-area'); // 直後のアコーディオンを行うエリアを取得

    $accordionAreaElm.slideToggle(); // アコーディオンの上下動作

    $(this).toggleClass('is-open'); // クラス名closeの追加・削除をトグルする
    $accordionAreaElm.toggleClass('is-show'); // クラス名closeの追加・削除をトグルする
  });
  if ($(window).width() <= 768) { // ウィンドウの幅が768以下の場合
    $('.js-accordion-area').hide(); // cssのdisplay: grid;が無効になるので、jsで非表示にする
    // $('.p-menus-sec:first-of-type .js-accordion-title').addClass('is-open'); // 最初のアコーディオンを開いておく
    // $('.p-menus-sec:first-of-type .js-accordion-area').addClass('is-show').show(); // 最初のアコーディオンを開いておく
  }
}

/**
 * フェードアニメーション
 * @name fadeAnime
 */
function fadeAnime() {
  $('.blurTrigger').each(function () {
    const elemPos = $(this).offset().top - 50;
    const scroll = $(window).scrollTop();
    const windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('blur');
    } else {
      $(this).removeClass('blur');
    }
  });

  $('.lineTrigger').each(function () {
    const elemPos = $(this).offset().top - 50;
    const scroll = $(window).scrollTop();
    const windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('lineanime');
    } else {
      $(this).removeClass('lineanime');
    }
  });
}

/**
 * 関数をまとめる
 */
drawerMenu();
accordionMenu();
scrollTop();
smoothScroll();

/**
 * スクロールイベントが発生した時に呼ばれる関数。
 */
$(window).scroll(function () {
  fadeAnime()
  headerFixed();
});

/**
 * ページが読み込まれた時に呼ばれる関数。
 */
$(window).on("load", function () {
    $('#js-splash').delay(3000).fadeOut('slow'); //ローディング画面を待機してからフェイドアウト
    $('#js-splash_logo').delay(3000).fadeOut('slow'); //ロゴを待機してからフェイドアウト
    // stroke.play(); //SVGアニメーションの実行
});

/**
 * ウィンドウのサイズが変更された時に呼ばれる関数。
 */
$(window).resize(function () {
  checkBreakPoint();
});


/**
 * トップページmainvisualのSwiper
 */
const topMvSwiper = new Swiper('.js-top-mv-swiper', {
  loop: true,
  effect: 'fade', // フェード切り替え
  // 自動再生
  autoplay: {
    delay: 4000, // 4秒後に次のスライドへ
    disableOnInteraction: false, // ユーザーが操作しても自動再生を継続
  },
  speed: 2000,
  // pagination: {
  //   el: '.swiper-pagination',
  //   clickable: true,
  // },
});

/**
 * トップページnewsのSwiper
 */
const topNewsSwiper = new Swiper('.js-top-news-swiper', {
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  spaceBetween: '2.5%',
  slidesPerView: 2.5,
  breakpoints: {
    768: {
      spaceBetween: '2.5%',
      slidesPerView: 3.5,
    },
    1400: {
      spaceBetween: '2.5%',
      slidesPerView: 4,
    },
  },
});

/**
 * Vivus
 */
// var stroke;
const stroke = new Vivus('js-mask', {
  //アニメーションをするIDの指定
  start: 'manual', //自動再生をせずスタートをマニュアルに
  type: 'scenario-sync', // アニメーションのタイプを設定
  duration: 70, //アニメーションの時間設定。数字が小さくなるほど速い
  forceRender: false, //パスが更新された場合に再レンダリングさせない
  animTimingFunction: Vivus.EASE_OUT, //動きの加速減速設定
});

$(window).on("load", function () {
  stroke.play(); //SVGアニメーションの実行
});

/**
 * ビューポートの設定
 *
 * ウィンドウの幅が360より大きい場合はビューポートを初期縮尺率で設定し、それ以外の場合はビューポートの幅を360に設定します。
 */
!(function () {
  const viewport = document.querySelector('meta[name="viewport"]');

  function switchViewport() {
    // ウィンドウの幅が360より大きい場合、ビューポートを初期縮尺率で設定する
    // それ以外の場合は、ビューポートの幅を360に設定する
    const value = window.outerWidth > 360 ? 'width=device-width,initial-scale=1' : 'width=360';

    // ビューポートのcontent属性がvalueと異なる場合、valueに更新する
    if (viewport.getAttribute('content') !== value) {
      viewport.setAttribute('content', value);
    }
  }
  // ウィンドウのリサイズ時にswitchViewport関数を呼び出す
  addEventListener('resize', switchViewport, false);

  // 初回読み込み時にswitchViewport関数を呼び出す
  switchViewport();
})();
//# sourceMappingURL=sourcemaps/bundle.js.map
