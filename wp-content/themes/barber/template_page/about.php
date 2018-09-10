<?php
/*
Template Name: About
*/
get_header();


//switch_to_blog($main_blog);

//get_current_blog_id()

// if(ms_is_switched()){
	// restore_current_blog();
// }

?>

<?php while(have_posts()){
	the_post(); ?>
	
	<?php get_template_part('template_part/top_img_title_stitle_page'); ?>
	
	<section id="section2" class="net">
		<div class="net-about">
			<div class="container container-img container-img-right">
				<div class="row">
					<div class="col-12">
						<?php if(!wp_is_mobile()){
							$img = wp_get_attachment_image_src(get_field('abas_b1_img'), 'thumbnail_945x737');
						}else{
							$img = wp_get_attachment_image_src(get_field('abas_b1_img'), 'thumbnail_945x737_m');
						}
						$image_alt = get_post_meta(get_field('abas_b1_img'), '_wp_attachment_image_alt', true); ?>
						<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6">
						<div class="net-content net-content-about">
							<h3><?php the_field('abas_b1_title') ?></h3>
							<div class="net-content-container">
								<p><?php the_field('abas_b1_content_1') ?></p>
								<p class="net-content-container-hidden"><?php the_field('abas_b1_content_2') ?></p>
							</div>
							<span class="net-content-more">
								<?php _e('Read more', 'barber') ?>
								<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="readmore">
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php if(!wp_is_mobile()){
		$img = wp_get_attachment_image_src(get_field('abas_b3_img'), 'thumbnail_1920x1222');
	}else{
		$img = wp_get_attachment_image_src(get_field('abas_b3_img'), 'thumbnail_1920x1222_m');
	} ?>
	<section style="background-image: url('<?php echo $img[0] ?>')" class="why">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3><?php the_field('abas_b3_title') ?></h3>
				</div><?php //===acf repeater===
				if(have_rows('hom_b3_list')){
					while(have_rows('hom_b3_list')){
						the_row(); ?>
						<div class="col-12 col-lg-4 mb2r">
							<div class="why__item">
								<p class="why__item-name"><?php the_sub_field('hom_b3_list_title'); ?></p>
								<p class="why__item-content"><?php the_sub_field('hom_b3_list_content'); ?></p>
							</div>
						</div>
					<?php }
				} ?>
			</div>
		</div>
	</section>

	<section class="net">
		<div class="net-about">
			<div class="container container-img">
				<div class="row">
					<div class="col-12">
						<?php if(!wp_is_mobile()){
							$img = wp_get_attachment_image_src(get_field('abas_b4_img'), 'thumbnail_945x737');
						}else{
							$img = wp_get_attachment_image_src(get_field('abas_b4_img'), 'thumbnail_945x737_m');
						}
						$image_alt = get_post_meta(get_field('abas_b4_img'), '_wp_attachment_image_alt', true); ?>
						<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 offset-lg-6 col-lg-6">
						<div class="net-content net-content-about">
							<h3><?php the_field('abas_b4_title') ?></h3>
							<div class="net-content-container">
								<p><?php the_field('abas_b4_content_1') ?></p>
								<p class="net-content-container-hidden"><?php the_field('abas_b4_content_2') ?></p>
							</div>
							<span class="net-content-more">
								<?php _e('Read more', 'barber') ?>
								<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="readmore">
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php if(!wp_is_mobile()){
		$img = wp_get_attachment_image_src(get_field('abas_b5_img'), 'thumbnail_1920x1080');
	}else{
		$img = wp_get_attachment_image_src(get_field('abas_b5_img'), 'thumbnail_1920x1080_m');
	} ?>
	<section style="background-image: url('<?php echo $img[0]; ?>')" class="about-form">
		<div class="container">
			<div class="row">
				<div class="col-12 offset-lg-2 col-lg-8">
					<div class="about-form__container">
						<?php echo do_shortcode(get_field('abas_b5_forn')) ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php } ?>
<?php get_footer(); ?>