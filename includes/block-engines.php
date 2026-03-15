<?php

defined( 'ABSPATH' ) || exit;

$query_news_args = array(
    'post_type' => 'engines',
    'posts_per_page' => '9',
    'orderby' => 'date',
    'order' => 'desc'
);
$query_news = new WP_Query( $query_news_args );
?>

<?php if ( $query_news->have_posts() ) : ?>

    <section class="content-box news">
        <h2 class="title">
            <i class="fa fa-cogs"></i>
            <a href="<?php echo get_site_url(); ?>/engines/">Каталог двигателей (<?php echo $query_news->found_posts; ?>)</a>
        </h2>
        <div class="box white">
            <div class="row">
                    <?php while ( $query_news->have_posts() ) : $query_news->the_post();

                        $meta = new stdClass;
                        $array_post_meta = get_post_meta($post->ID);

                        foreach ($array_post_meta as $k => $v) :
                            $meta->$k = $v[0];
                        endforeach;

                        if (isset($meta->cf_engines_sku)) $cf_engines_sku = $meta->cf_engines_sku; else $cf_engines_sku = 'cf_engines_sku';
                        if (isset($meta->cf_engines_name)) $cf_engines_name = $meta->cf_engines_name; else $cf_engines_name = 'cf_engines_name';
                        if (isset($meta->cf_engines_brand)) $cf_engines_brand = $meta->cf_engines_brand; else $cf_engines_brand = 'cf_engines_brand';
                        if (isset($meta->cf_engines_model)) $cf_engines_model = $meta->cf_engines_model; else $cf_engines_model = 'cf_engines_model';
                        if (isset($meta->cf_engines_cost)) $cf_engines_cost = $meta->cf_engines_cost; else $cf_engines_cost = 'cf_engines_cost';
                        if (isset($meta->cf_engines_state)) $cf_engines_state = $meta->cf_engines_state; else $cf_engines_state = 'cf_engines_state';


                        $the_permalink = get_the_permalink();
                        $the_post_thumbnail_url = get_the_post_thumbnail_url();
                        ?>

                        <div class="small-12 medium-4 columns end">
                            <a class="product-card" href="<?php echo $the_permalink; ?>"
                               title="<?php echo $cf_engines_name; ?> <?php echo $cf_engines_brand; ?> <?php echo $cf_engines_model; ?>">

                                <? if ($the_post_thumbnail_url) : ?>
                                    <div class="img-wrap"><img src="<?php echo get_the_post_thumbnail_url();?>" /></div>
                                <? else : ?>
                                    <div class="img-wrap"><img src="<?php echo get_site_url(null, "/wp-content/themes/spart.pro/uploads/brands_nobrand.png");?>" /></div>
                                <? endif; ?>
                                <span><?php echo $cf_engines_name; ?> <?php echo $cf_engines_brand; ?> <?php echo $cf_engines_model; ?></span>
                            </a>
                        </div>

                    <?php endwhile; wp_reset_postdata() ?>
            </div>
            <div class="foot">
                <a class="title" href="<?php echo get_site_url(); ?>/engines/" title="Перейти в каталог двигателей">
                    <span>Перейти в каталог двигателей →</span>
                </a>
            </div>
        </div>
    </section>

<?php endif; ?>

