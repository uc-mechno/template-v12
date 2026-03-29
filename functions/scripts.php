<?php

function my_enqueue_script()
{
  /**
   * scriptの読み込み
   * ************************************************************************
   *
   * @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_enqueue_script
   * @link https://twotone.me/web/2323/
   * @link https://capitalp.jp/2018/05/02/complex-between-jquery-and-frontend/amp/
   * wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
   * @param string $handle ハンドル名を指定（初期値：なし）
   * @param string $src スクリプトの URL（初期値：false）
   * @param array $deps スクリプトが依存するスクリプトのハンドルの配列（初期値：array()）
   * @param string $ver 任意のバージョンを指定（初期値：false）
   * @param string $in_footer </body> 終了タグの前に配置（初期値：false）
   *
   */
  if (!is_admin()) {
    // 現在のバージョンとURIを保存。
    // CDNを使いたい方は$jquery_srcのURIを変更してもよい。

    // wordpress本体のjqueryを使う場合
    // global $wp_scripts;
    // $jquery = $wp_scripts->registered['jquery-core'];
    // $jquery_ver = $jquery->ver;
    // $jquery_src = $jquery->src;

    // CDNのjqueryを使う場合
    $jquery_ver = '3.7.0';
    $jquery_src = '//code.jquery.com/jquery-3.7.0.min.js';

    // 登録解除
    wp_deregister_script('jquery'); // jquery-core, jquery-migrateのエイリアスの削除
    wp_deregister_script('jquery-core'); // デフォルトjquery削除
    wp_deregister_script('jquery-migrate');  // デフォルトjquery-migrate削除

    // jQueryを登録する
    wp_enqueue_script('jquery');  // デフォルトのjqueryの読み込み

    wp_register_script('jquery', false, ['jquery-core'], $jquery_ver, true); // jQueryを登録する
    wp_register_script('jquery-core', $jquery_src, [], $jquery_ver, true); // jQueryコアを登録する

    // jQuery を CDN から読み込む
    // wp_enqueue_script(
    //   'jquery',
    //   '//code.jquery.com/jquery-3.7.0.min.js',
    //   [],
    //   '3.7.0',
    //   true //</body> 終了タグの前で読み込み
    // );

    wp_enqueue_script(
      'cookie',
      '//cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js',
      ['jquery'],
      null,
      true
    );

    wp_enqueue_script(
      'vivus',
      '//cdnjs.cloudflare.com/ajax/libs/vivus/0.4.6/vivus.min.js',
      ['cookie'],
      null,
      true
    );

    wp_enqueue_script(
      'swiper',
      '//cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js',
      ['vivus'],
      null,
      true
    );

    wp_enqueue_script(
      'modernizr',
      GET_PATH('js') . '/libs/modernizr-custom.min.js',
      ['swiper'],
      null,
      true
    );

    wp_enqueue_script(
      'script',
      GET_PATH('js') . '/bundle.js',
      ['modernizr'],
      date('YmdGis', filemtime(get_theme_file_path('/dist/assets/js/bundle.js'))),
      true
    );
  }
}

add_action('wp_enqueue_scripts', 'my_enqueue_script');
