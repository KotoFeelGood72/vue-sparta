<?php

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'spart_register_post_type_engines' ) ) :
  function spart_register_post_type_engines() {
    $engines_labels = array(
      'name' => 'Двигатели',
      'singular_name' => 'Двигатели',
      'add_new' => 'Добавить новый',
      'add_new_item' => 'Добавить двигатель',
      'edit_item' => 'Редактировать двигатель',
      'new_item' => 'Новая двигатель',
      'search_items' => 'Искать двигатели',
      'not_found' =>  'Двигатели не найдены.',
      'not_found_in_trash' => 'В корзине нет двигателей.',
      'all_items' => 'Все двигатели',
      'archives' => 'Архив двигателей',
      'menu_name' => 'Двигатели',
      'filter_items_list' => 'Фильтровать двигатели',
      'items_list_navigation' => 'Навигация по двигателям',
      'items_list' => 'Перечень двигателей',
      'name_admin_bar' => 'Двигатель'
    );
    $engines_args = array(
      'rewrite' => true,
      'labels' => $engines_labels,
      'public' => true,
      'menu_position' => 4,
      'menu_icon' => 'dashicons-admin-generic',
      'hierarchical' => false,
      'supports' => array( 'thumbnail' ),
      'has_archive' => true,
    );
    register_post_type('engines', $engines_args);
  }
  add_action( 'init', 'spart_register_post_type_engines' );
endif;

