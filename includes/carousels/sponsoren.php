<?php
$car_settings = array(
    "title" => "Sponsoren",
    "button_text" => "Alle Sponsoren erkunden ...",
    "color" => "purple",
    "post_type" => "sponsoren",
    "max_posts_loaded" => -1,
    "items_per_slide" => 5,
    "acf_img_field_name" => "sponsor-details-logo",
    "labeled" => false,
    "acf_label_field_name" => "",
);
include get_template_directory() ."/includes/carousels/carousel.php";
?>