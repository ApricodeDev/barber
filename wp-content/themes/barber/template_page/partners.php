<?php
/*
Template Name: Partners
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
							$img = wp_get_attachment_image_src(get_field('partnr_img'), 'thumbnail_1041x989');
						}else{
							$img = wp_get_attachment_image_src(get_field('partnr_img'), 'thumbnail_1041x989_m');
						}
						$image_alt = get_post_meta(get_field('partnr_img'), '_wp_attachment_image_alt', true); ?>
						<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-9">
						<div class="net-content">
							<h3><?php the_field('partnr_b1_title') ?></h3>
							<div class="net-content-container">
								<?php the_field('partnr_b1_content') ?>
							</div>
							<span class="net-content-more">
								<?php _e('Reas more', 'barber') ?>
								<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="link">
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	<?php if(!wp_is_mobile()){
		$img = wp_get_attachment_image_src(get_field('partnr_b2_img'), 'thumbnail_1920x1222');
	}else{
		$img = wp_get_attachment_image_src(get_field('partnr_b2_img'), 'thumbnail_1920x1222_m');
	} ?>
	<section style="background-image:url('<?php echo $img[0] ?>');" class="why">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<h3><?php the_field('partnr_b2_title') ?></h3>
				</div><?php //===acf repeater===
				if(have_rows('hom_b2_list')){
					while(have_rows('hom_b2_list')){
						the_row(); ?>
						<div class="col-12 col-lg-4 mb2r">
							<div class="why__item">
								<p class="why__item-name"><?php the_sub_field('hom_b2_list_title') ?></p>
								<p class="why__item-content"><?php the_sub_field('hom_b2_list_content') ?></p>
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
							$img = wp_get_attachment_image_src(get_field('hom_b3_img'), 'thumbnail_945x737');
						}else{
							$img = wp_get_attachment_image_src(get_field('hom_b3_img'), 'thumbnail_945x737_m');
						}
						$image_alt = get_post_meta(get_sub_field('hom_b3_img'), '_wp_attachment_image_alt', true); ?>
						<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
					</div>
				</div>
			</div>
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-6 offset-lg-6">
						<div class="net-content net-content-partners">
							<h3><?php the_field('hom_b3_r_title') ?></h3>
							<div class="net-content-partners-text">
								<?php the_field('hom_b3_r_content') ?>
							</div>
							<div class="net-content-partners-form">
								<?php echo do_shortcode(get_field('hom_b3_r_form')) ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
<?php } ?>
<?php get_footer(); ?>