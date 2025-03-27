<?php /* Template Name: programm */ ?>
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
    include get_template_directory() . "/includes/tud-navbar.php";
    include get_template_directory() . "/includes/navbar.php"; 
    $main_headline = "DER VERANSTALTUNGSTAG";
    $sub_headline = "LOREM IMPSUM SMIBSUM";
    include get_template_directory() . "/includes/banner-slim.php"; 
    ?>
    <div class="light-bg">
        <div class="wrapper pt-7 pb-7">
            <div class="dark-bg w-50" style="padding: 4.62rem">
                <h3 class="color-magenta mb-3">LOREM IPSUM DOLOR SIT</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit.</p>
            </div>
        </div>
    </div>

    <div id="timeline" class="light-bg mb-6">
        <div class="wrapper col gap-2">
            <?php
            $args = array(
                'post_type'      => 'program',  // Slug of the category
                'posts_per_page' => -1,  // Number of posts to show (adjust as needed)
                'orderby'        => 'programm-details-startzeit',
                'order'          => 'ASC'
            );
            // Create a custom query
            $query = new WP_Query($args);
            // Check if posts are available
            if ($query->have_posts()) {
                while ($query->have_posts()) {
                    $query->the_post();
                    $starting_time = explode(":", get_field("programm-details-startzeit"));
                    $expandable = empty(get_field("programm-details-beschreibung-vorschau")) ? false : true;
                    ?>
                    <div class="item row">
                        <div class="time row">
                            <span class="hours"><?= $starting_time[0] ?></span><span class="minutes"><?= $starting_time[1] ?></span>
                        </div>
                        <div class="text-content">
                            <h3 class="row centered <?= ($expandable) ? 'expandable' : '' ?>"> <!-- has jQuery onclick Event inside main.js -->
                                <?= the_title() ?>
                                <?php if ($expandable) { ?>
                                    <div class="flip-me">
                                        <svg width="38" height="20" viewBox="0 0 38 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 12.4324L33.5667 0L38 3.78378L19 20L0 3.78378L4.43333 0L19 12.4324Z" fill="currentColor"/>
                                        </svg>
                                    </div>
                                <?php } ?>
                            </h3>
                            <!-- Beschreibungstext -->
                            <?php if ($expandable) { ?>
                                <p><?= get_field("programm-details-beschreibung-vorschau") ?></p>
                                <p class="toggle-me" style="display:none"><?= get_field("programm-details-beschreibung") ?></p>
                            <?php } else { ?>
                                <p><?= get_field("programm-details-beschreibung") ?></p>
                            <?php } ?>
                            
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