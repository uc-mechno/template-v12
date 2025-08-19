<?php
/**
 * タイトル文字数制限
 *
 * @param integer $limit 表示させる文字数。引数を指定しない場合は20
 * @example
 * <h1><?php new_line_title(10); ?></h1>
 */
function show_limit_title($limit = 20)
{
  global $post;
  $title = $post->post_title;

  if (mb_strlen($title) > $limit) {
    $title = mb_substr($title, 0, $limit);
    $show_title = $title . '･･･';
  } else {
    $show_title = $title;
  }

  echo $show_title;
}

/**
 * タイトルを改行
 *
 * @link https://junpei-sugiyama.com/title-new-line/
 * @example
 * <h1><?php new_line_title(); ?></h1>
 *
 */
function new_line_title()
{
  $title = get_the_title();
  $title = str_replace(" ", "<br>", $title);
  echo $title;
}

/**
 * 記事の抜粋の末に付く文字列の設定
 *
 * @return string ... を出力.
 * @example
 * <h1><?php new_line_title(); ?></h1>
 *
 */
function cms_excerpt_more()
{
  return '...';
}
add_filter('excerpt_more', 'cms_excerpt_more');

/**
 * 記事の抜粋の文字数の設定
 *
 * @return string 文字数を出力.
 * @example
 * <h1><?php new_line_title(); ?></h1>
 *
 */
function cms_excerpt_length()
{
  return 80;
}
add_filter('excerpt_mblength', 'cms_excerpt_length');

/**
 * 記事の抜粋の文字数の設定
 *
 * @param string $number 抜粋対象の文字列をwp_trim_words()の第二引数に格納.
 * @return string 文字数調整した文字列を出力.
 * @link wp_trim_words() https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/wp_trim_words
 * @example
 * <h1><?php new_line_title(); ?></h1>
 *
 */
function get_flexible_excerpt($number)
{
  $value = get_the_excerpt();
  $value = wp_trim_words($value, $number, '...');
  return $value;
}

/**
 * get_the_excerptで取得する抜粋の改行を有効にする
 *
 * @param string $value 抜粋文.
 * @return string $value 改行が有効化された抜粋文.
 * @example
 * <h1><?php new_line_title(); ?></h1>
 *
 */
function apply_excerpt_br($value)
{
  return nl2br($value);
}
add_filter('get_the_excerpt', 'apply_excerpt_br');

/**
 * アイキャッチ画像がなければ、ダミー画像を取得する
 *
 * @param string $sizeに画像のサイズを指定
 * 初期値：thumbnail
 * @param string $pathにダミー画像のパスを指定
 * 初期値：'/img/post-bg.jpg'
 * @return array $imgにterm_idを指定して取得して格納
 * @example
 * <?php $eyecatch = get_eyecatch_with_default(第一引数, 第二引数); ?>
 * <header style="background-image: url('<?php echo $eyecatch[0]; ?>')"></header>
 *
 */
function get_eyecatch_with_default($size = 'thumbnail', $path = '/dist/assets/images/hero_no-image.jpg') // TODO: 関数を使う
{
  if (has_post_thumbnail()) :
    $id  = get_post_thumbnail_id();
    $img = wp_get_attachment_image_src($id, $size);
  else :
    $img = array(get_template_directory_uri() . $path);
  endif;

  return $img;
}

/**
 * アイキャッチ画像がなければ、ダミー画像を取得する

 *
 * @param string $idに投稿IDを指定
 * @param string $sizeに画像のサイズを指定
 * 初期値：thumbnail
 * @return array $imageにget_the_post_thumbnail()を指定して取得して格納
 * @example php
 * <?php get_eyecatch_default($post->ID, 'search'); ?>
 *
 * @example html
 * <img width="" height="" src="" class="" alt="" srcset="" sizes="">
 *
 */
function get_eyecatch_default($id, $size = 'thumbnail', $loading = 'lazy', $decoding = 'async')
{
  $image = get_the_post_thumbnail($id,  $size, ['loading' => $loading, 'decoding' => $decoding]);
  if ($image) :
    echo $image;
  else :
    echo '<img width="3" height="2" src="' . GET_PATH() . '/no-image01.gif" alt="no image" loading="lazy" decoding="async">';
  endif;

  // return $image;
}

/**
 * wp_kses()関数を関数化
 *
 * @link https://www.webdesignleaves.com/pr/wp/wp_escape_functions.html
 * @link https://www.mirucon.com/2017/07/11/the-complex-wordpress-escaping/#google_vignette
 * 他に追加する場合以下を参照
 * 'a' => [ 'href' => [], 'target' => [], 'onclick' => [] ],
 * 'b' => [],
 * 'em' => [],
 * 'strong' => [],
 * 'br' => [],
 */

function kses_allowed_html($content)
{
  $allowed_html = ['br' => [],];
  $content = wp_kses($content, $allowed_html);
  return $content;
}

/**
 * the_archive_title()関数の「カテゴリー: 」や「月: 」を削除
 *
 * @link https://furui-asobi.com/wordpress/907/
 *
 */
function customize_archive_title($title)
{
  if (is_category()) { // カテゴリーページ
    $title = single_cat_title('', false);
  } elseif (is_tag()) { // タグページ
    $title = single_tag_title('', false);
  } elseif (is_tax()) { // タクソノミーページ
    $title = single_term_title('', false);
  } elseif (is_post_type_archive()) { // カスタム投稿タイプアーカイブページ
    $title = post_type_archive_title('', false);
  }
  return $title;
}

add_filter('get_the_archive_title', 'customize_archive_title');
