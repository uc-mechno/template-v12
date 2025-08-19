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
