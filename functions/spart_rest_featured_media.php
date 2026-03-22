<?php
/**
 * В ответе REST API поле featured_media — объект медиавложения (как /wp/v2/media/{id}),
 * а не числовой id. Для всех типов записей с поддержкой миниатюры и show_in_rest.
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @param WP_REST_Response $response Ответ записи.
 * @param WP_Post          $post    Запись.
 * @param WP_REST_Request  $request Запрос.
 */
function spart_rest_expand_featured_media( $response, $post, $request ) {
	if ( ! isset( $response->data['featured_media'] ) ) {
		return $response;
	}

	$featured_id = (int) $response->data['featured_media'];
	if ( $featured_id <= 0 ) {
		$response->data['featured_media'] = null;
		return $response;
	}

	$media_request = new WP_REST_Request( 'GET', '/wp/v2/media/' . $featured_id );
	$context       = $request->get_param( 'context' );
	$media_request->set_param( 'context', $context ? $context : 'view' );

	$media_response = rest_do_request( $media_request );
	if ( $media_response->is_error() ) {
		$response->data['featured_media'] = null;
		return $response;
	}

	$response->data['featured_media'] = $media_response->get_data();
	return $response;
}

add_action(
	'rest_api_init',
	function () {
		foreach ( get_post_types( array( 'show_in_rest' => true ), 'names' ) as $post_type ) {
			if ( ! post_type_supports( $post_type, 'thumbnail' ) ) {
				continue;
			}
			add_filter( "rest_prepare_{$post_type}", 'spart_rest_expand_featured_media', 10, 3 );
		}
	},
	99
);
