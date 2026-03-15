<?php

defined( 'ABSPATH' ) || exit;

// Первоначальная настройка
if ( ! function_exists( 'spart_setup_theme' ) ) :
  function spart_setup_theme() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array( 'primary' => 'MM' ) );

    $menu_name = 'main';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if( !$menu_exists ) {
      $menu_id = wp_create_nav_menu($menu_name);

      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title' =>  __('Главная'),
          'menu-item-classes' => 'main',
          'menu-item-url' => home_url( '/' ),
          'menu-item-status' => 'publish')
      );
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title' =>  __('Спецзапчасти'),
          'menu-item-classes' => 'spareparts',
          'menu-item-url' => home_url( '/spareparts/' ),
          'menu-item-status' => 'publish')
      );
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title' =>  __('Новости'),
          'menu-item-classes' => 'news',
          'menu-item-url' => home_url( '/news/' ),
          'menu-item-status' => 'publish')
      );
      /* wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title' =>  __('Документы'),
          'menu-item-classes' => 'docs',
          'menu-item-url' => home_url( '/docs/' ),
          'menu-item-status' => 'publish')
      ); */
      wp_update_nav_menu_item($menu_id, 0, array(
          'menu-item-title' =>  __('Контакты'),
          'menu-item-classes' => 'contacts',
          'menu-item-url' => home_url( '/contacts/' ),
          'menu-item-status' => 'publish')
      );
    }
  }
  add_action( 'after_setup_theme', 'spart_setup_theme' );
endif;

// Подключение стилей
if ( ! function_exists( 'spart_include_styles' ) ) :
  function spart_include_styles() {
    global $template_dir;
    //wp_enqueue_style( 'spart-style', get_stylesheet_uri() );
    wp_enqueue_style( 'spart-style-foundation', $template_dir . '/styles/vendor/foundation.min.css' );
    wp_enqueue_style( 'spart-style-font-awesome', $template_dir . '/styles/vendor/font-awesome.min.css' );
    wp_enqueue_style( 'spart-style-app', $template_dir . '/styles/app.css' );
  }
  add_action( 'wp_enqueue_scripts', 'spart_include_styles' );
endif;

// Подключение скриптов
if ( ! function_exists( 'spart_include_scripts' ) ) :
  function spart_include_scripts() {
    global $template_dir;
    wp_enqueue_script( 'spart-script-jquery', $template_dir . '/scripts/vendor/jquery.min.js');
    wp_enqueue_script( 'spart-script-jquery-modal', $template_dir . '/scripts/vendor/jquery.modal.min.js');
    wp_enqueue_script( 'spart-script-jquery-maskedinput', $template_dir . '/scripts/vendor/jquery.maskedinput.js');
    //wp_enqueue_script( 'spart-script-foundation', $template_dir . '/scripts/vendor/foundation.min.js');
    //wp_enqueue_script( 'spart-script-what-input', $template_dir . '/scripts/vendor/what-input.js');
    wp_enqueue_script( 'spart-script-app', $template_dir . '/scripts/app.js');
  }
  add_action( 'wp_enqueue_scripts', 'spart_include_scripts' );
endif;

// Удаление версии Wordpress у подключенных скриптов и стилей
if ( ! function_exists( 'spart_remove_css_js_ver' ) ) :
  function spart_remove_css_js_ver( $src ) {
      if( strpos( $src, '?ver=' ) )
          $src = remove_query_arg( 'ver', $src );
      return $src;
  }
  add_filter( 'style_loader_src', 'spart_remove_css_js_ver', 10, 2 );
  add_filter( 'script_loader_src', 'spart_remove_css_js_ver', 10, 2 );
endif;

// Чистка Head'а
/*******************************************************************************
Убираем излишние meta теги системы wordpress
********************************************************************************/
function wpcl_remove_meta_tags(){
  remove_action('wp_head', 'wp_generator');//выводит номер версии движка.
  remove_action('wp_head', 'wlwmanifest_link');//используется блог-клиентом Windows Live Writer.
  remove_action('wp_head', 'start_post_rel_link', 10, 0);
  remove_action('wp_head', 'parent_post_rel_link', 10, 0);
  remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);//Ссылки на соседние статьи (<link rel='next'... <link rel='prev'...)
  remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);//Короткая ссылка, ссылка без ЧПУ <link rel='shortlink'
}
$wpcl_remove_meta_tags = 'wpcl_remove_meta_tags';
$wpcl_remove_meta_tags();

