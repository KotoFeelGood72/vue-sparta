<?php require( 'header.php' ); ?>

<?php
if( !isset( $query_brands ) ) :
$query_brands_args = array (
    'hide_empty' => true,
	'orderby' => 'date'
);
$query_brands = get_terms( 'brands', $query_brands_args );
endif;
?>

<main id="main" class="archive archive-spareparts">
	<article class="page-content">
		<header class="page-header">
			<h1 class="page-title">Электронный каталог двигателей и спецзапчастей <?php single_cat_title(); ?></h1>
			<p class="page-description">В нашем каталоге представлены оригинальные запчасти для спецтехники различных марок, которые всегда доступны для заказа. Если Вы не нашли то, что искали, пожалуйста, свяжитесь с нами по телефону или электронной почте.</p>
		</header>
		<?php require( 'includes/block-search.php' ); ?>

		<section class="content-box spareparts">
			<h2 class="title"><i class="fa fa-cogs"></i>Категории каталога - Спецзапчасти</h2>
			<div class="box white">
				<?php foreach ( $query_brands as $brand ) : ?>

					<?php
					$brand_term_id 	= $brand->term_id;
					$brand_term_name = $brand->name;
					$brand_term_link = get_term_link( $brand_term_id );

					$term_thumbnail = get_term_meta( $brand->term_id, 'cf_brands_thumbnail', true );
                    #$term_thumbnail_url = wp_get_attachment_url( $term_thumbnail );
                    $term_thumbnail_url = get_site_url( null, "/wp-content/themes/spart.pro/uploads/brands_") . $brand->slug . ".png";

					$query_spareparts_args = array(
						'post_type' => 'spareparts',
						'showposts' => 5,
						'tax_query' => array(
							array(
								'taxonomy' => 'brands',
								'field' => 'id',
								'terms' => $brand->term_id
							)
						)
					);
					$query_spareparts = new WP_Query( $query_spareparts_args );
					?>
					<div class="figure">
						<div class="cell left">
							<h3 class="title">
							<a class="all" href="<?php echo $brand_term_link ?>" title="Спецзапчасти <?php echo $brand_term_name ?>">Спецзапчасти <?php echo $brand_term_name ?></a>
							</h3>
							<ul class="list">

								<?php while ( $query_spareparts->have_posts() ) : $query_spareparts->the_post();

								$meta = new stdClass;
								$array_post_meta = get_post_meta( $post->ID );

								foreach( $array_post_meta as $k => $v ) :
								  $meta->$k = $v[0];
								endforeach;

								if ( isset( $meta->cf_spareparts_sku ) ) $cf_spareparts_sku = $meta->cf_spareparts_sku; else $cf_spareparts_sku = 'cf_spareparts_sku';
								if ( isset( $meta->cf_spareparts_name ) ) $cf_spareparts_name = $meta->cf_spareparts_name; else $cf_spareparts_name = 'cf_spareparts_name';
								if ( isset( $meta->cf_spareparts_brand ) ) $cf_spareparts_brand = $meta->cf_spareparts_brand; else $cf_spareparts_brand = 'cf_spareparts_brand';
								if ( isset( $meta->cf_spareparts_model ) ) $cf_spareparts_model = $meta->cf_spareparts_model; else $cf_spareparts_model = 'cf_spareparts_model';
								if ( isset( $meta->cf_spareparts_cost ) ) $cf_spareparts_cost = $meta->cf_spareparts_cost; else $cf_spareparts_cost = 'cf_spareparts_cost';
								if ( isset( $meta->cf_spareparts_state ) ) $cf_spareparts_state = $meta->cf_spareparts_state; else $cf_spareparts_state = 'cf_spareparts_state';

								$the_permalink = get_the_permalink();
								?>

								<li class="list-item">
									<a class="title" href="<?php echo $the_permalink; ?>" title="<?php echo $cf_spareparts_brand; ?> <?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?>">
										<i class="fa fa-cog"></i>
										<span><?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?></span>
									</a>
								</li>

								<?php endwhile; wp_reset_postdata(); ?>

							</ul>
						</div>
						<div class="cell right">
							<a class="image" href="<?php echo $brand_term_link ?>" title="Спецзапчасти <?php echo $brand_term_name ?>">
								<img src="<?php echo $term_thumbnail_url ?>" alt="Запчасти для спецтехники <?php echo $brand_name ?>">
							</a>
						</div>
					</div>

				<?php endforeach; ?>
			</div>
		</section>

	</article>
</main>

<?php require( 'footer.php' ); ?>
