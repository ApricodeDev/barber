<div class="container sitePaging"><?php
	if(function_exists('wp_pagenavi')){
		wp_pagenavi();
	}else{
		echo get_next_posts_link(__( 'Previous page', 'barber'));
		echo get_previous_posts_link(__( 'Next page', 'barber'));
		
		// the_posts_pagination( array(
			// 'prev_text' => __( 'Previous page', 'barber' ),
			// 'next_text' => __( 'Next page', 'barber' ),
		// ) );
	} ?>
</div>