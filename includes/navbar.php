<nav id="navbar" class="w-100">
    <div class="wrapper row w-100">
        <a class="logo" href="<?= get_home_url(); ?>"><img src="<?= get_template_directory_uri(); ?>/static/svg/logo.svg"/></a>
        <div class="links row gap-3">
            <a href="/about" class="<?= (is_page('about')) ? 'active' : ''; ?>">ÜBER OUTPUT</a>
            <a href="/programm" class="<?= (is_page('programm')) ? 'active' : ''; ?>">PROGRAMM</a>
            <a href="/teilnahme" style="display:none" class="<?= (is_page('teilnahme')) ? 'active' : ''; ?>">TEILNAHME</a>
            <a href="/projekte" class="<?= (is_page('projekte')) ? 'active' : ''; ?>">PROJEKTE</a>
        </div>
        <?php
        if (is_user_logged_in()) {
            ?><a class="login-button" href="/projekt-einreichen"><div class="iconify" data-icon="mdi-account-cog"></div></a><?php
        }
        else {
            ?><a class="login-button" href="/login"><div class="iconify" data-icon="mdi-login"></div></a><?php
        }
        ?>
        <a class="mobile-only login-button" href="/login"><div class="iconify" data-icon="mdi-menu"></div></a>
    </div>
</nav>