<?php

defined( 'ABSPATH' ) || exit;

$query_news_args = array(
    'post_type' => 'spareparts',
    'posts_per_page' => '12',
//    'nopaging' => true,
    'orderby' => 'date',
    'order' => 'desc'
);
$query_news = new WP_Query( $query_news_args );
?>

<?php if ( $query_news->have_posts() ) : ?>

    <section class="content-box news">
        <h2 class="title">
            <i class="fa fa-cogs"></i>
            <a href="<?php echo get_site_url(); ?>/spareparts/">Каталог спецзапчастей (<?php echo $query_news->found_posts; ?>)</a>
        </h2>
        <div class="box white">
            <div class="figure">
                <ul class="list">

                    <?php while ( $query_news->have_posts() ) : $query_news->the_post();

                        $the_permalink = get_the_permalink();
                        $the_title = get_the_title();
                        ?>

                        <li class="list-item">
                            <a class="title" href="<?php echo $the_permalink; ?>" title="<?php echo $the_title; ?>">
                                <i class="fa fa-angle-right"></i>
                                <span><?php echo $the_title; ?></span>
                            </a>
                        </li>

                    <?php endwhile; wp_reset_postdata() ?>

                        <li class="list-item last">
                            <br>
                            <a class="title" href="<?php echo get_site_url(); ?>/spareparts/" title="Перейти в каталог спецзапчастей">
                                <span>Перейти в каталог спецзапчастей →</span>
                            </a>
                        </li>

                </ul>
            </div>
        </div>
    </section>

<?php endif; ?>

