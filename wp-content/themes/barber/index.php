<?php get_header(); ?>

<?php get_template_part('template_part/top_img_title_stitle_page'); ?>

<section id="section2" class="main-blog">
	<div class="container">
		<h3 class="main-blog-title">Наш блог</h3>
		<div class="row">
			
			<?php $GLOBALS['i'] = 0;
				if(have_posts()){
				while(have_posts()){
					the_post();
					get_template_part('template_part/posts_squere');
					if($GLOBALS['i'] == 3){
						break;
					}
				}
			} ?>
			
			<?php if(have_posts()){ ?>
				
				<?php while(have_posts()){
					the_post();
					get_template_part('template_part/list_item'); ?>
				<?php } ?>
				
				<?php GLOBAL $wp_query;
					if($wp_query->post_count<3){ ?>
						</div>
					</div><?php
				} ?>
				
				<div class="col-12 d-flex justify-content-center">
					<?php $blogPageURL = get_permalink(get_option('page_for_posts')) ?>
					<a class="main-blog__link" href="<?php echo $blogPageURL; ?>">
						<?php _e('More articles', 'barber') ?>
					</a>
				</div>
				
			<?php }else{ ?>
				<?php get_template_part('template_part/not_found'); ?>
			<?php } ?>
			
		</div>
	</div>
</section>
	
<?php get_footer(); ?>