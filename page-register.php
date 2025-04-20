<?php /* Template Name: register */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <?php 
    $main_headline = "ANMELDUNG";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="register" class="light-bg">
        <div class="wrapper col gap-2">
            
            <form id="custom_register_form" class="col gap-1" method="POST">
                <?php wp_nonce_field( 'custom_login_nonce', 'custom_login_nonce_field' ); ?>
                <input type="hidden" name="action" value="submit_project_post">
                <div class="labeled-input">
                    <label for="username">Benutzername</label>
                    <input name="username" type="text" required>
                </div>
                <div class="labeled-input">
                    <label for="email">E-Mail</label>
                    <input name="email" type="email" required>
                </div>
                <div class="labeled-input">
                    <label for="firstname">Vorname</label>
                    <input name="firstname" type="text" required>
                </div>
                <div class="labeled-input">
                    <label for="lastname">Nachname</label>
                    <input name="lastname" type="text" required>
                </div>
                <input class="bg-magenta color-white" type="submit" value="Registrieren">
            </form>
            
            <div class="col gap-1">
                <a class="color-magenta" href="<?= get_site_url(); ?>/lostpassword">Passwort vergessen?</a>
                <a class="color-magenta" href="<?= get_site_url(); ?>/login">Login</a>
            </div>

        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>