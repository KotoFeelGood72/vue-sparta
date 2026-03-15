<?php require( 'header.php' ); ?>

<?php
$query_docs_args = array(
  'post_type' => 'docs',
  'showposts' => '-1',
  'orderby' => 'date',
  'order' => 'asc'
);
$query_docs = new WP_Query( $query_docs_args );
?>

<main id="main" class="archive archive-docs">
	<article class="page-content">

		<?php if ( $query_docs->have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">Документы</h1>
		</header>
		<section class="content-box archive-docs">
			<div class="box white">

			<?php while ( $query_docs->have_posts() ) : $query_docs->the_post();

				$meta = new stdClass;
				$array_post_meta = get_post_meta( $post->ID );
				
				foreach( $array_post_meta as $k => $v ) :
				  $meta->$k = $v[0];
				endforeach;

				if ( isset( $meta->cf_docs_title ) ) $cf_docs_title = $meta->cf_docs_title; else $cf_docs_title = 'cf_docs_title';
				//if ( isset( $meta->cf_docs_description ) ) $cf_docs_description = $meta->cf_docs_description; else $cf_docs_description = 'cf_docs_description';
				if ( isset( $meta->cf_docs_url ) ) $cf_docs_url = $meta->cf_docs_url; else $cf_docs_url = 'cf_docs_url';

				$docs_thumbnail = get_the_post_thumbnail_url( $post->ID );
				?>

				<div class="content-box-item">
					<div class="figure">
						<?php /* if( $docs_thumbnail ) : ?>
						<div class="thumb"><img src="<?php echo $docs_thumbnail ?>" title="<?php echo $cf_docs_title ?> - <?php echo $cf_docs_description ?>"/></div>
						<?php else : ?>
						<div class="thumb"><img src="<?php echo $template_dir ?>/images/no_image.svg"></div>
						<?php endif; */ ?>
						<div class="content">
							<header>
								<h2 class="title"><i class="fa fa-file-text-o" aria-hidden="true"></i> <?php echo $cf_docs_title ?></a></h2>
							</header>
						</div>
						<div class="action"><a class="buy" href="<?php echo $cf_docs_url ?>">Скачать</a></div>
					</div>
				</div>
			<?php endwhile; wp_reset_postdata() ?>
			
			</div>
		</section>
		<?php endif; ?>
	</article>
</main>

<?php require( 'footer.php' ); ?>