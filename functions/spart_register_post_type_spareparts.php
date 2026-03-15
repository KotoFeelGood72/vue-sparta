<?php

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'spart_register_post_type_spareparts' ) ) :
  function spart_register_post_type_spareparts() {
    $spareparts_labels = array(
      'name' => 'Спецзапчасти',
      'singular_name' => 'Спецзапчасти',
      'add_new' => 'Добавить новую',
      'add_new_item' => 'Добавить спецзапчасть',
      'edit_item' => 'Редактировать спецзапчасть',
      'new_item' => 'Новая спецзапчасть',
      'search_items' => 'Искать спецзапчасти',
      'not_found' =>  'Спецзапчасти не найдены.',
      'not_found_in_trash' => 'В корзине нет спецзапчастей.',
      'all_items' => 'Все спецзапчасти',
      'archives' => 'Архив спецзапчастей',
      'menu_name' => 'Спецзапчасти',
      'filter_items_list' => 'Фильтровать спецзапчасти',
      'items_list_navigation' => 'Навигация по спецзапчастям',
      'items_list' => 'Перечень спецзапчастей',
      'name_admin_bar' => 'Спецзапчасть'
    );
$spareparts_args = array(
  'rewrite'             => true,
  'labels'              => $spareparts_labels,
  'public'              => true,
  'menu_position'       => 4,
  'menu_icon'           => 'dashicons-admin-generic',
  'hierarchical'        => false,
  'supports'            => array( 'thumbnail' ),
  'has_archive'         => true,
  'show_in_rest'        => true,
  'rest_base'           => 'spareparts',
  'rest_controller_class' => 'WP_REST_Posts_Controller',
);
    register_post_type('spareparts', $spareparts_args);
  }
  add_action( 'init', 'spart_register_post_type_spareparts' );
endif;

if ( ! function_exists( 'spart_register_taxonomy_brands' ) ) :
  function spart_register_taxonomy_brands(){
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
      'rewrite'               => array( 'slug' => 'brands' ),
		  'show_in_rest'          => true,
      'capabilities'          => array(),
      'meta_box_cb'           => null,
      'show_admin_column'     => false,
      '_builtin'              => false,
      'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy( 'brands', array('spareparts'), $brands_args );
  }
  add_action( 'init', 'spart_register_taxonomy_brands' );
endif;

if ( ! function_exists( 'spart_register_taxonomy_models' ) ) :
  function spart_register_taxonomy_models(){
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
      'rewrite'               => array( 'slug' => 'models' ),
      'capabilities'          => array(),
		  'show_in_rest'          => true,
      'meta_box_cb'           => null,
      'show_admin_column'     => false,
      '_builtin'              => false,
      'show_in_quick_edit'    => null, // по умолчанию значение show_ui
    );
    register_taxonomy( 'models', array('spareparts'), $models_args );
  }
  add_action( 'init', 'spart_register_taxonomy_models' );
endif;

if ( ! function_exists( 'spart_register_spareparts_columns' ) ) :
  function spart_register_spareparts_columns( $columns ) {
    $columns['spareparts_actions'] = 'Действия';
    $columns['spareparts_thumbnail'] = 'Миниатюра';
    $columns['cf_spareparts_sku'] = 'Номер';
    $columns['cf_spareparts_name'] = 'Наименование';
    $columns['cf_spareparts_brand'] = 'Бренд';
    $columns['cf_spareparts_model'] = 'Модель техники';
    $columns['cf_spareparts_cost'] = 'Цена';
    $columns['cf_spareparts_state'] = 'Наличие';
    return $columns;
  }
  add_filter( 'manage_edit-spareparts_columns', 'spart_register_spareparts_columns' );
endif;

if ( ! function_exists( 'spart_unregister_spareparts_columns' ) ) :
  function spart_unregister_spareparts_columns( $columns ) {
    unset($columns['title']);
    unset($columns['date']);
    return $columns;
  }
  add_filter( 'manage_edit-spareparts_columns', 'spart_unregister_spareparts_columns' );
endif;

if ( ! function_exists( 'spart_fill_spareparts_columns' ) ) :
  function spart_fill_spareparts_columns( $column ) {
    global $post;

    $meta = new stdClass;
    $array_post_meta = get_post_meta( $post->ID );
    foreach( $array_post_meta as $k => $v ) :
      $meta->$k = $v[0];
    endforeach;

    $post_thumbnail = get_the_post_thumbnail_url( $post->ID );
    $edit_post_link = get_edit_post_link( $post->ID );

    if ( isset( $meta->cf_spareparts_sku ) ) $cf_spareparts_sku = $meta->cf_spareparts_sku; else $cf_spareparts_sku = '<span class="missed">cf_spareparts_sku</span>';
    if ( isset( $meta->cf_spareparts_name ) ) $cf_spareparts_name = $meta->cf_spareparts_name; else $cf_spareparts_name = '<span class="missed">cf_spareparts_name</span>';
    if ( isset( $meta->cf_spareparts_brand ) ) $cf_spareparts_brand = $meta->cf_spareparts_brand; else $cf_spareparts_brand = '<span class="missed">cf_spareparts_brand</span>';
    if ( isset( $meta->cf_spareparts_model ) ) $cf_spareparts_model = $meta->cf_spareparts_model; else $cf_spareparts_model = '<span class="missed">cf_spareparts_model</span>';
    if ( isset( $meta->cf_spareparts_cost ) ) $cf_spareparts_cost = $meta->cf_spareparts_cost; else $cf_spareparts_cost = '<span class="missed">cf_spareparts_cost</span>';
    if ( isset( $meta->cf_spareparts_state ) ) $cf_spareparts_state = $meta->cf_spareparts_state; else $cf_spareparts_state = '<span class="missed">cf_spareparts_state</span>';

    switch ( $column ) {
      case 'spareparts_actions':
        echo '<a href="' . $edit_post_link . '"><span class="dashicons dashicons-edit"></span> Изменить</a>';
      break;
      case 'spareparts_thumbnail':
      if( $post_thumbnail ) {
        echo '<div class="thumbnail"><img src="' . $post_thumbnail . '"/></div>';
      } else {
        echo '<span class="no-thumbnail">Нет изображения</span>';
      }
      break;
      case 'cf_spareparts_sku':
        echo $cf_spareparts_sku;
      break;
      case 'cf_spareparts_name':
        echo $cf_spareparts_name;
      break;
      case 'cf_spareparts_brand':
        echo $cf_spareparts_brand;
      break;
      case 'cf_spareparts_model':
        echo $cf_spareparts_model;
      break;
      case 'cf_spareparts_cost':
        echo $cf_spareparts_cost;
      break;
      case 'cf_spareparts_state':
        echo $cf_spareparts_state;
      break;
    }
  }
  add_action( 'manage_spareparts_posts_custom_column', 'spart_fill_spareparts_columns', 10, 2 );
