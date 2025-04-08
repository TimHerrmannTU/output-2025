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
    $main_headline = "CREATIVE-CHALLENGE";
    $sub_headline = "ZEIG UNS DEINE KÜNSTLERICHE SEITE!";
    include get_template_directory() . "/includes/banner-slim.php";
    ?>

    <div class="light-bg mb-6">
        <div class="wrapper col gap-3 pt-5 pb-5">
            <h2>Anmeldung zur Creative-Challenge</h2>
            <form id="cc-register-form" action="<?= admin_url('admin-post.php') ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="action" value="submit_art_post">
                
                <div class="labeled-input">
                    <label for="first-name">Vorname</label>
                    <input name="first-name" type="text" required>
                </div>
                <div class="labeled-input">
                    <label for="last-name">Nachname</label>
                    <input name="last-name" type="text" required>
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
                <div class="labeled-input">
                    <label for="title">Title</label>
                    <input name="title" type="text">
                </div>
                    <div class="labeled-input">
                    <label for="desc">Beschreibung</label>
                    <textarea name="desc"> </textarea>
                </div>

                <label for="file">Datei</label>
                <input name="file" type="file">
                <input type="submit" value="Absenden">
                <label class="labeled-checkbox">
                    <span>Ich habe die AGBs gelesen</span>
                    <input name="agb" type="checkbox">
                </label>
            </form>
        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>