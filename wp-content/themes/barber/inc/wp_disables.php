<?php
	//===Disable embeds on init===
	add_action('init', function(){
		remove_action('rest_api_init',    'wp_oembed_register_route');
		remove_filter('oembed_dataparse', 'wp_filter_oembed_result', 10);
		remove_action('wp_head',          'wp_oembed_add_discovery_links');
		remove_action('wp_head',          'wp_oembed_add_host_js');
		remove_action('wp_head',          'print_emoji_detection_script', 7);
		remove_action('wp_print_styles',  'print_emoji_styles');
		remove_action('wp_head',          'wp_generator');
		
	}, PHP_INT_MAX - 1);
	
	//===REMOOVE MENU ITEMS from ADMIN PANEL===
	function remove_menus(){
	if(is_super_admin()){
		remove_menu_page('edit.php?post_type=netshop');
		remove_menu_page('edit.php?post_type=product');
		
		remove_menu_page('woocommerce');
		// remove_submenu_page('woocommerce', 'wc-orders');
		// remove_submenu_page('woocommerce', 'wc-reports');
		// remove_submenu_page('woocommerce', 'wc-addons');
	}else{
		remove_menu_page('edit.php');
		remove_menu_page('edit.php?post_type=page');
		remove_menu_page('edit-comments.php');
		remove_menu_page('themes.php');
		remove_menu_page('plugins.php');
		remove_menu_page('tools.php');
		remove_menu_page('edit.php?post_type=acf-field-group');
		remove_menu_page('wpcf7');
		remove_menu_page('edit.php?post_type=city');
		remove_menu_page('loco');
		remove_menu_page('simple-share-buttons-adder');
		
		remove_submenu_page('options-general.php', 'options-media.php');
		remove_submenu_page('options-general.php', 'options-permalink.php');
		remove_submenu_page('options-general.php', 'options-discussion.php');
		remove_submenu_page('options-general.php', 'options-reading.php');
		remove_submenu_page('options-general.php', 'options-writing.php');
		remove_submenu_page('options-general.php', 'simple-share-buttons-adder');
		remove_submenu_page('index.php',           'my-sites.php');
		remove_submenu_page('woocommerce', 'wc-settings');
		remove_submenu_page('woocommerce', 'wc-status');
		remove_submenu_page('woocommerce', 'wc-addons');
	}
}
add_action('admin_menu', 'remove_menus', 999);

//===remane menu item in admin pane===
function my_text_strings($translated_text, $text, $domain){
	if(is_super_admin()){
		switch($translated_text){
			case 'WooCommerce' :
				$translated_text = __('Store', 'woocommerce');
				break;
		}
	}else{
		switch($translated_text){
			case 'WooCommerce' :
				$translated_text = __('My Store', 'woocommerce');
				break;
		}
	}
	return $translated_text;
}
add_filter('gettext', 'my_text_strings', 20, 3);
	
?>