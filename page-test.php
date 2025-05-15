<?php /* Template Name: test */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body id="programm" <?php body_class(); ?>>
    <?php 
    $main_headline = "DER VERANSTALTUNGSTAG";
    $sub_headline = "SCHAU NACH, WELCHE TOLLEN EVENTS GEPLANT SIND!";
    $cube = true;
    include get_template_directory() . "/includes/narrow-head.php";
    include get_template_directory() . "/includes/cube.php";
    ?>
    <div class="light-bg">
        <div class="wrapper">
            <div class="dark-bg w-50" style="padding: 4.62rem">
                <h3 class="color-magenta mb-3">RAHMENPROGRAMM</h3>
                <p>Am 19. Juni 2025 findet OUTPUT wieder in der Fakultät Informatik der TU  Dresden statt. Wir stellen die Vielfalt - von der Idee, über visuelle  Konzepte bis hin zu Demonstrationen – des Informatikstudiums und  aktuelle Forschungsschwerpunkte der Fakultät vor.</p>    
            </div>
        </div>
    </div>

    <div id="test-timeline" class="light-bg" style="padding-top: 0">
        <div class="wrapper col gap-2">
            <?php
            $args = array(
                'post_type'      => 'program',  // Slug of the category
                'posts_per_page' => -1,         // Number of posts to show (adjust as needed),
                'meta_key'       => 'programm-details-startzeit',
                'orderby'        => 'meta_value', 
                'order'          => 'ASC'
            );
            // Create a custom query
            $query = new WP_Query($args);
            // Check if posts are available
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $starting_time = explode(":", get_field("programm-details-startzeit"));
                    $desc_preview = get_field("programm-details-beschreibung-vorschau");
                    $desc = get_field("programm-details-beschreibung");
                    $img = get_field("programm-details-bild")["sizes"]["large"];
                    ?>
                    <div class="item" dd-function="expandable">
                        <div class="time hours"><?= $starting_time[0] ?></div><div class="time minutes"><?= $starting_time[1] ?></div>
                        <div class="v-seperator"></div>
                        <h3 class="row centered" dd-function="trigger">
                            <?= the_title() ?>
                            <?php if ($desc_preview) { ?>
                                <div class="icon ml-1">
                                    <span class="iconify" data-icon="mdi-chevron-down">
                                </div>
                            <?php } ?>
                        </h3>
                        <?php if ($desc_preview) { ?>
                            <p class="desc"><?= $desc_preview ?></p>
                        <?php } ?>
                        <div class="desc <?= $desc_preview ? 'expand' : ''; ?>" style="display: <?= $desc_preview ? 'none' : 'block'; ?>">
                            <?php 
                            if (!empty($img)) {
                                ?><img src="<?= $img ?>"/><?php 
                            } 
                            ?>
                            <p><?= $desc ?></p>
                        </div>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>