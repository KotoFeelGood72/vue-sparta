<?php

defined( 'ABSPATH' ) || exit;

$query_news_args = array(
  'post_type' => 'news',
  'posts_per_page' => '5',
  'orderby' => 'date',
  'order' => 'desc'
);
$query_news = new WP_Query( $query_news_args );
?>

<?php if ( $query_news->have_posts() ) : ?>

<section class="content-box news">
	<h2 class="title">
		<i class="fa fa-bullhorn"></i>
		<span>Новости компании</span>
	</h2>
	<div class="box white">
		<div class="figure">
			<ul class="list">

				<?php while ( $query_news->have_posts() ) : $query_news->the_post();

				$the_permalink = get_the_permalink();
				$the_title = get_the_title();
				$the_time = get_the_time( 'd.m.Y' );
				?>

				<li class="list-item">
					<a class="title" href="<?php echo $the_permalink; ?>" title="<?php echo $the_title; ?>">
						<i class="fa fa-angle-right"></i>
						<span><?php echo $the_title; ?></span>
					</a>
					<span class="date"><?php echo $the_time; ?></span>
				</li>

				<?php endwhile; wp_reset_postdata() ?>

			</ul>
		</div>
	</div>
</section>

<?php endif; ?>

