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
                    <svg width="100" height="73" viewBox="0 0 100 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 73C18.1061 73 12.2159 70.6047 7.32955 65.8141C2.44318 61.0234 0 55.1682 0 48.2484C0 42.3172 1.7803 37.0323 5.34091 32.3937C8.90152 27.7552 13.5606 24.7896 19.3182 23.4969C21.2121 16.501 25 10.8359 30.6818 6.50156C36.3636 2.16719 42.803 0 50 0C58.8636 0 66.3826 3.0987 72.5568 9.29609C78.7311 15.4935 81.8182 23.0406 81.8182 31.9375C87.0455 32.5458 91.3826 34.8081 94.8296 38.7242C98.2765 42.6404 100 47.2219 100 52.4688C100 58.1719 98.0114 63.0195 94.0341 67.0117C90.0568 71.0039 85.2273 73 79.5455 73H54.5455C52.0455 73 49.9053 72.1065 48.125 70.3195C46.3447 68.5326 45.4545 66.3844 45.4545 63.875V40.3781L38.1818 47.45L31.8182 41.0625L50 22.8125L68.1818 41.0625L61.8182 47.45L54.5455 40.3781V63.875H79.5455C82.7273 63.875 85.4167 62.7724 87.6136 60.5672C89.8106 58.362 90.9091 55.6625 90.9091 52.4688C90.9091 49.275 89.8106 46.5755 87.6136 44.3703C85.4167 42.1651 82.7273 41.0625 79.5455 41.0625H72.7273V31.9375C72.7273 25.626 70.5114 20.2461 66.0795 15.7977C61.6477 11.3492 56.2879 9.125 50 9.125C43.7121 9.125 38.3523 11.3492 33.9205 15.7977C29.4886 20.2461 27.2727 25.626 27.2727 31.9375H25C20.6061 31.9375 16.8561 33.4964 13.75 36.6141C10.6439 39.7318 9.09091 43.4958 9.09091 47.9062C9.09091 52.3167 10.6439 56.0807 13.75 59.1984C16.8561 62.3161 20.6061 63.875 25 63.875H36.3636V73H25Z" fill="#C6C6C6"/>
                    </svg>
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