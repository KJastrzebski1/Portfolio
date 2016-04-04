<?php

require_once 'proj_slider.php';

function theme_enqueue_styles() {

    $parent_style = 'parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
function parallax_script(){
    //wp_enqueue_script('parallax', get_template_directory_uri().'/js/parallax.js');
    wp_enqueue_script('my_parallax', get_stylesheet_directory_uri().'/js/my_parallax.js');
    wp_enqueue_script('tweenmax', 'http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js');
    wp_enqueue_script('magicscroll', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js');
    wp_enqueue_script('animation_plugin', 'http://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.js');
    wp_enqueue_script('my_magicscroll', get_stylesheet_directory_uri().'/js/my_magicscroll.js', [], '1', true);
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
add_action('wp_enqueue_scripts', 'parallax_script');
function register_slider_widget() {
    register_widget( 'Slider_Widget' );
}
add_action( 'widgets_init', 'register_slider_widget' );