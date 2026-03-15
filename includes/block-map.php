<?php

defined( 'ABSPATH' ) || exit;
?>

<section class="content-box map">
	<h2 class="title">
		<i class="fa fa-map-marker"></i>
		<span>Расположение головного офиса</span>
	</h2>
	<div class="box white">
		<div class="figure">
			<div class="loader"><img src="<?php echo $template_dir; ?>/images/gears.svg"></div>
			<div id="ymap" style="height: 400px"></div>
			<script>
			$.ajax({
				type: "GET",
				dataType: "script",
				url: "https://api-maps.yandex.ru/2.1/?lang=ru_RU",
				success: function () {
					load_yandex_map()
				}
			});
			</script>
		</div>
	</div>
</section>