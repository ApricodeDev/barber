<?php get_header(); ?>

<?php if(have_posts()){ ?>
	<h1><?php printf( __('Search Results for: %s', 'barber'), '<span>'.get_search_query().'</span>'); ?></h1>
	<?php while(have_posts()){
		the_post(); ?>
		<?php get_template_part('template_part/list_item'); ?>
	<?php } ?>
	<?php get_template_part('template_part/pager'); ?>
<?php }else{ ?>
	<?php get_template_part('template_part/not_found'); ?>
<?php } ?>

<?php get_footer(); ?>