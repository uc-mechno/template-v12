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
