<?php /* Template Name: teilnahme */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - Teilnahme</title>
    <?php wp_head(); ?>
</head>
<body id="teilnahme" <?php body_class(); ?>>
    <?php
    $main_headline = "TEILNAHME";
    $sub_headline = "WERDE TEIL VON OUTPUT.DD";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-3">
            <p>Wir freuen uns, dass Sie dabei sind! Auf dieser Seite finden Sie Informationen und Hinweise zur Veranstaltung.</p>
            <div class="col gap-2">
                
                <h2>Teilnahme als Sponsor</h2>
                <p>Wir danken allen Spendern und Sponsoren für ihre finanzielle Unterstützung. Ohne diese wären unsere Events in dieser Vielfalt nicht möglich.</p>

                <div class="col gap-1" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Organisatorische Hinweise
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand col gap-1" style="display: none">
                        <p>
                            Teilen Sie uns bitte die Namen des Standpersonals bis einer Woche vor Veranstaltung 
                            für die Erstellung der Namensschilder und der WLAN-Logins mit. Der Standplan wird auf 
                            dieser Seite für Sie bereitgestellt. Das Parken vor dem Haus ist nur für das Ab- bzw. 
                            Beladen möglich. Bitte nutzen Sie die reservierte Parkfläche neben unserem Gebäude (3. Ebene).
                        </p>
                        <p>Bitte senden Sie uns für die Abbildung unserer Förderer das ausgefüllte Firmenprofil sowie ein druckfähiges Logo zu.</p>
                        <a class="color-magenta" href="https://output-dd.de/wp-content/uploads/2018/04/Profil-OUTPUT-CONTACT_Fragebogen_blank.rtf">Firmenprofil herunterladen</a>
                    </div>
                </div>

                
                <div class="col gap-1" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Aufbau und Abbau
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand col gap-1" style="display: none">
                        <p><strong>Aufbau</strong> zwischen 12:00 und 13:00 Uhr</p>
                        <p><strong>Abbau</strong> ab 18:30 Uhr am Ausstellungstag</p>
                    </div>
                </div>

                <div class="col gap-1" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Standplatz und Ausstattung
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand col gap-1" style="display: none">
                        <p>
                            Größe von 2x3 m<br>
                            1 Seminarraumtisch<br>
                            2 Seminarraum-Stühle<br>
                            Stromanschluss (Verteilerdose ist selbst mitzubringen)<br>
                            WLAN-Login
                        </p>
                    </div>
                </div>

                <div class="col gap-1" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Programm
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand col gap-1" style="display: none">
                        <p>
                            Um einen Vortrag für OUTPUT einzureichen, muss dieser als Projekt hier angemeldet werden. 
                            Mit dieser Anmeldung wird der Vortrag sowohl auf der Webseite als auch in der OUTPUT-App angezeigt.
                        </p>
                    </div>
                </div>
                
                <div class="col gap-1" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Versorgung
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand col gap-1" style="display: none">
                        <p>
                            Unser Studentencafé Ascii bietet Ihnen während der Veranstaltung Kaffee, Tee und kalte Getränke an. 
                            Zudem haben wir Automaten für Getränke und Snacks.
                        </p>
                        <p>Ab 18:00 Uhr gibt es Gegrilltes und Getränke in der OUTPUT Lounge.</p>
                    </div>
                </div>

            </div>

        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>