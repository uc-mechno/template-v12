<?php

function my_theme_setup()
{

  /**
   * 翻訳ファイルの場所を指定
   */
  // load_theme_textdomain('mytheme', get_template_directory() . '/languages');

  // load_plugin_textdomain( 'mytheme' , false, basename( dirname( __FILE__ ) ) .'/languages' );

  /**
   * コンテンツ幅（大サイス）の設定
   */
  function my_theme_content_width()
  {
    $GLOBALS['content_width'] = 640;
  }
  add_action('after_setup_theme', 'my_theme_content_width', 0);

  /**
   * アイキャッチ画像を利用できるようにする
   */
  add_theme_support('post-thumbnails');

  /**
   * 画像サイズを登録
   *
   * @link https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_image_size
   *
   */
  add_image_size('menu-gentei', 686, 968, true); // 鼓響のおすすめメニュー01
  add_image_size('menu-primary', 353, 265, true); // 鼓響のおすすめメニュー01
  add_image_size('menu-secondary', 735, 413, true); // 鼓響のおすすめメニュー02
  add_image_size('takeout', 735, 448, true); // 鼓響のお持ち帰りメニュー
  add_image_size('hero', 1980, 1384, true); // 鼓響のおすすめメニュー01

  /**
   * Titleタグ
   */
  add_theme_support('title-tag');

  /**
   * フィードリンク
   */
  add_theme_support('automatic-feed-links');

  /**
   * 抜粋を利用できるようにする
   */
  add_post_type_support('page', 'excerpt');

  /**
   * HTML5サポート
   */
  add_theme_support(
    'html5',
    [
      'search-form',
      'comment-form',
      'comment-list',
      'gallery',
      'caption',
      'style',
      'script',
    ]
  );
  /**
   * 投稿フォーマット
   */
  // add_theme_support( 'post-formats', array(
  //   'aside',
  //   'image',
  //   'video',
  //   'quote',
  //   'link',
  //   'gallery',
  //   'status',
  //   'audio',
  //   'chat',
  // ) )
  /**
   * カスタム背景
   */
  // add_theme_support(
  //   'custom-background',
  //   array(
  //     'default-image' => '',
  //     'default-preset' => 'default',
  //     'default-position-x' => 'left',
  //     'default-position-y' => 'top',
  //     'default-size' => 'auto',
  //     'default-repeat' => 'repeat',
  //     'default-attachment' => 'scroll',
  //     'default-color' => '',
  //     'wp-head-callback' => '_custom_background_cb',
  //     'admin-head-callback' => '',
  //     'admin-preview-callback' => '',
  //   )
  // );
  /**
   * カスタムロゴ
   */
  // add_theme_support(
  //   'custom-logo',
  //   array(
  //     'height'      => 100,
  //     'width'       => 400,
  //     'flex-height' => true,
  //     'flex-width'  => true,
  //     'header-text' => array('site-title', 'site-description'),
  //   )
  // );
  /**
   * テーマカスタマイザーでのウィジェット再読み込み
   */
  // add_theme_support('customize-selective-refresh-widgets');

  /**
 * カスタムメニュー
 */
  register_nav_menus(
    [
      'global_nav' => 'グローバルナビゲーション',
      'footer_nav' => 'フッターナビゲーション',
    ]
  );

  /**
   * ブロックエディターサポート
   */
  add_theme_support('wp-block-styles'); // wp-block-stylesの読み込み
  add_theme_support('align-wide'); // 画像投稿で、幅広/全幅が使えるように
  add_theme_support('dark-editor-style'); // ダークモードの実装
  add_theme_support('editor-styles'); // 投稿画面に、オリジナルCSSの読み込み
  add_editor_style('/dist/assets/css/editor-style.css'); // オリジナルCSSのパス
  add_theme_support('responsive-embeds'); // YouTubeなどの埋め込みコンテンツをレスポンシブに
  remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'my_theme_setup');
