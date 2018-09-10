<?php

// Disable actions in core
include( get_template_directory() . '/inc/wp_disables.php' );

// Default settings
include( get_template_directory() . '/inc/default.php' );

// Custom Post Types
include( get_template_directory() . '/inc/cpt.php' );

// Theme functions
include( get_template_directory() . '/inc/theme_functions.php' );

// Custom Menu Walker
include( get_template_directory() . '/inc/classes.php' );

// Custom Widgets
include( get_template_directory() . '/inc/widgets.php' );

// Theme sidebars
include( get_template_directory() . '/inc/sidebars.php' );

// Theme thumbnails
include( get_template_directory() . '/inc/thumbnails.php' );

// Theme menus
include( get_template_directory() . '/inc/menus.php' );

// Theme css & js
include( get_template_directory() . '/inc/scripts.php' );

// WOOCOMMERCE
include( get_template_directory() . '/inc/woo_functions.php' );

// Theme JAX
include( get_template_directory() . '/inc/ajax.php' );
