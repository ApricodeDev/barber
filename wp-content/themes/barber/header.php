<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta charset="<?php bloginfo( 'charset' ); ?>">		
		<meta name="theme-color" content="#ff833d">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
	
	<?php
	//===get lang svitcher===
	global $q_config;
	$currLangName = '';
	if(isset($q_config['language_name'][$q_config['language']])){
		$currLangName = $q_config['language_name'][$q_config['language']];
	}
	ob_start();
	if(function_exists('qtranxf_generateLanguageSelectCode')){
		qtranxf_generateLanguageSelectCode('text');
	}
	$qt = ob_get_clean();
	
	switch_to_blog(1);
	?>
	
	<header class="header">
	
		<?php if(has_nav_menu('HeaderSocMenu')){
			wp_nav_menu( array(
					'container'      => false,
					'theme_location' => 'HeaderSocMenu',
					'menu_id'        => 'HeaderMenu_ID_1',
					'menu_class'     => 'header__social',
					'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'walker'         => new CWalker_headsocial(),
				)
			);
		} ?>
		
		<div class="heaeder__top">
			<div class="container">
				<div class="d-flex justify-content-center align-items-center relative">
					<div class="header__burger">
						<span class="header__burger-button"><i class="fas fa-bars"></i><i class="fas fa-times"></i></span>
						<nav class="header__burger-nav">
							<div class="header__burger-menu">
								<span class="header__burger-button headerinmenubutton"><i class="fas fa-bars"></i><i class="fas fa-times"></i></span>
								<?php if(has_nav_menu('HeaderMenu')){
									wp_nav_menu( array(
											'container'      => false,
											'theme_location' => 'HeaderMenu',
											'menu_id'        => 'HeaderMenu_ID_0',
											'menu_class'     => '',
											'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										)
									);
								} ?>
							</div>
							
							<div class="header__language-small">
								<?php echo $qt; ?>
							</div>
							
							<?php if(has_nav_menu('HeaderSocMenu')){
								wp_nav_menu( array(
										'container'      => false,
										'theme_location' => 'HeaderSocMenu',
										'menu_id'        => 'HeaderMenu_ID_1',
										'menu_class'     => 'header__social',
										'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
										'walker'         => new CWalker_headsocial(),
									)
								);
							} ?>
						</nav>
					</div>
					<div class="header__language header__language-big">
						<span class="header__language-button">
							<?php echo $currLangName; ?>
							<img src="<?php echo get_template_directory_uri() ?>/img/arrow1.png" alt="down">
						</span>
						<?php echo $qt; ?>
					</div>
					
					<a href="<?php echo home_url(); ?>" class="header__logo">
						<img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="<?php echo htmlspecialchars(get_bloginfo('name')); ?>">
					</a>
					
					<div class="basket">
						<div class="basket__link">
							<img src="<?php echo get_template_directory_uri() ?>/img/sale.png" alt="">
							<span class="basket__number" id="siteTopCartCounter"><?php echo WC()->cart->get_cart_contents_count(); ?></span>
						</div>
						<div class="basket__block">
							<div class="basket__block-head">
								<div class="basket__block-close"><?php _e('to curtail', 'barber') ?></div>
							</div>
							<div class="basket__block-body" id="siteTopCart">
								<?php echo getTopCartContent(); ?>
							</div>
							<div class="basket__block-footer">
								<div class="basket__block-submit" id="siteTopCartGetOrder"><?php _e('Get order number', 'barber') ?></div>
							</div>
						</div>
					</div>
					
				</div>
			</div>
		</div>
	</header>
	
	<?php restore_current_blog(); ?>