<?php

/**
 * メニュー、サブメニューの表示、非表示
 * @link https://www.itti.jp/web-design/how-to-customize-your-wordpress-admin-menu/#chapter-1
 * @link https://qiita.com/konweb/items/5483efbe87087eff5cc8
 */
function my_add_remove_admin_menus()
{
  if (current_user_can('staff')) {
    global $menu;
    global $submenu;

    // メニューを非表示にする
    // unset($menu[2]);  // ダッシュボード
    // unset($menu[4]);  // メニューの線1
    // unset($menu[5]);  // 投稿
    // unset($menu[10]); // メディア
    // unset($menu[15]); // リンク
    unset($menu[20]); // ページ
    unset($menu[25]); // コメント
    // unset($menu[59]); // メニューの線2
    // unset($menu[60]); // テーマ
    // unset($menu[65]); // プラグイン
    unset($menu[70]); // プロフィール
    unset($menu[75]); // ツール
    unset($menu[80]); // 設定
    // unset($menu[90]); // メニューの線3

    // サブメニューを非表示にする
    // unset($submenu['index.php'][0]); //ホーム
    // unset($submenu['index.php'][10]); //更新
    // unset($submenu['upload.php'][5]); //ライブラリ
    // unset($submenu['upload.php'][10]); //新規追加
    // unset($submenu['edit-comments.php'][0]); //コメント一覧
    // unset($submenu['edit.php'][5]); //投稿一覧
    // unset($submenu['edit.php'][10]); //新規追加
    unset($submenu['edit.php'][15]); //カテゴリー
    unset($submenu['edit.php'][16]); //タグ
    // unset($submenu['edit.php?post_type=page'][5]); //固定ページ一覧
    // unset($submenu['edit.php?post_type=page'][10]); //新規追加
    // unset($submenu['themes.php'][5]); //テーマ
    // unset($submenu['themes.php'][6]); //カスタマイズ
    // unset($submenu['themes.php'][7]); //ウィジェット
    // unset($submenu['themes.php'][10]); //メニュー
    // unset($submenu['plugins.php'][5]); //インストール済みプラグイン
    // unset($submenu['plugins.php'][10]); //新規追加
    // unset($submenu['plugins.php'][15]); //プラグインファイルエディター
    // unset($submenu['users.php'][5]); //ユーザー一覧
    // unset($submenu['users.php'][10]); //新規追加
    // unset($submenu['users.php'][15]); //プロフィール
    // unset($submenu['tools.php'][5]); //利用可能なツール
    // unset($submenu['tools.php'][10]); //インポート
    // unset($submenu['tools.php'][15]); //エクスポート
    // unset($submenu['tools.php'][20]); //サイトヘルス
    // unset($submenu['tools.php'][25]); //個人データのエクスポート
    // unset($submenu['tools.php'][30]); //個人データの消去
    // unset($submenu['options-general.php'][10]); //一般
    // unset($submenu['options-general.php'][15]); //投稿設定
    // unset($submenu['options-general.php'][20]); //表示設定
    // unset($submenu['options-general.php'][25]); //ディスカッション
    // unset($submenu['options-general.php'][30]); //メディア
    // unset($submenu['options-general.php'][40]); //パーマリンク
    // unset($submenu['options-general.php'][45]); //プライバシー
  }
}
add_action('admin_menu', 'my_add_remove_admin_menus');

/**
 * アドミンバーーの表示、非表示
 * @link https://www.itti.jp/web-design/how-to-customize-your-wordpress-admin-menu/#chapter-1
 * @link https://qiita.com/konweb/items/5483efbe87087eff5cc8
 */
