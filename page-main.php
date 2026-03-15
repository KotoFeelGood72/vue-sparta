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
<script src="https://pay.yandex.ru/sdk/v1/pay.js"></script>
	<!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(100457048, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true,
        ecommerce:"dataLayer"
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/100457048" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div id="app"></div>
	<script src="//code.jivosite.com/widget/fB0A3Zdopo" async></script>
  <?php wp_footer(); ?>
</body>
</html>
