<?php require( 'header.php' ); ?>

<main id="main" class="page-contacts">
	<article class="page-content">
		<header class="page-header">
			<h1 class="page-title">DEV</h1>
		</header>
		<div class="row">
			<div class="small-12 large-6 column">
                <?php if( post_type_exists( 'engines' ) ) : require( 'includes/block-engines-exclusive.php' ); endif; ?>
			</div>
		</div>
	</article>
</main>

<?php require( 'footer.php' ); ?>