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
            <h4 class="fat color-magenta">iOS</h4>
            <p>App im App Store:
                <a href="https://apps.apple.com/de/app/output-dd/id6449925282" target="_blank" rel="noopener"
                    class="button">
                    Link
                </a>
            </p>
            <h4 class="fat color-magenta">Android</h4>
            <p>
                Leider steht das Entwicklerkonto der TU Dresden für die Veröffentlichung von Android Apps für die
                diesjährige OUTPUT.DD nicht zur Verfügung.
                Die Android App kannst Du dennoch nutzen, indem Du der <a
                    href="https://groups.google.com/g/outputdd_2025" target="_blank" rel="noopener">Google Gruppe
                    OUTPUT.DD_2025</a> beitritts und dem Link in der Gruppennachricht folgst. Über diesen
                kannst Du die App aus dem <a href="https://play.google.com/store/apps/details?id=de.android.outputdd"
                    target="_blank" rel="noopener">Google Play Store</a> installieren.

            </p>
        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>