function remove_admin_bar_menus($wp_admin_bar)
{
  if (current_user_can('staff')) {
    $wp_admin_bar->remove_menu('wp-logo'); // ロゴ
    // $wp_admin_bar->remove_menu( 'about' ); // ロゴ / WordPressについて
    // $wp_admin_bar->remove_menu( 'wporg' ); // ロゴ / WordPress.org
    // $wp_admin_bar->remove_menu( 'documentation' ); // ロゴ / ドキュメンテーション
    // $wp_admin_bar->remove_menu( 'support-forums' ); // ロゴ / サポート
    // $wp_admin_bar->remove_menu( 'feedback' ); // ロゴ / フィードバック
    // $wp_admin_bar->remove_menu( 'site-name' ); // サイト名
    // $wp_admin_bar->remove_menu( 'view-site' ); // サイト名 / サイトを表示
    // $wp_admin_bar->remove_menu( 'updates' ); // 更新
    $wp_admin_bar->remove_menu('comments'); // コメント
    // $wp_admin_bar->remove_menu( 'new-content' ); // 新規
    // $wp_admin_bar->remove_menu( 'new-post' ); // 新規 / 投稿
    // $wp_admin_bar->remove_menu( 'new-media' ); // 新規 / メディア
    $wp_admin_bar->remove_menu('new-page'); // 新規 / 固定
    $wp_admin_bar->remove_menu('new-cfs'); // プラグイン / CFS
    // $wp_admin_bar->remove_menu( 'new-user' ); // 新規 / ユーザー
    // $wp_admin_bar->remove_menu( 'view' ); // 投稿を表示
    // $wp_admin_bar->remove_menu( 'my-account' ); // こんにちは、[ユーザー名]さん
    $wp_admin_bar->remove_menu('user-info'); // ユーザー / [ユーザー名]
    $wp_admin_bar->remove_menu('edit-profile'); // ユーザー / プロフィールを編
    // $wp_admin_bar->remove_menu( 'logout' ); // ユーザー / ログアウト
    // $wp_admin_bar->remove_menu( 'menu-toggle' ); // メニュー
    // $wp_admin_bar->remove_menu( 'search' ); // 検索
  }
}
add_action('admin_bar_menu', 'remove_admin_bar_menus', 999);

/**
 * 表示オプションの表示、非表示（remove_post_type_support）
 * ************************************************************************
 */

function remove_post_support()
{
  if (current_user_can('staff')) {

    // 投稿ページ
    // remove_post_type_support('post', 'author'); // 作成者
    // remove_post_type_support('post', 'excerpt'); // 抜粋
    // remove_post_type_support('post', 'trackbacks'); // トラックバック
    // remove_post_type_support('post', 'custom-fields'); // カスタムフィールド
    // remove_post_type_support('post', 'tag'); // タグ
    // remove_post_type_support('post', 'comments'); // コメント
    // remove_post_type_support('post', 'revisions'); // リビジョン
    // remove_post_type_support('post', 'page-attributes'); // 表示順
    // remove_post_type_support('post', 'post-formats'); // 投稿フォーマット

    // 固定ページ
    // remove_post_type_support('post', 'author'); // 作成者
    // remove_post_type_support('post', 'excerpt'); // 抜粋
    // remove_post_type_support('post', 'trackbacks'); // トラックバック
    // remove_post_type_support('post', 'custom-fields'); // カスタムフィールド
    // remove_post_type_support('post', 'tag'); // タグ
    // remove_post_type_support('post', 'comments'); // コメント
    // remove_post_type_support('post', 'revisions'); // リビジョン
    // remove_post_type_support('post', 'page-attributes'); // 表示順
    // remove_post_type_support('post', 'post-formats'); // 投稿フォーマット

  }
}
add_action('init', 'remove_post_support');


/**
 * ウィジェットの表示、非表示
 * ************************************************************************
 */

