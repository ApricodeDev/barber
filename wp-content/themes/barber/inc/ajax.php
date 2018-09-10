<?php

//===ADD virtual prosuct from cart===
add_action('wp_ajax_cartadddellprod',        'cartadddellprod');
add_action('wp_ajax_nopriv_cartadddellprod', 'cartadddellprod');
function cartadddellprod(){
	$res = array('msg'=>'', 'content'=>'', 'icount'=>'0');
	if(yn_virtprodInCart()){
		$res['msg'] = __('You service changed!', 'barber');
		del_virtual_prods_cart();
	}else{
		$res['msg'] = __('You service added!', 'barber');
	}
	
	WC()->cart->add_to_cart((int)$_POST['prodID']);
	
	$res['content'] = getTopCartContent();
	$res['icount'] = WC()->cart->get_cart_contents_count();
	echo json_encode($res);
	die();
}

//===ADD || DEL prosuct from cart===
add_action('wp_ajax_cartaddprod',        'cartaddprod');
add_action('wp_ajax_nopriv_cartaddprod', 'cartaddprod');
function cartaddprod(){
	$res = array('msg'=>'', 'content'=>'', 'icount'=>'0');
	WC()->cart->add_to_cart((int)$_POST['prodID']);
	$res['content'] = getTopCartContent();
	$res['msg'] = __('You Product added!', 'barber');
	$res['icount'] = WC()->cart->get_cart_contents_count();
	echo json_encode($res);
	die();
}

//===DEL item from cart===
add_action('wp_ajax_cartdellitem',        'cartdellitem');
add_action('wp_ajax_nopriv_cartdellitem', 'cartdellitem');
function cartdellitem(){
	foreach(WC()->cart->get_cart() as $cart_item_key=>$cart_item){
		$product = $cart_item['data'];
		if($cart_item_key == $_POST['itemID']){
			WC()->cart->remove_cart_item($cart_item_key);
		}
	}
	getTopCartContent();
	die();
}

//===LOAD MORE POSTS===
add_action('wp_ajax_reccocmmload',        'reccocmmload');
add_action('wp_ajax_nopriv_reccocmmload', 'reccocmmload');
function reccocmmload(){
	global $post;
	$i = 0;
	$ii = 0;
	if(have_rows('rcpst_list', 'option')){
		while(have_rows('rcpst_list', 'option')){
			the_row();
			if(++$i > $_POST['loadPstart']){
				$pID = get_sub_field('rcpst_list_item', 'option');
				$post = get_post($pID);
				setup_postdata($post);
				get_template_part('template_part/list_item_reccommends');
				if(++$ii==3){break;}
			}
		}
	}
	//wp_reset_postdata();
	die();
}

//===LOAD MORE COMMENTS FOR SHOP===
add_action('wp_ajax_shopcomloadmo',        'shopcomloadmo');
add_action('wp_ajax_nopriv_shopcomloadmo', 'shopcomloadmo');
function shopcomloadmo(){
	$i = 0;
	$ii = 0;
	$args = array(
		'post_type'   => 'netshop',
		'post_status' => 'publish',
		'p'           => (int)$_POST['postID'],
	);
	$my_posts = new WP_Query($args);  
	if($my_posts->have_posts()){
		while($my_posts->have_posts()){
			$my_posts->the_post();
			if(have_rows('ssh_review_list')){
				while(have_rows('ssh_review_list')){
					the_row();
					if(++$i > $_POST['loadPstart']){
						get_template_part('template_part/list_item_comments');
						if(++$ii==3){break;}
					}
				}
			}
		}
	}
	die();
}


















