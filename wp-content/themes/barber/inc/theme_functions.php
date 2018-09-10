<?php

//===ACF options tab===
if( function_exists('acf_add_options_sub_page') && current_user_can('theme_options_view')){
	acf_add_options_sub_page(array(
		'title'  => 'Theme Options',
		'parent' => 'index.php',
	));
}

//===NEXT PREV in single post===
add_filter('next_post_link', 'post_link_attributes1');
function post_link_attributes1($output){
	$injection = 'class="article-page-nav-link article-page-nav-link-next"';
	return str_replace('<a href=', '<a '.$injection.' href=', $output);
}
//===NEXT PREV in single post===
add_filter('previous_post_link', 'post_link_attributes2');
function post_link_attributes2($output){
	$injection = 'class="article-page-nav-link article-page-nav-link-prev"';
	return str_replace('<a href=', '<a '.$injection.' href=', $output);
}

//===SEARCH ONLY POST_TYPE===
// function searchfilter($query){
    // if($query->is_search) {
		// $query->set('post_type', array('post'));
    // }
	// return $query;
// }
// add_filter('pre_get_posts', 'searchfilter');

//===ADD METAFIELD FOR POST TYPE netshop===
add_action('add_meta_boxes', 'myplugin_add_custom_box');
function myplugin_add_custom_box(){
	$screens = array('netshop');
	add_meta_box( 'myplugin_sectionid', __('Shop City Location', 'barber'), 'myplugin_meta_box_callback', $screens );
}
function myplugin_meta_box_callback($post, $meta){
	$screens = $meta['args'];
	wp_nonce_field( plugin_basename(__FILE__), 'sshop_city_cocate_nname');
	$pVal = get_post_meta($post->ID, 'sshop_city_cocate', true); ?>
	<label for="sshop_city_cocate"><?php _e('Select City location', 'barber') ?></label>
	<select id= "sshop_city_cocate" name="sshop_city_cocate"><?php
		switch_to_blog(1);
		query_posts(array('post_type'=>'city', 'posts_per_page'=>-1));
		while(have_posts()){
			the_post(); ?>
			<option value="<?php the_id() ?>" <?php if($pVal == get_the_id()){echo'selected';} ?>><?php the_title() ?></option><?php
		}
		wp_reset_query();
		restore_current_blog(); ?>
	</select><?php
}
add_action('save_post', 'myplugin_save_postdata');
function myplugin_save_postdata($post_id){
	if(!isset($_POST['sshop_city_cocate'])) return;
	if(!wp_verify_nonce($_POST['sshop_city_cocate_nname'], plugin_basename(__FILE__))) return;
	if(defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if(!current_user_can('edit_post', $post_id )) return;
	$my_data = sanitize_text_field( $_POST['sshop_city_cocate'] );
	update_post_meta( $post_id, 'sshop_city_cocate', $my_data );
}
