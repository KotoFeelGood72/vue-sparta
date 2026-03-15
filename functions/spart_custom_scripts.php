<?php

defined( 'ABSPATH' ) || exit;

// Получение ID страницы по slug-имени
function get_page_id( $page_slug ) {
  $page = get_page_by_path( $page_slug );

  if ( $page ) {
    return $page->ID;
  } else {
    return null;
  }
}