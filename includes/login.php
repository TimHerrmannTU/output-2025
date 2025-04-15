<?php
// Benutzer-Login-Formular
function userLoginForm() {
    ob_start(); // Starten des Ausgabe-Puffers

    // Überprüfen, ob das Formular abgeschickt wurde und der Login durchgeführt wird
    if ( isset( $_POST['custom_login'] ) && wp_verify_nonce( $_POST['custom_login_nonce_field'], 'custom_login_nonce' ) ) {
        $login_successful = userLoginHandler(); // Benutzer-Anmeldefunktion aufrufen
        if ( $login_successful ) {
            // Wenn der Login erfolgreich war, zur Startseite weiterleiten
            wp_safe_redirect( home_url() );
            exit;
        }
    }

    // Falls der Login fehlschlägt, bleibt der Benutzername im Feld
    if ( isset( $_POST['user_login'] ) ) {
        $username_value = esc_attr( $_POST['user_login'] );
    }

    // HTML-Formular für den Login
    ?>
    <form id="custom_login_form" action="" method="POST">
        <?php wp_nonce_field( 'custom_login_nonce', 'custom_login_nonce_field' ); ?>
        <div class="form-group">
            <label for="user_login">Benutzername oder E-Mail</label>
            <input id="user_login" class="input" name="user_login" required="" type="text" value="<?php echo isset($username_value) ? $username_value : ''; ?>" />
        </div>
        <div class="form-group">
            <label for="password">Passwort</label>
            <input id="password" class="input" name="password" required="" type="password" />
        </div>
        <div class="form-group">
            <button class="submit-btn" name="custom_login" type="submit">Anmelden</button>
        </div>
        <div class="form-group">
            <a class="forgot-password-btn" href="<?php echo site_url('lostpassword'); ?>">Passwort vergessen?</a>
        </div>
    </form>
    <?php 

    return ob_get_clean(); // Gibt den gepufferten Inhalt zurück und leert den Puffer
}

// Sicherheits-Backend für die Benutzeranmeldung
function userLoginHandler() {
    // Eingaben bereinigen
    $username = sanitize_text_field( $_POST['user_login'] );
    $password = $_POST['password'];

    // Überprüfen, ob alle Felder ausgefüllt sind
    if ( empty( $username ) || empty( $password ) ) {
        echo '<p style="color:red;">' . __( 'Please fill in both fields.', 'custom' ) . '</p>';
        return false;
    }

    // Benutzerinformationen zur Authentifizierung holen
    $user = wp_authenticate( $username, $password );

    // Fehlerbehandlung bei falschen Anmeldedaten
    if ( is_wp_error( $user ) ) {
        echo '<p style="color:red;">' . __( 'Incorrect username or password.', 'custom' ) . '</p>';
        return false;
    }

    // Benutzer einloggen
    wp_set_current_user( $user->ID );
    wp_set_auth_cookie( $user->ID );
    
    return true; // Erfolgreich eingeloggt
}

// Shortcode für das Login-Formular registrieren
add_shortcode( 'user_login_form', 'userLoginForm' );
