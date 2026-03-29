<?php

/**
 * wp_head()で出力されるタグの内、不要なものを削除
 *
 * @link https://digitalnavi.net/wordpress/6921/
 * @link https://wpqw.jp/wordpress/themes/head-clean/
 * @link https://labo.kon-ruri.co.jp/remove-tags-in-wp_head/
 * @link https://helog.jp/wordpress/wp_head/
 */
remove_action('wp_head', 'feed_links', 2); // フィード
remove_action('wp_head', 'feed_links_extra', 3); // コメントのフィード
// remove_action('wp_head', 'wp_print_styles', 8); // デフォルトCSS
remove_action('wp_head', 'rsd_link'); // XML-RPCでの投稿
remove_action('wp_head', 'wlwmanifest_link'); // Windows Live Writerでの投稿
remove_action('wp_head', 'wp_generator'); // WordPressコアのバージョン情報
remove_action('wp_head', 'print_emoji_detection_script', 7); // 絵文字のスクリプト
remove_action('admin_print_scripts', 'print_emoji_detection_script'); // 絵文字のスクリプト
remove_action('wp_print_styles', 'print_emoji_styles'); // 絵文字のスタイル
remove_action('admin_print_styles', 'print_emoji_styles'); // 絵文字のスタイル
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0); // 短縮URL
remove_action('wp_head', 'rest_output_link_wp_head'); // REST APIのURL表示
remove_action('wp_head', 'wp_oembed_add_discovery_links'); // 外部コンテンツの埋め込み
remove_action('wp_head', 'wp_oembed_add_host_js'); //ブログカード
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); // 過去の投稿へと次の投稿へ
remove_action('wp_enqueue_scripts', 'wp_enqueue_global_styles'); // wp5.9で追加されたsvg
remove_action('wp_footer', 'wp_enqueue_global_styles');          // wp5.9で追加されたsvg

/**
 * ウィジェット「最近のコメント」の削除
 *
 * @link https://labo.kon-ruri.co.jp/remove-tags-in-wp_head/
 */
function remove_recent_comment_css() {
  global $wp_widget_factory;
  remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
}
add_action( 'widgets_init', 'remove_recent_comment_css');

/**
 * dns-prefetch を削除
 *
 * @link https://affi-sapo.com/3551/#gsc.tab=0
 */
function remove_dns_prefetch($hints, $relation_type)
{
  if ('dns-prefetch' === $relation_type) {
    return array_diff(wp_dependencies_unique_hosts(), $hints);
  }
  return $hints;
}
add_filter('wp_resource_hints', 'remove_dns_prefetch', 10, 2);


/**
 * wp-block-library-css の削除
 *
 * @link https://hacknote.jp/archives/48382/
 */
/*
function my_dequeue_plugins_style()
{
  wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'my_dequeue_plugins_style', 9999);
*/
