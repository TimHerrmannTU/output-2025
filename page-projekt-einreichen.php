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
                <div class="labeled-input grid-c1">
                    <label for="title">Title</label>
                    <input name="title" type="text">
                </div>
                <div class="dropdown transparent">
                    <select id="year">
                        <option class="template" value="default">Projektkategorie auswählen</option>
                        <option class="template" value="demo">Projektdemo</option>
                        <option class="template" value="poster">Projektposter</option>
                        <option class="template" value="vortrag">Fachvortrag</option>
                    </select>
                </div>
                <!-- options: Projektdemo, Projektposter, Fachvortrag -->
                <div class="labeled-input grid-c1">
                    <label for="desc">Beschreibung</label>
                    <textarea name="desc"> </textarea>
                </div>
                <div id="upload-trigger" class="file-upload col gap-1 grid-c2">
                    <div class="icon">
                        <span class="iconify" data-icon="mdi-cloud-upload-outline">
                    </div>
                    <label for="file">
                        Lade hier ein Vorschaubild für dein Projekt hoch<br>
                        (Drag and Drop oder klicke hier)
                    </label>
                    <img class="preview" src="">
                </div>
                <input id="upload-input" name="file" type="file">
                <div class="labeled-input grid-c1">
                    <label for="author">Autor</label>
                    <input name="author" type="text">
                </div>
                <div class="labeled-input grid-c2">
                    <label for="website">Website</label>
                    <input name="website" type="text">
                </div>
                <div class="labeled-input grid-c1">
                    <label for="betreuer">Betreuer</label>
                    <input name="betreuer" type="text">
                </div>
                <div class="labeled-input grid-c2">
                    <label for="institute">Studiengang / Lehrstuhl / Firma</label>
                    <input name="institute" type="text">
                </div>
                <div class="labeled-input" style="grid-column: 1 / span 2;">
                    <label for="others">Weitere Beteiligte</label>
                    <input name="others" type="text">
                </div>
                <div class="labeled-input grid-c1">
                    <label for="contact">Ansprechpartner</label>
                    <input name="contact" type="text">
                </div>
                <div class="labeled-input grid-c2">
                    <label for="email">E-Mail</label>
                    <input name="email" type="text">
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