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
    $main_headline = "WILLKOMEN BEI OUTPUT";
    $sub_headline = "Am 19. Juni 2025 präsentiert OUTPUT zum 19. Mal die aktuellen Projekte der Fakultät Informatik";
    $cube = true;
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper">
            <div class="w-50 dark-bg col gap-2" style="padding:5rem">
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

    
    <div class="dark-bg">
        <div class="wrapper">
            <iframe class="youtube-video" src="https://www.youtube.com/embed/3JxKSIGQSjU?si=xJhftlXFxSvEQCG9" 
                frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
            </iframe>
        </div>
    </div>
    
    <div class="light-bg">
        <div class="wrapper">
            <h1 class="pb-2">Neuigkeiten</h1>
        </div>
    </div>

    <?php include get_template_directory() ."/includes/carousels/projekte.php"; ?>

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