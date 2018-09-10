<?php

//===CHANGE CURRENCY SYMBOL===
add_filter( 'woocommerce_currencies', 'add_my_currency');
function add_my_currency($currencies){
	$currencies['UAH'] = __( 'Українська гривня', 'woocommerce');
	return $currencies;
}
add_filter('woocommerce_currency_symbol', 'add_my_currency_symbol', 10, 2);
function add_my_currency_symbol($currency_symbol, $currency){
	switch($currency){
		case 'UAH': $currency_symbol = __('uah', 'barber');
		break;
	}
	return $currency_symbol;
}

//===GET PROCENTS SALE===
function cwc_getprocentSale($regular_price, $sale_price){
	$res = 0;
	if($regular_price > 0 && $sale_price > 0){
		$res = round(100 - ($sale_price / ($regular_price / 100)), 0);
	}
	return $res;
}

//===YN product in cart===
function yn_prodInCart($prodID){
	$res = false;
	foreach(WC()->cart->get_cart() as $cart_item_key=>$cart_item){
		if($prodID == $product->id){
			$res = true;
		}
	}
	return $res;
}

//===YN virtual product in cart===
function yn_virtprodInCart(){
	$res = false;
	foreach(WC()->cart->get_cart() as $cart_item_key=>$cart_item){
		$product = $cart_item['data'];
		if($product->is_virtual()){
			$res = true;
		}
	}
	return $res;
}

//===delete all virtual products in cart===
function del_virtual_prods_cart(){
	foreach(WC()->cart->get_cart() as $cart_item_key=>$cart_item){
		$product = $cart_item['data'];
		if($product->is_virtual()){
			WC()->cart->remove_cart_item($cart_item_key);
		}
	}
}

//===get top cart content===
function getTopCartContent(){
	$res = '';
	$i=0;
	foreach(WC()->cart->get_cart() as $cart_item_key=>$cart_item){
		$product = $cart_item['data'];
		if(!$product->is_virtual()){
			if($i++ == 0){
				$res .= '<p class="basket__block-body-title">'.__('products', 'barber').'</p>';
			}
			$img = wp_get_attachment_image_src(get_post_thumbnail_id($product->get_id()), 'thumbnail_73x73');
			$image_alt = get_post_meta(get_post_thumbnail_id($product->get_id()), '_wp_attachment_image_alt', true);
			$res .= '<div class="basket__block-item">
						<div class="basket__block-img">
							<img src="'.$img[0].'" alt="'.htmlspecialchars($image_alt).'">
							<span>-'.cwc_getprocentSale($product->get_regular_price(), $product->get_sale_price()).'%</span>
						</div>
						<div class="basket__block-content">
							<p class="basket__block-text">'.$product->get_title().'</p>
							<span class="basket__block-cost">'.wc_price($product->get_regular_price()).'</span>
							<span class="basket__block-cost-old">'.wc_price($product->get_sale_price()).'</span>
						</div>
						<span class="basket__block-remove siteTopCartItemDelete" data-itemid="'.$cart_item_key.'">x</span>
					</div>';
		}
	}
	
	$i=0;
	foreach(WC()->cart->get_cart() as $cart_item_key=>$cart_item){
		$product = $cart_item['data'];
		if($product->is_virtual()){
			if($i++ == 0){
				$res .= '<p class="basket__block-body-title">'.__('услуга', 'barber').'</p>';
			}
			$res .= '<div class="basket__block-item">
						<div class="basket__block-content">
							<p class="basket__block-text">'.$product->get_title().' <span>-'.cwc_getprocentSale($product->get_regular_price(), $product->get_sale_price()).'%</span></p>
							<span class="basket__block-cost">'.wc_price($product->get_regular_price()).'</span>
							<span class="basket__block-cost-old">'.wc_price($product->get_sale_price()).'</span>
						</div>
						<span class="basket__block-remove siteTopCartItemDelete" data-itemid="'.$cart_item_key.'">x</span>
					</div>';
		}
	}
	
	return $res;
}

//===Check order number===
function checkOrderNumber($orderID){
	$order = wc_get_order((int)$orderID);
	//print_r($order);
	if($order){
		return true;
	}else{
		return false;
	}
}



















