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
 * トップページgenteiのSwiper
 */
const topGenteiSwiper = new Swiper('.js-top-gentei-swiper', {
  loop: true,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.p-top-gentei__pagination', // ページネーションのクラス名を指定
    type: 'fraction',
  },
  spaceBetween: '13%',
  slidesPerView: 1.5,
  breakpoints: {
    420: {
      spaceBetween: '6%',
      slidesPerView: 2.5,
    },
    576: {
      spaceBetween: '4%',
      slidesPerView: 3.5,
    },
    768: {
      spaceBetween: '3%',
      slidesPerView: 4.5,
    },
    1400: {
      spaceBetween: '2.5%',
      slidesPerView: 4.5,
    }
  },
});
