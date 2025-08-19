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
