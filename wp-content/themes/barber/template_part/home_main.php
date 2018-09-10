<?php while(have_posts()){
	the_post(); ?>
	
	<?php get_template_part('template_part/top_img_title_stitle_page'); ?>
	
	<section id="section2" class="top">
		<div class="container">
			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center">
					<h2><?php the_field('hom_b2_title') ?>Топ барбершопов</h2>
				</div>
				<div class="col-12">
					<div class="top__slider">
						<div class="top-slider-container">
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#1
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg0.png" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">Chop-Chop</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#2
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg1.jpg" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">Cut&Shave</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#3
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg2.png" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">Daniels</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#4
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg3.jpg" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">Custom-Shope</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#5
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg4.jpg" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">The Barber Shop</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#6
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg5.jpg" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">ESTDT Barber</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#7
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg6.png" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">Head shop</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
							<div class="top__slide" style="background-image: url('<?php echo get_template_directory_uri() ?>/img/top.png')">
								<span class="top__slide-position">
									#7
								</span>
								<a href=""><img src="<?php echo get_template_directory_uri() ?>/img/lg6.png" alt=""></a>
								<div class="top__slide-content">
									<a href="" class="top__slide-link">Head shop</a>
									<span><i class="fas fa-map-marker-alt"></i> Харьков; ул.Сумская 32.</span>
								</div>
							</div>
						</div>
						<div class="top__slider-pagination"></div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<section class="top">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-8 col-12">
					<div class="top__about">
						<h3><?php the_field('hom_b3_title') ?></h3>
						<div class="top__about-content">
							<p><?php the_field('hom_b3_content') ?></p>
						</div>
						<a href="<?php the_field('hom_b3_url') ?>"><?php the_field('hom_b3_url_txt') ?></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php if(!wp_is_mobile()){
		$img = wp_get_attachment_image_src(get_field('hom_b4_img'), 'thumbnail_1920x1222');
	}else{
		$img = wp_get_attachment_image_src(get_field('hom_b4_img'), 'thumbnail_1920x1222_m');
	} ?>
	<section style="background-image: url('<?php echo $img[0] ?>')" class="why">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3><?php the_field('hom_b4_title') ?></h3>
				</div><?php //===acf repeater===
				if(have_rows('hom_b4_list')){
					while(have_rows('hom_b4_list')){
						the_row(); ?>
						<div class="col-12 col-lg-4 mb2r">
							<div class="why__item">
								<p class="why__item-name"><?php the_sub_field('hom_b4_list_title'); ?></p>
								<p class="why__item-content"><?php the_sub_field('hom_b4_list_content'); ?></p>
							</div>
						</div>
					<?php }
				} ?>
			</div>
		</div>
	</section>

	<section class="main-blog">
		<div class="container">
			<h3 class="main-blog-title"><?php the_field('hom_b5_title') ?></h3>
			<div class="row"><?php
				
				$posts = get_posts( array(
					'numberposts'      => 3,
					'orderby'          => 'date',
					'order'            => 'DESC',
					'post_type'        => 'post',
					'suppress_filters' => true,
				) );
				$GLOBALS['i'] = 0;
				foreach($posts as $post){
					setup_postdata($post);
					get_template_part('template_part/posts_squere');
				}
				wp_reset_postdata();
				if(count($posts)<3){ ?>
						</div>
					</div><?php
				} ?>
				
				<div class="col-12 d-flex justify-content-center">
					<?php $blogPageURL = get_permalink(get_option('page_for_posts')) ?>
					<a class="main-blog__link" href="<?php echo $blogPageURL; ?>">
						<?php _e('More articles', 'barber') ?>
					</a>
				</div>
				
			</div>
		</div>
	</section>
	
<?php } ?>