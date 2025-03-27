<?php /* Template Name: geo-caching */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body class="no-big-cube" <?php body_class(); ?>>
    <?php 
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php"; 
    $main_headline = "Geo Chaching challenge";
    $sub_headline = "Irgendwas mit Boxen finden oder so.";
    include get_template_directory() . "/includes/banner-slim.php"; 
    
    // CUSTOM CONTENT HERE
    $sub_page_name = $_GET["sub"];
    include get_template_directory() ."/includes/geocaching/" . $sub_page_name . ".php";
    
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>