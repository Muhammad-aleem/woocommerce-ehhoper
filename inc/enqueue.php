<?php
function eshopper_style_ndscriptd()
{
    wp_enqueue_style('bootstrap.min.css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style('font-awesome.min.css', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('css/prettyPhoto.css', get_template_directory_uri() . '/css/prettyPhoto.css');
    wp_enqueue_style('css/price-range.css', get_template_directory_uri() . '/css/price-range.css');
    wp_enqueue_style('animate.css', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('main.css', get_template_directory_uri() . '/css/main.css');
    wp_enqueue_style('css/responsive.css', get_template_directory_uri() . '/css/responsive.css');
    //     ==== js ===
    wp_enqueue_script('bootstrap.min.js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '1.1', true);
    wp_enqueue_script('jquery.scrollUp.min.js', get_template_directory_uri() . '/js/jquery.scrollUp.min.js', array(), '1.1', true);
    wp_enqueue_script('js/price-range.js', get_template_directory_uri() . '/js/price-range.js', array(), '1.1', true);
    wp_enqueue_script('js/jquery.prettyPhoto.js', get_template_directory_uri() . '/js/jquery.prettyPhoto.js', array(), '1.1', true);
}
add_action("wp_enqueue_scripts", 'eshopper_style_ndscriptd');
?>
