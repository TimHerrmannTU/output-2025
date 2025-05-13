<div id="mobile-navbar" class="narrow" style="display:none">
    <a class="close" onclick="jQuery('#mobile-navbar').hide()">
        <div class="iconify" data-icon="mdi-close"></div>
    </a>
    <a href="/about"    >ÜBER OUTPUT</a>
    <a href="/programm" >PROGRAMM</a>
    <a href="/teilnahme">TEILNAHME</a>
    <a href="/projekte" >PROJEKTE</a>
    <?php
    if (is_user_logged_in()) {
        ?><a href="/projekt-einreichen">Mein Bereich</a><?php
    }
    else {
        ?><a href="/login">Anmelden</a><?php
    }
    ?>
</div>