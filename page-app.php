<?php /* Template Name: app */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body id="app" <?php body_class(); ?>>
    <?php
    $main_headline = "DIE OUTPUT.DD APP";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-3">
            <h3 class="fat color-magenta">HOL DIR DIE OUTPUT.DD APP</h3>
            <p>
                Mit der OUTPUT.DD App hast du alle Informationen zur Veranstaltung immer dabei.
                Du kannst dir die Projekte anschauen, das Programm einsehen und dich über die Sponsoren informieren.
            </p>
            <br>
            <h4 class="fat color-magenta">iOS</h2>
                <p>App im App Store:
                    <a href="https://apps.apple.com/de/app/output-dd/id6449925282" target="_blank" rel="noopener"
                        class="button">
                        Link
                    </a>
                </p>
                <br>
                <h4 class="fat color-magenta">Android</h2>
                    <p>
                        Leider gab es dieser Jahr technische Probleme mit der Android App, weshalb sie nicht öffentlich
                        verfügbar ist.<br>
                        Um die App herunterladen zu können, musst du mit deinem Google-Play-Account <a
                            href="https://groups.google.com/g/outputdd_2025" target="_blank" rel="noopener">unserer
                            Google-Gruppe beitreten (klicke hier)</a>.<br>Daraufhin wird man als Beta-Tester der App
                        eingeladen und kann man die App im <a
                            href="https://play.google.com/store/apps/details?id=de.android.outputdd" target="_blank"
                            rel="noopener">Play Store (klicke hier)</a> herunterladen.

                    </p>
        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>