<?php /* Template Name: projekt */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body id="projekt" <?php body_class(); ?>>
    <?php 
    $main_headline = "Projektdetails";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>
    
    <?php # needs pre-defined $post in order to work! ?>
    <div class="light-bg">
        <div class="wrapper single-project">
            <div class="headline row gap-1">
                <h3>
                    <?php the_title(); ?>
                </h3>
                <?php
                if (is_user_logged_in()) {
                    ?><a class="color-magenta" href="/projektdetails-bearbeiten?id=<?= $_GET["p"] ?>"><div class="iconify" data-icon="mdi-edit"></div></a><?php
                }
                ?>
            </div>

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
                "Studiengang / Lehrstuhl / Firma<br>" => get_field("project-details-institution"),
                "Präsentator" => get_field("project-details-presenter"),
                "Projektbeteiligte" => get_field("project-details-participants"),
            );
            $website = get_field("project-details-website");
            if ($website) $website_short = implode("/", array_slice(explode("/", $website), 0, 3));
            ?>

            <div class="col">
                <img src="<?= $img ?>"/>
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
                    ?><p><b>Website</b> <a class="color-magenta" href="<?= $website ?>"><?= $website_short ?></a></p><?php
                }
                ?>
            </div>

            <div class="desc">
                <p><?= get_field("project-details-description") ?></p>
            </div>
            
        </div>
    </div>
    
    <?php
    include get_template_directory() ."/includes/footer.php";
    wp_enqueue_script('project_filters.js', get_template_directory_uri().'/static/js/project_filter.js', false ,'1.0', 'all' );
    wp_footer();
    ?>
</body>
</html>