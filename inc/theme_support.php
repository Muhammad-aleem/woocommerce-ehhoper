<?php


add_action( 'widgets_init', 'eshopper_widgets_init' );
function eshopper_widgets_init() {
    register_sidebar( array(
        'name' => __( 'shop page Sidebar', 'theme-slug' ),
        'id' => 'sidebar-shop',
        'description' => __( 'Widgets in this area will be shown on shop and product catagory page.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="shop widgettitle">',
	'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( 'singal page Sidebar', 'theme-slug' ),
        'id' => 'singal-shop',
        'description' => __( 'Widgets in this area will be shown on shop and singal page.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="singal-product %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="singal widgettitle">',
	'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name' => __( ' cart Sidebar', 'theme-slug' ),
        'id' => 'cart-shop',
        'description' => __( 'Widgets in this area will be shown on shop and singal page.', 'theme-slug' ),
        'before_widget' => '<li id="%1$s" class="singal-product %2$s">',
	'after_widget'  => '</li>',
	'before_title'  => '<h2 class="singal widgettitle">',
	'after_title'   => '</h2>',
    ) );
}