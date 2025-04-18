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

// adjust upload limits
@ini_set( "upload_max_size", "256M" );
@ini_set( "post_max_size", "256M");
@ini_set( "max_execution_time", "300" );


// creates project post from form fields
add_action('admin_post_nopriv_submit_project_post', 'handle_project_post_submission');
add_action('admin_post_submit_project_post', 'handle_project_post_submission');
function handle_project_post_submission() {
    /*
    // DEBUGGING
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    exit;
    */
    // Ensure the form was submitted via POST
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        wp_die('Invalid request method.');
    }

    // Sanitize and create post data
    $post_data = [
        'post_title'   => sanitize_text_field($_POST['details-name']),
        'post_content' => sanitize_textarea_field($_POST['details-description']),
        'post_status'  => 'pending',
        'post_type'    => 'projekte',
    ];
    
    $post_id = wp_insert_post($post_data);
    // assign taxonomy to post
    wp_set_object_terms( $post_id, "project-".$_POST["category"], "project-type" );
    
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
        
        wp_redirect(home_url()); // Redirect after successful submission
    } else {
        wp_die('Post creation failed');
    }
}

// creates posts of the type creative-challenge based on form fields
add_action('admin_post_nopriv_submit_art_post', 'handle_art_post_submission');
add_action('admin_post_submit_art_post', 'handle_art_post_submission');
function handle_art_post_submission() {
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

        wp_redirect(home_url()); // Redirect after successful submission
        exit;
    } else {
        wp_die('Post creation failed');
    }
}

/**
 * Erstellt einen neuen LAN-Party-Teilnehmer und speichert die Formularfelder
 *
 * @param array $form_data Die Formulardaten aus $_POST
 * @return int|WP_Error Die Post ID des erstellten Teilnehmers oder WP_Error
 */
function create_lan_party_participant($form_data) {
    $new_post = [
        "post_title" => sanitize_text_field($form_data['vorname']) . " " . sanitize_text_field($form_data['nachname']),
        "post_content" => "",
        "post_status" => "publish",
        "post_type" => "lan-party-teilnehmer",
    ];
    $post_id = wp_insert_post($new_post);

    if ($post_id && !is_wp_error($post_id)) {
        // Insert ACF fields
        update_field('lan-party-teilnehmer-intern-vorname', sanitize_text_field($form_data['vorname']), $post_id);
        update_field('lan-party-teilnehmer-intern-nachname', sanitize_text_field($form_data['nachname']), $post_id);
        update_field('lan-party-teilnehmer-intern-ign', sanitize_text_field($form_data['ingame_name']), $post_id);
        update_field('lan-party-teilnehmer-intern-alter', sanitize_text_field($form_data['birthdate']), $post_id);
        update_field('lan-party-teilnehmer-intern-email', sanitize_email($form_data['email']), $post_id);
        update_field('lan-party-teilnehmer-intern-wunsche', sanitize_textarea_field($form_data['wishes']), $post_id);

        update_field('lan-party-teilnehmer-intern-fotos', isset($form_data['photo_consent']) ? 1 : 0, $post_id);
        update_field('lan-party-teilnehmer-intern-datenschutzerklaerung', isset($form_data['privacy_accepted']) ? 1 : 0, $post_id);
    }

    return $post_id;
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