endif;

if ( ! function_exists( 'spart_enable_spareparts_sortable_columns' ) ) :
  function spart_enable_spareparts_sortable_columns( $columns ) {
      $columns['cf_spareparts_sku'] = 'cf_spareparts_sku';
      $columns['cf_spareparts_name'] = 'cf_spareparts_name';
      $columns['cf_spareparts_brand'] = 'cf_spareparts_brand';
      $columns['cf_spareparts_model'] = 'cf_spareparts_model';
      $columns['cf_spareparts_cost'] = 'cf_spareparts_cost';
      $columns['cf_spareparts_state'] = 'cf_spareparts_state';
      return $columns;
  }
  add_filter( 'manage_edit-spareparts_sortable_columns', 'spart_enable_spareparts_sortable_columns' );
endif;

if ( ! function_exists( 'spart_set_spareparts_sortable_columns_orderby' ) ) :
  function spart_set_spareparts_sortable_columns_orderby( $query ) {
    if( ! is_admin() ) return;
    $orderby = $query->get('orderby');
      if( 'cf_spareparts_brand' == $orderby ) { // 'views' - параметр в GET-запросе
      if( 'cf_spareparts_sku' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_spareparts_sku'); // 'cf_spareparts_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_spareparts_name' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_spareparts_name'); // 'cf_spareparts_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
        $query->set('meta_key','cf_spareparts_brand'); // 'cf_spareparts_sku' - название произвольного поля
        $query->set('orderby','meta_value_num'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_spareparts_model' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_spareparts_model'); // 'cf_spareparts_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_spareparts_cost' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_spareparts_cost'); // 'cf_spareparts_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
      if( 'cf_spareparts_state' == $orderby ) { // 'views' - параметр в GET-запросе
        $query->set('meta_key','cf_spareparts_state'); // 'cf_spareparts_sku' - название произвольного поля
        $query->set('orderby','meta_value'); // если сортировка не по числовому значению, а по алфавиту, замените на 'meta_value'
      }
  }
  add_action( 'pre_get_posts', 'spart_set_spareparts_sortable_columns_orderby' );
endif;


$options = array(
  array(
    'id'  =>  'cf',
    'capability'=>  'edit_posts',
    'name'  =>  'Основная информация о спецзапчасти',
    'post_type' =>  array('spareparts'),
    'priority'  =>  'high',

    'args' => array(
      array(
        'type'          => 'text',
        'id'            => 'spareparts_sku',
        'label'         => 'Номер',
        'description'   => 'Пример: <strong>&laquo;01010-51075&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'spareparts_name',
        'label'         => 'Наименование',
        'description'   => 'Пример: <strong>&laquo;Bolt&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'spareparts_brand',
        'label'         => 'Бренд',
        'description'   => 'Пример: <strong>&laquo;Komatsu&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'spareparts_model',
        'label'         => 'Модель техники',
        'description'   => 'Пример: <strong>&laquo;PC400&raquo;</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'text',
        'id'            => 'spareparts_cost',
        'label'         => 'Цена',
        'description'   => 'Цена указывается в <strong>рублях</strong>',
        'placeholder'   => ''
      ),
      array(
        'type'          => 'select',
        'id'            => 'spareparts_state',
        'label'         => 'Наличие',
        'description'   => '',
        'args'          => array( 'Под заказ, 30 дней' => 'Под заказ, 30 дней', 'Под заказ, 14 дней' => 'Под заказ, 14 дней', 'Под заказ, 10 дней' => 'Под заказ, 10 дней', 'Под заказ, 7 дней' => 'Под заказ, 7 дней', 'Под заказ, 5 дней' => 'Под заказ, 5 дней', 'Под заказ, 3 дня' => 'Под заказ, 3 дня', 'В наличии' => 'В наличии' )
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

add_action( 'rest_api_init', function () {
  register_rest_field(
    'brands',
    'thumbnail',
    array(
      'get_callback' => function ( $term_arr ) {
        // ВАЖНО: cf_brands_thumbnail
        $image_id = get_term_meta( $term_arr['id'], 'cf_brands_thumbnail', true );
        if ( ! $image_id ) {
          return null;
        }

        return array(
          'id'  => (int) $image_id,
          'url' => wp_get_attachment_image_url( $image_id, 'full' ),
        );
      },
      'schema' => array(
        'description' => 'Brand thumbnail',
        'type'        => 'object',
        'context'     => array( 'view', 'edit' ),
      ),
    )
  );
} );



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