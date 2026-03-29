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
