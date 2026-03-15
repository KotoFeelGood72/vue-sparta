<?php

defined( 'ABSPATH' ) || exit;

// Создание страниц
if ( ! function_exists( 'spart_create_pages' ) ) :
  add_action( 'after_switch_theme', 'spart_create_pages' );
  function spart_create_pages() {
    $page_main = get_page_by_path( 'main' );
    $page_brands = get_page_by_path( 'brands' );
    $page_models = get_page_by_path( 'models' );
    $page_contacts = get_page_by_path( 'contacts' );
    $page_documents = get_page_by_path( 'documnents' );

    if( !$page_main ) :
      $page_main_data = array(
        'ID'             => '',
        'menu_order'     => '1',
        'comment_status' => 'closed', // closed, open
        'ping_status'    => 'closed', // closed, open
        'pinged'         => '',
        'post_author'    => '',
        'post_category'  => '', //array(1), // всегда в массиве
        'post_content'   => '',
        'post_date'      => '', // Y-m-d H:i:s
        'post_date_gmt'  => '', // Y-m-d H:i:s
        'post_excerpt'   => '',
        'post_name'      => 'main', // slug
        'post_parent'    => '',
        'post_password'  => '',
        'post_status'    => 'publish', // 'draft' | 'publish' | 'pending'| 'future' | 'private'
        'post_title'     => 'Главная',
        'post_type'      => 'page', // 'post' | 'page' | 'link' | 'nav_menu_item' | custom post type
        'tags_input'     => '',
        'tax_input'      => '',
        'to_ping'        => '',
        'meta_input'     => '', //array( 'meta_key'=>'meta_value' )
      );
      $page_main_id = wp_insert_post( wp_slash($page_main_data) );
    endif;

    if( !$page_documents ) :
      $page_documents_data = array(
        'ID'             => '',
        'menu_order'     => '2',
        'comment_status' => 'closed', // closed, open
        'ping_status'    => 'closed', // closed, open
        'pinged'         => '',
        'post_author'    => '',
        'post_category'  => '', //array(1), // всегда в массиве
        'post_content'   => '',
        'post_date'      => '', // Y-m-d H:i:s
        'post_date_gmt'  => '', // Y-m-d H:i:s
        'post_excerpt'   => '',
        'post_name'      => 'docs', // slug
        'post_parent'    => '',
        'post_password'  => '',
        'post_status'    => 'publish', // 'draft' | 'publish' | 'pending'| 'future' | 'private'
        'post_title'     => 'Документы',
        'post_type'      => 'page', // 'post' | 'page' | 'link' | 'nav_menu_item' | custom post type
        'tags_input'     => '',
        'tax_input'      => '',
        'to_ping'        => '',
        'meta_input'     => ''
      );
      $page_documents_id = wp_insert_post( wp_slash($page_documents_data) );
    endif;

    if( !$page_contacts ) :
      $page_contacts_data = array(
        'ID'             => '',
        'menu_order'     => '3',
        'comment_status' => 'closed', // closed, open
        'ping_status'    => 'closed', // closed, open
        'pinged'         => '',
        'post_author'    => '',
        'post_category'  => '', //array(1), // всегда в массиве
        'post_content'   => '',
        'post_date'      => '', // Y-m-d H:i:s
        'post_date_gmt'  => '', // Y-m-d H:i:s
        'post_excerpt'   => '',
        'post_name'      => 'contacts', // slug
        'post_parent'    => '',
        'post_password'  => '',
        'post_status'    => 'publish', // 'draft' | 'publish' | 'pending'| 'future' | 'private'
        'post_title'     => 'Контакты',
        'post_type'      => 'page', // 'post' | 'page' | 'link' | 'nav_menu_item' | custom post type
        'tags_input'     => '',
        'tax_input'      => '',
        'to_ping'        => '',
        'meta_input'     => array( 'cf_contacts_phone' => '8 (423) 201-96-99' )
      );
      $page_contacts_id = wp_insert_post( wp_slash($page_contacts_data) );
    endif;
  }
endif;