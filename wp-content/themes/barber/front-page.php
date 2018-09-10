<?php get_header(); ?>

<?php if(get_current_blog_id() == 1){
	get_template_part('template_part/home_main');
}else{
	get_template_part('template_part/home_net');
} ?>

<?php get_footer(); ?>