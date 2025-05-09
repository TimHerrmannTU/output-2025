<?php /* Template Name: about */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body id="about" <?php body_class(); ?>>
    <?php 
    $main_headline = "VIELEN DANK";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="challenges" class="light-bg">
        <div class="wrapper cards row gap-3">
            <div class="card cc col gap-1">
                <h3>CREATIVE CHALLENGE</h3>
                <img src="https://output-dd.de/wp-content/uploads/2025/04/challenge_creative_maus.png" style="max-width:500px"/>
            </div>
            <div class="col gap-1" style="align-self: center">
                <p>Dein Kunstwerk wurde in unsere Gallerie aufgenommen & fühlt sich dort pudelwohl!</p>
                <p>Komm am Veranstalltungstag vorbei & schau ob du einen unserer Preise ergattert hast!</p>
            </div>
        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>