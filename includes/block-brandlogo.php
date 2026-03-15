<?php

defined( 'ABSPATH' ) || exit;

if( !isset( $query_brands_full ) ) :
$query_brands_full_args = array (
    'hide_empty' => false,
    'orderby' => 'name',
    'exclude' => get_term_by( 'slug', 'nobrand', 'brands' )->term_id,
);
$query_brands_full = get_terms( 'brands', $query_brands_full_args );
endif;
?>

<section class="content-box brands">
    <div class="row">
        <?php
        foreach ( $query_brands_full as $brand ) :

        $brand_term_name = $brand->name;
        $brand_term_link = get_term_link( $brand->term_id );

        $term_thumbnail_url = get_site_url( null, "/wp-content/themes/spart.pro/uploads/brands_") . $brand->slug . ".png";

        ?>
        <div class="small-4 medium-3 large-2 columns end">
<!--				<a class="image" href="--><?php //echo $brand_term_link ?><!--" title="Спецзапчасти --><?php //echo $brand_term_name ?><!--">-->
                <img src="<?php echo $term_thumbnail_url; ?>" alt="Двигатели, гидромолоты и другие спецзапчасти <?php echo $brand_term_name ?>" title="Двигатели, гидромолоты и другие спецзапчасти <?php echo $brand_term_name ?>">
<!--				</a>-->
        </div>
        <?php endforeach; ?>
</section>
