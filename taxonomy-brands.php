<?php require( 'header.php' ); ?>

<main id="main" class="taxonomy-brands">
	<article class="page-content">
	<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">Спецзапчасти <?php single_cat_title(); ?></h1>
		</header>
		<?php get_template_part( 'includes/block', 'search' ); ?>
		<section class="content-box archive taxonomy-brands">
			<div class="box white">
				<div class="content-box-item">
					<div class="figure">
						<ul class="list">
							<?php while ( have_posts() ) : the_post();

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
								<div class="title">
									<h3 class="title">
									<a href="<?php echo $the_permalink; ?>" title="<?php echo $cf_spareparts_brand; ?> <?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?>">
										<i class="fa fa-cog"></i>
										<span><?php echo $cf_spareparts_brand; ?> <?php echo $cf_spareparts_model; ?> <?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?></span>
									</a>
									</h3>
								</div>
								<div class="state"><?php echo $cf_spareparts_state; ?></div>
							</li>
							<?php endwhile; ?>
						</ul>
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
</main>

<?php require( 'footer.php' ); ?>