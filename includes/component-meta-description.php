<?php

defined( 'ABSPATH' ) || exit;


$meta_description = 'Продажа запчастей для бульдозеров, экскаваторов, грузовиков, погрузчиков и другой спецтехники. Спецзапчасти для импортной спецтехники с доставкой по России.';
$meta_keywords = 'запчасти для спецтехники, купить запчасти для спецтехники, запчасти для погрузчиков, запчасти для самосвалов, запчасти для экскаваторов, запчасти для тракторов, запчасти для эвакуаторов, запчасти для бульдозеров, тракторные запчасти, запчасти для строительной техники';

if ( is_front_page() || is_home() ) {
	$meta_description = 'Продажа запчастей для бульдозеров, экскаваторов, грузовиков, погрузчиков и другой спецтехники. Спецзапчасти для импортной спецтехники с доставкой по России.';
}
else if ( is_post_type_archive( 'spareparts' ) ) {
	$meta_description = 'Электронный каталог запчастей для спецтехники BobCat, Caterpillar, Cummins, Doosan/Daewoo, Hino, Hitachi, Howo, Hyundai, JCB, John Deere, Kobelco, Komatsu, New Holland, Samsung, SDLG, Shantui, Tata-Daewoo, TigerCat, Volvo, XCMG';
	$meta_keywords = 'электронный каталог, каталог запчастей, запчасти BobCat, запчасти Caterpillar, запчасти Cummins, запчасти Doosan/Daewoo, запчасти Hino, запчасти Hitachi, запчасти Howo, запчасти Hyundai, запчасти JCB, запчасти John Deere, запчасти Kobelco, запчасти Komatsu, запчасти New Holland, запчасти Samsung, запчасти SDLG, запчасти Shantui, запчасти Tata-Daewoo, запчасти TigerCat, запчасти Volvo, запчасти XCMG';
}
else if ( is_singular( 'spareparts' ) ) {
	$sparepart_sku = get_post_meta( $post->ID, 'cf_spareparts_sku', true);
	$sparepart_name = get_post_meta( $post->ID, 'cf_spareparts_name', true);
	$sparepart_model = get_post_meta( $post->ID, 'cf_spareparts_model', true);
	$sparepart_brand = get_post_meta( $post->ID, 'cf_spareparts_brand', true);

	$meta_description = "Купить запчасть $sparepart_brand $sparepart_sku $sparepart_name для $sparepart_model с доставкой в течение 24-х часов.";
}
//else if ( is_tax( 'brands' ) ) {
//	$meta_description = 'is_taxonomy_brands';
//}
//else if ( is_singular( 'brands' ) ) {
//	$meta_description = 'is_singular_brands';
//}
//else if ( is_post_type_archive( 'news' ) ) {
//	$meta_description = 'is_archive_news';
//}
//else if ( is_singular( 'news' ) ) {
//	$meta_description = 'is_singular_news';
//}
//else if ( is_page( 'docs' ) ) {
//	$meta_description = 'is_page_docs';
//}

?>
<meta name="keywords" content="<?php echo $meta_keywords ?>">
<meta name="description" content="<?php echo $meta_description ?>">