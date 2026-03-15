<?php require( 'header.php' ); ?>

<main id="main" class="single-post">
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
	?>
	<article class="page-content">
		<header class="page-header">
		    <h1 class="page-title"><?php echo $cf_spareparts_brand; ?> <?php echo $cf_spareparts_sku; ?> <?php echo $cf_spareparts_name; ?> <?php echo $cf_spareparts_model; ?></h1>
		    <?php edit_post_link('Редактировать', '<p class="page-edit-link"><i class="fa fa-pencil"></i>', '</p>'); ?>
		</header>
		<section class="content-box single-post">
            <div class="content-box-item">
                <?php require( 'includes/component-form-order.php' ); ?>
            </div>
		</section>
	</article>
<?php endwhile;	?>
</main>

<?php require( 'footer.php' ); ?>