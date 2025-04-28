<?php /* Template Name: lan-party */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - LAN-Party Anmeldung</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $main_headline = "LAN-PARTY";
    $sub_headline = "MELDE DICH JETZT AN UND SEI DABEI!";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="lan-party" class="light-bg">
        <div class="wrapper col gap-3">
            <h2>Anmeldung zur LAN-Party</h2>
            <div class="col">
                <h3>Wann?</h3>
                <p>13.06.2025 - 15.06.2025</p>
                <p> Freitag 16:00 Uhr bis Sonntag 18:00 Uhr</p>
                <br>
                <h3>Wo?</h3>
                <p>Medienkulturzentrum Dresden e.V.</p>
                <p>Kraftwerk Mitte 3, 01067 Dresden</p>
                <p><a href="https://maps.app.goo.gl/ktrWXyjCNQ331oo47" target="_blank">Google Maps Link</a></p>
                <!-- TODO: Map embedden -->
                <h3>Wer?</h3>
                <p>Frei für jeden zugänglich, begrenzt auf maximal 50 Teilnehmer</p>
                <br>
                <h3>Kosten</h3>
                <p>Teilnahmegebühr: 15€ pro Person</p>
                <br>
                <h3>Weitere Informationen</h3>
                <p>Weitere Infos zur LAN-Party und zu den Tickets gibt es auf unserem Discord-Server.</p>
                <a href="https://discord.com/invite/XuvpKwggVA">Zu unserem Discord-Kanal</a>

                <!-- TODO: Button zu Discord einbauen -->
            </div>


    <?php
    include get_template_directory() . "/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>