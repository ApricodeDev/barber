<section class="main-blog">
	<div class="container">
		
		<h3 class="main-blog-title"><?php the_field('rcpst_title', 'option') ?></h3>
		
		<div id="ReccommendPostBox" class="row"><?php
			$i = 0;
			if(have_rows('rcpst_list', 'option')){
				while(have_rows('rcpst_list', 'option')){
					the_row();
					$pID = get_sub_field('rcpst_list_item', 'option');
					setup_postdata($pID);
					get_template_part('template_part/list_item_reccommends');
					if(++$i==3){break;}
				}
			}
			wp_reset_postdata(); ?>
		</div>
		
		<div id="ReccommendPostBoxLoading" class="text-acenter">
			<img src="<?php echo get_template_directory_uri() ?>/img/ajax_loader.gif" alt="loading">
		</div>
		
		<div class="row">
			<div class="col-12 d-flex justify-content-center">
				<a class="main-blog__link" href="#uID" id="ReccommendPostLoadMore">
					<?php _e('More articles', 'barber') ?>
				</a>
			</div>
		</div>
		
	</div>
</section>