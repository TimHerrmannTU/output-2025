<?php /* Template Name: sponsoren */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body id="sponsoren" <?php body_class(); ?>>
    <?php 
    $main_headline = "SPONSOREN";
    $sub_headline = "Wir danken allen Spendern und Sponsoren für ihre finanzielle Unterstützung. Ohne diese wären unsere Events in dieser Vielfalt nicht möglich.";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper">
            <?php include get_template_directory() ."/includes/sponsoren.php"; ?>
        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>