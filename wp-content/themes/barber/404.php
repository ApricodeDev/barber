<?php get_header(); ?>

<?php if(!wp_is_mobile()){
	$img = wp_get_attachment_image_src(get_field('404_img', 'option'), 'thumbnail_2086x1495');
}else{
	$img = wp_get_attachment_image_src(get_field('404_img', 'option'), 'thumbnail_2086x1495_m');
} ?>
<section style="background: url('<?php echo $img[0] ?>');background-repeat: no-repeat;-webkit-background-size: cover!important;background-size: cover!important;background-position: 90% 78%;" class="banner banner-fix">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-10 col-lg-8">
				<h1><?php the_field('404_title', 'option') ?></h1>
				<div class="banner__content">
					<?php the_field('404_content', 'option') ?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php //get_template_part('block/not_found'); ?>

<?php get_footer(); ?>