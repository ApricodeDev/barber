<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_359x263'); ?>
<div class="col-12 col-md-6 col-lg-4">
	<article style="background-image: url('<?php echo $img[0] ?>');" class="main-blog__item mb2r">
		<time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d.m.Y') ?></time>
		<div class="main-blog__item-content">
			<h5><?php the_title() ?></h5>
			<?php the_excerpt() ?>
			<a href="<?php the_permalink() ?>">
				<?php _e('Read more', 'barber') ?>
				<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="more">
			</a>
		</div>
		<a href="<?php the_permalink() ?>" class="main-blog-link"><?php _e('Read more', 'barber') ?></a>
	</article>
</div>