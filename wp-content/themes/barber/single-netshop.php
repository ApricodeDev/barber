<?php get_header(); ?>

<?php while(have_posts()){
	the_post();
	$arrGMapLL = array();
	$arrGMapCentr = array(); ?>
	
	<?php get_template_part('template_part/top_img_title_stitle_ns'); ?>
	
<?php } ?>

<section id="section2" class="adress-costs">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="adress-costs__block">
					<h5 class="adress-costs__title"><?php the_field('ssh_prodlist_title') ?></h5>
					<div class="adress-costs__table"><?php //===custom loop===
						$i = 0;
						query_posts(array('post_type'=>'product', 'posts_per_page'=>-1));
						while(have_posts()){
							the_post();
							$product = wc_get_product(get_the_id());
							if($product->is_virtual()){ ?>
								<div class="adress-costs__item <?php if(yn_prodInCart(get_the_id())){echo'adress-costs__item-active';} ?>" id="pid_<?php echo $i ?>">
									<span class="adress-costs__name"><?php echo $product->get_title(); ?></span>
									<span class="adress-costs__val adress-costs__val-sale"><?php echo __('Sale ', 'barber').cwc_getprocentSale($product->get_regular_price(), $product->get_sale_price()) ?>%</span>
									<span class="adress-costs__val adress-costs__val-before"><?php echo wc_price($product->get_regular_price()); ?></span>
									<span class="adress-costs__val adress-costs__val-now"><?php echo wc_price($product->get_sale_price()); ?></span>
									<span class="adress-costs__delete">
										<a href="#uID" class="prodAddDellToCart" data-prodid="<?php the_id() ?>" data-parentid="pid_<?php echo $i ?>">
											<img src="<?php echo get_template_directory_uri() ?>/img/krest.jpg" alt="edit" class="mCS_img_loaded">
										</a>
									</span>
								</div><?php
								$i++;
							}
						}
						wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="adress-slider">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h5 class="adress-costs__title"><?php the_field('ssh_prodlist_title2') ?></h5>
				<div class="adress-costs__slider">
					<div class="adress-costs__slider-wrap"><?php
						query_posts(array('post_type'=>'product', 'posts_per_page'=>-1));
						while(have_posts()){
							the_post();
							$product = wc_get_product(get_the_id());
							if(!$product->is_virtual()){
								$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_id()), 'thumbnail_329x292');
								$image_alt = get_post_meta(get_post_thumbnail_id(get_the_id()), '_wp_attachment_image_alt', true); ?>
								<div class="adress-costs__slide">
									<div class="adress-costs__slide-block">
										<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
										<span class="adress-costs__sale">-<?php echo __('Sale ', 'barber').cwc_getprocentSale($product->get_regular_price(), $product->get_sale_price()) ?>%</span>
										<p class="adress-costs__slide-name"><?php echo $product->get_title(); ?></p>
										<span class="adress-costs__val adress-costs-val-before"><?php echo wc_price($product->get_regular_price()); ?></span>
										<span class="adress-costs__val adress-costs__val-now-slide"><?php echo wc_price($product->get_sale_price()); ?></span>
										<span class="adress-costs__button prodAddToCart" data-prodid="<?php the_id() ?>"><?php _e('Add to order', 'barber') ?></span>
									</div>
								</div><?php
							}
						}
						wp_reset_query(); ?>
					</div>
					<div class="adress-costs__slider-pagination"></div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="net">
	<div class="net-about">
		<div class="container container-img">
			<div class="row">
				<div class="cok-12"><?php
					if(!wp_is_mobile()){
						$img = wp_get_attachment_image_src(get_field('ssh_abus_img'), 'thumbnail_1140x798');
					}else{
						$img = wp_get_attachment_image_src(get_field('ssh_abus_img'), 'thumbnail_1140x798_m');
					}
					$image_alt = get_post_meta(get_field('ssh_abus_img'), '_wp_attachment_image_alt', true); ?>
					<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-12 col-lg-9 offset-lg-3">
					<div class="net-content">
						<h3><?php the_field('ssh_abus_title') ?></h3>
						<div class="net-content-container">
							<?php the_field('ssh_abus_content') ?>
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
		<h3 class="section-title"><?php the_field('ssh_gall_title') ?></h3>
		<div class="row">
			<div class="col-12">
				<div class="media__slider">
					<div class="media-slider-container"><?php
						if(have_rows('ssh_gall_list')){
							while(have_rows('ssh_gall_list')){
								the_row();
								$img = wp_get_attachment_image_src(get_sub_field('ssh_gall_list_img'), 'thumbnail_360x360');
								$image_alt = get_post_meta(get_sub_field('ssh_gall_list_img'), '_wp_attachment_image_alt', true); ?>
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
		<h3 class="section-title"><?php the_field('ssh_work_title') ?></h3>
		<div class="row">
			<div class="col-12">
				<?php the_field('ssh_work_content') ?>
			</div>
		</div>
	</div>
</section>

<section class="reviews" id="Review">
	<div class="container">
		<h4 class="section-title"><?php the_field('ssh_review_title') ?></h4>
		<div class="row">
			<div class="col-12 offset-lg-2 col-lg-8"><?php
				$i = 0;
				//===ADD COMMENT===
				if(isset($_POST['urw_name'])&&isset($_POST['urw_number'])&&isset($_POST['urw_comment'])){
					//===CHECK ORDER NUMBER===
					if(checkOrderNumber($_POST['urw_number'])){
						$comm_row = array(
							'ssh_review_list_name'	    => htmlspecialchars($_POST['urw_name']),
							'ssh_review_list_content'	=> htmlspecialchars($_POST['urw_comment']),
							'ssh_review_list_date'	    => date('d.m.Y'),
							'ssh_review_list_order'     => htmlspecialchars($_POST['urw_number']),
						);
						$i = add_row('field_5b91130af18ac', $comm_row, get_the_id());
						_e('You Comment Added!', 'barber');
					}else{
						_e('You Order number is invalid!', 'barber');
					}
				}
				
				$i = 0;
				if(have_rows('ssh_review_list')){
					while(have_rows('ssh_review_list')){
						the_row();
						get_template_part('template_part/list_item_comments');
						if($i++ > 1){
							break;
						}
					}
				} ?>
			</div>
			<div class="col-12 offset-lg-2 col-lg-8" id="ShopCommentAddBox">
				
			</div>
			<div class="col-12 offset-lg-2 col-lg-8">
				<div id="ReccommendPostBoxLoading">
					<img src="<?php echo get_template_directory_uri() ?>/img/ajax_loader.gif" alt="loading">
				</div>
				<div class="reviews__bottom">
					<a href="#uID" class="reviews__more" id="ShopCommentAddButt" data-postid="<?php the_id() ?>" ><?php _e('Show more', 'barber') ?></a>
				</div>
			</div>
			<div class="col-12 offset-lg-1 col-lg-10">
				<div class="reviews__new">
					<h5><?php _e('Leave a comment', 'barber') ?></h5>
					<form action="<?php the_permalink() ?>/#Review" method="post" class="reviews__new-form">
						<div class="reviews__new-row">
							<input type="text" name="urw_name"      placeholder="<?php _e('You name*', 'barber') ?>" required>
							<input type="text" name="urw_number"    placeholder="<?php _e('You order number*', 'barber') ?>" required>
						</div>
						<textarea              name="urw_comment"  placeholder="<?php _e('You comment*', 'barber') ?>" required></textarea>
						<input type="submit" value="<?php _e('Send', 'barber') ?>">
					</form>
				</div>
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
					<div class="map__item"><?php the_field('ssh_addr') ?></div>
					<div class="map__item"><?php the_field('ssh_phone') ?></div>
					<div class="map__item"><?php the_field('ssh_mail') ?></div>
					<p class="map__title"><?php _e('Work time', 'barber') ?></p>
					<div class="map__item"><span><?php the_field('ssh_timework') ?></span></div>
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

<?php get_footer(); ?>