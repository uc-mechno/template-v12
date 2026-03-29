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
