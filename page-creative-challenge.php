<?php /* Template Name: creative-challenge */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - CC Anmeldung</title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <?php
    $main_headline = "Creative Challenge: \"Würfelwelten\"";
    $sub_headline = "Schickt uns bis zum <b>8. Juni 2025</b> eure Designs zum Motto „Würfelwelten“ - entfaltet eure Kreativität und werdet Teil unserer Ausstellung!";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="creative-challenge" class="light-bg">
        <div class="wrapper col gap-3">
            <h2>FAQ</h2>
            <div class="col gap-3">
                <div class="col">
                    <h4>Wer darf teilnehmen?</h4>
                    <p>Alle Interessierten ab 18 Jahren dürfen je ein Kunstwerk einreichen.</p>
                </div>
                <div class="col">
                    <h4>Bis wann ist die Einreichung möglich?</h4>
                    <p>Kunstwerke können bis zum <b>8. Juni 2025</b> über das Formular auf dieser Seite eingereicht
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
                    <div class="expand" style="display:none;">
                        <p>Die Siegerehrung der Creative Challenge erfolgt im Rahmen von <b>OUTPUT.DD</b> am <b>19. Juni
                                2025</b> im APB.</p>
                        <ul class="indented">
                            <li><b>Hinweis:</b> Zur Entgegennahme der Preise ist die Anwesenheit bei der
                                Präsenzveranstaltung in Dresden erforderlich. Eine digitale Übergabe ist nicht möglich.
                            </li>
                        </ul>
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
                <p>Wir freuen uns auf eure kreativen Einsendungen!</p>
            </div>
            <h2 class="mt-3">Anmeldung zur Creative-Challenge</h2>
            <form id="cc-register-form" class="grid" action="<?= admin_url('admin-post.php') ?>" method="POST"
                enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit_art_post">

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
                        (Drag and Drop oder klicke hier)
                    </label>
                    <img class="preview" src="">
                </div>
                <input name="upload" type="file" accept="image/*" dd-function="file-upload-input" key="1">
                <div class="labeled-input c1">
                    <label for="description">Beschreibung</label>
                    <textarea name="description"> </textarea>
                </div>

                <div class="row gap-3" style="justify-content:space-between; grid-column: span 2;">
                    <label class="labeled-checkbox transparent">
                        <input name="agb" type="checkbox" required>
                        <span>Ich habe die AGBs gelesen</span>
                    </label>
                    <input class="bg-magenta color-white" type="submit" value="Absenden">
                </div>
            </form>
        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>