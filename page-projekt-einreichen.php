<?php /* Template Name: about */ ?>
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
                    <label for="title">Title</label>
                    <input name="title" type="text">
                </div>

                <div class="dropdown transparent grid-c1">
                    <select id="year">
                        <option class="template" value="default">Projektkategorie auswählen</option>
                        <option class="template" value="demo">Projektdemo</option>
                        <option class="template" value="poster">Projektposter</option>
                        <option class="template" value="vortrag">Fachvortrag</option>
                    </select>
                </div>
                <div class="labeled-input grid-c1">
                    <label for="author">Autor</label>
                    <input name="author" type="text">
                </div>
                <div class="labeled-input grid-c1">
                    <label for="desc">Beschreibung</label>
                    <textarea name="desc"> </textarea>
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
                    <label for="contact">Ansprechpartner</label>
                    <input name="contact" type="text">
                </div>
                <div class="labeled-input grid-c2">
                    <label for="email">E-Mail</label>
                    <input name="email" type="text">
                </div>
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
                <div class="labeled-input full">
                    <label for="misc">Sonstige Wünsche oder Kommentare für dein Projektstand</label>
                    <textarea name="misc" style="min-height: 10rem"> </textarea>
                </div>
                <!-- if vortrag -->
                <div class="labeled-input grid-c1">
                    <label for="misc">Sonstige Kommentare zu deinem Fachvortrag</label>
                    <textarea name="misc" style="min-height: 10rem"> </textarea>
                </div>
                <div class="row gap-1 grid-c2" dd-function="file-upload-trigger" key="2">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="file">
                        Lade hier ein Vorschaubild für dein Projekt hoch<br>
                        (Drag and Drop oder klicke hier)
                    </label>
                    <img class="preview" src="">
                </div>
                <input name="file" type="file" dd-function="file-upload-input" key="2">

                <!-- END CONDITIONAL SECTION -->
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="ausgruendung">
                    <span>Ich habe interesse an einer Ausgründung.</span>
                </label>
                <label class="labeled-checkbox transparent full">
                    <input type="checkbox" name="publish" required>
                    <span>Lade hier dein Vortrag als PDF oder PPTX hoch (Drag and Drop oder klicke hier)</span>
                </label>
                <input class="bg-magenta color-white" type="submit" value="PROJEKT EINREICHEN">
            </form>

        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>