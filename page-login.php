<?php /* Template Name: login */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body class="no-big-cube" style="background-image: url('/wp-content/uploads/2025/04/Banner.jpg')">
    <?php 
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php"; 
    $main_headline = "ANMELDUNG";
    $sub_headline = " ";
    include get_template_directory() . "/includes/banner-slim.php"; 
    ?>

    <div id="login" class="light-bg">
        <div class="wrapper col gap-2 pt-5 pb-5">
            
            <form id="custom_login_form" class="col gap-1" method="POST">
                <?php wp_nonce_field( 'custom_login_nonce', 'custom_login_nonce_field' ); ?>
                <input type="hidden" name="action" value="submit_project_post">
                <div class="labeled-input">
                    <label for="username">Name</label>
                    <input name="username" type="text">
                </div>
                <div class="labeled-input">
                    <label for="password">Passwort</label>
                    <input name="password" type="password">
                </div>
                <input class="bg-magenta color-white" type="submit" value="Anmelden">
            </form>
            
            <div class="col gap-1">
                <a class="color-magenta" href="<?= get_site_url(); ?>/register">Passwort vergessen?</a>
                <a class="color-magenta" href="<?= get_site_url(); ?>/lostpassword">Registrierung</a>
            </div>

        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>