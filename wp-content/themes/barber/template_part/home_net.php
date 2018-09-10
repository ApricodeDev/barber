<?php while(have_posts()){
	the_post();
	$arrGMapLL = array();
	$arrGMapCentr = array();
	$ssh_addr = array();
	$ssh_phone = array();
	?>
<?php } ?>

<?php if(!wp_is_mobile()){
	$img = wp_get_attachment_image_src(get_field('nopt_b1_img', 'option'), 'thumbnail_2086x1495');
}else{
	$img = wp_get_attachment_image_src(get_field('nopt_b1_img', 'option'), 'thumbnail_2086x1495_m');
}

if(!wp_is_mobile()){
	$logoimg = wp_get_attachment_image_src(get_field('nopt_b1_logoimg', 'option'), 'thumbnail_1006x255');
}else{
	$logoimg = wp_get_attachment_image_src(get_field('nopt_b1_logoimg', 'option'), 'thumbnail_1006x255_m');
}
$logoimage_alt = get_post_meta(get_field('nopt_b1_logoimg', 'option'), '_wp_attachment_image_alt', true); ?>

<section
        style="background: url('<?php echo $img[0] ?>');background-repeat: no-repeat;-webkit-background-size: 110%;background-size: 110%;background-position: 90% 15%;"
        class="banner banner-fix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner__content banner__content-net">
                    <img src="<?php echo $logoimg[0]; ?>" alt="<?php echo htmlspecialchars($logoimage_alt); ?>">
                    <h1><?php the_field('nopt_b1_title', 'option') ?></h1>
                </div>
            </div>
        </div>
        <div class="banner__bottom">
            <a href="#section2" class="banner__link">
				<img src="<?php echo get_template_directory_uri() ?>/img/down.png" alt="">
			</a>
        </div>
    </div>
</section>

<section class="net">
	<div class="net-about">
		<div class="container container-img">
			<div class="row">
				<div class="cok-12"><?php
					if(!wp_is_mobile()){
						$img = wp_get_attachment_image_src(get_field('nopt_abus_img', 'option'), 'thumbnail_1140x798');
					}else{
						$img = wp_get_attachment_image_src(get_field('nopt_abus_img', 'option'), 'thumbnail_1140x798_m');
					}
					$image_alt = get_post_meta(get_field('nopt_abus_img', 'option'), '_wp_attachment_image_alt', true); ?>
					<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9 offset-lg-3">
					<div class="net-content">
						<h3><?php the_field('nopt_abus_title', 'option') ?></h3>
						<div class="net-content-container">
							<?php the_field('nopt_abus_content', 'option') ?>
						</div>
						<span class="net-content-more">
							<?php _e('Read more', 'barber') ?>
							<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="next">
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container media__container">
		<h3 class="section-title"><?php the_field('nopt_gall_title', 'option') ?></h3>
		<div class="row">
			<div class="col-12">
				<div class="media__slider">
					<div class="media-slider-container"><?php
						if(have_rows('nopt_gall_list', 'option')){
							while(have_rows('nopt_gall_list', 'option')){
								the_row();
								$img = wp_get_attachment_image_src(get_sub_field('nopt_gall_list_img', 'option'), 'thumbnail_360x360');
								$image_alt = get_post_meta(get_sub_field('nopt_gall_list_img', 'option'), '_wp_attachment_image_alt', true); ?>
								<div class="media-slide">
									<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
								</div>
							<?php }
						} ?>
					</div>
					<div class="media__slider-pagination"></div>
				</div>
			</div>
		</div>
		<h3 class="section-title"><?php the_field('nopt_work_title', 'option') ?></h3>
		<div class="row">
			<div class="col-12">
				<?php the_field('nopt_work_content', 'option') ?>
			</div>
		</div>
	</div>
</section>

<section class="top">
	<div class="container">
		<div class="row">
			<div class="col-12 d-flex justify-content-center align-items-center flex-wrap relative">
				<h2 class="top__title"><?php the_field('ssh_othshop_title') ?></h2>
			</div>
			<div class="col-12">
				<div class="top__slider">
					<div class="top-slider-container"><?php
						$i=0;
						query_posts(array('post_type'=>'netshop', 'posts_per_page'=>-1));
						while(have_posts()){
							the_post();
							$arrGMapLL[] = '["'.get_the_title().'", '.get_field('ssh_gmap_lt', get_the_id()).', '.get_field('ssh_gmap_lg', get_the_id()).', '.$i++.']';
							$arrGMapCentr = '{lat: '.get_field('ssh_gmap_lt', get_the_id()).', lng: '.get_field('ssh_gmap_lg', get_the_id()).'}';
							$ssh_addr[] = get_field('ssh_addr');
							$ssh_phone[] = get_field('ssh_phone');
							
							$imggd = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'thumbnail_360x360');
							
							$imglg = wp_get_attachment_image_src(get_field('hom_b1_logoimg'), 'thumbnail_253x90');
							$image_altlg = get_post_meta(get_field('hom_b1_logoimg'), '_wp_attachment_image_alt', true); ?>
							<div class="top-city-wrap">
								<div class="top-city top-city-net" style="background-image: url(<?php echo $imggd[0] ?>)">
									<a href="<?php the_permalink() ?>">
										<img src="<?php echo $imglg[0]; ?>" alt="<?php echo htmlspecialchars($image_altlg); ?>">
									</a>
									<div class="top-city-content">
										<a href="<?php the_permalink() ?>" class="top-city-link"><?php _e('Go to dite', 'barber') ?></a>
									</div>
								</div>
								<div class="top-city__bottom">
									<div class="top-city__bottom-head">
										<a href="<?php the_permalink() ?>" class="top-city__bottom-name"><?php the_title() ?></a>
										<span class="top-city__bottom-stars">9.2 <i class="fas fa-star"></i></span>
									</div>
									<div class="top-city__bottom-content">
										<span class="top-city__bottom-sale"><?php the_field('hom_sales') ?></span>
										<span class="top-city__bottom-adress"><i class="fas fa-map-marker-alt"></i> <?php the_field('ssh_addr') ?></span>
										<a href="<?php the_permalink() ?>/#Review" class="top-city__bottom-review">
											<?php _e('Review', 'barber') ?> (<?php echo count(get_field('field_5b91130af18ac', get_the_id())) ?>)
										</a>
									</div>
								</div>
							</div><?php
						}
						wp_reset_query(); ?>
					</div>
					<div class="top__slider-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="map">
	<div class="container">
		<div class="row">
			<div class="offset-lg-7 col-12 col-lg-5">
				<div class="map__block">
					<p class="map__title"><?php _e('Our contacts', 'barber') ?></p>
					<div class="map__item"><?php echo implode('<br/>', $ssh_addr) ?></div>
					<div class="map__item"><?php echo implode('<br/>', $ssh_phone) ?></div>
					<div class="map__item"><?php the_field('ssh_mail') ?></div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="fmap"></div>
	<script>
		var beaches = [<?php echo implode(',', $arrGMapLL) ?>];
		var scenter = <?php echo $arrGMapCentr; ?>;
	</script>
	
</section>