function unregister_default_widget()
{
  if (!current_user_can('administrator')) {

    // unregister_widget('WP_Widget_Pages'); // 固定ページ
    // unregister_widget('WP_Widget_Calendar'); // カレンダー
    // unregister_widget('WP_Widget_Archives'); // アーカイブ
    // unregister_widget('WP_Widget_Media_Audio'); // 音声
    // unregister_widget('WP_Widget_Media_Image'); // 画像
    // unregister_widget('WP_Widget_Media_Gallery'); // ギャラリー
    // unregister_widget('WP_Widget_Media_Video'); // 動画
    // unregister_widget('WP_Widget_Meta'); // メタ情報
    // unregister_widget('WP_Widget_Search'); // 検索
    // unregister_widget('WP_Widget_Text'); // テキスト
    // unregister_widget('WP_Widget_Categories'); // カテゴリー
    // unregister_widget('WP_Widget_Recent_Posts'); // 最近の投稿
    // unregister_widget('WP_Widget_Recent_Comments'); // 最近のコメント
    // unregister_widget('WP_Widget_RSS'); // RSS
    // unregister_widget('WP_Widget_Tag_Cloud'); // タグクラウド
    // unregister_widget('WP_Nav_Menu_Widget'); // ナビゲーションメニュー
    // unregister_widget('WP_Nav_Menu_Widget'); // カスタムメニュー
    // unregister_widget('WP_Widget_Custom_HTML'); // カスタムHTML
    // unregister_widget('WP_Widget_Block'); // ブロック
    // unregister_widget('AIOSEO\\Plugin\\Common\\Breadcrumbs\\Widget'); // AIOSEO - パンくずリスト
    // unregister_widget('bcn_widget'); // Breadcrumb NavXT
    // unregister_widget('WP_Custom_Post_Type_Widgets_Recent_Posts'); // blog新着
    // unregister_widget('WP_Custom_Post_Type_Widgets_Archives'); // blogアーカイブ
    // unregister_widget('WP_Custom_Post_Type_Widgets_Categories'); // blogカテゴリー
    // unregister_widget('WP_Custom_Post_Type_Widgets_Calendar'); // blogカレンダー
    // unregister_widget('WP_Custom_Post_Type_Widgets_Recent_Comments'); // blogコメント
    // unregister_widget('WP_Custom_Post_Type_Widgets_Tag_Cloud'); // blogタグ
    // unregister_widget('WP_Custom_Post_Type_Widgets_Search'); // blog検索
  }
}
add_action('widgets_init', 'unregister_default_widget');

/**
 * ダッシュボードのカスタマイズ
 * ************************************************************************
 */

function remove_dashboard_widget()
{

  if (current_user_can('staff')) {
    remove_meta_box('dashboard_right_now', 'dashboard', 'normal'); // 概要
    remove_meta_box('dashboard_activity', 'dashboard', 'normal'); // アクティビティ
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side'); // クイックドラフト
    remove_meta_box('dashboard_primary', 'dashboard', 'side'); // WordPressニュース
  }
}
add_action('wp_dashboard_setup', 'remove_dashboard_widget');


/**
 * dumpを使って確認すためだけの関数
 * ***********************************************************************
 */
/*
function dump_menu()
{
  global $menu;
  global $submenu;
  var_dump($menu);
  var_dump($submenu);
}
add_action('admin_menu', 'dump_menu');
*/

/**
 * ウィジェット
 * ***********************************************************************
 */
/*
add_action('wp_footer', function () {
  if (empty($GLOBALS['wp_widget_factory']))
    return;
  $widgets = array_keys($GLOBALS['wp_widget_factory']->widgets);
  print '<pre>$widgets = ' . esc_html(var_export($widgets, TRUE)) . '</pre>';
});
*/


/**
 * メニューの並び替え
 * ************************************************************************
 */
/*
function my_custom_menu_order($menu_order)
{
  if (!$menu_order) return true;
  return array(
    'index.php', // ダッシュボード
    'separator1', // セパレータ１
    'edit.php', // 投稿
    'upload.php', // メディア
    'edit.php?post_type=page', //固定ページ
    'edit.php?post_type=mw-wp-form', // mwwpform
    'separator2', //セパレータ２
    'edit-comments.php', //コメント
    'separator-last', //最後のセパレータ
    'themes.php', //外観
    'plugins.php', //プラグイン
    'users.php', //ユーザー
    'tools.php', //ツール
    'options-general.php', //設定
  );
}
add_filter('custom_menu_order', 'my_custom_menu_order');
add_filter('menu_order', 'my_custom_menu_order');
*/

/**
 * 更新通知を管理者権限のみに表示
 */
function update_nag_admin_only()
{
  if (!current_user_can('administrator')) {
    remove_action('admin_notices', 'update_nag', 3);
  }
}
add_action('admin_init', 'update_nag_admin_only');

/**
 * 非管理者ユーザーによる管理バーの更新メニューを非表示にする関数です。
 */
function hide_before_admin_bar_render()
{
  if (!current_user_can('administrator')) {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('updates');
  }
}
add_action('wp_before_admin_bar_render', 'hide_before_admin_bar_render');

