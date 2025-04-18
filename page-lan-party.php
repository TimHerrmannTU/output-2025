<?php /* Template Name: lan-party */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - LAN-Party Anmeldung</title>
    <?php wp_head(); ?>
</head>

<body class="no-big-cube">
    <?php
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php";
    $main_headline = "LAN-PARTY";
    $sub_headline = "MELDE DICH JETZT AN UND SEI DABEI!";
    include get_template_directory() . "/includes/banner-slim.php";
    ?>

    <div id="lan-party" class="light-bg">
        <div class="wrapper col gap-3">
            <h2>Anmeldung zur LAN-Party</h2>
            <div class="col">
                <p><strong>Datum:</strong> 19. Juni 2025</p>
                <p><strong>Uhrzeit:</strong> 18:00 Uhr bis 00:00 Uhr</p>
                <p><strong>Standort:</strong> Hauptgebäude, Raum 101, Musterstraße 123, 12345 Musterstadt</p>
                <p><strong>Kosten pro Teilnehmer:</strong> 10€</p>
                <!-- TODO: add correct infos -->

                <ul class="indented">
                    <li>Bitte bringe deinen eigenen Computer/Laptop mit.</li>
                    <li>WLAN ist vorhanden.</li>
                </ul>
            </div>

            <p>Fülle das folgende Formular aus, um dich für unsere LAN-Party anzumelden:</p>

            <?php
            $submission_success = false;
            $age_error = false;

            // Verarbeite das Formular bei Submit
            if (isset($_POST['submit_lan_party'])) {
                // Altersüberprüfung
                if (isset($_POST['birthdate'])) {
                    $birthdate = new DateTime($_POST['birthdate']);
                    $today = new DateTime('now');
                    $age = $today->diff($birthdate)->y;

                    if ($age < 18) {
                        $age_error = true;
                        // TODO: Error anzeigen wenn man nicht 18 Jahre alt ist
                    } else {
                        $age_error = false;

                        // Erstelle neuen Teilnehmer über die Funktion
                        $post_id = create_lan_party_participant($_POST);

                        if (!is_wp_error($post_id)) {
                            $submission_success = true;
                        } else {
                            // Fehlerbehandlung bei Post-Erstellung
                            $submission_error = $post_id->get_error_message();
                        }
                    }
                }
            }

            if (!$submission_success) {
                ?>
                <form method="post" class="grid">
                    <?php if ($age_error): ?>
                        <div class="error-message p-3 bg-red color-white mb-2 full">
                            <p><strong>Fehler:</strong> Du musst mindestens 18 Jahre alt sein, um an dieser Veranstaltung teilnehmen zu können.</p>
                        </div>
                    <?php endif; ?>

                    <div class="labeled-input">
                        <label for="vorname">Vorname*</label>
                        <input type="text" id="vorname" name="vorname" required
                            value="<?php echo isset($_POST['vorname']) ? htmlspecialchars($_POST['vorname']) : ''; ?>">
                    </div>

                    <div class="labeled-input">
                        <label for="nachname">Nachname*</label>
                        <input type="text" id="nachname" name="nachname" required
                            value="<?php echo isset($_POST['nachname']) ? htmlspecialchars($_POST['nachname']) : ''; ?>">
                    </div>

                    <div class="labeled-input full">
                        <label for="ingame_name">Ingame-Name*</label>
                        <input type="text" id="ingame_name" name="ingame_name" required
                        value="<?php echo isset($_POST['ingame_name']) ? htmlspecialchars($_POST['ingame_name']) : ''; ?>">
                    </div>

                    <div class="col gap-1 labeled-input has-content">
                        <label for="birthdate">Geburtsdatum*</label>
                        <input
                            type="date"
                            id="birthdate"
                            name="birthdate"
                            required>
                    </div>

                    <div class="labeled-input">
                        <label for="email">E-Mail-Adresse*</label>
                        <input type="email" id="email" name="email" required
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    </div>

                    <div class="labeled-input full">
                        <label for="wishes">Weitere Wünsche (z.B. Sitzplätze)</label>
                        <textarea id="wishes" name="wishes" rows="3"></textarea>
                    </div>

                    <div class="full">
                        <label class="labeled-checkbox transparent">
                        <!-- TODO: Link zu den Datenschutzbestimmungen -->
                            <input type="checkbox" name="privacy_accepted" required>
                            <span>Ich akzeptiere die Datenschutzbestimmungen*</span>
                        </label>
                    </div>

                    <div class="full">
                        <label class="labeled-checkbox transparent">
                            <input type="checkbox" name="photo_consent" required>
                            <span>Ich bin damit einverstanden, dass Fotos von mir während der Veranstaltung gemacht und für Werbezwecke veröffentlicht werden können.</span>
                        </label>
                    </div>

                    <div class="mt-2">
                        <button type="submit" name="submit_lan_party" class="bg-magenta color-white">ANMELDEN</button>
                    </div>

                </form>
            <?php } else { ?>
                <div class="success-message p-3 bg-green color-white mb-2">
                    <p><strong>Erfolgreich!</strong> Deine Anmeldung zur LAN-Party wurde gespeichert.</p>
                </div>
            <?php } ?>
            
        </div>
    </div>

    <?php
    include get_template_directory() . "/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>