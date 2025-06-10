<?php /* Template Name: projekt-einreichen */ ?>
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
    $main_headline = "MEIN BEREICH";
    $sub_headline = "PROJEKTE EINREICHEN UND VERWALTEN";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-2">

            <div id="controls" class="default-grid">
                <button class="r1 c1" dd-target="">MEIN PROFIL</button>
                <button class="r2 c1 active" dd-target="project-register-form">NEUES PROJEKT</button>
                <button class="r2 c2" dd-target="my-projects">MEINE PROJEKTE</button>
            </div>

            <form id="project-register-form" class="grid conditional" action="<?= esc_url(get_permalink()); ?>"
                method="POST" enctype="multipart/form-data">
                <input type="hidden" name="form_type" value="project">
                <input type="hidden" name="action" value="submit_project_post">
                <?php wp_nonce_field('submit_project_post_action', 'submit_project_post_nonce'); ?>
                <div class="labeled-input full">
                    <label for="details-name">Title *</label>
                    <input name="details-name" type="text" required>
                </div>

                <div class="dropdown transparent c1">
                    <div class="icon">
                        <div class="iconify" data-icon="mdi-triangle-down"></div>
                    </div>
                    <select id="mode" name="category" required>
                        <option class="template" value="default">Projektkategorie auswählen *</option>
                        <option class="template" value="demo">Projektdemo</option>
                        <option class="template" value="poster">Projektposter</option>
                        <option class="template" value="vortrag">Fachvortrag</option>
                    </select>
                </div>
                <div class="file-upload col gap-1 c2" dd-function="file-upload-trigger" key="1"
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
                    <img class="preview" src="">
                </div>
                <input name="details-thumbnail" type="file" accept="image/*" dd-function="file-upload-input" key="1"
                    required data-max-size="2097152">
                <div class="labeled-input c1">
                    <label for="details-presenter">Präsentator *</label>
                    <input name="details-presenter" type="text" required>
                </div>
                <div class="labeled-input c1">
                    <label for="details-description">Beschreibung des Projektes (max. 2000 Zeichen) *</label>
                    <textarea name="details-description" maxlength="2000" required></textarea>
                </div>

                <div class="labeled-input full">
                    <label for="details-participants">Weitere Beteiligte</label>
                    <input name="details-participants" type="text">
                </div>

                <div class="labeled-input c1">
                    <label for="details-website">Website</label>
                    <input name="details-website" type="text">
                </div>
                <div class="labeled-input c2">
                    <label for="details-institution">Studiengang / Lehrstuhl / Firma</label>
                    <input name="details-institution" type="text">
                </div>

                <div class="labeled-input c1">
                    <label for="intern-contact-person">Ansprechpartner *</label>
                    <input name="intern-contact-person" type="text" required>
                </div>
                <div class="labeled-input c2">
                    <label for="intern-contact-person-e-mail">E-Mail *</label>
                    <input name="intern-contact-person-e-mail" type="text" required>
                </div>
                <div class="pt-1 full"></div>
                <!-- START: CONDITIONAL SECTION -->
                <!-- if demo -->
                <p class="fat full" dd-mode="demo">Ich benötige für meinen Projektstand:</p>
                <label class="labeled-checkbox transparent c1" dd-mode="demo">
                    <input type="checkbox" name="intern-furniture">
                    <span>Tisch (inkl. Husse) und Stühle</span>
                </label>
                <label class="labeled-checkbox transparent c2" dd-mode="demo">
                    <input type="checkbox" name="intern-poster-stand">
                    <span>Posteraufsteller (für Poster bis max. DIN A1 Hochformat)</span>
                </label>
                <div class="labeled-input full" dd-mode="demo">
                    <label for="intern-comment">Sonstige Wünsche oder Kommentare für dein Projektstand</label>
                    <textarea name="intern-comment" style="min-height: 10rem"></textarea>
                </div>
                <!-- if vortrag -->
                <div class="labeled-input c1" dd-mode="vortrag">
                    <label for="intern-comment">Sonstige Kommentare zu deinem Fachvortrag</label>
                    <textarea name="intern-comment" style="min-height: 10rem"></textarea>
                </div>
                <div class="row gap-1 c2" dd-function="file-upload-trigger" key="2" dd-mode="vortrag">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="details-upload">
                        Lade hier dein Vortrag als PDF oder PPTX hoch<br>
                        (Drag and Drop oder klicke hier)<br>
                        Maximale Dateigröße: 50MB
                    </label>
                </div>
                <input name="details-upload" type="file" dd-function="file-upload-input" key="2" dd-mode="vortrag"
                    data-max-size="2097152">
                <!-- if poster -->
                <div class="row gap-1 full" dd-function="file-upload-trigger" key="3" dd-mode="poster">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="details-upload">
                        Lade hier dein Poster als PDF hoch<br>
                        (Drag and Drop oder klicke hier)<br>
                        Maximale Dateigröße: 50MB
                    </label>
                </div>
                <input name="details-upload" type="file" accept=".pdf" dd-function="file-upload-input" key="3"
                    dd-mode="poster" data-max-size="2097152">
                <!-- END CONDITIONAL SECTION -->
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="intern-ausgrundung">
                    <span>Ich habe interesse an einer Ausgründung.</span>
                </label>
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="publish" required>
                    <span>Ich stimme einer Veröffentlichung des Projektes im Rahmen von Output zu.</span>
                </label>
                <a id="submit" class="bg-magenta color-white pl-2 pr-2">PROJEKT EINREICHEN</a>
            </form>

            <div id="my-projects" class="default-grid conditional" style="display:none">
                <?php
                $logged_in_user_id = get_current_user_id();
                $args = array(
                    'post_type'      => 'projekte',  // Slug of the category
                    'post_status'    => ['publish', 'draft', 'pending', 'private'],
                    'posts_per_page' => -1,  // Number of posts to show (adjust as needed)
                    'meta_query' => [
                        [
                          'key'     => 'project-intern-user',
                          'value'   => $logged_in_user_id,
                          'compare' => '='
                        ]
                    ]
                );
                // Create a custom query
                $query = new WP_Query($args);
                // Check if posts are available
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        // retrieve taxonomies of posts (needed for filtering)
                        $pro_terms = get_the_terms(get_the_ID(), 'output-year');
                        $pro_years = "";
                        if (!is_wp_error($pro_terms) && !empty($pro_terms)) {
                            $pro_years = implode(', ', array_map(fn($term) => $term->name, $pro_terms));
                        }
                        $pro_terms = get_the_terms(get_the_ID(), 'project-type');
                        $pro_types = "";
                        if (!is_wp_error($pro_terms) && !empty($pro_terms)) {
                            $pro_types = implode(', ', array_map(fn($term) => $term->name, $pro_terms));
                        }
                        // get project image
                        $img = get_field("project-details-thumbnail");
                        if (empty($img)) {
                            $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
                        }
                        else {
                            $img = $img["sizes"]["large"];
                        }
                        ?>
                <a class="pro-item labeled col" href="<?= the_permalink() ?>" dd-year="<?= $pro_years ?>"
                    dd-type="<?= $pro_types ?>">
                    <img src="<?= $img ?>" />
                    <div class="item-label">
                        <div class="text-wrapper">
                            <p><?= get_field("project-details-name")  ?></p>
                        </div>
                    </div>
                </a>
                <?php
                    }
                }
                ?>
            </div>

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
        $('input[type="file"]').change(function() {
            const maxSize = parseInt($(this).attr('data-max-size')) || 2097152; // 2MB default
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