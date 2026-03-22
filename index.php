

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

<!--   <?php if (function_exists('wpseo_head')) : ?> -->
    <?php wpseo_head(); // Yoast SEO сам добавит title и description ?>
<!--   <?php else : ?>
    <title><?php wp_title('|', true, 'right'); ?></title>
    <meta name="description" content="<?php echo get_bloginfo('description'); ?>">
  <?php endif; ?> -->

  <link rel="icon" href="<?php echo get_site_icon_url(); ?>" type="image/x-icon">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="app"></div>
  <?php wp_footer(); ?>
</body>
</html>