/**
 * 管理者のみにテーマの更新通知を表示するかどうかを判定する関数です。
 *
 * @param bool $value 更新通知を表示するかどうかの初期値
 * @return bool 更新通知を表示するかどうかの判定結果
 *
 * @link https://jito-site.com/wordpress-update-notification-hidden/
 */
function show_theme_update_notification_to_admins_only($value)
{
  if (!current_user_can('update_themes')) {
    return false;
  }
  return $value;
}
add_filter('pre_site_transient_update_themes', 'show_theme_update_notification_to_admins_only');

/**
 * 管理者のみにプラグインの更新通知を表示するかどうかを判定する関数です。
 *
 * @param bool $value 更新通知を表示するかどうかの初期値
 * @return bool 更新通知を表示するかどうかの判定結果
 *
 * @link https://jito-site.com/wordpress-update-notification-hidden/
 */
function show_update_notification_to_admins_only($value)
{
  if (!current_user_can('update_plugins')) {
    return false;
  }
  return $value;
}
add_filter('pre_site_transient_update_plugins', 'show_update_notification_to_admins_only');

/**
 * ダッシュボードにお知らせウィジェットを追加します。
 * @link https://hikkoshi.macnet.jp/blog/wp-admin-customize
 */
function announce_add_dashboard_widgets()
{
  wp_add_dashboard_widget(
    'announce_dashboard_widget',
    'お知らせ',
    'announce_dashboard_widget_function'
  );
}

/**
 * お知らせウィジェットのコンテンツを表示します。
 */
function announce_dashboard_widget_function()
{
  echo '
  <h2>更新マニュアル</h2>
  <p>左側サイドバーのマニュアルもしくは<a href="' . admin_url() . 'admin.php?page=manual_menu">こちら</a>をクリック</p>
  ';
}
add_action('wp_dashboard_setup', 'announce_add_dashboard_widgets');

/**
 * カスタムログインスタイルを設定します。
 */
function custom_login_style()
{ ?>
  <style>
    body.login h1 a {
      width: 150px;
      height: 80px;
      background-repeat: no-repeat;
      background-size: cover;
      background-image: url(<?php echo GET_PATH(); ?>/login_logo.svg);
    }
  </style>
<?php }
add_action('login_enqueue_scripts', 'custom_login_style');

/**
 * カスタムログインロゴのURLを取得します。
 *
 * @return string ロゴのURL
 */
function custom_login_logo_url()
{
  return get_home_url();
}
add_filter('login_headerurl', 'custom_login_logo_url');

/**
 * カスタムログインロゴのURLタイトルを取得します。
 *
 * @return string ロゴのURLタイトル
 */
function custom_login_logo_url_title()
{
  return 'トップページを表示';
}
add_filter('login_headertext ', 'custom_login_logo_url_title');

/**
 * 特定の条件に基づいて利用可能なブロックタイプを制限または許可する関数です。
 *
 * @return array 制限または許可されるブロックタイプの配列。
 * @link https://snippet.m-g-n.me/2023/12/05/884
 * @link https://gist.github.com/megane9988/4404835c86d2f265d294f58bb480468d
 */
