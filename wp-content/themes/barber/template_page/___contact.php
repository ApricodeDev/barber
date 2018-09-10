<?php
/*
Template Name: Contact
*/
get_header(); ?>

<?php while(have_posts()){
	the_post(); ?>
	
	<?php //===acf repeater===
	if(have_rows('hom_slider_list')){
		while(have_rows('hom_slider_list')){
			the_row(); ?>
			<?php the_sub_field('hom_slider_list_name'); ?>
			<?php if(!wp_is_mobile()){
				$img = wp_get_attachment_image_src(get_sub_field('hom_slider_list_img'), 'thumbnail_1920x1080');
			}else{
				$img = wp_get_attachment_image_src(get_sub_field('hom_slider_list_img'), 'thumbnail_800x600');
			}
			$image_alt = get_post_meta(get_sub_field('hom_slider_list_img'), '_wp_attachment_image_alt', true); ?>
			<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
			<?php _e('', 'barber') ?>
		<?php }
	} ?>
	
	<?php //===get posts in loop===
	$lastposts = get_posts(array('posts_per_page'=>3, 'post_type'=>'xxx'));
	foreach($lastposts as $post){
		setup_postdata($post); ?>
		<?php if(!wp_is_mobile()){
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_1920x1080');
		}else{
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_800x600');
		}
		$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
		<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
		<?php _e('', 'barber') ?><?php
	}
	wp_reset_postdata(); ?>
	
<?php } ?>
	
<?php //===custom loop===
query_posts(array('post_type'=>'xxx', 'posts_per_page'=>-1));
while(have_posts()){
	the_post(); ?>
	<?php if(!wp_is_mobile()){
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_1920x1080');
		}else{
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_800x600');
		}
		$image_alt = get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', true); ?>
		<img src="<?php echo $img[0]; ?>" alt="<?php echo htmlspecialchars($image_alt); ?>">
	<?php _e('', 'barber') ?><?php
}
wp_reset_query(); ?>

<?php //===template part===
get_template_part('template_part/xxx'); ?>
	
<?php get_footer(); ?>