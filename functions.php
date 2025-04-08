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

function create_lan_party_visitor() {
    $new_post = [
        "post_title" => "test_user",
        "post_content" => "",
        "post_status" => "publish",
        "post_type" => "lan-party-teilnehmer",
    ];
    $post_id = wp_insert_post($new_post);
    if ($post_id && !is_wp_error($post_id)) {
        // insert ACF fields
        update_field('field_name_1', sanitize_text_field($_POST['field_name_1']), $post_id); // TODO adjust as needed
    }
}
?>