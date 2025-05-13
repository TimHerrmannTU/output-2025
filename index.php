<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <div class="head">
        <?php 
        include get_template_directory() . "/includes/tud-navbar.php";
        include get_template_directory() . "/includes/navbar.php"; 
        include get_template_directory() . "/includes/mobile-navbar.php"; 
        ?>

        <div id="banner" class="full">
            <div class="wrapper" style="position: relative;">
                <div class="text-content col">
                    <h2>DIE PROJEKTSCHAU DER INFORMATIK</h2>
                    <h2>19. JUNI 2025</h2>
                    <h3>WERDE TEIL VON OUTPUT UND<br> REICHE DEIN PROJEKT BIS 5. JUNI EIN!</h3>
                    <button class="white transparent-text mt-3" onclick="location.href='/projekt-einreichen'">PROJEKT EINREICHEN</button>
                </div>
            </div>
        </div>
    </div>
    <?php include get_template_directory() . "/includes/cube.php"; ?>

    <div class="light-bg">
        <div class="main wrapper">
            <img class="banner-img" src="https://output-dd.de/wp-content/uploads/2025/04/ballons.jpg">
            <div class="text-wrapper dark-bg col gap-2">
                <h3 class="fat color-magenta">DIE PROJEKTSCHAU DER FAKULTÄT INFORMATIK AN DER TU DRESDEN</h3>
                <p>
                    Einmal im Jahr präsentieren Studenten und Mitarbeiter ihre Ergebnisse aus Lehre und Forschung der Öffentlichkeit. 
                    Dich erwarten spannende Installationen, Workshops, Vorträge und Ausstellungen. 
                    Zudem bietet OUTPUT.DD die Gelegenheit, mit Unternehmen über aktuelle Forschungsfragen ins Gespräch zu kommen.
                </p>
                <p class="fat">
                    Die Veranstaltung ist offen für alle.<br>Wir freuen uns auf dich!
                </p>
            </div>
        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/challenges.php";
    include get_template_directory() ."/includes/carousels/projekte.php";
    include get_template_directory() ."/includes/carousels/sponsoren.php";
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>