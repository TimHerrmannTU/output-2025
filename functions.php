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

// creative challange post submission
add_action('admin_post_nopriv_submit_art_post', 'handle_art_post_submission');
add_action('admin_post_submit_art_post', 'handle_art_post_submission');
function handle_art_post_submission() {
    // required fields
    if (!isset($_POST['first-name'])) return;

    $post_data = [
        'post_title'   => (sanitize_text_field($_POST['first-name'])." ".sanitize_text_field($_POST['first-name'])),
        'post_content' => '',
        'post_status'  => 'publish',
        'post_type'    => 'creative-challenge',
    ];

    $post_id = wp_insert_post($post_data);
    /*
    if ($post_id && !is_wp_error($post_id)) {
        $acf_map = array(
            "creative-challenge-intern-vorname" => "first-name",
            "creative-challenge-intern-nachname" => "last-name",
            "creative-challenge-intern-email" => "e-mail",
            "creative-challenge-intern-wohnort" => "adress",
            "creative-challenge-intern-job" => "job",
            "creative-challenge-intern-titel" => "title",
            "creative-challenge-intern-beschreibung" => "desc"
        );
        foreach ($acf_map as $acf_name => $input_name) {
            update_field($acf_name, $_POST[$input_name], $post_id);
        }

        wp_redirect(home_url()); // Or any success page you want
        exit;
    } else {
        wp_die('Post creation failed');
    }
    */
}
?>