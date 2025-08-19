<?php /*
$allowed_html = ['br' => [],];
$fields = CFS()->get($args['menu-name']);
if ($fields) :
  foreach ($fields as $field) :
?>

    <li class="p-menus-sec__item">
      <div class="p-menus-sec__img">

        <?php if ($field['image']) :
          $image = wp_get_attachment_image_src($field['image'], $args['image-size']); ?>

          <img width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" loading="lazy" decoding="async" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($field['title']); ?>">

        <?php elseif ($args['image-size'] === 'menu-primary') : ?>

          <img width="353" height="265" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image353x265.gif" alt="no image" />

        <?php elseif ($args['image-size'] === 'menu-secondary') : ?>

          <img width="735" height="448" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image735x448.gif" alt="no image" />

        <?php else : ?>
        <?php endif; ?>

      </div>

      <?php if ($field['title'] || $field['price'] || $field['description']) : ?>
        <div class="p-menus-sec__body">
          <?php if ($field['title']) : ?>
            <h3 class="p-menus-sec__title-lv3"><?php echo esc_html($field['title']); ?></h3>
          <?php endif;
          if ($field['price']) : ?>
            <p class="p-menus-sec__price"><?php echo esc_html($field['price']); ?></p>
          <?php endif; ?>

          <?php if ($args['menu-name'] !== 'lunch') : ?>

            <?php if ($field['description']) : ?>
              <p class="p-menus-sec__text"><?php echo wp_kses($field['description'], $allowed_html); ?></p>
            <?php endif; ?>

          <?php elseif ($args['menu-name'] === 'lunch') : ?>

            <?php if ($field['description']) : ?>
              <dl class="p-menus-sec__defi-list">
                <dt class="p-menus-sec_term">◆セット内容</dt>
                <dd class="p-menus-sec__desc"><?php echo wp_kses($field['description'], $allowed_html); ?></dd>
              </dl>
            <?php endif; ?>

          <?php else : ?>
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
    <li class="p-menus-sec__item">
      <div class="p-menus-sec__img js-blurTrigger is-show">

        <?php if ($field['image']) {
          $image = wp_get_attachment_image_src($field['image'], $args['image-size']);
          ?>
          <img width="<?php echo esc_attr($image[1]); ?>" height="<?php echo esc_attr($image[2]); ?>" loading="lazy" decoding="async" src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_attr($field['title']); ?>">
        <?php } elseif ($args['image-size'] === 'menu-primary') { ?>
          <img width="353" height="265" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image353x265.gif" alt="no image" />
        <?php } elseif ($args['image-size'] === 'menu-secondary') { ?>
          <img width="735" height="413" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image735x413.gif" alt="no image" />
        <?php } ?>

      </div>

      <?php if ($field['title'] || $field['price'] || $field['description']) { ?>
        <div class="p-menus-sec__body js-blurTrigger is-show">
          <?php if ($field['title']) { ?>
            <h3 class="p-menus-sec__title-lv3"><?php echo kses_allowed_html($field['title']); ?></h3>
          <?php }
          if($field['price']) {
            $zei = $field['price']; // 税抜き価格を変数に代入
            $zeikomi =  $zei * 1.1; // 税率10%
            $total = round($zeikomi); // 切り上げ
            $comma = number_format($total); // 3桁区切り
            $zei_price = $comma; // 税込み価格
          ?>
            <p class="p-menus-sec__price"><?php echo esc_html(number_format($field['price'])); ?>円
            <small>(税込<?php echo esc_html($zei_price); ?>円)</small>
          </p>
          <?php }

          if ($args['menu-name'] !== 'lunch') {
            if ($field['description']) { ?>
              <p class="p-menus-sec__text"><?php echo kses_allowed_html($field['description']); ?></p>
            <?php }
          } elseif ($args['menu-name'] === 'lunch') {
            if ($field['description']) { ?>
              <dl class="p-menus-sec__defi-list">
                <dt class="p-menus-sec_term">◆セット内容</dt>
                <dd class="p-menus-sec__desc"><?php echo kses_allowed_html($field['description']); ?></dd>
              </dl>
            <?php }
          } ?>

        </div>
      <?php } ?>

    </li>
    <?php
  }
}
?>
