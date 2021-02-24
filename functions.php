<?php 
function load_stylesheets()
{
    wp_register_style('style_b',get_template_directory_uri() . '/css/style_b.css',array(),false,'all');
    wp_enqueue_style('style_b');

    wp_register_style('style',get_template_directory_uri() . '/style.css',array(),false,'all');
    wp_enqueue_style('style');

    wp_register_style('style',get_template_directory_uri().'/css/moving_text_style.css',array(),false,'all');
    wp_enqueue_style('style');
}
add_action('wp_enqueue_scripts','load_stylesheets');

function load_scripts(){
    wp_register_script('script',get_template_directory_uri() . '/js/script.js','',1,true);
    wp_enqueue_script('script');

    wp_register_script('slideshow_script',get_template_directory_uri().'/js/slideshow.js','',1,true);
    wp_enqueue_script('slideshow_script');
}
add_action('wp_enqueue_scripts','load_scripts');

add_theme_support('menus');

add_theme_support('post-thumbnails');

add_image_size('smallest',300,300,true); /// if images are already added it won't work unless you regenerate the images using a plugin

add_image_size('largest',500,500,true);

register_nav_menus(
    array(
        'top-menu'=>__('Top menu','theme'),
        'footer-menu'=>__('Footer menu','theme')
    )
);