<?php require( 'header.php' ); ?>

<main id="main" class="taxonomy-brands">
	<article class="page-content">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">Двигатели <?php single_cat_title(); ?></h1>
		</header>
		<section class="content-box archive taxonomy-engines_brands">
			<div class="box white">
				<div class="content-box-item">
					<div class="figure">
                        <div class="row">
							<?php while ( have_posts() ) : the_post();

							$meta = new stdClass;
							$array_post_meta = get_post_meta( $post->ID );

							foreach( $array_post_meta as $k => $v ) :
							  $meta->$k = $v[0];
							endforeach;

							if ( isset( $meta->cf_engines_sku ) ) $cf_engines_sku = $meta->cf_engines_sku; else $cf_engines_sku = 'cf_engines_sku';
							if ( isset( $meta->cf_engines_name ) ) $cf_engines_name = $meta->cf_engines_name; else $cf_engines_name = 'cf_engines_name';
							if ( isset( $meta->cf_engines_brand ) ) $cf_engines_brand = $meta->cf_engines_brand; else $cf_engines_brand = 'cf_engines_brand';
							if ( isset( $meta->cf_engines_model ) ) $cf_engines_model = $meta->cf_engines_model; else $cf_engines_model = 'cf_engines_model';
							if ( isset( $meta->cf_engines_cost ) ) $cf_engines_cost = $meta->cf_engines_cost; else $cf_engines_cost = 'cf_engines_cost';
							if ( isset( $meta->cf_engines_state ) ) $cf_engines_state = $meta->cf_engines_state; else $cf_engines_state = 'cf_engines_state';

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
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>
		</section>
	<?php else : ?>
		<header class="page-header">
			<h1 class="page-title">Каталог <?php single_cat_title(); ?> в процессе наполнения</h1>
			<p class="page-description">Чтобы не терять время, запросите необходимые спецзапчасти напрямую:</p>
		</header>
		<section class="content-box taxonomy-brands">
			<div class="box white">
				<div class="content-box-item">
                    <?php require( 'includes/component-form-query.php' ); ?>
                    <br>
                    <div class="notice">
                        <span><i class="fa fa-low-vision"></i></span>
                        <span>Введённые вами контактные данные НЕ БУДУТ использоваться для рассылки нежелательной корреспонденции.</span>
                    </div>
                </div>
			</div>
		</section>
	<?php endif; ?>
	</article>

	<?php $paginate_links = paginate_links(); ?>
	<?php if( $paginate_links ) : ?>
	<nav class="navigation pagination">
		<div class="nav-links"><?php echo $paginate_links; ?></div>
	</nav>
	<?php endif; ?>
    <br>
    <br>
    <?php get_template_part( 'includes/block', 'search' ); ?>
</main>

<?php require( 'footer.php' ); ?>