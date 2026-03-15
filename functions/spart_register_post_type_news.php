<?php

defined( 'ABSPATH' ) || exit;

if ( ! function_exists( 'spart_register_post_type_news' ) ) :
  function spart_register_post_type_news() {
    $news_labels = array(
      'name' => 'Новости',
      'singular_name' => 'Новости',
      'add_new' => 'Добавить новую',
      'add_new_item' => 'Добавить новость',
      'edit_item' => 'Редактировать новость',
      'new_item' => 'Свежая новость',
      'search_items' => 'Искать новость',
      'not_found' =>  'Новости не найдена.',
      'not_found_in_trash' => 'В корзине нет новостей.',
      'all_items' => 'Все новости',
      'archives' => 'Архив новостей',
      'menu_name' => 'Новости',
      'filter_items_list' => 'Фильтровать новости',
      'items_list_navigation' => 'Навигация по новостям',
      'items_list' => 'Перечень новостей',
      'name_admin_bar' => 'Новость'
    );
    $news_args = array(
      'rewrite' => true,
      'labels' => $news_labels,
      'public' => true,
      'exclude_from_search' => true,
      'menu_position' => 9,
      'menu_icon' => 'dashicons-megaphone',
      'hierarchical' => false,
      'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
      'has_archive' => true
    );
    register_post_type('news', $news_args);
  }
  add_action( 'init', 'spart_register_post_type_news' );
endif;

if ( ! function_exists( 'spart_unregister_news_columns' ) ) :
  function spart_unregister_news_columns( $columns ) {
    unset($columns['title']);
    unset($columns['date']);
    return $columns;
  }
  add_filter( 'manage_edit-news_columns', 'spart_unregister_news_columns' );
endif;

if ( ! function_exists( 'spart_register_news_columns' ) ) :
  function spart_register_news_columns( $columns ) {
    //$columns['news_actions'] = 'Действия';
    $columns['news_thumbnail'] = 'Миниатюра';
    $columns['title'] = 'Заголовок';
    $columns['date'] = 'Дата';
    return $columns;
  }
  add_filter( 'manage_edit-news_columns', 'spart_register_news_columns' );
endif;

if ( ! function_exists( 'spart_fill_news_columns' ) ) :
  function spart_fill_news_columns( $column ) {
    global $post;

    $post_thumbnail = get_the_post_thumbnail_url( $post->ID );
    $edit_post_link = get_edit_post_link( $post->ID );

    switch ( $column ) {
      //case 'news_actions':
      //  echo '<a href="' . $edit_post_link . '"><span class="dashicons dashicons-edit"></span> Изменить</a>';
      //break;
      case 'news_thumbnail':
        if( $post_thumbnail ) {
          echo '<div class="thumbnail"><img src="' . $post_thumbnail . '"/></div>';
        } else {
          echo '<span class="no-thumbnail">Нет изображения</span>';
        }
      break;
    }
  }
  add_action( 'manage_news_posts_custom_column', 'spart_fill_news_columns', 10, 2 );
endif;