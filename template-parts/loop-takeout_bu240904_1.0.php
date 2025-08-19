<?php /*
$allowed_html = ['br' => [],];
$fields = CFS()->get($args['menu-name']);
if ($fields) :
  foreach ($fields as $field) :
?>

    <li class="p-takeout-sec03__item">
      <div class="p-takeout-sec03__img">

        <?php if ($field['image']) :
          $image = wp_get_attachment_image_src($field['image'], $args['image-size']); ?>

          <img width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" loading="lazy" decoding="async" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($field['title']); ?>">

        <?php else : ?>

          <img width="735" height="448" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image735x448.gif" alt="no image" />

        <?php endif; ?>

      </div>

      <?php if ($field['title'] || $field['price'] || $field['serve'] || $field['description']) : ?>
        <div class="p-takeout-sec03__body">
          <?php if ($field['title']) : ?>
            <h3 class="p-takeout-sec03__title-lv3"><?php echo esc_html($field['title']); ?></h3>
          <?php endif;
          if ($field['price']) : ?>
            <p class="p-takeout-sec03__price"><?php echo wp_kses($field['price'], $allowed_html); ?></p>
          <?php endif;
          if ($field['serve']) : ?>
            <p class="p-takeout-sec03__size"><?php echo wp_kses($field['serve'], $allowed_html); ?></p>
          <?php endif;
          if ($field['description']) : ?>
            <dl class="p-takeout-sec03__defi-list">
              <dt class="p-takeout-sec03_term">◆内容</dt>
              <dd class="p-takeout-sec03__desc"><?php echo wp_kses($field['description'], $allowed_html); ?></dd>
            </dl>
          <?php endif; ?>
        </div>
      <?php endif; ?>

    </li>

  <?php endforeach; ?>
<?php endif; */ ?>

<?php
// $allowed_html = ['br' => []];
$fields = CFS()->get($args['menu-name']);

if ($fields) {
  foreach ($fields as $field) {
?>

<?php
$start_date = $field['start_date'];

if (empty($start_date) || strtotime($start_date) < current_time('timestamp')) { ?>

    <li class="p-takeout-sec03__item">

      <?php
      //$field['comment']が空ではない場合はfield['comment']を表示する
      if ($field['comment']) { ?>
        <div class="p-takeout-sec03__comment-wrap p-takeout-sec03__comment-wrap--show js-blurTrigger is-show">
          <p class="p-takeout-sec03__comment js-blurTrigger is-show"><?php echo esc_html($field['comment']); ?></p></div>
      <?php }
      // $field['comment']が空の場合で尚且つPCの場合は<p class="p-takeout-sec03__comment>を表示する
      elseif (!$field['comment'] && !is_sp()) { ?>
        <div class="p-takeout-sec03__comment-wrap p-takeout-sec03__comment-wrap--hide"><p class="p-takeout-sec03__comment js-blurTrigger is-show">&emsp;</p></div>
      <?php }
      // $field['comment']が空の場合で尚且つSPの場合は<p class="p-takeout-sec03__comment>を表示しない
      elseif (!$field['comment'] && is_sp()) { ?>
      <?php }
      // 上記どれにも当てはまらない場合は高さが揃わなくならないように<p class="p-takeout-sec03__comment>を表示する
      else { ?>
        <div class="p-takeout-sec03__comment-wrap p-takeout-sec03__comment-wrap--hide"><p class="p-takeout-sec03__comment js-blurTrigger is-show">&emsp;</p></div>
      <?php }
      ?>

      <div class="p-takeout-sec03__img js-blurTrigger is-show">
        <?php if ($field['image']) {
          $image = wp_get_attachment_image_src($field['image'], $args['image-size']);
        ?>
          <img width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" loading="lazy" decoding="async" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($field['title']); ?>">
        <?php } else { ?>
          <img width="735" height="448" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image735x448.gif" alt="no image" />
        <?php } ?>
      </div>

      <?php if ($field['title'] || $field['price'] || $field['serve'] || $field['description']) { ?>
        <div class="p-takeout-sec03__body js-blurTrigger is-show">
          <?php if ($field['title']) { ?>
            <h3 class="p-takeout-sec03__title-lv3"><?php echo esc_html($field['title']); ?></h3>
          <?php }
          if ($field['price']) { ?>
            <p class="p-takeout-sec03__price"><?php echo kses_allowed_html($field['price']); ?></p>
          <?php }
          if ($field['serve']) { ?>
            <p class="p-takeout-sec03__size"><?php echo kses_allowed_html($field['serve']); ?></p>
          <?php }
          if ($field['description']) { ?>
            <dl class="p-takeout-sec03__defi-list">
              <dt class="p-takeout-sec03_term">◆内容</dt>
              <dd class="p-takeout-sec03__desc"><?php echo kses_allowed_html($field['description']); ?></dd>
            </dl>
          <?php } ?>
        </div>
      <?php } ?>

    </li>
    <?php } ?>
<?php
  }
}
?>
