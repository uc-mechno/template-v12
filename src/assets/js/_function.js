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
    fadeAnime();
    // stroke.play();
});

/**
 * ウィンドウのサイズが変更された時に呼ばれる関数。
 */
$(window).resize(function () {
  checkBreakPoint();
});
