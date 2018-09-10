<?php if($GLOBALS['i'] == 0){ ?>
	<div class="col-12 col-lg-8 mb2r">
		<?php if(!wp_is_mobile()){
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_750x556');
		}else{
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_750x556_m');
		} ?>
		<article style="background-image: url('<?php echo $img[0] ?>');" class="main-blog__item main-blog__item-big">
			<time datetime="2018-09-23">23.09.2018</time>
			<div class="main-blog__item-content">
				<h5><?php the_title() ?></h5>
				<?php the_excerpt() ?>
				<a href="<?php the_permalink() ?>">
					<?php _e('Reas more', 'barber') ?>
					<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="more">
				</a>
			</div>
			<a href="<?php the_permalink() ?>" class="main-blog-link"><?php _e('Reas more', 'barber') ?></a>
		</article>
	</div><?php
	$GLOBALS['i']++;
}else{
	if($GLOBALS['i']==1){ ?>
		<div class="col-12 col-lg-4">
			<div class="row">
	<?php } ?>
				<div class="col-12 col-md-6 col-lg-12">
					<?php $img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail_359x263'); ?>
					<article style="background-image: url('<?php echo $img[0] ?>');" class="main-blog__item mb2r">
						<time datetime="<?php the_time('Y-m-d') ?>"><?php the_time('d.m.Y') ?></time>
						<div class="main-blog__item-content">
							<h5><?php the_title() ?></h5>
							<p><?php the_excerpt() ?></p>
							<a href="<?php the_permalink() ?>">
								<?php _e('Reas more', 'barber') ?>
								<img src="<?php echo get_template_directory_uri() ?>/img/arrow2.png" alt="more">
							</a>
						</div>
						<a href="<?php the_permalink() ?>" class="main-blog-link"><?php _e('Reas more', 'barber') ?></a>
					</article>
				</div>
	<?php if($GLOBALS['i']==2){ ?>		
			</div>
		</div><?php
	}
	$GLOBALS['i']++;
}