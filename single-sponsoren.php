<?php /* Template Name: sponsor */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body id="sponsor" <?php body_class(); ?>>
    <?php 
    $main_headline = "Sponsorendetails";
    $sub_headline = " ";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>
    
    <?php # needs pre-defined $post in order to work! ?>
    <div class="light-bg">
        <div class="wrapper single-project">
            <h3 class="headline"><?php get_field("sponsor-details-name") ?></h3>
            <?php
            // post processing :^)
            the_post();
            // get project image
            $img = get_field("sponsor-details-logo")["sizes"]["large"];
            if (empty($img)) {
                $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
            }
            $tier = get_the_terms(get_the_ID(), 'sponsor-type')[0]->name;
            $contact = get_field("sponsor-details-contact");
            $website = get_field("sponsor-details-website");
            ?>

            <div class="col">
                <img class="mb-2" src="<?= $img ?>"/>
                <?php
                if ($tier) {
                    ?><h4><?= $tier ?></h4><?php
                } 
                if ($contact) {
                    ?><p>Email: <a class="color-magenta" href="mailto:<?= $contact ?>"><?= $contact ?></a></p><?php
                }
                if ($website) {
                    ?><p>Website: <a class="color-magenta" href="<?= $website ?>"><?= $website ?></a></p><?php
                }
                ?>
            </div>

            <div class="desc">
                <p><?= get_field("sponsor-details-description") ?></p>
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