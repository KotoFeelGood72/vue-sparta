<?php

defined( 'ABSPATH' ) || exit;
?>

<div class="large-3 show-for-large columns">
	<aside id="sidebar-left">
		<?php if( post_type_exists( 'spareparts' ) && taxonomy_exists( 'brands' ) ) : require( 'block-brandlist.php' ); endif; ?>
		<?php if( post_type_exists( 'promo' ) ) : require( 'block-promo.php' ); endif; ?>
	</aside>
</div>