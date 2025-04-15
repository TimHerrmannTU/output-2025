<?php /* Template Name: impressum */ ?>
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
    $main_headline = "IMPRESSUM";
    $sub_headline = " ";
    include get_template_directory() . "/includes/banner-slim.php"; 
    ?>

    <div id="impressum" class="light-bg">
        <div class="wrapper col gap-2">
            <p>Es gilt das <a class="color-magenta" href="https://tu-dresden.de/impressum">Impressum der TU Dresden</a> mit folgenden Abweichungen:</p>
            <div class="col gap-1">
                <h3>VERANTWORTLICHKEIT</h3>
                <p>
                    Bei inhaltlichen Fragen wenden Sie sich bitte an:<br>
                    Prof. Dr.-Ing. habil. Rainer Groh<br>
                    Technische Universität Dresden<br>
                    DE - 01062 Dresden<br>
                    <b>E-Mail:</b> <a class="color-magenta" href= "mailto:output@tu-dresden.de">output@tu-dresden.de</a><br>
                    <b>Telefon:</b> <a class="color-magenta" href= "tel:(+49) 351 463 39186">(+49) 351 463 39186</a>
                </p>
            </div>
            <div class="col gap-1">
                <h4>TECHNISCHE UMSETZUNG</h4>
                <p>
                    Technische Universität Dresden<br>
                    Fakultät Informatik<br>
                    Institut für Software- und Multimediatechnik<br>
                    Lehrstuhl für Mediengestaltung<br>
                    Nöthnitzer Str. 46<br>
                    01187 Dresden<br>
                    <b>Leitung:</b> Prof. Dr.-Ing. habil. Rainer Groh<br>
                    <b>E-Mail:</b> <a class="color-magenta" href= "mailto:output@tu-dresden.de">output@tu-dresden.de</a>
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