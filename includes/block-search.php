<?php

defined( 'ABSPATH' ) || exit;
?>

<section class="content-box search-form">
	<h2 class="title"><i class="fa fa-search"></i>Поиск по каталогу</h2>
	<div class="box white">
		<div class="figure">
			<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ) ?>" >
				<label>Введите оригинальный номер или наименование:
					<div class="input-group">
						<input required class="input-group-field" type="text" placeholder="Например: Y000-110100" value="<?php echo get_search_query() ?>" name="s" id="s">
						<div class="input-group-button">
							<input type="submit" id="searchsubmit" class="button" value="Найти">
						</div>
					</div>
				</label>
			</form>
		</div>
	</div>
</section>