<?php /* Template Name: projektdetails-bearbeiten */ ?>
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

<body id="projekt-einreichen" <?php body_class() ?>>
    <?php
    $main_headline = "PROJEKT BEARBEITEN";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    $post = get_post($_GET["id"]);
    $pro_type = get_the_terms($_GET["id"], 'project-type')[0]->slug;
    $pro_type = str_replace("project-", "", $pro_type);
    // get project image
    $img = get_field("project-details-thumbnail")["sizes"]["large"];
    if (empty($img)) {
        $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
    }
    // get other files
    $file = get_field("project-details-upload");
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-2">
            <?php if (get_field("project-intern-user") == get_current_user_id()) { ?>
            <form id="project-register-form" class="grid conditional"
                action="/projektdetails-bearbeiten/?id=<?= the_id() ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit_project_post">
                <?php wp_nonce_field('submit_project_post_action', 'submit_project_post_nonce'); ?>
                <input type="hidden" name="post-id" value="<?= the_id() ?>">
                <input type="hidden" name="edit" value="true">

                <div class="labeled-input full">
                    <label for="details-name">Titel *</label>
                    <input name="details-name" type="text" value="<?= the_title() ?>" required>
                </div>

                <div class="dropdown transparent c1">
                    <div class="icon">
                        <div class="iconify" data-icon="mdi-triangle-down"></div>
                    </div>
                    <select id="mode" name="category" required>
                        <option class="template" <?= ($pro_type=="default") ? 'selected="selected"' : "" ?>
                            value="default">Projektkategorie auswählen *</option>
                        <option class="template" <?= ($pro_type=="demo"   ) ? 'selected="selected"' : "" ?>
                            value="demo">Projektdemo</option>
                        <option class="template" <?= ($pro_type=="poster" ) ? 'selected="selected"' : "" ?>
                            value="poster">Projektposter</option>
                        <option class="template" <?= ($pro_type=="vortrag") ? 'selected="selected"' : "" ?>
                            value="vortrag">Fachvortrag</option>
                    </select>
                </div>

                <div class="file-upload col gap-1 c2 uploaded" dd-function="file-upload-trigger" key="1"
                    style="grid-row: span 3; aspect-ratio: 4/3; overflow: hidden;">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="details-thumbnail">
                        Lade hier ein Vorschaubild für dein Projekt hoch<br>
                        Seitenverhältniss 4:3<br>
                        (Drag and Drop oder klicke hier)<br>
                        Maximale Dateigröße: 50MB
                    </label>
                    <img class="preview" src="<?= $img ?>">
                </div>
                <input name="details-thumbnail" type="file" accept="image/*" dd-function="file-upload-input" key="1" data-max-size="2097152">

                <div class="labeled-input c1">
                    <label for="details-presenter">Präsentator *</label>
                    <input name="details-presenter" type="text" value="<?= get_field("project-details-presenter") ?>"
                        required>
                </div>
                <div class="labeled-input c1">
                    <label for="details-description">Beschreibung des Projektes (max. 2000 Zeichen) *</label>
                    <textarea name="details-description" maxlength="2000"
                        required><?= get_field("project-details-description") ?></textarea>
                </div>

                <div class="labeled-input full">
                    <label for="details-participants">Weitere Beteiligte</label>
                    <input name="details-participants" type="text"
                        value="<?= get_field("project-details-participants") ?>">
                </div>

                <div class="labeled-input c1">
                    <label for="details-website">Website</label>
                    <input name="details-website" type="text" value="<?= get_field("project-details-website") ?>">
                </div>
                <div class="labeled-input c2">
                    <label for="details-institution">Studiengang / Lehrstuhl / Firma</label>
                    <input name="details-institution" type="text"
                        value="<?= get_field("project-details-institution") ?>">
                </div>

                <div class="labeled-input c1">
                    <label for="intern-contact-person">Ansprechpartner *</label>
                    <input name="intern-contact-person" type="text"
                        value="<?= get_field("project-intern-contact-person") ?>" required>
                </div>
                <div class="labeled-input c2">
                    <label for="intern-contact-person-e-mail">E-Mail *</label>
                    <input name="intern-contact-person-e-mail" type="text"
                        value="<?= get_field("project-intern-contact-person-e-mail") ?>" required>
                </div>
                <div class="pt-1 full"></div>
                <!-- START: CONDITIONAL SECTION -->
                <!-- if demo -->
                <p class="fat full" dd-mode="demo">Ich benötige für meinen Projektstand:</p>
                <label class="labeled-checkbox transparent c1" dd-mode="demo">
                    <input type="checkbox" name="intern-furniture"
                        <?= (get_field("project-intern-furniture")==1) ? 'checked="checked"' : "" ?>>
                    <span>Tisch (inkl. Husse) und Stühle</span>
                </label>
                <label class="labeled-checkbox transparent c2" dd-mode="demo">
                    <input type="checkbox" name="intern-poster-stand"
                        <?= (get_field("project-intern-poster-stand")==1) ? 'checked="checked"' : "" ?>>
                    <span>Posteraufsteller (für Poster bis max. DIN A1 Hochformat)</span>
                </label>
                <div class="labeled-input full" dd-mode="demo">
                    <label for="intern-comment">Sonstige Wünsche oder Kommentare für dein Projektstand</label>
                    <textarea name="intern-comment" style="min-height: 10rem"><?= get_field("project-intern-comment") ?></textarea>
                </div>
                <!-- if vortrag -->
                <div class="labeled-input c1" dd-mode="vortrag">
                    <label for="intern-comment">Sonstige Kommentare zu deinem Fachvortrag</label>
                    <textarea name="intern-comment"
                        style="min-height: 10rem"><?= get_field("project-intern-comment") ?></textarea>
                </div>
                <div class="row gap-1 c2" dd-function="file-upload-trigger" key="2" dd-mode="vortrag">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="details-upload"><?= $file["filename"] ?></label>
                </div>
                <input name="details-upload" type="file" dd-function="file-upload-input" key="2" dd-mode="vortrag"
                    data-max-size="2097152">
                <!-- if poster -->
                <div class="row gap-1 full" dd-function="file-upload-trigger" key="3" dd-mode="poster">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="details-upload"><?= $file["filename"] ?></label>
                </div>
                <input name="details-upload" type="file" accept=".pdf" dd-function="file-upload-input" key="3"
                    dd-mode="poster" data-max-size="2097152">
                <!-- END CONDITIONAL SECTION -->
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="intern-ausgrundung" <?= (get_field("project-intern-ausgrundung")==1) ? 'checked="checked"' : "" ?>>
                    <span>Ich habe Interesse an einer Ausgründung.</span>
                </label>
                <a id="submit" class="bg-magenta color-white pl-2 pr-2">PROJEKT BEARBEITEN</a>
            </form>

            <?php } else { ?>
            <h3>THIS IS NOT YOUR PROJECT!</h3>
            <?php } ?>
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
        $(`[dd-mode=${mode}]:not(input[type=file])`).show()

        // File size validation
        $('input[type="file"]').on('change', function() {
            const maxSize = 2097152; // 2MB in bytes
            const file = this.files[0];
            if (file && file.size > maxSize) {
                alert('Die Datei ist zu groß. Maximale Dateigröße: 2MB');
                $(this).val(''); // Clear the input
                return false;
            }
        });

        // control events (switch between different html section)
        $("#controls button").click(function() {
            // toggle styling class
            $("#controls").find("button").removeClass("active")
            $(this).addClass("active")
            // toggle relevant section
            $(".conditional").hide()
            const TARGET = $(this).attr("dd-target")
            $(`#${TARGET}`).show()
        })
        // user events
        $("#mode").change(function() {
            mode = $(this).val()
            $("[dd-mode]").hide()
            $(`[dd-mode=${mode}]:not(input[type=file])`).show()
        })
        $("#submit").click(function(e) {
            e.preventDefault(); //  prevents the <a> from acting like a link
            if (mode != "default") {
                $(`[dd-mode]:not([dd-mode=${mode}])`).remove()
                $("#project-register-form")[0].reportValidity() && $("#project-register-form").trigger(
                    "submit")
            }
        })
    })
    </script>
</body>

</html>