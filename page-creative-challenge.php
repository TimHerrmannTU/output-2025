<?php /* Template Name: creative-challenge */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> - CC Anmeldung</title>
    <?php wp_head(); ?>
</head>
<body class="no-big-cube">
    <?php
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php";
    $main_headline = "Creative Challenge: \"Würfelwelten\"";
    $sub_headline = "Schickt uns bis zum <b>6. Juni 2025</b> eure Designs zum Motto „Würfelwelten“ - entfaltet eure Kreativität und werdet Teil unserer Ausstellung!";
    include get_template_directory() . "/includes/banner-slim.php";
    ?>

    <div class="light-bg mb-6">
        <div class="wrapper col gap-3 pt-5 pb-5">
            <h2>FAQ</h2>
            <div class="col gap-3">
                <div class="col">
                    <h4>Wer darf teilnehmen?</h4>
                    <p>Alle Interessierten ab 18 Jahren dürfen je ein Kunstwerk einreichen.</p>
                </div>
                <div class="col">
                    <h4>Welche Kunstwerke werden akzeptiert?</h4>
                    <p>Sowohl digitale (2D und 3D) als auch traditionelle Kunstwerke, die sich um das Thema „Würfelwelten“ drehen.</p>
                    <ul class="indented">
                        <li>Handgefertigte Zeichnungen oder Gemälde müssen eingescannt oder hochwertig abfotografiert werden.</li>
                        <li>3D-Kunst wird nur als gerendertes Bild akzeptiert.</li>
                        <li><b>KI-generierte Bilder sind von der Teilnahme ausgeschlossen.</b></li>
                    </ul>
                </div>
                <div class="col">
                    <h4>Welche Formate dürfen eingereicht werden?</h4>
                    <ul class="indented">
                        <li>Erlaubte Formate: <b>JPEG</b> oder <b>PNG</b>.</li>
                        <li>Dateibenennung: <b>Vorname_Nachname_Titel.jpg/png.</b></li>
                        <li>Fügt eurem Werk in dem Formular noch einen Titel und eine kurze Beschreibung eurer Idee hinzu.</li>
                    </ul>
                </div>
                <div class="col">
                    <h4>Bis wann ist die Einreichung möglich?</h4>
                    <p>Kunstwerke können bis zum <b>6. Juni 2025</b> über das Formular auf dieser Seite eingereicht werden.</p>
                </div>
                <div class="col">
                    <h4>Wann findet die Siegerehrung statt?</h4>
                    <p>Die Siegerehrung der Creative Challenge erfolgt im Rahmen von <b>OUTPUT.DD</b> am <b>19. Juni 2025</b> im APB.</p>
                    <ul class="indented">
                        <li><b>Hinweis:</b> Zur Entgegennahme der Preise ist die Anwesenheit bei der Präsenzveranstaltung in Dresden erforderlich. Eine digitale Übergabe ist nicht möglich.</li>
                    </ul>
                </div>
                <div class="col">
                    <h4>Was ist bei der Einreichung zu beachten?</h4>
                    <ul class="indented">
                        <li><b>Plagiate</b> und Verstöße gegen die Teilnahmebedingungen führen zum Ausschluss.</li>
                        <li>Mit der Teilnahme wird der Veranstalter berechtigt, das eingereichte Bild für Werbezwecke zu nutzen und am <b>19. Juni 2025</b> auszustellen.</li>
                        <li>Die <b>Urheberrechte</b> verbleiben vollständig bei den Künstler*innen.</li>
                    </ul>
                </div>
                <p>Wir freuen uns auf eure kreativen Einsendungen!</p>
            </div>
            <h2 class="mt-3">Anmeldung zur Creative-Challenge</h2>
            <form id="cc-register-form" class="col gap-3" action="<?= admin_url('admin-post.php') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit_art_post">
                
                <div class="row gap-3">
                    <div class="labeled-input">
                        <label for="first-name">Vorname</label>
                        <input name="first-name" type="text" required>
                    </div>
                    <div class="labeled-input">
                        <label for="last-name">Nachname</label>
                        <input name="last-name" type="text" required>
                    </div>
                </div>
                <div class="labeled-input">
                    <label for="e-mnail">Email</label>
                    <input name="e-mail" type="email">
                </div>
                <div class="labeled-input">
                    <label for="adress">Wohnort</label>
                    <input name="adress" type="text">
                </div>
                <div class="labeled-input">
                    <label for="job">Beschäftigung</label>
                    <input name="job" type="text">
                </div>
                <div class="row gap-3">
                    <div class="col gap-3 fg-1">
                        <div class="labeled-input">
                            <label for="title">Title</label>
                            <input name="title" type="text">
                        </div>
                        <div class="labeled-input" style="flex-grow: 1">
                            <label for="desc">Beschreibung</label>
                            <textarea name="desc"> </textarea>
                        </div>
                    </div>
                    <div id="upload-trigger" class="file-upload col gap-1">
                        <svg width="100" height="73" viewBox="0 0 100 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M25 73C18.1061 73 12.2159 70.6047 7.32955 65.8141C2.44318 61.0234 0 55.1682 0 48.2484C0 42.3172 1.7803 37.0323 5.34091 32.3937C8.90152 27.7552 13.5606 24.7896 19.3182 23.4969C21.2121 16.501 25 10.8359 30.6818 6.50156C36.3636 2.16719 42.803 0 50 0C58.8636 0 66.3826 3.0987 72.5568 9.29609C78.7311 15.4935 81.8182 23.0406 81.8182 31.9375C87.0455 32.5458 91.3826 34.8081 94.8296 38.7242C98.2765 42.6404 100 47.2219 100 52.4688C100 58.1719 98.0114 63.0195 94.0341 67.0117C90.0568 71.0039 85.2273 73 79.5455 73H54.5455C52.0455 73 49.9053 72.1065 48.125 70.3195C46.3447 68.5326 45.4545 66.3844 45.4545 63.875V40.3781L38.1818 47.45L31.8182 41.0625L50 22.8125L68.1818 41.0625L61.8182 47.45L54.5455 40.3781V63.875H79.5455C82.7273 63.875 85.4167 62.7724 87.6136 60.5672C89.8106 58.362 90.9091 55.6625 90.9091 52.4688C90.9091 49.275 89.8106 46.5755 87.6136 44.3703C85.4167 42.1651 82.7273 41.0625 79.5455 41.0625H72.7273V31.9375C72.7273 25.626 70.5114 20.2461 66.0795 15.7977C61.6477 11.3492 56.2879 9.125 50 9.125C43.7121 9.125 38.3523 11.3492 33.9205 15.7977C29.4886 20.2461 27.2727 25.626 27.2727 31.9375H25C20.6061 31.9375 16.8561 33.4964 13.75 36.6141C10.6439 39.7318 9.09091 43.4958 9.09091 47.9062C9.09091 52.3167 10.6439 56.0807 13.75 59.1984C16.8561 62.3161 20.6061 63.875 25 63.875H36.3636V73H25Z" fill="#C6C6C6"/>
                        </svg>
                        <label for="file">
                            Lade hier dein Kunstwerk hoch<br>
                            (Drag and Drop oder klicke hier)
                        </label>
                        <img class="preview" src="">
                    </div>
                    <input id="upload-input" name="file" type="file">
                </div>
                <div class="row gap-3" style="justify-content: space-between">
                    <label class="labeled-checkbox">
                        <span>Ich habe die AGBs gelesen</span>
                        <input name="agb" type="checkbox" style="margin-left: 1rem" required>
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