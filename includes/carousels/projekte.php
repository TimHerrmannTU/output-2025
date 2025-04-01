<?php
$car_settings = array(
    "title" => "Projekte",
    "button_text" => "Alle Projekte entdecken ...",
    "color" => "cyan",
    "post_type" => "projekte",
    "max_posts_loaded" => 20,
    "items_per_slide" => 4,
    "acf_img_field_name" => "project-details-thumbnail",
    "labeled" => true,
    "acf_label_field_name" => "project-details-name",
);
include get_template_directory() ."/includes/carousels/carousel.php";
?>