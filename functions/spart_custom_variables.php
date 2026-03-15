<?php

defined( 'ABSPATH' ) || exit;

// Путь к папке с шаблоном
$template_dir = get_template_directory_uri();

// Информация о сайте
$site_url = get_bloginfo('url');
$site_name = get_bloginfo('name');
$site_description = get_bloginfo('description');

// Контактный телефон
$page_contacts = get_page_id( 'contacts' );
$contacts_phone = get_post_meta( $page_contacts, 'cf_contacts_phone', true);