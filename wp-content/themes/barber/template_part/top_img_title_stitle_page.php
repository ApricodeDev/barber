<?php if(!wp_is_mobile()){
	$img = wp_get_attachment_image_src(get_field('hom_b1_img', get_queried_object_id()), 'thumbnail_2086x1495');
}else{
	$img = wp_get_attachment_image_src(get_field('hom_b1_img', get_queried_object_id()), 'thumbnail_2086x1495_m');
}

//===add class for single post===
$class1 = '';
$class2 = '';
if(get_post_type(get_the_id())=='post'){
	$class1 = 'banner-article banner-fix';
}
if(get_post_type(get_the_id())!='post'){
	$class2 = 'col-md-10 col-lg-8';
} ?>

<section style="background: url('<?php echo $img[0] ?>'); background-repeat:no-repeat; -webkit-background-size:110%; background-size:110%; background-position: 90% 78%;" class="banner <?php echo $class1; ?>">
	<div class="container">
		<div class="row">
			<div class="col-12 <?php echo $class2; ?>">
				<h1><?php echo get_the_title(get_queried_object_id()) ?></h1>
				<div class="banner__content">
					<p><?php the_field('hom_b1_subtitle', get_queried_object_id()) ?></p>
				</div>
			</div>
			<div class="col-12 d-flex justify-content-center align-items-center">
				<?php if(is_front_page()){ ?>
					<div class="banner__citys">
						<p class="banner__citys-title"><?php the_field('hom_b1_city_title', get_queried_object_id()) ?></p>
						<div class="banner__select">
							<p class="banner__select-button">
								<img src="<?php echo get_template_directory_uri() ?>/img/arrow1.png" alt="next">
							</p>
							<ul><?php
								query_posts(array('post_type'=>'city', 'posts_per_page'=>-1));
								while(have_posts()){
									the_post(); ?>
									<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li><?php
								}
								wp_reset_query(); ?>
							</ul>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
		<div class="banner__bottom">
			<a href="#section2" class="banner__link">
				<img src="<?php echo get_template_directory_uri() ?>/img/down.png" alt="down">
			</a>
		</div>
	</div>
</section>