<?php /* Template Name: login */ ?>
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
    $sub_headline = "MELDE DICH AN UND WERDE TEIL VON OUTPUT.DD";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="login" class="light-bg">
        <div class="wrapper col gap-2">

            <?php include get_template_directory() . "/includes/login.php"; ?>

            <!-- if logged in -->
            <?php if (is_user_logged_in()): ?>
            <div class="col gap-2 mt-3">
                <h3>Hallo, <?php echo esc_html(wp_get_current_user()->display_name); ?>!</h3>
                <p>Du bist jetzt angemeldet und kannst ein Projekt einreichen.</p>
                <div class="mt-3">
                    <a href="<?php echo esc_url(wp_logout_url(home_url('/login'))); ?>">
                        <button class="bg-magenta color-white">ABMELDEN</button>
                    </a>
                </div>
            </div>
            <?php else: ?>
            <?php
                // Fehlermeldungen prüfen
                $login_error = false;
                if (isset($_GET['login']) && $_GET['login'] == 'failed') {
                    $login_error = true;
                }
                ?>

            <?php if ($login_error): ?>
            <div class="error-message p-3 bg-red color-white mb-2">
                <p><strong>Fehler:</strong> Ungültiger Benutzername oder Passwort.</p>
            </div>
            <?php endif; ?>

            <form method="post" action="<?php echo esc_url(site_url('wp-login.php', 'login_post')); ?>"
                class="col gap-1">
                <div class="labeled-input c1">
                    <label for="user_login">Name</label>
                    <input type="text" name="log" id="user_login" required>
                </div>
                <div class="labeled-input c1">
                    <label for="user_pass">Passwort</label>
                    <input type="password" name="pwd" id="user_pass" required>
                </div>
                <div class="row gap-1">
                    <label class="labeled-checkbox transparent">
                        <input name="rememberme" type="checkbox" id="rememberme" value="forever">
                        <span>Angemeldet bleiben</span>
                    </label>
                </div>

                <?php
                    // Bestimme die Weiterleitungs-URL
                    $redirect_url = '';

                    // Prüfe ob ein HTTP_REFERER existiert
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        $referer = $_SERVER['HTTP_REFERER'];
                        // Stelle sicher, dass es eine URL der eigenen Webseite ist
                        if (strpos($referer, home_url()) === 0) {
                            // Überprüfe, dass es nicht die Login-, Register- oder Passwort-Seite ist
                            if (strpos($referer, home_url('/login')) !== 0 &&
                                strpos($referer, home_url('/register')) !== 0 &&
                                strpos($referer, home_url('/lostpassword')) !== 0) {
                                $redirect_url = $referer;
                            }
                        }
                    }

                    // Fallback zur Startseite, wenn keine gültige Referer-URL gefunden wurde
                    if (empty($redirect_url)) {
                        $redirect_url = home_url();
                    }
                    ?>

                <input type="hidden" name="redirect_to" value="<?php echo esc_url($redirect_url); ?>">

                <input class="bg-magenta color-white" type="submit" name="wp-submit" id="wp-submit" value="Anmelden">

                <a href="<?php echo esc_url(wp_lostpassword_url()); ?>" class="color-magenta">Passwort vergessen?</a>
            </form>

            <div class="mt-1">
                <h3>Noch kein Konto?</h3>
                <p>Du hast noch keinen Benutzeraccount? Registriere dich jetzt, um an unseren Veranstaltungen
                    teilzunehmen.</p>
                <a href="<?php echo esc_url(wp_registration_url()); ?>" class="color-magenta">Registrieren</a>
            </div>
            <?php endif; ?>

        </div>
    </div>

    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>

</html>