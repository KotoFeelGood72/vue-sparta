<?php require( 'header.php' ); ?>

<main id="main" class="page-contacts">
	<article class="page-content">
		<header class="page-header">
			<h1 class="page-title">Контактные данные</h1>
		</header>
		<div class="row">
			<div class="small-12 large-6 column">
				<?php require( 'includes/block-contacts.php' ); ?>
			</div>
			<div class="small-12 large-6 column">
				<?php require( 'includes/block-feedback.php' ); ?>
			</div>
			<div class="small-12 column">
				<?php require( 'includes/block-map.php' ); ?>
			</div>
		</div>
	</article>
</main>

<?php require( 'footer.php' ); ?>