<?php require('header.php'); ?>

<?php
if (!isset($query_brands)) :
    $query_brands_args = array(
        'hide_empty' => true,
        'orderby' => 'name'
    );
    $query_brands = get_terms('engines_brands', $query_brands_args);
endif;
?>

<main id="main" class="archive archive-spareparts">
    <article class="page-content">
        <header class="page-header">
            <h1 class="page-title">Электронный каталог двигателей и спецзапчастей <?php single_cat_title(); ?></h1>
            <p class="page-description">В нашем каталоге представлены оригинальные запчасти для спецтехники различных
                марок, которые всегда доступны для заказа. Если Вы не нашли то, что искали, пожалуйста, свяжитесь с нами
                по телефону или электронной почте.</p>
        </header>
        <?php require('includes/block-search.php'); ?>

        <section class="content-box spareparts">
            <h2 class="title"><i class="fa fa-cogs"></i>Категории каталога - Двигатели</h2>
            <?php foreach ($query_brands as $brand) : ?>
            <div class="box white">


                    <?php
                    $brand_term_id = $brand->term_id;
                    $brand_term_name = $brand->name;
                    $brand_term_link = get_term_link($brand_term_id);

//                    $term_thumbnail = get_term_meta($brand->term_id, 'cf_engines_brands_thumbnail', true);
                    #$term_thumbnail_url = wp_get_attachment_url( $term_thumbnail );
                    $term_thumbnail_url = get_site_url(null, "/wp-content/themes/spart.pro/uploads/brands_") . $brand->slug . ".png";

                    $query_spareparts_args = array(
                        'post_type' => 'engines',
                        'showposts' => 3,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'engines_brands',
                                'field' => 'id',
                                'terms' => $brand->term_id
                            )
                        )
                    );
                    $query_spareparts = new WP_Query($query_spareparts_args);
                    ?>
                    <div class="figure">
                        <div class="category-title">
                            <h3 class="title">
                                <img src="<?php echo $term_thumbnail_url ?>"
                                     alt="Запчасти для спецтехники <?php echo $brand_name ?>">
                                <a class="all" href="<?php echo $brand_term_link ?>"
                                   title="Двигатели <?php echo $brand_term_name ?>">Двигатели <?php echo $brand_term_name ?></a>
                            </h3>
                        </div>
                        <div class="row">
                            <?php while ($query_spareparts->have_posts()) : $query_spareparts->the_post();

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

                            <?php endwhile;
                            wp_reset_postdata(); ?>

                        </div>
                        <a class="link-all" href="<?php echo $brand_term_link ?>"
                           title="Все двигатели <?php echo $brand_term_name ?>">Перейти в каталог двигателей <?php echo $brand_term_name ?> →</a>
                    </div>


            </div>
            <?php endforeach; ?>
        </section>

    </article>
</main>

<br>
<?php require('footer.php'); ?>
