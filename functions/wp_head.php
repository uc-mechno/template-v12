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
  })(window,document,'script','dataLayer','GTM-TJ8RSLPF');</script>
  <!-- End Google Tag Manager -->
  EOM;
}
add_action('wp_head', 'add_gtm_head', 0);

/**
 * wp_head.phpファイルにレストランスキーマのJSON-LDマークアップをwp_headフックに追加します。
 */
function add_json_ld()
{
  if (is_page('store')) {
    echo <<<EOM
  <!-- JSON-LD START -->
  <script type="application/ld+json">
  {
    "@context":"http://schema.org",
    "@type":"Restaurant",
    "name":"廻る鼓響吉田店",
    "address":{
    "@type":"PostalAddress",
    "streetAddress":"吉田3520-1",
    "addressLocality":"燕市",
    "addressRegion":"新潟県",
    "postalCode":"9590264",
    "addressCountry":"JP"
    },
    "geo":{
    "@type":"GeoCoordinates",
    "latitude":"37.696583",
    "longitude":"138.885726"
    },
    "telephone":"+81-256-92-5414",
    "potentialAction": {
    "@type": "ReserveAction",
    "target": {
      "@type": "EntryPoint",
      "urlTemplate": "https://epark.jp/shopinfo/fsp4304/",
      "inLanguage": "jp",
      "actionPlatform": [
        "http://schema.org/DesktopWebPlatform",
        "http://schema.org/IOSPlatform",
        "http://schema.org/AndroidPlatform"
      ]
    },
    "result": {
      "@type": "Reservation",
      "name": "廻る鼓響吉田店予約"
    }
  },
   "openingHoursSpecification":[
    {
     "@type":"OpeningHoursSpecification",
     "dayOfWeek":[
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
     ],
     "opens":"11:00",
     "closes":"22:00"
    }
   ],
   "image":"https://www.kokyou-sushi.com/wp-content/themes/kokyo-sushi/dist/assets/images/exterior01.jpg",
   "url":"https://www.kokyou-sushi.com/",
   "menu":"https://www.kokyou-sushi.com/menus/",
   "acceptsReservations":"true",
   "department":[
    {
     "@type":"Restaurant",
     "name":"回転寿司鼓響燕三条店",
     "address":{
      "@type":"PostalAddress",
      "streetAddress":"須頃2-11",
      "addressLocality":"三条市",
      "addressRegion":"新潟県",
      "postalCode":"9550092",
      "addressCountry":"JP"
     },
     "geo":{
      "@type":"GeoCoordinates",
      "latitude":"37.646833",
      "longitude":"138.940231"
     },
     "telephone":"+81-256-64-8263",
     "potentialAction": {
      "@type": "ReserveAction",
      "target": {
        "@type": "EntryPoint",
        "urlTemplate": "https://epark.jp/shopinfo/fsp23115/",
        "inLanguage": "jp",
        "actionPlatform": [
          "http://schema.org/DesktopWebPlatform",
          "http://schema.org/IOSPlatform",
          "http://schema.org/AndroidPlatform"
        ]
      },
      "result": {
        "@type": "Reservation",
        "name": "回転寿司鼓響燕三条店予約"
      }
    },
     "openingHoursSpecification":[
      {
       "@type":"OpeningHoursSpecification",
       "dayOfWeek":[
        "Monday",
        "Tuesday",
        "Wednesday",
        "Thursday",
        "Friday",
        "Saturday",
        "Sunday"
       ],
       "opens":"11:00",
       "closes":"22:00"
      }
     ],
     "image":"https://www.kokyou-sushi.com/wp-content/themes/kokyo-sushi/dist/assets/images/exterior01.jpg",
     "url":"https://www.kokyou-sushi.com/",
     "menu":"https://www.kokyou-sushi.com/menus/",
     "acceptsReservations":"true"
    }
   ]
  }
  </script>
  <!-- JSON-LD END -->
  EOM;
  }
}
add_action('wp_head', 'add_json_ld', 1);
