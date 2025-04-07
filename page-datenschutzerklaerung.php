<?php /* Template Name: datenschutzerklaerung */ ?>
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
    $main_headline = "DATENSCHUTZERKLÄRUNG";
    $sub_headline = " ";
    include get_template_directory() . "/includes/banner-slim.php"; 
    ?>

    <div id="impressum" class="light-bg mb-6">
        <div class="wrapper col gap-2 pt-5">
            <p>
                Die TU Dresden verarbeitet im Rahmen der Nutzung des öffentlich zugänglichen Webangebots 
                (<a class="color-magenta" href="https://output-dd.de">https://output-dd.de</a>) personenbezogene 
                Daten nur in Form von Cookies, die ausschließlich zur Erbringung der Dienstleistung zwingend 
                erforderlich sind. Das heißt insbesondere werden keine sogenannten Tracking-Cookies genutzt, 
                um Nutzer*innenbewegungen und das Surfverhalten der Nutzenden unserer Seite zu erfassen bzw. 
                zu analysieren.
            </p>
            <div class="col gap-1">
                <h4>Rechtsgrundlage</h4>
                <p>Rechtsgrundlage hierfür ist Art. 6 Abs. 1 lit. f DSGVO.</p>
            </div>
            <div class="col gap-1 indented">
                <h4>Rechte betroffener Personen</h4>
                <ul>
                    <li>
                        Sie haben das Recht, von der TU Dresden Auskunft über die zu Ihrer Person gespeicherten 
                        Daten zu erhalten und/oder unrichtig gespeicherte Daten berichtigen zu lassen.
                    </li>
                    <li>
                        Sie haben das Recht auf Löschung oder auf Einschränkung der Verarbeitung oder ein 
                        Widerspruchsrecht gegen die Verarbeitung.
                    </li>
                    <li>
                        Sie können sich jederzeit an den Datenschutzbeauftragten der TU Dresden wenden:
                    </li>
                </ul>
                <p class="elevated-box">
                    <b>TUD Datenschutzbeauftragter</b><br>
                    01062 Dresden<br>
                    <b>Tel.:</b> <a class="color-magenta" href= "tel:+49 (0) 351 463 32839">+49 (0) 351 463 32839</a><br>
                    <b>Fax :</b> <a class="color-magenta" href= "tel:+49 (0) 351 463 39718">+49 (0) 351 463 39718</a><br>
                    <b>E-Mail:</b> <a class="color-magenta" href= "mailto:informationssicherheit@tu-dresden.de">informationssicherheit@tu-dresden.de</a><br>
                    <a class="color-magenta" href="https://tu-dresden.de/informationssicherheit">https://tu-dresden.de/informationssicherheit</a>
                </p>
                <ul>
                    <li>
                        Sie haben weiterhin das Recht auf Beschwerde bei einer Aufsichtsbehörde, wenn Sie 
                        der Ansicht sind, dass die Verarbeitung der Sie betreffenden personenbezogenen Daten 
                        gegen die Rechtsvorschriften verstößt. Die zuständige Aufsichtsbehörde für den Datenschutz ist:
                    </li>
                </ul>
                <p class="elevated-box">
                    <b>Sächsischer Datenschutzbeauftragter</b><br>
                    Postfach 11 01 32<br>
                    01330 Dresden<br>
                    <b>Tel.:</b> <a class="color-magenta" href= "tel:+49 (0) 35185471 101">+49 (0) 35185471 101</a><br>
                    <b>Fax :</b> <a class="color-magenta" href= "tel:+49 (0)351/85471 109">+49 (0)351/85471 109</a><br>
                    <b>E-Mail:</b> <a class="color-magenta" href= "mailto:saechsdsb@slt.sachsen.de">saechsdsb@slt.sachsen.de</a><br>
                    <a class="color-magenta" href="https://www.saechsdsb.de/">https://www.saechsdsb.de/</a>
                </p>
            </div>
        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>