<?php
global	$site_name,
		$site_description,
		$site_url,
		$template_dir,
		$contacts_phone;
?>

<!DOCTYPE html>

<html lang="ru-RU" class="no-js">

	<head>
		<meta charset="UTF-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php require( 'includes/component-meta-description.php' ); ?>
		<meta name="yandex-verification" content="d7ba308d0f2a3fff" />
		<?php wp_head(); ?>
		<link rel="icon" type="image/png" href="<?php echo $template_dir ?>/images/favicon.png" />
        <meta name="google-site-verification" content="U34dcWrY7pOkYNUobkVMNSDkzNKI736AiG8LN4VBxKE" />
        <!-- Yandex.Metrika counter --> <script type="text/javascript" > (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)}; m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)}) (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym"); ym(40534085, "init", { clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true }); </script> <noscript><div><img src="https://mc.yandex.ru/watch/40534085" style="position:absolute; left:-9999px;" alt="" /></div></noscript> <!-- /Yandex.Metrika counter -->
	</head>

	<?php if ( is_front_page() ) : ?>
	<body class="front-page">
	<?php else : ?>
	<body>
	<?php endif; ?>

		<div class="site-header">
			<header id="header">
				<div class="row column">
					
					<a class="logo" href="<?php echo $site_url ?>" title="<?php echo $site_name ?><?php if ( $site_description ) : echo ' - ' . $site_description; endif ?>">
						<img src="<?php echo $template_dir ?>/images/logo.svg" alt="<?php echo $site_name ?><?php if ( $site_description ) : echo ' - ' . $site_description; endif ?>">
					</a>

					<?php if ( has_nav_menu( 'primary' ) ) : ?>
					<nav id="navigation" class="navigation">
						<div class="menu hide-for-large">
							<i class="fa fa-bars"></i><span class="text">Меню</span>
						</div>
						<?php
						$nav_menu_args = array(
							'theme_location'  => 'primary',
							'menu'            => '', 
							'container'       => '', 
							'container_class' => '', 
							'container_id'    => '',
							'menu_class'      => 'primary-menu show-for-large', 
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
							'depth'           => 0,
							'walker'          => '',
						);
						wp_nav_menu( $nav_menu_args ); ?>
					</nav>
					<?php endif; ?>

					<?php if ( $contacts_phone ) : ?>
					<div class="callme show-for-medium">
						<a class="phone" href="tel:+74232025502"><i class="fa fa-phone callme-icon show-for-large"></i>+7 (423) 202-55-02</a>
					</div>
					<?php endif; ?>

					<button id="popup" class="makeorder show-for-medium">Заказать звонок</button>
				</div>
			</header>

			<?php if( is_front_page() ) : require( 'includes/component-advantages.php' ); endif ?>

		</div>

		<div class="site-content">
		    <div class="row column">
                <?php if( !is_front_page() ) : spart_breadcrumbs(); endif ?>
		        <?php /*require( 'includes/component-leftside.php' ); ?>
		        <div class="small-12 large-9 columns">
		            <?php if( !is_front_page() ) : spart_breadcrumbs(); endif */ ?>