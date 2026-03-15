<?php

defined( 'ABSPATH' ) || exit;

if( !isset( $query_brands_full ) ) :
$query_brands_full_args = array (
	'hide_empty' => false,
	'orderby' => 'name'
);
$query_brands_full = get_terms( 'brands', $query_brands_full_args );
endif;
?>

<section class="content-box brands-list">
	<div class="box black">
		<div class="figure">
			<h2 class="title">Спецзапчасти</h2>
			<ul class="list">
				<?php
				foreach ( $query_brands_full as $brand ) :

				$brand_term_link = get_term_link( $brand->term_id );
				$brand_name = $brand->name;
				$brand_count = $brand->count;
				?>
				<li class="list-item">
					<a class="title" href="<?php echo $brand_term_link ?>" title="Запчасти для спецтехники <?php echo $brand_name ?>"><?php echo $brand_name ?></a>
					<span class="count"><?php echo $brand_count ?></span>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
	</div>
</section>