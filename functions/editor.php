<?php

/**
 * 指定したページIDでコンテンツエディターを非表示にする関数
 * スラッグで指定する場合は、$post->post_nameを使用してください
 * idで指定する場合は、$post->IDを使用してください
 * @link https://nelog.jp/manage-posts-columns
 */
/**
 * 非表示にする固定ページのIDを指定して、ブロックエディタを非表示にするフィルターを追加します。
 *
 * @param bool   $use_block_editor ブロックエディタの使用状態
 * @param object $post             投稿オブジェクト
 * @return bool ブロックエディタの使用状態
 */
function hide_editor($use_block_editor, $post)
{
  if ($post->post_type === 'page') {
    // $page_slug = array('takeout', 'menus'); // 非表示にする固定ページのスラッグの配列を指定してください
    $page_ids = array(2120, 2125); // 非表示にする固定ページのIDの配列を指定してください

    if (in_array($post->ID, $page_ids)) {
      remove_post_type_support('page', 'editor');
      return false;
    }
  }

  return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'hide_editor', 10, 2);

/**
 * 投稿・固定ページ管理画面の記事一覧テーブルにIDカラムを作成するためのフィルターを追加
 *
 * @param array $columns 記事一覧テーブルのカラム
 * @return array 記事一覧テーブルのカラム
 */
function customize_admin_manage_posts_columns($columns)
{
  //投稿ID
  $columns['post-id'] = 'ID';

  return $columns;
}
add_filter('manage_posts_columns', 'customize_admin_manage_posts_columns'); //投稿
add_filter('manage_pages_columns', 'customize_admin_manage_posts_columns'); //固定ページ

/**
 * 投稿・固定ページ管理画面の記事一覧テーブルにIDを表示するためのアクションを追加
 *
 * @param string $column_name カラム名
 * @param int    $post_id     投稿ID
 * @return void
 */
function customize_admin_add_column($column_name, $post_id)
{
  //投稿ID
  if ('post-id' === $column_name) {
    $thum = $post_id;
  }
  if (isset($thum) && $thum) {
    echo $thum;
  }
}
add_action('manage_posts_custom_column', 'customize_admin_add_column', 10, 2); //投稿
add_action('manage_pages_custom_column', 'customize_admin_add_column', 10, 2); //固定ページ

/**
 * 投稿・固定ページ管理画面の記事一覧テーブルでIDソートを可能にするためのフィルターを追加
 *
 * @param array $columns ソート可能なカラム
 * @return array ソート可能なカラム
 */
function sort_term_columns($columns)
{
  $columns['post-id'] = 'ID';
  return $columns;
}

add_filter('manage_edit-post_sortable_columns', 'sort_term_columns'); //投稿
add_filter('manage_edit-page_sortable_columns', 'sort_term_columns'); //固定ページ

//新たにカラムを追加
/**
 * @link https://zigzow.com/catiddisplay/
*/
/**
 * カテゴリとタグの管理画面に新しい列を追加するための関数
 *
 * @param array $columns 現在の列の配列
 * @return array 列を追加した後の列の配列
 */
function add_cattag_columns($columns)
{
  $index = 3; // 列を追加する位置
  return array_merge(
    array_slice($columns, 0, $index),
    array('id' => 'ID'),
    array_slice($columns, $index)
  );
}
add_filter('manage_edit-category_columns', 'add_cattag_columns');
add_filter('manage_edit-post_tag_columns', 'add_cattag_columns');

/**
 * 新しい列にIDを表示するための関数
 *
 * @param string $string 現在の列の値
 * @param string $column_name 列の名前
 * @param int $cattag_id カテゴリまたはタグのID
 * @return void
 */
function custom_term_columns($string, $column_name, $cattag_id)
{
  if ('id' === $column_name) {
    echo $cattag_id;
  }
}
add_action('manage_category_custom_column', 'custom_term_columns', 10, 3);
add_action('manage_post_tag_custom_column', 'custom_term_columns', 10, 3);

/**
 * カテゴリとタグの管理画面で列の並び替えを可能にするための関数
 *
 * @param array $columns 現在の並び替え可能な列の配列
 * @return array 並び替え可能な列にIDを追加した後の配列
 */
function sort_cattag_columns($columns)
{
  $columns['id'] = 'ID';
  return $columns;
}
add_filter('manage_edit-category_sortable_columns', 'sort_cattag_columns');
add_filter('manage_edit-post_tag_sortable_columns', 'sort_cattag_columns');

/**
 * ページのカラムにスラッグを追加する
 *
 * @param array $columns 現在のカラム
 * @return array 更新されたカラム
 * @link https://jobtech.jp/wp/4399/
 */
function add_page_column_title($columns)
{
  $columns['slug'] = "スラッグ";
  return $columns;
}
add_filter('manage_pages_columns', 'add_page_column_title');

/**
 * ページのカラムにスラッグを表示する
 *
 * @param string $column_name カラム名
 * @param int $post_id ページのID
 */
function add_page_column($column_name, $post_id)
{
  if ($column_name == 'slug') {
    $post = get_post($post_id);
    $slug = $post->post_name;
    echo esc_attr($slug);
  }
}
add_action('manage_pages_custom_column', 'add_page_column', 10, 2);

/**
 * ブロックエディターを使用しないページのコンテンツエディターを削除するフィルターを追加
 *
 * @param bool   $use_block_editor ブロックエディターを使用するかどうかのフラグ。
 * @param object $post             現在の投稿オブジェクト。
 * @return bool                    ブロックエディターを使用するかどうかのフラグ。
 *
 * @link  https://bambooworks.co/wordpress-page-hide-editor/
 * @link https://qiita.com/synchro_vision/items/8cf2878f7b6f3b0855b6
 */
function remove_content_editor($use_block_editor, $post)
{
  if ($post->post_type === 'page') {
    if (in_array($post->post_name, ['osusume'])) { // ここにページスラッグを入れる
      remove_post_type_support('page', 'editor');
      return false;
    }
  }
  return $use_block_editor;
}
add_filter('use_block_editor_for_post', 'remove_content_editor', 10, 2);
