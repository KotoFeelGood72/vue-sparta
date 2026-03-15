<?php

defined( 'ABSPATH' ) || exit;

// Кастомные стили в админке
if ( ! function_exists( 'spart_custom_admin_styles' ) ) :
  function spart_custom_admin_styles() {
    global $template_dir;
    wp_enqueue_style( 'admin-styles', $template_dir . '/styles/admin.css' );
  }
  add_action( 'admin_enqueue_scripts', 'spart_custom_admin_styles' );
endif;

// Настройка футера в админке (слева)
if ( ! function_exists( 'spart_left_admin_footer_text_output' ) ) :
  function spart_left_admin_footer_text_output( $text ) {
      $text = get_bloginfo('name');
      return $text;
  }
  add_filter( 'admin_footer_text', 'spart_left_admin_footer_text_output' );
endif;

// Настройка футера в админке (справа)
if ( ! function_exists( 'spart_right_admin_footer_text_output' ) ) :
  function spart_right_admin_footer_text_output( $text ) {
      $text = 'Разработчик: <a target="_blank" href="//bezzvuka.ru" title="Перейти на сайт разработчика">bezzvuka</a>';
      return $text;
  }
  add_filter( 'update_footer', 'spart_right_admin_footer_text_output', 11 );
endif;

// Настройка меню администратора
if ( ! function_exists( 'spart_custom_admin_menu' ) ) :
  add_action( 'admin_menu', 'spart_custom_admin_menu', 999 );
  function spart_custom_admin_menu(){
    //remove_menu_page( 'index.php' );
    remove_menu_page( 'edit.php' );
    //remove_menu_page( 'upload.php' );
    //remove_menu_page( 'edit.php?post_type=page' );
    remove_menu_page( 'edit-comments.php' );
    //remove_menu_page( 'themes.php' );
    //remove_menu_page( 'plugins.php' );
    remove_menu_page( 'users.php' );
    remove_menu_page( 'tools.php' );
    //remove_menu_page( 'options-general.php' );
  }
endif;

// Настройка панели администратора
if ( ! function_exists( 'spart_custom_admin_bar_menu' ) ) :
  add_action( 'admin_bar_menu', 'spart_custom_admin_bar_menu', 999 );
  function spart_custom_admin_bar_menu( $wp_admin_bar ) {
    $wp_admin_bar->remove_node('wp-logo');
    //$wp_admin_bar->remove_node('dashboard');
    //$wp_admin_bar->remove_node('about');
    //$wp_admin_bar->remove_node('wporg');
    //$wp_admin_bar->remove_node('documentation');
    //$wp_admin_bar->remove_node('support-forums');
    //$wp_admin_bar->remove_node('feedback');
    //$wp_admin_bar->remove_node('site-name');
    $wp_admin_bar->remove_node('view-site');
    $wp_admin_bar->remove_node('dashboard');
    $wp_admin_bar->remove_node('themes');
    $wp_admin_bar->remove_node('widgets');
    $wp_admin_bar->remove_node('menus');
    $wp_admin_bar->remove_node('background');
    $wp_admin_bar->remove_node('header');
    //$wp_admin_bar->remove_node('updates');
    $wp_admin_bar->remove_node('customize');
    $wp_admin_bar->remove_node('comments');
    //$wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('new-media');
    //$wp_admin_bar->remove_node('new-page');
    $wp_admin_bar->remove_node('new-user');
    //$wp_admin_bar->remove_node('my-account');
  }
endif;

// Настройка виджетов страницы Консоли
if ( ! function_exists( 'spart_custom_dashboard_widgets' ) ) :
  function spart_custom_dashboard_widgets () {
    //remove_meta_box('dashboard_quick_press','dashboard','side');
    //remove_meta_box('dashboard_recent_drafts','dashboard','side');
    remove_meta_box('dashboard_primary','dashboard','side');
    //remove_meta_box('dashboard_secondary','dashboard','side');
    //remove_meta_box('dashboard_incoming_links','dashboard','normal');
    //remove_meta_box('dashboard_plugins','dashboard','normal');
    remove_meta_box('dashboard_right_now','dashboard', 'normal');
    //remove_meta_box('dashboard_recent_comments','dashboard','normal');
    //remove_meta_box('dashboard_activity','dashboard', 'normal');
    //remove_action('welcome_panel','wp_welcome_panel');
  }
  add_action('wp_dashboard_setup', 'spart_custom_dashboard_widgets');
endif;

// Настройка стандартных виджетов
if ( ! function_exists( 'spart_custom_admin_widgets' ) ) :
  function spart_custom_admin_widgets() {
    unregister_widget('WP_Widget_Archives');
    unregister_widget('WP_Widget_Calendar');
    //unregister_widget('WP_Widget_Categories');
    unregister_widget('WP_Widget_Meta');
    //unregister_widget('WP_Widget_Pages');
    unregister_widget('WP_Widget_Recent_Comments');
    //unregister_widget('WP_Widget_Recent_Posts');
    unregister_widget('WP_Widget_RSS');
    unregister_widget('WP_Widget_Search');
    unregister_widget('WP_Widget_Tag_Cloud');
    //unregister_widget('WP_Widget_Text');
    //unregister_widget('WP_Nav_Menu_Widget');
  }
  add_action( 'widgets_init', 'spart_custom_admin_widgets', 20 );
endif;

// Не создавать миниатюры для загружаемых изображений
if ( ! function_exists( 'spart_disable_thumbnails_generator' ) ) :
    function spart_disable_thumbnails_generator( $sizes ) {
      unset( $sizes['thumbnail'] );
      unset( $sizes['medium'] );
      unset( $sizes['medium_large'] );
      unset( $sizes['large'] );
      return $sizes;
    }
    add_filter( 'intermediate_image_sizes_advanced', 'spart_disable_thumbnails_generator' );
endif;

// Удаление неиспользуемых столбцов списка записей 'page'
if ( ! function_exists( 'spart_unregister_page_columns' ) ) :
  function spart_unregister_page_columns( $columns ) {
    unset($columns['comments']);
    unset($columns['author']);
    unset($columns['date']);
    return $columns;
  }
  add_filter( 'manage_edit-page_columns', 'spart_unregister_page_columns' );
endif;

// Отключение фильтра по датам
if ( ! function_exists( 'spart_disable_months_dropdown' ) ) :
  function spart_disable_months_dropdown( $columns ) {
    return true;
  }
  add_filter( 'disable_months_dropdown' , 'spart_disable_months_dropdown' );
endif;

// Отключение автообновления плагинов
if ( ! function_exists( 'spart_disable_plugin_updates' ) ) :
  function spart_disable_plugin_updates( $value ) {
    if ( isset( $value->response['wp-all-export-pro/wp-all-export-pro.php'] )) {
      unset( $value->response['wp-all-export-pro/wp-all-export-pro.php'] );
    }
    if ( isset( $value->response['wp-all-import-pro/wp-all-import-pro.php'] )) {
      unset( $value->response['wp-all-import-pro/wp-all-import-pro.php'] );
    }
    return $value;
  }
  add_filter( 'site_transient_update_plugins', 'spart_disable_plugin_updates' );
endif;

// Сохранять файлы в этой папке
add_filter( 'pre_option_upload_path', function( $upload_path ) {
    return 'wp-content/themes/spart.pro/uploads';
});