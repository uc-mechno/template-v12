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
