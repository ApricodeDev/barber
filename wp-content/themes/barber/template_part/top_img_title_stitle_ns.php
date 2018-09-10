<?php if(!wp_is_mobile()){
	$img = wp_get_attachment_image_src(get_field('hom_b1_img', get_queried_object_id()), 'thumbnail_2086x1495');
}else{
	$img = wp_get_attachment_image_src(get_field('hom_b1_img', get_queried_object_id()), 'thumbnail_2086x1495_m');
}

if(!wp_is_mobile()){
	$logoimg = wp_get_attachment_image_src(get_field('hom_b1_logoimg', get_queried_object_id()), 'thumbnail_1006x255');
}else{
	$logoimg = wp_get_attachment_image_src(get_field('hom_b1_logoimg', get_queried_object_id()), 'thumbnail_1006x255_m');
}
$logoimage_alt = get_post_meta(get_field('hom_b1_logoimg'), '_wp_attachment_image_alt', true); ?>

<section
        style="background: url('<?php echo $img[0] ?>');background-repeat: no-repeat;-webkit-background-size: 110%;background-size: 110%;background-position: 90% 15%;"
        class="banner banner-fix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner__content banner__content-net">
                    <img src="<?php echo $logoimg[0]; ?>" alt="<?php echo htmlspecialchars($logoimage_alt); ?>">
                    <h1><?php echo get_the_title(get_queried_object_id()) ?></h1>
                </div>
            </div>
        </div>
        <div class="banner__bottom">
            <a href="#section2" class="banner__link">
				<img src="<?php echo get_template_directory_uri() ?>/img/down.png" alt="">
			</a>
        </div>
    </div>
</section>