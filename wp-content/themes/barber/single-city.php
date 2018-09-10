<?php get_header(); ?>

<?php while(have_posts()){
	the_post(); ?>
	
	<?php get_template_part('template_part/top_img_title_stitle_page'); ?>
	
	<section id="section2" class="top">
		<div class="container">
			<div class="row">
				<div class="col-12 d-flex justify-content-center align-items-center flex-wrap relative">
					<h2 class="top__title"><?php the_field('citypt_title') ?></h2>
					<div class="top__sort">
						<div class="top__sort-wrap">
							<span class="top__sort-button">Сортировка <img src="<?php echo get_template_directory_uri() ?>/img/arrow1.png" alt=""></span>
							<ul>
								<li><a href="#">Рейтинг</a></li>
								<li><a href="#">Скидка</a></li>
								<li><a href="#">Lorem</a></li>
							</ul>
						</div>
					</div>
				</div>
				
				<?php
				$netArr = array();
				$mspID = (int)get_the_id();
				$sites = get_sites(array());
				foreach($sites as $site){
					switch_to_blog($site->blog_id);
					wp_reset_query();
					query_posts(array(
							'post_type'    =>'netshop',
							'meta_query'   => array(
									'relation' => 'AND',
									array(
										'key'   => 'sshop_city_cocate',
										'value' => $mspID,
									),
							)
						)
					);
					while(have_posts()){
						the_post(); ?>
						<div class="col-12 col-md-6 col-lg-4">
							<div class="top-city-wrap"><?php
								$img = wp_get_attachment_image_src(get_field('nopt_b1_img', 'option'), 'thumbnail_360x360'); ?>
								<div class="top-city" style="background-image: url('<?php echo $img[0]; ?>')">
								<span class="top-city-position">#<?php the_field('sshop_raiting') ?></span>
								<a href="<?php echo home_url() ?>"><?php
									$img = wp_get_attachment_image_src(get_field('nopt_b1_logoimg', 'option'), 'thumbnail_253x90');
									$image_alt = get_post_meta(get_field('nopt_b1_logoimg', 'option'), '_wp_attachment_image_alt', true); ?>
									<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
								</a>
								<div class="top-city-content">
									<a href="<?php echo home_url() ?>" class="top-city-link">
										<?php _e('go to the site', 'barber') ?>
									</a>
								</div>
							</div>
								<div class="top-city__bottom">
									<div class="top-city__bottom-head">
										<a href="<?php echo home_url() ?>" class="top-city__bottom-name"><?php the_field('nopt_b1_title', 'option') ?></a>
										<span class="top-city__bottom-stars"><i class="fas fa-star"></i></span>
									</div>
									<div class="top-city__bottom-content">
										<span class="top-city__bottom-sale"></span>
										<span class="top-city__bottom-adress"><i class="fas fa-map-marker-alt"></i></span>
										<a href="<?php echo home_url() ?>#Review" class="top-city__bottom-review"></a>
									</div>
								</div>
							</div>
						</div><?php
						break;
					}
				}
				//wp_reset_query();
				restore_current_blog(); ?>
				
				<div class="col-12 d-flex align-items-center justify-content-center">
					<a class="top-city__more" href="#uID"><?php _e('Reas more', 'barber') ?></a>
				</div>
			</div>
		</div>
	</section>
	
<?php } ?>

<?php get_footer(); ?>