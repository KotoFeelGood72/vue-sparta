<?php

defined( 'ABSPATH' ) || exit;

$query_promo_args = array(
  'post_type' => 'promo',
  'posts_per_page' => '1',
  'orderby' => 'rand'
);
$query_promo = new WP_Query( $query_promo_args );
?>

<?php if ( $query_promo->have_posts() ) : ?>
	<section class="content-box promo">
		<div class="box white">
			<div class="figure">

				<?php while ( $query_promo->have_posts() ) : $query_promo->the_post();

				$meta = new stdClass;
				$query_post_meta = get_post_meta( $post->ID );

				foreach( $query_post_meta as $k => $v ) :
				  $meta->$k = $v[0];
				endforeach;

				if ( isset( $meta->cf_promo_title ) ) $cf_promo_title = $meta->cf_promo_title; else $cf_promo_title = '<span class="missed">cf_promo_title</span>';
				if ( isset( $meta->cf_promo_description ) ) $cf_promo_description = $meta->cf_promo_description; else $cf_promo_description = '<span class="missed">cf_promo_description</span>';
				if ( isset( $meta->cf_promo_button_text ) ) $cf_promo_button_text = $meta->cf_promo_button_text; else $cf_promo_button_text = '<span class="missed">cf_promo_button_text</span>';
				if ( isset( $meta->cf_promo_url ) ) $cf_promo_url = $meta->cf_promo_url; else $cf_promo_url = 'cf_promo_url';

				$post_thumbnail = get_the_post_thumbnail_url();
				?>

				<h3 class="title"><?php echo $cf_promo_title; ?></h3>
				<p class="description"><?php echo $cf_promo_description ?></p>

				<?php if( $post_thumbnail ) : ?>
				<div class="image"><img src="<?php echo $post_thumbnail ?>" title="<?php echo $cf_promo_title ?> - <?php echo $cf_promo_description ?>"/></div>
				<?php endif; ?>

				<div class="action"><a class="buy" target="_blank" href="#"><?php echo $cf_promo_button_text ?></a></div>

				<?php endwhile; wp_reset_postdata() ?>

			</div>
		</div>

	</section>
<?php endif; ?>