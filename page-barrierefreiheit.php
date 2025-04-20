<?php /* Template Name: barrierefreiheit */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php 
    $main_headline = "DATENSCHUTZERKLÄRUNG";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="impressum" class="light-bg">
        <div class="wrapper col gap-2">
            <p>
                Diese Erklärung zur Barrierefreiheit gilt für die unter 
                <a class="color-magenta" href="https://tu-dresden.de/impressum">Impressum der TU Dresden</a> 
                veröffentlichte Website.
            </p>
            <p>
                Die Professur für Mediengestaltung ist bemüht, ihre Websites und mobilen Anwendungen im Einklang 
                mit den Bestimmungen des Barrierefreie-Websites-Gesetz (BfWebG) sowie in Verbindung mit der 
                Barrierefreie-Informationstechnik-Verordnung (BITV 2.0) barrierefrei zugänglich zu machen.
            </p>
            <div class="col gap-1">
                <h4>Rechtsgrundlage</h4>
                <p>Rechtsgrundlage hierfür ist Art. 6 Abs. 1 lit. f DSGVO.</p>
            </div>
            <div class="col gap-1">
                <h3>Erstellung dieser Erklärung zur Barrierefreiheit</h3>
                <p>
                    Diese Erklärung wurde am 03.12.2021erstellt und zuletzt am 06.01.2022 aktualisiert. 
                    Grundlage der Erstellung dieser Erklärung zur Barrierefreiheit ist eine am 22.12.2021 
                    durchgeführte BITV-Selbstbewertung des SG 7.5 der TU Dresden.
                </p>
            </div>
            <div class="col gap-1">
                <h3>Stand der Vereinbarkeit mit den Anforderungen der BITV</h3>
                <p>
                    Diese Website ist wegen der folgenden Unvereinbarkeiten und/oder Ausnahmen teilweise 
                    mit den Vorgaben des BfWebG in Verbindung mit der BITV 2.0 vereinbar.
                </p>
                <p>
                    Wir verfügen über einen sehr umfangreichen und vielfältigen Webauftritt mit einer Vielzahl 
                    von Dokumenten. Dieser wurde vor dem 23. September 2018 veröffentlicht und entspricht daher 
                    nicht dem aktuellen Stand der Barrierefreiheit. Wir bemühen uns, die Barrieren abzubauen, 
                    können jedoch aufgrund der Ressourcenlage derzeit keinen vollumfänglich barrierefreien Webauftritt 
                    bereitstellen. Kontaktieren Sie uns telefonisch oder per Mail, wenn (Teile unserer) Inhalte 
                    für Sie nicht barrierefrei zugänglich sind. Wir bemühen uns dann die gewünschten Informationen 
                    bereitzustellen.
                </p>
            </div>
            <div class="col gap-1 indented">
                <ul>
                    <li>Alternativtexte für Grafiken und Bilder sind nicht in vollem Umfang vorhanden.</li>
                    <li>Kontraste bei Verlinkungen und im Überschriftenbereich sind zu gering.</li>
                    <li>Verlinkungen sind lediglich durch die Farbgebung von umgebenden Text unterscheidbar.</li>
                </ul>
            </div>
            <div class="col gap-1">
                <p>Sollten Ihnen Mängel in Bezug auf die barrierefreie Gestaltung auffallen, wenden Sie sich bitte an:</p>
                <p class="elevated-box">
                    <b>Prof. Dr.-Ing. habil. Rainer Groh</b><br>
                    Technische Universität Dresden<br>
                    DE – 01062 Dresden<br>
                    <b>E-Mail:</b> <a class="color-magenta" href= "mailto:output@tu-dresden.de">output@tu-dresden.de</a><br>
                </p>
            </div>
            <div class="col gap-1">
                <h3>Durchsetzungsverfahren</h3>
                <p>Wenn wir Ihre Rückmeldungen aus Ihrer Sicht nicht befriedigend bearbeiten, können Sie sich an die Sächsische Durchsetzungsstelle wenden:</p>
                <p class="elevated-box">
                    <b>Beauftragter der Sächsischen Staatsregierung für die Belange von Menschen mit Behinderungen</b><br>
                    Albertstraße 10, 01097 Dresden<br>
                    <b>Postanschrift:</b> Archivstraße 1, 01097 Dresden<br>
                    <b>Tel.:</b> <a class="color-magenta" href= "tel:0351 564-12161">0351 564-12161</a><br>
                    <b>Fax :</b> <a class="color-magenta" href= "tel:0351 564-12169">0351 564-12169</a><br>
                    <b>E-Mail:</b> <a class="color-magenta" href= "mailto:info.behindertenbeauftragter@sk.sachsen.de">info.behindertenbeauftragter@sk.sachsen.de</a><br>
                    <a class="color-magenta" href="https://www.inklusion.sachsen.de/">https://www.inklusion.sachsen.de/</a>
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