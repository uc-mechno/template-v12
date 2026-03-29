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

      $('.js-gnav-trigger').each(function () {
        $(this).addClass('is-blur');
      });
    } else {
      $(this).attr('aria-expanded', false).attr('aria-label', 'メニューを開く'); //対象メニューの展開ステートをfalseにし、labelを「開く」に変更
      $('#js-gnav').attr('aria-hidden', true).fadeOut(300); //メニューのhiddenステートをtrueにしてメニューを閉じる
      $('body').toggleClass('is-active');
    }
  });
};
