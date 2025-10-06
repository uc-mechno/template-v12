<?php
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

        <?php elseif ($args['image-size'] === 'primary') : ?>

          <img width="353" height="265" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image353x265.gif" alt="no image" />

        <?php elseif ($args['image-size'] === 'secondary') : ?>

          <img width="735" height="448" loading="lazy" decoding="async" src="<?php echo GET_PATH(); ?>/no-image735x448.gif" alt="no image" />

        <?php else : ?>
        <?php endif; ?>

      </div>

    </li>

  <?php endforeach; ?>
<?php endif; ?>
