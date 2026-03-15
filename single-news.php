<?php require( 'header.php' ); ?>

<main id="main" class="single-news">
	<article class="page-content">
		<section class="content-box single-news">
			<div class="box white">
				<div class="content-box-item">
					<header class="page-header">
						<h1 class="page-title"><?php the_title() ?></h1>
					</header>
					<div class="figure">
						<div class="content">
						<?php while ( have_posts() ) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile;	?>
						</div>
					</div>
					<footer>
						<div class="date">
							<i class="fa fa-clock-o"></i><span><?php the_time( 'd.m.Y' ) ?></span>
						</div>
					</footer>
				</div>
			</div>
		</section>
	</article>
</main>

<?php require( 'footer.php' ); ?>