<?php # needs pre-defined $post in order to work! ?>
<div class="modal-wrapper">
    <div class="modal single-project wrapper">
        <!-- 1st row -->
        <h3 class="headline"><?php the_title() ?></h3>
        <a class="icon close-modal color-magenta">
            <div class="iconify" data-icon="mdi-close"></div>
        </a>

        <?php
        // post processing :^)
        the_post();
        // get project image
        $img = get_field("project-details-thumbnail")["sizes"]["large"];
        if (empty($img)) {
            $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
        }
        $room = get_field("project-intern-room");
        $acfs = array(
            "" => get_field("project-details-timeslot"),
            "Typ" => get_the_terms(get_the_ID(), 'project-type')[0]->name,
            "Studiengang / Lehrstuhl / Firma" => get_field("project-details-institution"),
            "Präsentator" => get_field("project-details-presenter"),
            "Projektbeteiligte" => get_field("project-details-participants"),
        );
        $website = get_field("project-details-website");
        ?>

        <div class="col">
            <img class="mb-2" src="<?= $img ?>"/>
            <?php
            if ($room) {
                ?><h4><b>Raum</b> <?= $room ?></h4><?php
            } 
            foreach ($acfs as $desc => $val) {
                if ($val) {
                    ?><p><b><?= $desc ?></b> <?= $val ?></p><?php
                }
            }
            if ($website) {
                ?><a class="color-magenta" href="<?= $website ?>"><?= $website ?></a><?php
            }
            ?>
        </div>

        <div class="desc">
            <p><?= get_field("project-details-description") ?></p>
        </div>
        
    </div>
</div>