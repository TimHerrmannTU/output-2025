<?php
function load_static_folder() {
    // CSS
    wp_enqueue_style('main-style', get_template_directory_uri() . '/static/css/main.css');
    // JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_template_directory_uri() . '/static/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('carousel', get_template_directory_uri() . '/static/js/carousel.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'load_static_folder');
?>