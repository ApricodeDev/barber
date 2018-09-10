	<?php switch_to_blog(1) ?>
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-2 col-md-3 col-sm-4 col-12 d-flex align-items-center">
					<nav class="footer__nav">
						<?php if(has_nav_menu('HeaderMenu')){
							wp_nav_menu( array(
									'container'      => false,
									'theme_location' => 'FooterMenu',
									'menu_id'        => 'FooterMenu_ID_0',
									'menu_class'     => '',
									'items_wrap'     => '<ul id="%1$s" class="%2$s">%3$s</ul>',
								)
							);
						} ?>
					</nav>
				</div>
				<div class="col d-flex justify-content-center">
					<a href="<?php echo home_url(); ?>" class="footer__logo">
						<img src="<?php echo get_template_directory_uri() ?>/img/logo.png" alt="">
					</a>
				</div>
				<div class="col-lg-2 col-md-3 col-sm-4 col-12 d-flex align-items-center">
					<div class="footer__links">
						<?php the_field('footer_right_widget', 'option') ?>
					</div>
				</div>
			</div>
		</div>
		<div class="footer__copy">
			<div class="container">
				<div class="row d-flex align-items-center justify-content-between">
					<div class="col-sm-4 col-12">
						<span class="footer__copy-text"><?php the_field('footer_copy', 'option') ?></span>
					</div>
					<div class="col-sm-8 col-12">
						<a class="apri-link apricode_copyright" href="https://apri-code.com/">
							<span class="apri-text"></span><img class="apri-logo" src="https://apri-code.com/wp-content/uploads/2018/05/aprisode-dark.png">
						</a>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<div id="CMSScripts">
		<script>var ajaxURL = '<?php echo admin_url('admin-ajax.php') ?>';</script>
		<?php wp_footer(); ?>
	</div>
	
</body>
</html>