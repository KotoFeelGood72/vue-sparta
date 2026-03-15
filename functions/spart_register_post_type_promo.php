<?php

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'spart_register_post_type_promo' ) ) :
  function spart_register_post_type_promo() {
    $promo_labels = array(
      'name' => 'Промо-блоки',
      'singular_name' => 'Промо-блок',
      'add_new' => 'Добавить новый',
      'add_new_item' => 'Добавить промо-блок',
      'edit_item' => 'Редактировать промо-блок',
      'new_item' => 'Новый промо-блок',
      'search_items' => 'Искать промо-блок',
      'not_found' =>  'Промо-блок не найден.',
      'not_found_in_trash' => 'В корзине нет промо-блоков.',
      'all_items' => 'Все промо-блоки',
      'archives' => 'Архив промо-блоков',
      'menu_name' => 'Промо-блоки',
      'filter_items_list' => 'Фильтровать промо-блоки',
      'items_list_navigation' => 'Навигация по промо-блокам',
      'items_list' => 'Перечень промо-блоков',
      'name_admin_bar' => 'Промо-блок'
    );
    $promo_args = array(
      'rewrite' => true,
      'labels' => $promo_labels,
      'public' => true,
      'publicly_queryable' => false,
      'exclude_from_search' => true,
      'menu_position' => 6,
      'menu_icon' => 'dashicons-layout',
      'hierarchical' => false,
      'supports' => array( 'title', 'thumbnail' ),
      'has_archive' => false,
    );
    register_post_type( 'promo', $promo_args );
  }
  add_action( 'init', 'spart_register_post_type_promo' );
endif;

if ( ! function_exists( 'spart_unregister_promo_columns' ) ) :
  function spart_unregister_promo_columns( $columns ) {
    unset($columns['title']);
    unset($columns['date']);
    return $columns;
  }
  add_filter( 'manage_edit-promo_columns', 'spart_unregister_promo_columns' );
endif;

if ( ! function_exists( 'spart_register_promo_columns' ) ) :
  function spart_register_promo_columns( $columns ) {
    $columns['promo_actions'] = 'Действия';
    $columns['promo_thumbnail'] = 'Миниатюра';
    $columns['cf_promo_title'] = 'Наименование';
    $columns['cf_promo_description'] = 'Описание';
    $columns['cf_promo_button_text'] = 'Текст на кнопке';
    $columns['cf_promo_url'] = 'Ссылка';
    return $columns;
  }
  add_filter( 'manage_edit-promo_columns', 'spart_register_promo_columns' );
endif;

if ( ! function_exists( 'spart_fill_promo_columns' ) ) :
  function spart_fill_promo_columns( $column ) {
    global $post;

    $meta = new stdClass;
    $array_post_meta = get_post_meta( $post->ID );
    foreach( $array_post_meta as $k => $v ) :
      $meta->$k = $v[0];
    endforeach;

    if ( isset( $meta->cf_promo_title ) ) $cf_promo_title = $meta->cf_promo_title; else $cf_promo_title = '<span class="missed">cf_promo_title</span>';
    if ( isset( $meta->cf_promo_description ) ) $cf_promo_description = $meta->cf_promo_description; else $cf_promo_description = '<span class="missed">cf_promo_description</span>';
    if ( isset( $meta->cf_promo_button_text ) ) $cf_promo_button_text = $meta->cf_promo_button_text; else $cf_promo_button_text = '<span class="missed">cf_promo_button_text</span>';
    if ( isset( $meta->cf_promo_url ) ) $cf_promo_url = $meta->cf_promo_url; else $cf_promo_url = 'cf_promo_url';

    $post_thumbnail = get_the_post_thumbnail_url( $post->ID );
    $edit_post_link = get_edit_post_link( $post->ID );

    switch ( $column ) {
      case 'promo_actions':
        echo '<a href="' . $edit_post_link . '"><span class="dashicons dashicons-edit"></span> Изменить</a>';
      break;
      case 'promo_thumbnail':
      if( $post_thumbnail ) {
        echo '<div class="thumbnail"><img src="' . $post_thumbnail . '"/></div>';
      } else {
        echo '<span class="no-thumbnail">Нет изображения</span>';
      }
      break;
      case 'cf_promo_title':
        echo $cf_promo_title;
      break;
      case 'cf_promo_description':
        echo $cf_promo_description;
      break;
      case 'cf_promo_button_text':
        echo $cf_promo_button_text;
      break;
      case 'cf_promo_url':
        echo '<a target="_blank" href="' . $cf_promo_url . '"><span class="dashicons dashicons-admin-links"></span>&nbsp;&nbsp;' . $cf_promo_url . '</a>';
      break;
    }
  }
  add_action( 'manage_promo_posts_custom_column', 'spart_fill_promo_columns', 10, 2 );
endif;

if ( ! function_exists( 'spart_enable_promo_sortable_columns' ) ) :
  function spart_enable_promo_sortable_columns( $columns ) {
      $columns['cf_promo_title'] = 'cf_promo_title';
      $columns['cf_promo_description'] = 'cf_promo_description';
      $columns['cf_promo_button_text'] = 'cf_promo_button_text';
      $columns['cf_promo_url'] = 'cf_promo_url';
      return $columns;
  }
  add_filter( 'manage_edit-promo_sortable_columns', 'spart_enable_promo_sortable_columns' );
endif;

if ( ! function_exists( 'spart_set_promo_sortable_columns_orderby' ) ) :
  function spart_set_promo_sortable_columns_orderby( $query ) {
    if( ! is_admin() ) return;
    $orderby = $query->get('orderby');
      if( 'cf_promo_title' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_promo_title'); // 'cf_promo_info_sku' - название произвольного поля
        $query->set('orderby','meta_value_num'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_promo_description' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_promo_description'); // 'cf_promo_info_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_promo_button_text' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_promo_button_text'); // 'cf_promo_info_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_promo_url' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_promo_url'); // 'cf_promo_info_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
  }
  add_action( 'pre_get_posts', 'spart_set_promo_sortable_columns_orderby' );
endif;


$options = array(
  array(
    'id'  =>  'cf',
    'capability'=>  'edit_posts',
    'name'  =>  'Основная информация о промо-блоке',
    'post_type' =>  array('promo'),
    'priority'  =>  'high',
    //'taxonomy'  =>  array(''),

    'args' => array(
      array(
        'type'          => 'text',
        'id'            => 'promo_title',
        'label'         => 'Наименование',
        'description'   => 'Пример: <strong>&laquo;Shantui SD32&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'promo_description',
        'label'         => 'Описание',
        'description'   => 'Пример: <strong>&laquo;Бульдозер&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'promo_button_text',
        'label'         => 'Текст на кнопке',
        'description'   => 'Пример: <strong>&laquo;Купить&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'file',
        'id'            => 'promo_url',
        'label'         => 'Ссылка',
        'description'   => ''
      )
    )
  )
);

foreach ($options as $option) {
  $metabox = new trueMetaBox($option);
}