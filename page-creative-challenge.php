<?php /* Template Name: creative-challenge */ ?>
<?php

// Verarbeitung des Formulars
if ($_POST && isset($_POST['action']) && $_POST['action'] === 'submit_art_post') {
    // Nonce-Überprüfung
    if (!wp_verify_nonce($_POST['submit_art_post_nonce'], 'submit_art_post_action')) {
        wp_die('Sicherheitsüberprüfung fehlgeschlagen');
    }

    // Datei-Upload-Überprüfung
    if (!isset($_FILES['upload']) || $_FILES['upload']['error'] !== UPLOAD_ERR_OK || empty($_FILES['upload']['name'])) {
        $error_message = 'Bitte lade eine Datei hoch.';
    } else {
        $maxFileSize = 50 * 1024 * 1024; // 50MB in Bytes

        if ($_FILES['upload']['size'] > $maxFileSize) {
            $error_message = 'Die Datei ist zu groß. Maximale Dateigröße: 50MB. Deine Datei: ' . round($_FILES['upload']['size'] / 1024 / 1024, 2) . 'MB';
        } else {
            // Weitere Verarbeitung der Datei hier...
            $success_message = 'Datei erfolgreich hochgeladen!';
        }
    }
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - CC Anmeldung</title>
    <?php wp_head(); ?>
</head>

<body id="creative-challenge" <?php body_class(); ?>>
    <?php
    $main_headline = "Creative Challenge: \"Würfelwelten\"";
    $sub_headline = "Schickt uns bis zum <b>15. Juni 2025</b> eure Designs zum Motto „Würfelwelten“ - entfaltet eure Kreativität und werdet Teil unserer Ausstellung!";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-3">
            <?php if (isset($error_message)): ?>
            <div class="error-message"
                style="background: #ff6b6b; color: white; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                <?php echo esc_html($error_message); ?>
            </div>
            <?php endif; ?>

            <?php if (isset($success_message)): ?>
            <div class="success-message"
                style="background: #51cf66; color: white; padding: 1rem; border-radius: 4px; margin-bottom: 1rem;">
                <?php echo esc_html($success_message); ?>
            </div>
            <?php endif; ?>

            <h2>FAQ</h2>
            <div class="col gap-3">
                <div class="col">
                    <h4>Wer darf teilnehmen?</h4>
                    <p>Alle Interessierten ab 18 Jahren dürfen je ein Kunstwerk einreichen.</p>
                </div>
                <div class="col">
                    <h4>Bis wann ist die Einreichung möglich?</h4>
                    <p>Kunstwerke können bis zum <b>15. Juni 2025</b> über das Formular auf dieser Seite eingereicht
                        werden.</p>
                </div>
                <div class="col" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Welche Kunstwerke werden akzeptiert?
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand" style="display: none">
                        <p>Sowohl digitale (2D und 3D) als auch traditionelle Kunstwerke, die sich um das Thema
                            „Würfelwelten“ drehen.</p>
                        <ul class="indented">
                            <li>Handgefertigte Zeichnungen oder Gemälde müssen eingescannt oder hochwertig
                                abfotografiert werden.</li>
                            <li>3D-Kunst wird nur als gerendertes Bild akzeptiert.</li>
                            <li><b>KI-generierte Bilder sind von der Teilnahme ausgeschlossen.</b></li>
                        </ul>
                    </div>
                </div>
                <div class="col" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Welche Formate dürfen eingereicht werden?
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <ul class="indented expand" style="display: none">
                        <li>Erlaubte Formate: <b>JPEG</b> oder <b>PNG</b>.</li>
                        <li>Dateibenennung: <b>Vorname_Nachname_Titel.jpg/png.</b></li>
                        <li>Fügt eurem Werk in dem Formular noch einen Titel und eine kurze Beschreibung eurer Idee
                            hinzu.</li>
                    </ul>
                </div>
                <div class="col" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Wann findet die Siegerehrung statt?
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand col gap-1" style="display:none;">
                        <p>Die Siegerehrung der Creative Challenge erfolgt im Rahmen von <b>OUTPUT.DD</b> am <b>19.
                                Juni
                                2025</b> im <b>Andreas Pfitzmann Bau</b>.
                        </p>
                        <p>
                            <b>Hinweis:</b> Zur Entgegennahme der Preise ist die Anwesenheit bei der
                            Präsenzveranstaltung in Dresden erforderlich. Eine digitale Übergabe ist nicht möglich.
                        </p>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2509.495772963505!2d13.72039477749953!3d51.025463471707724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4709c5e2c98006a1%3A0x4cea042f340698d5!2sTUD%20%7C%20Andreas-Pfitzmann-Bau%20(APB)%20%7C%20Fakult%C3%A4t%20Informatik!5e0!3m2!1sde!2sde!4v1746539276113!5m2!1sde!2sde"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Was ist bei der Einreichung zu beachten?
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <ul class="indented expand" style="display:none;">
                        <li><b>Plagiate</b> und Verstöße gegen die Teilnahmebedingungen führen zum Ausschluss.</li>
                        <li>Mit der Teilnahme wird der Veranstalter berechtigt, das eingereichte Bild für Werbezwecke zu
                            nutzen und am <b>19. Juni 2025</b> auszustellen.</li>
                        <li>Die <b>Urheberrechte</b> verbleiben vollständig bei den Künstler*innen.</li>
                    </ul>
                </div>
                <div class="col" dd-function="expandable">
                    <h4 dd-function="trigger">
                        Was gibt es zu gewinnen?
                        <div class="icon ml-1">
                            <span class="iconify" data-icon="mdi-chevron-down">
                        </div>
                    </h4>
                    <div class="expand" style="display: none">
                        <p>
                            Wir küren die drei besten Kunstwerke - und zwar doppelt. Einmal durch unsere Jury und einmal
                            durch das Publikum vor Ort. Man kann also bestenfalls zweimal auf dem Treppchen landen und
                            somit zwei Preise gewinnen.
                        </p>
                        <ul class="indented">
                            <li>2 x 1. Platz: Wunschgutschein im Wert von 50€, Pokal, Urkunde</li>
                            <li>2 x 2. Platz: Wunschgutschein im Wert von 30€, Urkunde</li>
                            <li>2 x 3. Platz: Wunschgutschein im Wert von 20€, Urkunde</li>
                        </ul>
                        <p>
                            Außerdem erhalten alle Teilnehmenden eine Teilnehmerurkunde und ein paar Goodies - solange
                            der Vorrat reicht.
                        </p>
                    </div>
                </div>
                <p>Wir freuen uns auf eure kreativen Einsendungen!</p>
            </div>
            <h2 class="mt-3">Anmeldung zur Creative-Challenge</h2>
            <form id="cc-register-form" class="grid" action="<?= esc_url(get_permalink()); ?>" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit_art_post">
                <?php wp_nonce_field('submit_art_post_action', 'submit_art_post_nonce'); ?>
                <div class="labeled-input c1">
                    <label for="firstname">Vorname</label>
                    <input name="firstname" type="text" required>
                </div>
                <div class="labeled-input c2">
                    <label for="lastname">Nachname</label>
                    <input name="lastname" type="text" required>
                </div>
                <div class="labeled-input c1">
                    <label for="email">Email</label>
                    <input name="email" type="email">
                </div>
                <div class="labeled-input c2">
                    <label for="adress">Künstlername</label>
                    <input name="adress" type="text">
                </div>
                <div class="labeled-input c1">
                    <label for="title">Title</label>
                    <input name="title" type="text">
                </div>
                <div class="file-upload col gap-1 c2" dd-function="file-upload-trigger" key="1"
                    style="grid-row:span 2;">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="upload">
                        Lade hier dein Kunstwerk hoch<br>
                        (Drag and Drop oder klicke hier)<br>
                        Maximale Dateigröße: 50MB
                    </label>
                    <img class="preview" src="">
                </div>
                <input name="upload" type="file" accept="image/*" dd-function="file-upload-input" key="1"
                    data-max-size="50000000" required>
                <div class="labeled-input c1">
                    <label for="description">Beschreibung</label>
                    <textarea name="description"> </textarea>
                </div>

                <div class="row gap-3" style="justify-content:space-between; grid-column: span 2;">
                    <label class="labeled-checkbox transparent">
                        <input name="agb" type="checkbox" required>
                        <span>Ich habe die überliegenden Teilnahmebedingungen gelesen und akzeptiere sie</span>
                    </label>
                    <input class="bg-magenta color-white" type="submit" value="Absenden">
                </div>
            </form>
        </div>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const fileInput = document.querySelector('input[name="upload"]');
        const maxSizeInMB = 50;
        const maxSizeInBytes = maxSizeInMB * 1024 * 1024;

        fileInput.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                if (file.size > maxSizeInBytes) {
                    alert(
                        `Die Datei ist zu groß. Maximale Dateigröße: ${maxSizeInMB}MB. Ihre Datei: ${(file.size / 1024 / 1024).toFixed(2)}MB`
                    );
                    e.target.value = '';
                    return false;
                }
            }
        });
    });
    </script>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>