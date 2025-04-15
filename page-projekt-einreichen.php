<?php /* Template Name: about */ ?>
<?php
// Überprüfen, ob der Benutzer angemeldet ist
if (!is_user_logged_in()) {
    // Umleitung zur Login-Seite
    wp_redirect(home_url('/login'));
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body class="no-big-cube" style="background-image: url('/wp-content/uploads/2025/04/projekte-banner.jpg')">
    <?php
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php";
    $main_headline = "MEIN BEREICH";
    $sub_headline = "PROJEKTE EINREICHEN UND VERWALTEN";
    include get_template_directory() . "/includes/banner-slim.php";
    ?>

    <div id="projekte" class="light-bg mb-6">
        <div class="wrapper col gap-2">

            <form id="project-register-form" class="grid" action="<?= admin_url('admin-post.php') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit_project_post">

                <div class="labeled-input full">
                    <label for="title">Title *</label>
                    <input name="title" type="text" required>
                </div>

                <div class="dropdown transparent grid-c1">
                    <select id="mode" required>
                        <option class="template" value="default">Projektkategorie auswählen *</option>
                        <option class="template" value="demo">Projektdemo</option>
                        <option class="template" value="poster">Projektposter</option>
                        <option class="template" value="vortrag">Fachvortrag</option>
                    </select>
                </div>
                <div class="labeled-input grid-c1">
                    <label for="presentor">Präsentator *</label>
                    <input name="presentor" type="text" required>
                </div>
                <div class="labeled-input grid-c1">
                    <label for="desc">Beschreibung des Projektes (max. 2000 Zeichen) *</label>
                    <textarea name="desc" required></textarea>
                </div>

                <div class="file-upload col gap-1 grid-c2" dd-function="file-upload-trigger" key="1">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="file">
                        Lade hier ein Vorschaubild für dein Projekt hoch<br>
                        (Drag and Drop oder klicke hier)
                    </label>
                    <img class="preview" src="">
                </div>
                <input name="file" type="file" dd-function="file-upload-input" key="1">

                <div class="labeled-input full">
                    <label for="others">Weitere Beteiligte</label>
                    <input name="others" type="text">
                </div>

                <div class="labeled-input grid-c1">
                    <label for="website">Website</label>
                    <input name="website" type="text">
                </div>
                <div class="labeled-input grid-c2">
                    <label for="institute">Studiengang / Lehrstuhl / Firma</label>
                    <input name="institute" type="text">
                </div>

                <div class="labeled-input grid-c1">
                    <label for="contact">Ansprechpartner *</label>
                    <input name="contact" type="text" required>
                </div>
                <div class="labeled-input grid-c2">
                    <label for="email">E-Mail *</label>
                    <input name="email" type="text" required>
                </div>
                <div class="pt-1 full"></div>
                <!-- START: CONDITIONAL SECTION -->
                <!-- if demo -->
                <p class="fat full" dd-mode="demo">Ich benötige für meinen Projektstand:</p>
                <label class="labeled-checkbox transparent grid-c1" dd-mode="demo">
                    <input type="checkbox" name="mobiliar">
                    <span>Tisch (inkl. Husse) und Stühle</span>
                </label>
                <label class="labeled-checkbox transparent grid-c2" dd-mode="demo">
                    <input type="checkbox" name="aufsteller">
                    <span>Posterständer (für Poster bis max. DIN A1 Hochformat)</span>
                </label>
                <div class="labeled-input full" dd-mode="demo">
                    <label for="misc">Sonstige Wünsche oder Kommentare für dein Projektstand</label>
                    <textarea name="misc" style="min-height: 10rem"></textarea>
                </div>
                <!-- if vortrag -->
                <div class="labeled-input grid-c1" dd-mode="vortrag">
                    <label for="misc">Sonstige Kommentare zu deinem Fachvortrag</label>
                    <textarea name="misc" style="min-height: 10rem"></textarea>
                </div>
                <div class="row gap-1 grid-c2" dd-function="file-upload-trigger" key="2" dd-mode="vortrag">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="file">
                        Lade hier dein Vortrag als PDF oder PPTX hoch (Drag and Drop oder klicke hier)
                    </label>
                    <img class="preview" src="">
                </div>
                <input name="file" type="file" dd-function="file-upload-input" key="2">
                <!-- if poster -->
                <div class="row gap-1 full" dd-function="file-upload-trigger" key="3" dd-mode="poster">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="file">
                        Lade hier dein Poster als PDF hoch (Drag and Drop oder klicke hier)
                    </label>
                    <img class="preview" src="">
                </div>
                <input name="file" type="file" dd-function="file-upload-input" key="3">
                <!-- END CONDITIONAL SECTION -->
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="ausgruendung">
                    <span>Ich habe interesse an einer Ausgründung.</span>
                </label>
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="publish" required>
                    <span>Ich stimme einer Veröffentlichung des Projektes im Rahmen von Output zu.</span>
                </label>
                <a id="fake-submit" class="bg-magenta color-white inline-size-fit-content">PROJEKT EINREICHEN</a>
                <input type="submit" style="display:none">
            </form>

        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
    <script>
        var mode = "default";
        jQuery(document).ready(function($) {
            // init
            $("[dd-mode]").hide()
            mode = $("#mode").val()
            $(`[dd-mode=${mode}]`).show()
            // user events
            $("#mode").change(function() {
                mode = $(this).val()
                $("[dd-mode]").hide()
                $(`[dd-mode=${mode}]`).show()
            })
            $("#fake-submit").click(function() {
                if (mode != "default") {
                    $(`[dd-mode]:not([dd-mode=${mode}])`).remove()
                }
            })
        })
    </script>
</body>
</html>