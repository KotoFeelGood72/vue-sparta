<?php require( 'header.php' ); ?>

<main id="main" class="single-post">
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
	?>
	<article class="page-content">
		<header class="page-header">
		    <h1 class="page-title"><?php echo $cf_engines_name; ?> <?php echo $cf_engines_brand; ?> <?php echo $cf_engines_model; ?></h1>
		    <?php edit_post_link('Редактировать', '<p class="page-edit-link"><i class="fa fa-pencil"></i>', '</p>'); ?>
		</header>
		<section class="content-box single-post engines">
            <div class="content-box-item">
                <?php require( 'includes/component-form-order-engines.php' ); ?>
            </div>
		</section>
	</article>
<?php endwhile;	?>
</main>

<?php require( 'footer.php' ); ?>