if ( ! function_exists( 'spart_register_taxonomy_engines_brands' ) ) :
  function spart_register_taxonomy_engines_brands(){
    $brands_labels = array(
      'name'              => 'Бренды',
      'singular_name'     => 'Бренд',
      'search_items'      => 'Поиск брендов',
      'all_items'         => 'Все бренды',
      'parent_item'       => 'Родитель',
      'parent_item_colon' => 'Родитель:',
      'edit_item'         => 'Изменить бренд',
      'update_item'       => 'Обновить бренд',
      'add_new_item'      => 'Добавить новый бренд',
      'new_item_name'     => 'Наименование нового бренда',
      'menu_name'         => 'Бренды',
    );
    $brands_args = array(
      'label'                 => '', // определяется параметром $labels_brands->name
      'labels'                => $brands_labels,
      'description'           => '',
      'public'                => true,
      'publicly_queryable'    => null, // равен аргументу public
      'show_in_nav_menus'     => true, // равен аргументу public
      'show_ui'               => true, // равен аргументу public
      'show_tagcloud'         => true, // равен аргументу show_ui
      'hierarchical'          => false,
      'update_count_callback' => '',
      'rewrite'               => array( 'slug' => 'engines_brands' ),
      'capabilities'          => array(),
      'meta_box_cb'           => null,
      'show_admin_column'     => false,
      '_builtin'              => false,
      'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy( 'engines_brands', array('engines'), $brands_args );
  }
  add_action( 'init', 'spart_register_taxonomy_engines_brands' );
endif;

if ( ! function_exists( 'spart_register_taxonomy_engines_models' ) ) :
  function spart_register_taxonomy_engines_models(){
    $models_labels = array(
      'name'              => 'Модели',
      'singular_name'     => 'Модель',
      'search_items'      => 'Поиск моделей',
      'all_items'         => 'Все модели',
      'parent_item'       => 'Родитель',
      'parent_item_colon' => 'Родитель:',
      'edit_item'         => 'Изменить модель',
      'update_item'       => 'Обновить модель',
      'add_new_item'      => 'Добавить новую модель',
      'new_item_name'     => 'Наименование новой модели',
      'menu_name'         => 'Модели',
    );
    $models_args = array(
      'label'                 => '', // определяется параметром $labels_brand->name
      'labels'                => $models_labels,
      'description'           => '',
      'public'                => true,
      'publicly_queryable'    => null, // равен аргументу public
      'show_in_nav_menus'     => true, // равен аргументу public
      'show_ui'               => true, // равен аргументу public
      'show_tagcloud'         => true, // равен аргументу show_ui
      'hierarchical'          => false,
      'update_count_callback' => '',
      'rewrite'               => array( 'slug' => 'engines_models' ),
      'capabilities'          => array(),
      'meta_box_cb'           => null,
      'show_admin_column'     => false,
      '_builtin'              => false,
      'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy( 'engines_models', array('engines'), $models_args );
  }
  add_action( 'init', 'spart_register_taxonomy_engines_models' );
endif;

if ( ! function_exists( 'spart_register_engines_columns' ) ) :
  function spart_register_engines_columns( $columns ) {
    $columns['engines_actions'] = 'Действия';
    $columns['engines_thumbnail'] = 'Миниатюра';
    $columns['cf_engines_sku'] = 'Номер';
    $columns['cf_engines_name'] = 'Наименование';
    $columns['cf_engines_brand'] = 'Бренд';
    $columns['cf_engines_model'] = 'Модель техники';
    $columns['cf_engines_cost'] = 'Цена';
    $columns['cf_engines_state'] = 'Наличие';
    return $columns;
  }
  add_filter( 'manage_edit-engines_columns', 'spart_register_engines_columns' );
endif;

if ( ! function_exists( 'spart_unregister_engines_columns' ) ) :
  function spart_unregister_engines_columns( $columns ) {
    unset($columns['title']);
    unset($columns['date']);
    return $columns;
  }
  add_filter( 'manage_edit-engines_columns', 'spart_unregister_engines_columns' );
endif;

if ( ! function_exists( 'spart_fill_engines_columns' ) ) :
  function spart_fill_engines_columns( $column ) {
    global $post;

    $meta = new stdClass;
    $array_post_meta = get_post_meta( $post->ID );
    foreach( $array_post_meta as $k => $v ) :
      $meta->$k = $v[0];
    endforeach;

    $post_thumbnail = get_the_post_thumbnail_url( $post->ID );
    $edit_post_link = get_edit_post_link( $post->ID );

    if ( isset( $meta->cf_engines_sku ) ) $cf_engines_sku = $meta->cf_engines_sku; else $cf_engines_sku = '<span class="missed">cf_engines_sku</span>';
    if ( isset( $meta->cf_engines_name ) ) $cf_engines_name = $meta->cf_engines_name; else $cf_engines_name = '<span class="missed">cf_engines_name</span>';
    if ( isset( $meta->cf_engines_brand ) ) $cf_engines_brand = $meta->cf_engines_brand; else $cf_engines_brand = '<span class="missed">cf_engines_brand</span>';
    if ( isset( $meta->cf_engines_model ) ) $cf_engines_model = $meta->cf_engines_model; else $cf_engines_model = '<span class="missed">cf_engines_model</span>';
    if ( isset( $meta->cf_engines_cost ) ) $cf_engines_cost = $meta->cf_engines_cost; else $cf_engines_cost = '<span class="missed">cf_engines_cost</span>';
    if ( isset( $meta->cf_engines_state ) ) $cf_engines_state = $meta->cf_engines_state; else $cf_engines_state = '<span class="missed">cf_engines_state</span>';

    switch ( $column ) {
      case 'engines_actions':
        echo '<a href="' . $edit_post_link . '"><span class="dashicons dashicons-edit"></span> Изменить</a>';
      break;
      case 'engines_thumbnail':
      if( $post_thumbnail ) {
        echo '<div class="thumbnail"><img src="' . $post_thumbnail . '"/></div>';
      } else {
        echo '<span class="no-thumbnail">Нет изображения</span>';
      }
      break;
      case 'cf_engines_sku':
        echo $cf_engines_sku;
      break;
      case 'cf_engines_name':
        echo $cf_engines_name;
      break;
      case 'cf_engines_brand':
        echo $cf_engines_brand;
      break;
      case 'cf_engines_model':
        echo $cf_engines_model;
      break;
      case 'cf_engines_cost':
        echo $cf_engines_cost;
      break;
      case 'cf_engines_state':
        echo $cf_engines_state;
      break;
    }
  }
  add_action( 'manage_engines_posts_custom_column', 'spart_fill_engines_columns', 10, 2 );
endif;

if ( ! function_exists( 'spart_enable_engines_sortable_columns' ) ) :
  function spart_enable_engines_sortable_columns( $columns ) {
      $columns['cf_engines_sku'] = 'cf_engines_sku';
      $columns['cf_engines_name'] = 'cf_engines_name';
      $columns['cf_engines_brand'] = 'cf_engines_brand';
      $columns['cf_engines_model'] = 'cf_engines_model';
      $columns['cf_engines_cost'] = 'cf_engines_cost';
      $columns['cf_engines_state'] = 'cf_engines_state';
      return $columns;
  }
  add_filter( 'manage_edit-engines_sortable_columns', 'spart_enable_engines_sortable_columns' );
endif;

if ( ! function_exists( 'spart_set_engines_sortable_columns_orderby' ) ) :
  function spart_set_engines_sortable_columns_orderby( $query ) {
    if( ! is_admin() ) return;
    $orderby = $query->get('orderby');
      if( 'cf_engines_brand' == $orderby ) { // 'views' - параметр в GET-запросе
      if( 'cf_engines_sku' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_engines_sku'); // 'cf_engines_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_engines_name' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_engines_name'); // 'cf_engines_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
        $query->set('meta_key','cf_engines_brand'); // 'cf_engines_sku' - название произвольного поля
        $query->set('orderby','meta_value_num'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_engines_model' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_engines_model'); // 'cf_engines_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_engines_cost' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_engines_cost'); // 'cf_engines_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_engines_state' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_engines_state'); // 'cf_engines_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
  }
  add_action( 'pre_get_posts', 'spart_set_engines_sortable_columns_orderby' );
endif;


$options = array(
  array(
    'id'  =>  'cf',
    'capability'=>  'edit_posts',
    'name'  =>  'Основная информация о двигателе',
    'post_type' =>  array('engines'),
    'priority'  =>  'high',

    'args' => array(
      array(
        'type'          => 'text',
        'id'            => 'engines_sku',
        'label'         => 'Номер',
        'description'   => 'Пример: <strong>&laquo;01010-51075&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'engines_name',
        'label'         => 'Наименование',
        'description'   => 'Пример: <strong>&laquo;Bolt&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'engines_brand',
        'label'         => 'Бренд',
        'description'   => 'Пример: <strong>&laquo;Komatsu&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'engines_model',
        'label'         => 'Модель техники',
        'description'   => 'Пример: <strong>&laquo;PC400&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'engines_cost',
        'label'         => 'Цена',
        'description'   => 'Цена указывается в <strong>рублях</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'select',
        'id'            => 'engines_state',
        'label'         => 'Наличие',
        'description'   => '',
        'args'          => array( 'Под заказ, 2 месяца' => 'Под заказ, 2 месяца', 'Под заказ, 30 дней' => 'Под заказ, 30 дней', 'Под заказ, 14 дней' => 'Под заказ, 14 дней', 'Под заказ, 10 дней' => 'Под заказ, 10 дней', 'Под заказ, 7 дней' => 'Под заказ, 7 дней', 'Под заказ, 5 дней' => 'Под заказ, 5 дней', 'Под заказ, 3 дня' => 'Под заказ, 3 дня', 'Под заказ' => 'Под заказ', 'В наличии' => 'В наличии' )
        //'args'          => array( 'Нет в наличии' => 'Нет в наличии', 'Под заказ' => 'Под заказ', 'В наличии' => 'В наличии' )
      )
    )
  )
);
foreach ($options as $option) {
  $metabox = new trueMetaBox($option);
}

$options = array(
  array(
    'id'              => 'cf',
    'capability'      => 'edit_posts',
    'taxonomy'        => array( 'brands' ),

    'args' => array(
      array(
        'id'          => 'brands_thumbnail',
        'label'       => 'Изображение',
        'description' => '&nbsp;',
        'type'        => 'image'
      )
    )
  )
);

foreach ($options as $option) {
  $metabox = new trueTaxonomyMetaBox($option);
}



/* if ( ! function_exists( 'spart_unregister_brands_columns' ) ) :
  function spart_unregister_brands_columns( $columns ) {
    unset($columns['name']);
    unset($columns['description']);
    unset($columns['slug']);
    unset($columns['posts']);
    return $columns;
  }
  add_filter( 'manage_edit-brands_columns', 'spart_unregister_brands_columns' );
endif;


if ( ! function_exists( 'spart_register_brands_columns' ) ) :
  function spart_register_brands_columns( $columns ) {
    $columns['brands_thumbnail'] = 'Миниатюра';
    $columns['name'] = 'Название';
    $columns['slug'] = 'Ярлык';
    $columns['posts'] = 'Записи';
    return $columns;
  }
  add_filter( 'manage_edit-brands_columns', 'spart_register_brands_columns');
endif;


if ( ! function_exists( 'spart_fill_brands_columns' ) ) :
  function spart_fill_brands_columns( $column ) {
    global $post;

    $term_img = wp_get_attachment_url( '2' );

    switch ( $column ) {
      case 'brands_thumbnail':
      if( $term_img ) {
        echo '22<div class="thumbnail"><img src="' . $term_img . '"/></div>';
      } else {
        echo '11<span class="no-thumbnail">Нет изображения</span>';
      }
      break;
    }
  }
  add_action( 'manage_brands_custom_column', 'spart_fill_brands_columns', 10, 2 );
endif; */