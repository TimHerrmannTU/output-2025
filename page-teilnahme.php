<?php /* Template Name: teilnahme */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - Teilnahme</title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php
    $main_headline = "TEILNAHME";
    $sub_headline = "WERDE TEIL VON OUTPUT.DD";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-3">
            <div class="col gap-2 mt-3">
            <p>TODO: add stuff</p>
            </div>
        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>