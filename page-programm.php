<?php /* Template Name: programm */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background-image: url('/wp-content/uploads/2025/04/programm-banner.jpg')">
    <?php 
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php"; 
    $main_headline = "DER VERANSTALTUNGSTAG";
    $sub_headline = "LOREM IMPSUM SMIBSUM";
    include get_template_directory() . "/includes/banner-slim.php"; 
    ?>
    <div class="light-bg">
        <div class="wrapper pt-7 pb-7">
            <div class="dark-bg w-50" style="padding: 4.62rem">
                <h3 class="color-magenta mb-3">RAHMENPROGRAMM</h3>
                <p>Am 19. Juni 2025 findet OUTPUT wieder in der Fakultät Informatik der TU  Dresden statt. Wir stellen die Vielfalt – von der Idee, über visuelle  Konzepte bis hin zu Demonstrationen – des Informatikstudiums und  aktuelle Forschungsschwerpunkte der Fakultät vor.</p>    
            </div>
        </div>
    </div>

    <div id="timeline" class="light-bg mb-6">
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
                    ?>
                    <div class="item row">
                        <div class="time row">
                            <span class="hours"><?= $starting_time[0] ?></span><span class="minutes"><?= $starting_time[1] ?></span>
                        </div>
                        <div class="text-content" dd-function="expandable">
                            <h3 class="row centered" dd-function="trigger">
                                <?= the_title() ?>
                                <?php if ($desc_preview) { ?>
                                    <img class="ml-1" src="<?= get_template_directory_uri(); ?>/static/svg/arrow.svg"/>
                                <?php } ?>
                            </h3>
                            <?php if ($desc_preview) { ?>
                                <p><?= $desc_preview ?></p>
                            <?php } ?>
                            <p class="<?= $desc_preview ? 'expand' : ''; ?>" style="display: <?= $desc_preview ? 'none' : 'block'; ?>"><?= $desc ?></p>
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