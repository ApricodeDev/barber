<?php
// Theme css & js
function base_scripts_styles() {
	$in_footer = true;
	wp_deregister_script('jquery');
	wp_enqueue_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', array(), '', $in_footer);
}
add_action('wp_enqueue_scripts', 'base_scripts_styles');

//===Theme css & js IN FOOTER===
function prefix_add_footer_styles(){
	$in_footer = true;
	
	wp_enqueue_style('google_f_1',      'https://fonts.googleapis.com/css?family=Oswald:700|Roboto&amp;subset=cyrillic',  array());
	wp_enqueue_style('slick_css',       '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css',                    array());
	wp_enqueue_style('bootstrap_css',   'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css',       array());
	wp_enqueue_style('fontawesome_css', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css',                        array());
	wp_enqueue_style('scrollbar_css',   '//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.min.css',            array());
	wp_enqueue_style('jquery_ui_css',   '//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css',                          array());
	wp_enqueue_style('nicesel_css',     get_template_directory_uri().'/css/nice-select.css',                              array());
	wp_enqueue_style('themecust_css',   get_template_directory_uri().'/css/theme.css',                                    array());
	wp_enqueue_style('theme_css',       get_stylesheet_uri(),                                                             array());
	
	wp_enqueue_script('popper_js',     'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js',       array('jquery'), '', $in_footer);
	wp_enqueue_script('bootstrap_js',  'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js',          array('jquery'), '', $in_footer);
	wp_enqueue_script('slick_js',      '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js',                  array('jquery'), '', $in_footer);
	wp_enqueue_script('scrollbar_js',  '//malihu.github.io/custom-scrollbar/jquery.mCustomScrollbar.concat.min.js',       array('jquery'), '', $in_footer);
	wp_enqueue_script('jqueryui_js',   'https://code.jquery.com/ui/1.12.1/jquery-ui.js',                                  array('jquery'), '', $in_footer);
	wp_enqueue_script('nicesel_js',    get_template_directory_uri().'/js/jquery.nice-select.min.js',                      array('jquery'), '', $in_footer);
	wp_enqueue_script('theme_js',      get_template_directory_uri().'/js/theme.js',                                       array('jquery'), '', $in_footer);
	wp_enqueue_script('comment-reply');
	wp_enqueue_script('googl_spi_js',  'https://maps.googleapis.com/maps/api/js?key='.get_field('goole_api_key', 'option').'&callback=initMap', array('jquery'), '', $in_footer);
};
add_action('get_footer', 'prefix_add_footer_styles');

//===Net Menu Hide for NO SuperAdmin===
add_action('admin_head', 'my_custom_css');
function my_custom_css() {
	if(!is_super_admin()){
		echo '<style>#wp-admin-bar-root-default {display: none;}</style>';
	}
}

//=====GOOGLE SPEED TEST=====
function remove_cssjs_ver( $src ){
	if( strpos( $src, '?ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}
add_filter( 'style_loader_src',  'remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'remove_cssjs_ver', 10, 2 );
//=====//GOOGLE SPEED TEST=====

//===HTML VALIDATION===
add_filter('style_loader_tag', 'clean_style_tag');
function clean_style_tag($src) {
	$src = str_replace("type='text/css'", '', $src);
	$src = str_replace('type="text/css"', '', $src);
    return $src;
}
add_filter('script_loader_tag', 'clean_script_tag');
function clean_script_tag($src) {
	$src = str_replace("type='text/javascript'", '', $src);
	$src = str_replace('type="text/javascript"', '', $src);
    return $src;
}
//===//HTML VALIDATION===

//===ACF QTANSLATE admin styles===
add_action('admin_head', 'my_custom_fonts');
function my_custom_fonts() {
	echo'<style>
		.multi-language-field {
			margin-top: 0px !important;
		}
		.multi-language-field .wp-switch-editor {
			padding: 5px;
			cursor: pointer;
		}
		.multi-language-field .wp-switch-editor.current-language {
			border-top: 1px solid #ddd;
			border-left: 1px solid #ddd;
			border-right: 1px solid #ddd;
		}
	</style>';
}
