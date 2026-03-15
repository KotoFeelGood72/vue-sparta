<?php require( 'header.php' ); ?>

<main id="main" class="archive archive-news">
	<article class="page-content">
		<?php if ( have_posts() ) : ?>
		<header class="page-header">
			<h1 class="page-title">Новости компании</h1>
		</header>
		<?php while ( have_posts() ) : the_post();
		
		$the_title = get_the_title();
		$the_permalink = get_the_permalink();
		$the_post_thumbnail = get_the_post_thumbnail();
		$the_excerpt = get_the_excerpt();
		$the_time = get_the_time( 'd.m.Y' );
		?>
		<section class="content-box news">
			<div class="box white">
				<div class="content-box-item">
					<div class="figure">
						<?php if( has_post_thumbnail() ) : ?>
						<div class="thumb"><a href="<?php echo $the_permalink; ?>" title="<?php echo $the_title; ?>"><?php echo $the_post_thumbnail; ?></a></div>
						<?php else : ?>
						<div class="thumb"><a class="no-image" href="<?php echo $the_permalink; ?>" title="<?php echo $the_title; ?>"><img src="<?php echo $template_dir; ?>/images/no_image.svg"></a></div>
						<?php endif; ?>
						<div class="content">
							<header>
								<h2 class="title"><a href="<?php echo $the_permalink; ?>" title="<?php echo $the_title; ?>"><?php echo $the_title; ?></a></h2>
							</header>
							<?php echo $the_excerpt; ?>
						</div>
					</div>
					<footer>
						<div class="date">
							<i class="fa fa-clock-o" aria-hidden="true"></i><span><?php echo $the_time; ?></span>
						</div>
						<div class="more">
							<a href="<?php echo $the_permalink; ?>" title="Читать далее"><span>Читать далее</span><i class="fa fa-angle-double-right" aria-hidden="true"></i>
							</a>
						</div>
					</footer>
				</div>
			</div>
		</section>
		<?php endwhile; ?>
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