function mgn_custom_allowed_block_types()
{
  // 主要なroles: administrator, editor, author, contributor, subscriber.
  $user_roll = 'staff';
  // 現在のユーザー情報を取得.
  $user = wp_get_current_user();
  // 特定の条件に基づいて利用可能なブロックタイプを許可.
  if (in_array($user_roll, $user->roles, true)) {
    $allowed_block_types = array(
      'core/image',
      'core/paragraph',
      // ブロック一覧
      // 'core/audio'
      // 'core/button'
      // 'core/buttons'
      // 'core/freeform'
      // 'core/code'
      // 'core/column'
      // 'core/columns'
      // 'core/details'
      // 'core/group'
      // 'core/html'
      // 'core/list'
      // 'core/list-item'
      // 'core/media-text'
      // 'core/missing'
      // 'core/more'
      // 'core/nextpage'
      // 'core/paragraph'
      // 'core/preformatted'
      // 'core/pullquote'
      // 'core/quote'
      // 'core/separator'
      // 'core/social-links'
      // 'core/spacer'
      // 'core/table'
      // 'core/table-of-contents'
      // 'core/text-columns'
      // 'core/verse'
      // 'core/video'
      // 'core/embed'
      // 'core/widget-area'
      // 'core/social-link-amazon'
      // 'core/social-link-bandcamp'
      // 'core/social-link-behance'
      // 'core/social-link-chain'
      // 'core/social-link-codepen'
      // 'core/social-link-deviantart'
      // 'core/social-link-dribbble'
      // 'core/social-link-dropbox'
      // 'core/social-link-etsy'
      // 'core/social-link-facebook'
      // 'core/social-link-feed'
      // 'core/social-link-fivehundredpx'
      // 'core/social-link-flickr'
      // 'core/social-link-foursquare'
      // 'core/social-link-goodreads'
      // 'core/social-link-google'
      // 'core/social-link-github'
      // 'core/social-link-instagram'
      // 'core/social-link-lastfm'
      // 'core/social-link-linkedin'
      // 'core/social-link-mail'
      // 'core/social-link-mastodon'
      // 'core/social-link-meetup'
      // 'core/social-link-medium'
      // 'core/social-link-pinterest'
      // 'core/social-link-pocket'
      // 'core/social-link-reddit'
      // 'core/social-link-skype'
      // 'core/social-link-snapchat'
      // 'core/social-link-soundcloud'
      // 'core/social-link-spotify'
      // 'core/social-link-tumblr'
      // 'core/social-link-twitch'
      // 'core/social-link-twitter'
      // 'core/social-link-vimeo'
      // 'core/social-link-vk'
      // 'core/social-link-wordpress'
      // 'core/social-link-yelp'
      // 'core/social-link-youtube'
      // 'advgb/recent-posts'
      // 'core/archives'
      // 'core/avatar'
      // 'core/block'
      // 'core/calendar'
      // 'core/categories'
      // 'core/cover'
      // 'core/comment-author-avatar'
      // 'core/comment-author-name'
      // 'core/comment-content'
      // 'core/comment-date'
      // 'core/comment-edit-link'
      // 'core/comment-reply-link'
      // 'core/comment-template'
      // 'core/comments-pagination'
      // 'core/comments-pagination-next'
      // 'core/comments-pagination-numbers'
      // 'core/comments-pagination-previous'
      // 'core/comments-title'
      // 'core/comments'
      // 'core/footnotes'
      // 'core/file'
      // 'core/home-link'
      // 'core/image'
      // 'core/gallery'
      'core/heading'
      // 'core/latest-comments'
      // 'core/latest-posts'
      // 'core/loginout'
      // 'core/navigation'
      // 'core/navigation-link'
      // 'core/navigation-submenu'
      // 'core/page-list'
      // 'core/page-list-item'
      // 'core/pattern'
      // 'core/post-author'
      // 'core/post-author-name'
      // 'core/post-author-biography'
      // 'core/post-comment'
      // 'core/post-comments-count'
      // 'core/post-comments-form'
      // 'core/post-comments-link'
      // 'core/post-content'
      // 'core/post-date'
      // 'core/post-excerpt'
      // 'core/post-featured-image'
      // 'core/post-navigation-link'
      // 'core/post-terms'
      // 'core/post-time-to-read'
      // 'core/post-title'
      // 'core/query'
      // 'core/post-template'
      // 'core/query-no-results'
      // 'core/query-pagination'
      // 'core/query-pagination-next'
      // 'core/query-pagination-numbers'
      // 'core/query-pagination-previous'
      // 'core/query-title'
      // 'core/read-more'
      // 'core/rss'
      // 'core/search'
      // 'core/shortcode'
      // 'core/social-link'
      // 'core/site-logo'
      // 'core/site-tagline'
      // 'core/site-title'
      // 'core/tag-cloud'
      // 'core/template-part'
      // 'core/term-description'
      // 'core/legacy-widget'
      // 'core/widget-group'
      // 'core/post-comments'
      // https://developer.wordpress.org/block-editor/developers/block-api/block-registration/ .
    );
  }
  return $allowed_block_types;
}
add_filter('allowed_block_types_all', 'mgn_custom_allowed_block_types', 10, 2);
