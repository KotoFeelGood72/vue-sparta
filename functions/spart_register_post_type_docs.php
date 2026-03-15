<?php

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'spart_register_post_type_docs' ) ) :
  function spart_register_post_type_docs() {
    $post_type_labels = array(
      'name' => 'Документы',
      'singular_name' => 'Документ',
      'add_new' => 'Добавить новый',
      'add_new_item' => 'Добавить документ',
      'edit_item' => 'Редактировать документ',
      'new_item' => 'Новый документ',
      'search_items' => 'Искать документы',
      'not_found' =>  'Документы не найдены.',
      'not_found_in_trash' => 'В корзине нет документов.',
      'all_items' => 'Все документы',
      'archives' => 'Архив документов',
      'menu_name' => 'Документы',
      'filter_items_list' => 'Фильтровать документы',
      'items_list_navigation' => 'Навигация по документам',
      'items_list' => 'Перечень документов',
      'name_admin_bar' => 'Документ'
    );
    $post_type_args = array(
      'rewrite' => true,
      'labels' => $post_type_labels,
      'public' => true,
      'exclude_from_search' => true,
      'publicly_queryable' => false,
      'menu_position' => 6,
      'menu_icon' => 'dashicons-format-aside',
      'hierarchical' => false,
      'supports' => array( 'title' ),
      'has_archive' => false,
    );
    register_post_type('docs', $post_type_args);
  }
  add_action( 'init', 'spart_register_post_type_docs' );
endif;

if ( ! function_exists( 'spart_unregister_docs_columns' ) ) :
  function spart_unregister_docs_columns( $columns ) {
    unset($columns['title']);
    unset($columns['date']);
    return $columns;
  }
  add_filter( 'manage_edit-docs_columns', 'spart_unregister_docs_columns' );
endif;

if ( ! function_exists( 'spart_register_docs_columns' ) ) :
  function spart_register_docs_columns( $columns ) {
    $columns['docs_actions'] = 'Действия';
    //$columns['docs_thumbnail'] = 'Миниатюра';
    $columns['cf_docs_title'] = 'Наименование';
    //$columns['cf_docs_description'] = 'Описание';
    $columns['cf_docs_url'] = 'Ссылка';
    return $columns;
  }
  add_filter( 'manage_edit-docs_columns', 'spart_register_docs_columns' );
endif;

if ( ! function_exists( 'spart_fill_docs_columns' ) ) :
  function spart_fill_docs_columns( $column ) {
    global $post;

    $meta = new stdClass;
    $array_post_meta = get_post_meta( $post->ID );
    foreach( $array_post_meta as $k => $v ) :
      $meta->$k = $v[0];
    endforeach;

    if ( isset( $meta->cf_docs_title ) ) $cf_docs_title = $meta->cf_docs_title; else $cf_docs_title = '<span class="missed">cf_docs_title</span>';
    //if ( isset( $meta->cf_docs_description ) ) $cf_docs_description = $meta->cf_docs_description; else $cf_docs_description = '<span class="missed">cf_docs_description</span>';
    if ( isset( $meta->cf_docs_url ) ) $cf_docs_url = $meta->cf_docs_url; else $cf_docs_url = 'cf_docs_url';

    $post_thumbnail = get_the_post_thumbnail_url( $post->ID );
    $edit_post_link = get_edit_post_link( $post->ID );

    switch ( $column ) {
      case 'docs_actions':
        echo '<a href="' . $edit_post_link . '"><span class="dashicons dashicons-edit"></span> Изменить</a>';
      break;
      /* case 'docs_thumbnail':
      if( $post_thumbnail ) {
        echo '<div class="thumbnail"><img src="' . $post_thumbnail . '"/></div>';
      } else {
        echo '<span class="no-thumbnail">Нет изображения</span>';
      }
      break; */
      case 'cf_docs_title':
        echo $cf_docs_title;
      break;
      /* case 'cf_docs_description':
        echo $cf_docs_description;
      break; */
      case 'cf_docs_url':
        echo '<a target="_blank" href="' . $cf_docs_url . '"><span class="dashicons dashicons-admin-links"></span>&nbsp;&nbsp;' . $cf_docs_url . '</a>';
      break;
    }
  }
  add_action( 'manage_docs_posts_custom_column', 'spart_fill_docs_columns', 10, 2 );
endif;

if ( ! function_exists( 'spart_enable_docs_sortable_columns' ) ) :
  function spart_enable_docs_sortable_columns( $columns ) {
      $columns['cf_docs_title'] = 'cf_docs_title';
      //$columns['cf_docs_description'] = 'cf_docs_description';
      $columns['cf_docs_url'] = 'cf_docs_url';
      return $columns;
  }
  add_filter( 'manage_edit-docs_sortable_columns', 'spart_enable_docs_sortable_columns' );
endif;

if ( ! function_exists( 'spart_set_docs_sortable_columns_orderby' ) ) :
  function spart_set_docs_sortable_columns_orderby( $query ) {
    if( ! is_admin() ) return;
    $orderby = $query->get('orderby');
      if( 'cf_docs_title' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_docs_title'); // 'cf_docs_info_sku' - название произвольного поля
        $query->set('orderby','meta_value_num'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      /* if( 'cf_docs_description' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_docs_description'); // 'cf_docs_info_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      } */
      if( 'cf_docs_url' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_docs_url'); // 'cf_docs_info_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
  }
  add_action( 'pre_get_posts', 'spart_set_docs_sortable_columns_orderby' );
endif;



$options = array(
  array(
    'id'  =>  'cf',
    'capability'=>  'edit_posts',
    'name'  =>  'Основная информация о документе',
    'post_type' =>  array('docs'),
    'priority'  =>  'high',
    //'taxonomy'  =>  array(''),

    'args' => array(
      array(
        'type'          => 'text',
        'id'            => 'docs_title',
        'label'         => 'Название документа',
        'description'   => 'Пример: <strong>&laquo;Прайс&raquo;</strong>',
        'placeholder'   => ''
      ),
      /* array(
        'type'          => 'text',
        'id'            => 'docs_description',
        'label'         => 'Подробное описание',
        'description'   => 'Пример: <strong>&laquo;Перечень товаров с указанием актуальной стоимости&raquo;</strong>',
        'placeholder'   => ''
      ), */
      array(
        'type'          => 'file',
        'id'            => 'docs_url',
        'label'         => 'Ссылка на документ',
        'description'   => ''
      )
    )
  )
);

foreach ($options as $option) {
  $metabox = new trueMetaBox($option);
}