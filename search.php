<?php require( 'header.php' ); ?>

<?php $search_query = get_search_query(); ?>

<main id="main" class="search">
	<article class="page-content">
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">Поиск по запросу: <span><?php echo $search_query; ?></span></h1>
		</header>
		<section class="content-box search">
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

							if ( isset( $meta->cf_engines_sku ) ) $cf_engines_sku = $meta->cf_engines_sku; else $cf_engines_sku = 'cf_engines_sku';
							if ( isset( $meta->cf_engines_name ) ) $cf_engines_name = $meta->cf_engines_name; else $cf_engines_name = 'cf_engines_name';
							if ( isset( $meta->cf_engines_brand ) ) $cf_engines_brand = $meta->cf_engines_brand; else $cf_engines_brand = 'cf_engines_brand';
							if ( isset( $meta->cf_engines_model ) ) $cf_engines_model = $meta->cf_engines_model; else $cf_engines_model = 'cf_engines_model';
							if ( isset( $meta->cf_engines_cost ) ) $cf_engines_cost = $meta->cf_engines_cost; else $cf_engines_cost = 'cf_engines_cost';
							if ( isset( $meta->cf_engines_state ) ) $cf_engines_state = $meta->cf_engines_state; else $cf_engines_state = 'cf_engines_state';

							$the_permalink = get_the_permalink();
							?>
							<li class="list-item">

							<?php if (isset( $meta->cf_spareparts_name )) : ?>
								<div class="title">
									<h3 class="title">
									<a href="<?php echo $the_permalink; ?>" title="<?php echo $cf_spareparts_brand; ?> <?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?>">
										<i class="fa fa-cog"></i>
										<span><?php echo $cf_spareparts_brand; ?> <?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?></span>
									</a>
									</h3>
								</div>
								<div class="state"><?php echo $cf_spareparts_state; ?></div>
							<?php else : ?>
								<div class="title">
									<h3 class="title">
									<a href="<?php echo $the_permalink; ?>" title="<?php echo $cf_engines_name; ?> <?php echo $cf_engines_brand; ?> <?php echo $cf_engines_model; ?>">
										<i class="fa fa-cog"></i>
										<span><?php echo $cf_engines_name; ?> <?php echo $cf_engines_brand; ?> <?php echo $cf_engines_model; ?></span>
									</a>
									</h3>
								</div>
								<div class="state"><?php echo $cf_engines_state; ?></div>
							<?php endif; ?>
							</li>
							<?php endwhile; ?>
						</ul>
					</div>
				</div>
			</div>
		</section>
		<?php else : ?>
		<header class="page-header">
			<h1 class="page-title">Не найдено: <?php echo $search_query; ?></h1>
			<p class="page-description">Чтобы не терять время, запросите необходимые спецзапчасти напрямую:</p>
		</header>
		<section class="content-box query">
			<div class="box white">
				<?php require( 'includes/component-form-query.php' ); ?>
                <br>
                <div class="notice">
                    <span><i class="fa fa-low-vision"></i></span>
                    <span>Введённые вами контактные данные НЕ БУДУТ использоваться для рассылки нежелательной корреспонденции.</span>
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