/*******************************************************************************
Удаление <link rel='dns-prefetch'
********************************************************************************/
//пока пользователь находится на странице и мощности компьютера простаивают вхолостую, можно самостоятельно указать для загрузки либо статическое изображение, либо js-библиотеку, либо целую страницу, которые теоретически понадобятся этому пользователю для дальнейшей работы с сайтом.

function wpcl_remove_dns_prefetch(){
  remove_action( 'wp_head', 'wp_resource_hints', 2 );
}
$wpcl_remove_dns_prefetch = 'wpcl_remove_dns_prefetch';
$wpcl_remove_dns_prefetch();

/*******************************************************************************
Удаление RSS-ленты
********************************************************************************/
function wpcl_disable_feed(){
  wp_redirect(get_option('siteurl'));
}

add_action('do_feed', 'wpcl_disable_feed', 1);
add_action('do_feed_rdf', 'wpcl_disable_feed', 1);
add_action('do_feed_rss', 'wpcl_disable_feed', 1);
add_action('do_feed_rss2', 'wpcl_disable_feed', 1);
add_action('do_feed_atom', 'wpcl_disable_feed', 1);

remove_action( 'wp_head', 'feed_links_extra', 3 );//выводит ссылки на дополнительные RSS-ленты сайта.
remove_action( 'wp_head', 'feed_links', 2 );//выводит ссылки на основные RSS-ленты сайта.
remove_action( 'wp_head', 'rsd_link' );//используется блог-клиентами.


/*******************************************************************************
Защита - убирает записи в админ панели что введенный пароль/логин не верный
********************************************************************************/
function wpcl_remove_login_text(){
  add_filter('login_errors',create_function('$a', "return null;"));
}
$wpcl_remove_login_text = 'wpcl_remove_meta_tags';
$wpcl_remove_login_text();

/*******************************************************************************
Удаляем Wp-json, Oembed, Embed
********************************************************************************/
function wpcl_remove_json_oe_em(){
  // Filters for WP-API version 1.x
  add_filter('json_enabled', '__return_false');
  add_filter('json_jsonp_enabled', '__return_false');
  // Отключаем сам REST API - Filters for WP-API version 2.x
  add_filter('rest_enabled', '__return_false');
  add_filter('rest_jsonp_enabled', '__return_false');

  // Отключаем фильтры REST API
  remove_action( 'xmlrpc_rsd_apis', 'rest_output_rsd');
  remove_action( 'wp_head', 'rest_output_link_wp_head', 10, 0);
  remove_action( 'template_redirect', 'rest_output_link_header', 11, 0);
  remove_action( 'auth_cookie_malformed', 'rest_cookie_collect_status');
  remove_action( 'auth_cookie_expired', 'rest_cookie_collect_status');
  remove_action( 'auth_cookie_bad_username', 'rest_cookie_collect_status');
  remove_action( 'auth_cookie_bad_hash', 'rest_cookie_collect_status');
  remove_action( 'auth_cookie_valid', 'rest_cookie_collect_status');
  remove_filter( 'rest_authentication_errors', 'rest_cookie_check_errors', 100);

  // Отключаем события REST API
  remove_action( 'init', 'rest_api_init');
  remove_action( 'rest_api_init', 'rest_api_default_filters', 10, 1);
  remove_action( 'parse_request', 'rest_api_loaded');

  // Отключаем Embeds связанные с REST API
  remove_action( 'rest_api_init', 'wp_oembed_register_route');
  remove_filter( 'rest_pre_serve_request', '_oembed_rest_pre_serve_request', 10, 4);
  remove_action( 'wp_head', 'wp_oembed_add_discovery_links' );
}
$wpcl_remove_json_oe_em = 'wpcl_remove_json_oe_em';
$wpcl_remove_json_oe_em();

/*******************************************************************************
Отключаем Emoji WordPress (смайлы Эмодзи)
********************************************************************************/
function wpcl_disable_emoji(){
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
}
$wpcl_disable_emoji = 'wpcl_disable_emoji';
$wpcl_disable_emoji();

/*******************************************************************************
Отключаем функцию трекбек на себя
********************************************************************************/
function wpcl_disable_trackback_self(&$links){
  $site_url = get_option( 'home' );
  foreach ( $links as $key => $val)
  if(strpos( $val, $site_url ) !== false)unset($links[$key]);
}
add_action('pre_ping','wpcl_disable_trackback_self');



// Удалить админ-панель
add_filter('show_admin_bar', '__return_false');