<?php

/**
 * styleの読み込み
 * ************************************************************************
 *
 * @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_enqueue_style
 * wp_enqueue_style($handle, $src, $deps, $ver, $media);
 * @link https://wemo.tech/205
 * @param string $handle ハンドル名を指定（初期値：なし）
 * @param string $src スタイルシートへのパス（初期値：false）
 * @param array $deps 他のスタイルシートのハンドル名を配列で指定（初期値：array()）
 * @param string $ver 任意のバージョンを指定（初期値：false）
 * @param string $media media属性に関する指定（初期値：all）
 */
function my_enqueue_styles()
{

  wp_enqueue_style(
    'swiper',
    'https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css',
    [],
    null,
  );

  wp_enqueue_style(
    'style',
    GET_PATH('css') . '/bundle.css',
    ['swiper'],
    date('YmdGis', filemtime(get_theme_file_path('/dist/assets/css/bundle.css')))
  );

  wp_enqueue_style(
    'shame',
    GET_PATH('css') . '/shame.css',
    ['style'],
    date('YmdGis', filemtime(get_theme_file_path('/dist/assets/css/shame.css')))
  );

}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');
