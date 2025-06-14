<?php /* Template Name: geo-caching */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body id="geo-caching" <?php body_class(); ?>>
    <?php
    $main_headline = "Geo Caching challenge";
    $sub_headline = "Irgendwas mit Boxen finden oder so.";
    include get_template_directory() . "/includes/narrow-head.php";

    // CUSTOM CONTENT HERE
    $sub_page_name = $_GET["sub"];
    if (empty($sub_page_name)) { // LANDING PAGE ?>
        <div class="light-bg">
            <div class="wrapper col gap-3">
                <div class="col gap-1">
                    <h3 class="pb-1">Was ist geocachen?</h3>
                    <a class="color-magenta" href="https://www.youtube.com/watch?v=1YTqitVK-Ts">https://www.youtube.com/watch?v=1YTqitVK-Ts</a>
                    <!-- <iframe width="1200" height="700" src="https://www.youtube.com/embed/1YTqitVK-Ts"></iframe> -->
                </div>
                <div class="col gap-1">
                    <h3 class="pb-1">Was brauch ich zum teilnehmen?</h3>
                    <p><strong>1.</strong> App zum Caches finden an den ermittelten Koordinaten.</p>
                    <table class="slim">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Link</th>
                                <th>Pro/Con</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Google Maps</td>
                                <td><a class="color-magenta" href="https://www.google.com/maps/">WEB</a></td>
                                <td>
                                    + minimaler Aufwand<br>
                                    - Koordinaten müssen in anderes Format konvertiert werden *
                                </td>
                            </tr>
                            <tr>
                                <td>OSMAND</td>
                                <td><a class="color-magenta" href="https://play.google.com/store/apps/details?id=net.osmand">Play-Store</a></td>
                                <td>
                                    + kein Setup nötig<br>
                                    + kein Account nötig<br>
                                    + beste Map-App<br>
                                    - unintuitves UI
                                </td>
                            </tr>
                            <tr>
                                <td>c:geo</td>
                                <td><a class="color-magenta" href="https://play.google.com/store/apps/details?id=cgeo.geocaching">Play-Store</a></td>
                                <td>
                                    + beste App fürs Cachen<br>
                                    - braucht GC-Account<br>
                                    - anspruchsvolleres Setup
                                </td>
                            </tr>
                            <tr>
                                <td>Offizielle App</td>
                                <td><a class="color-magenta" href="https://play.google.com/store/apps/details?id=com.groundspeak.geocaching.intro">Play-Store</a></td>
                                <td>
                                    + einsteigerfreundlich<br>
                                    - braucht GC-Account
                                </td>
                            </tr>
                        </tbody>
                    </table>

                <div class="col mb-1">
                    <p><strong>*</strong> "N" & "E" müssen an das Ende des Längen-/Breitengrades verschoben werden!</p>
                    <div class="row">
                        <p>Zum Beispiel: <span class="color-magenta">N51°01.000 E15°43.000</span></p>
                        <div class="icon ml-1 mr-1" style="margin-top:0.8rem;">
                            <div class="iconify" data-icon="mdi-arrow-right-thin"></div>
                        </div>
                        <a class="color-magenta"
                            href="https://www.google.com/maps/place/51%C2%B001.000N+15%C2%B043.000E">51°01.000N
                            15°43.000E</a>
                    </div>
                    
                    <p><strong>2.</strong> Ein Stift, um dich ins Logbuch einzutragen.</p>
                    <p><strong>3.</strong> Ein Notizblock, um die Rätsel zu lösen.</p>
                    <p><strong>4.</strong> Ca. 2 Stunden Zeit.</p>
                </div>
                <div class="col gap-1">
                    <h3 class="pb-1">Wie funktioniert die Challange?</h3>
                    <p>
                        Wir haben über den Campus Geocaches in Form von Würfeln versteckt. Unten findet ihr das erste Rätsel & ein Bonusrätsel.
                        Nachdem ihr eins von beiden gelöst habt, bekommt ihr die ersten Koordinaten für einen der Caches.
                        Nutzt jetzt gleich die Möglichkeit heraus zu finden, wie ihr Koordinaten in die App eurer Wahl eintragt!
                        Habt ihr den Würfel gefunden, findet ihr im Deckel des Würfels einen QR-Code, welcher euch zum nächsten Rätsel führt.
                        Löst es & findet die Koordinaten für den nächsten Würfel! Insgesamt haben wir 7 Würfel quer über den Campus versteckt.
                        <br>
                        Schaffst du es alle Rätsel zu lösen & den finalen Cache zu finden?
                    </p>
                </div>
                <div class="col gap-1">
                    <h3>TL;DR</h3>
                    <p><strong>1.</strong> Koordinaten eintragen.</p>
                    <p><strong>2.</strong> Würfel an den Koordinaten finden.</p>
                    <p><strong>3.</strong> QR im Deckel scanen.</p>
                    <p><strong>4.</strong> Rätsel lösen.</p>
                    <p><strong>5.</strong> Repeat...</p>
                    <p class="mt-1">
                        Im siebten Würfel ist kein QR-Code mehr vorhanden. Dafür können sich die ersten 3 Sucher ein Souvenir in Form von einem
                        kleinen Hünchenwürfel mitnehmen. Wer den Würfel zum Veranstalltungstag von OUTPUT mitbringt, bekommt ein paar Bonuspunkte
                        in der OUTPUT App & erhöht somit die Chancen tolle Preise zu gewinnen!
                    </p>
                </div>
                <div class="col gap-2">
                    <a class="color-yellow" href="/geo-caching/?sub=binary"><h2>Auf zum ersten Rätsel der Schnitzeljagd!</h2></a>
                    <a class="color-yellow" href="/geo-caching/?sub=rsa"><h2>Bonusrätsel: RSA Verschlüsselung</h2></a>
                </div>

                <p><strong>2.</strong> Ein Stift, um dich ins Logbuch einzutragen.</p>
                <p><strong>3.</strong> Ein Notizblock, um die Rätsel zu lösen.</p>
                <p><strong>4.</strong> Ca. 2 Stunden Zeit.</p>
            </div>
            <div class="col gap-1">
                <h3 class="pb-1">Wie funktioniert die Challenge?</h3>
                <p>
                    Wir haben über den Campus Geocaches in Form von Würfeln versteckt. Unten findet ihr das erste Rätsel
                    & ein Bonusrätsel.
                    Nachdem ihr eins von beiden gelöst habt, bekommt ihr die ersten Koordinaten für einen der Caches.
                    Nutzt jetzt gleich die Möglichkeit heraus zu finden, wie ihr Koordinaten in die App eurer Wahl
                    eintragt!
                    Habt ihr den Würfel gefunden, findet ihr im Deckel des Würfels einen QR-Code, welcher euch zum
                    nächsten Rätsel führt.
                    Löst es & findet die Koordinaten für den nächsten Würfel! Insgesamt haben wir 7 Würfel quer über den
                    Campus versteckt.
                    <br>
                    Schaffst du es alle Rätsel zu lösen & den finalen Cache zu finden?
                </p>
            </div>
            <div class="col gap-1">
                <h3>TL;DR</h3>
                <p><strong>1.</strong> Koordinaten eintragen.</p>
                <p><strong>2.</strong> Würfel an den Koordinaten finden.</p>
                <p><strong>3.</strong> QR im Deckel scanen.</p>
                <p><strong>4.</strong> Rätsel lösen.</p>
                <p><strong>5.</strong> Repeat...</p>
            </div>
            <div class="col gap-2">
                <a class="color-yellow" href="/geo-caching/?sub=binary">
                    <h2>Auf zum ersten Rätsel der Schnitzeljagd!</h2>
                </a>
                <a class="color-yellow" href="/geo-caching/?sub=rsa">
                    <h2>Bonusrätsel: RSA Verschlüsselung</h2>
                </a>
            </div>
        </div>
    </div>
    <?php }
    else { // CUSTOM CONTENT
        include get_template_directory() ."/includes/geocaching/" . $sub_page_name . ".php";
    }

    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>