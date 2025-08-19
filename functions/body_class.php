<?php
/**
 * body_classの設定
 */
function add_body_class($classes)
{
  if (is_front_page() || is_page([2125, 2120])) {
    $classes[] = 'l-body--bg01';
  }
  return $classes;
}
add_filter('body_class', 'add_body_class');
