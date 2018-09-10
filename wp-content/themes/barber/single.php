<?php get_header(); ?>

<?php while(have_posts()){
	the_post(); ?>
	
	<?php get_template_part('template_part/top_img_title_stitle_page'); ?>
	
	<section id="section2" class="article-page">
		<div class="container container-article">
			<div class="row">
				<div class="col-12">
					<article class="article-page__content">
						<?php the_content() ?>
						
						<div class="article-page__content-info">
							<span class="article-page__content-info-sharing">
								<i class="fas fa-share-alt"></i>
								<?php echo do_shortcode('[ssba-buttons]') ?>
							</span>
							<div class="article-page__content-info-more">
								<time><?php the_time('d.m.Y') ?></time>
								<span><?php _e('By', 'barber') ?> <?php the_author() ?></span>
							</div>
						</div>
						
						<?php get_template_part('template_part/pager_single'); ?>
						
						<?php if(comments_open()){
							comments_template();
						} ?>
					</article>
				</div>
			</div>
		</div>
	</section>
	
	<?php get_template_part('template_part/recommended_posts'); ?>
	
<?php } ?>

<?php get_footer(); ?>