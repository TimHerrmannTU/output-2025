<?php
// scripts & css that will be loaded into every html page
function load_static_folder() {
    // CSS
    wp_enqueue_style('main-style', get_template_directory_uri() . '/static/css/main.css');
    // JS
    wp_enqueue_script('jquery');
    wp_enqueue_script('main', get_template_directory_uri() . '/static/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('carousel', get_template_directory_uri() . '/static/js/carousel.js', array('jquery'), null, true);
    wp_enqueue_script('iconify', get_template_directory_uri() . '/static/js/iconify.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'load_static_folder');

// hides wordpress bar on top of the the page if user is logged in
add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

// remap authors (Why? Only authors can edit their posts! It is not enough to assign them via a acf...)
function remap_all_authors() {
    $args = [
        'post_type' => 'projekte', // Set your custom post type, or use 'post' for default posts
        'posts_per_page' => -1,  // Get all posts
        'post_status' => 'any'   // You can adjust this to filter only published, drafts, etc.
    ];
    $posts = get_posts($args);
    
    // Iterate over all posts and update the author based on the ACF field
    foreach ($posts as $post) {
        // Get the user ID from the ACF field
        $user_id = get_field("project-intern-user", $post->ID);
        
        if ($user_id) {
            $user = get_user_by('id', $user_id);
            if ($user && !in_array('administrator', $user->roles)) {
                // Update the post author to the user fetched from ACF
                wp_update_post([
                    'ID' => $post->ID,
                    'post_author' => $user_id
                ]);
            }
        }
    }
}
// remap_all_authors();


// Redirect the custom URL for form submission handling
add_action('template_redirect', 'handle_custom_form_submission');
function handle_custom_form_submission() {
    // Check if the current page is the "submit-post" page
    if (is_page('page-projekt-einreichen')) {
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_project_post_nonce']) && wp_verify_nonce($_POST['submit_project_post_nonce'], 'submit_project_post_action')) {
            handle_project_post_submission();
        }
        // Optionally, you can prevent WordPress from loading the rest of the page
        exit;
    }
    if (is_page('page-creative-challenge')) {
        // Handle form submission
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_art_post_nonce']) && wp_verify_nonce($_POST['submit_art_post_nonce'], 'submit_art_post_action')) {
            handle_art_post_submission();
        }
        // Optionally, you can prevent WordPress from loading the rest of the page
        exit;
    }
}

// creates project post from form fields
add_action('template_redirect', 'handle_project_post_submission');
function handle_project_post_submission() {
    if (!isset($_POST['submit_project_post_nonce'])) {
        return; // Not a project post submission
    }
    // Verify the nonce
    if (!isset($_POST['submit_project_post_nonce']) || !wp_verify_nonce($_POST['submit_project_post_nonce'], 'submit_project_post_action')) {
        wp_die('Nonce verification failed!', 'Security check', ['response' => 403]);
    }
    // Ensure the form was submitted via POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method.');
    }

    // Sanitize and create post data
    $current_user = get_current_user_id();
    $post_data = [
        'post_title'   => sanitize_text_field($_POST['details-name']),
        'post_content' => sanitize_textarea_field($_POST['details-description']),
        'post_status'  => 'pending',
        'post_type'    => 'projekte',
        'post_author'  => $current_user,
    ];
    $_POST["intern-user"] = $current_user;
    
    $post_id = wp_insert_post($post_data);
    // assign taxonomy to post
    wp_set_object_terms( $post_id, "project-".$_POST["category"], "project-type" );
    // get all output-year taxonomies & get the latest year
    $terms = get_terms( array(
        'taxonomy'   => 'output-year',
        'hide_empty' => false,
        'order' => 'desc'
    ) );
    $next_output = $terms[0]->slug;
    wp_set_object_terms( $post_id, $terms[0]->slug, "output-year" );
    
    // create ACF entries
    // $_POST does not contain the image, it is in $_FILE => no exclusion needed
    if ($post_id && !is_wp_error($post_id)) { // was the post created succesfully?
        foreach ($_POST as $field => $value) {
            $acf_field_name = "project-" . $field;
            if ($value === "on") { // Handle checkbox
                update_field($acf_field_name, 1, $post_id);
            } else { // Normal text input
                update_field($acf_field_name, sanitize_text_field($value), $post_id);
            }
        }
        handle_file_upload("details-thumbnail","project-details-thumbnail", $post_id);
        handle_file_upload("details-upload","project-details-upload", $post_id);
        
        wp_redirect(get_permalink($post_id)); // Redirect after successful submission
    } else {
        wp_die('Post creation failed');
    }
}

// creates posts of the type creative-challenge based on form fields
add_action('template_redirect', 'handle_art_post_submission');
function handle_art_post_submission() {
    if (!isset($_POST['submit_art_post_nonce'])) {
        return; // Not a project post submission
    }
    // Verify the nonce
    if (!isset($_POST['submit_art_post_nonce']) || !wp_verify_nonce($_POST['submit_art_post_nonce'], 'submit_art_post_action')) {
        wp_die('Nonce verification failed!', 'Security check', ['response' => 403]);
    }
    // Ensure the form was submitted via POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method.');
    }

    // Sanitize and create post data
    $post_data = [
        'post_title'   => sanitize_text_field($_POST['firstname']) . " " . sanitize_text_field($_POST['lastname']),
        'post_content' => sanitize_textarea_field($_POST['desc']),
        'post_status'  => 'pending',
        'post_type'    => 'creative-challenge',
    ];

    $post_id = wp_insert_post($post_data);
    if ($post_id && !is_wp_error($post_id)) { // was the post created succesfully?

        // create ACF entries
        foreach ($_POST as $post_key => $input_name) {
            $irrelevant_keys = ["agb", "upload"]; // these keys need custom treatment
            if (!in_array($post_key, $irrelevant_keys)) {
                update_field("creative-challenge-intern-".$post_key, sanitize_text_field($_POST[$post_key]), $post_id);
            }
        }

        // Checkbox field
        update_field("creative-challenge-intern-agb", isset($_POST["agb"]) ? true : false, $post_id);

        // File upload handling
        handle_file_upload("upload", "creative-challenge-intern-upload", $post_id);

        wp_redirect("/danke"); // Redirect after successful submission
        exit;
    } else {
        wp_die('Post creation failed');
    }
}

//////////////////////
// HELPER FUNCTIONS //
//////////////////////
function handle_file_upload($field_name, $acf_field_key, $post_id) {
    if (isset($_FILES[$field_name]) && !empty($_FILES[$field_name]['tmp_name'])) {
        $file = $_FILES[$field_name];
        $upload = wp_handle_upload($file, ['test_form' => false]);

        if (!isset($upload['error'])) {
            $attachment = [
                'post_mime_type' => $upload['type'],
                'post_title'     => sanitize_file_name($file['name']),
                'post_content'   => '',
                'post_status'    => 'inherit',
            ];

            $attach_id = wp_insert_attachment($attachment, $upload['file']);

            require_once ABSPATH . 'wp-admin/includes/image.php';

            $attach_data = wp_generate_attachment_metadata($attach_id, $upload['file']);
            wp_update_attachment_metadata($attach_id, $attach_data);

            // Assign the uploaded file to the ACF field
            update_field($acf_field_key, $attach_id, $post_id);

            return $attach_id;
        } else {
            error_log("File upload failed: " . $upload['error']);
        }
    }

    return false;
}
?>