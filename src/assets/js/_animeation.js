/**
 * フェードアニメーション
 * @name fadeAnime
 */
function fadeAnime() {
  $('.js-blurTrigger').each(function () {
    const elemPos = $(this).offset().top - 50;
    const scroll = $(window).scrollTop();
    const windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      $(this).addClass('is-blur');
    }
    // else {
    //   $(this).removeClass('is-blur');
    // }
  });
}

/**
 * ロードアニメーション
 * @name loadAnime
 */
// function loadAnime() {
//   $('.blurTrigger--load').each(function () {
//     const elemPos = $(this).offset().top - 50;
//     const scroll = $(window).scrollTop();
//     const windowHeight = $(window).height();
//     if (scroll >= elemPos - windowHeight) {
//       $(this).addClass('is-blur');
//     } else {
//       $(this).removeClass('is-blur');
//     }
//   });
// }
