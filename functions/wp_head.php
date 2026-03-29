<?php

/**
 * headタグ終わりに挿入
 * @link https://choppydays.com/wordpress-google-tag-manager-settings/
 */
function add_gtm_head()
{
  echo <<<EOM
  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
  <!-- End Google Tag Manager -->
  EOM;
}
add_action('wp_head', 'add_gtm_head', 0);

/**
 * 構造化データ（JSON-LD）をwp_headフックに追加します。
 * 必要に応じてページごとに条件分岐して記述してください。
 */
// function add_json_ld()
// {
//   if (is_page('example')) {
//     echo <<<EOM
//   <!-- JSON-LD START -->
//   <script type="application/ld+json">
//   {
//     "@context": "http://schema.org",
//     "@type": "Organization",
//     "name": "サイト名",
//     "url": "https://example.com/"
//   }
//   </script>
//   <!-- JSON-LD END -->
//   EOM;
//   }
// }
// add_action('wp_head', 'add_json_ld', 1);
