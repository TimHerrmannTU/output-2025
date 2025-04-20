<?php /* Template Name: projekte */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background-image: url('/wp-content/uploads/2025/04/projekte-banner.jpg')">
    <?php 
    $main_headline = "PROJEKTE";
    $sub_headline = "SCHAU REIN UND LASS DICH INSPIRIEREN!";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div id="projekte" class="light-bg">
        <div class="wrapper col gap-2">
            <div class="controls">
                <?php include get_template_directory() . "/includes/year-dropdown.php";  ?>
                <label class="labeled-checkbox r2 c1">
                    <span>PROJEKTDEMO</span>
                    <input type="checkbox">
                </label>
                <label class="labeled-checkbox r2 c2">
                    <span>PROJEKTPOSTER</span>
                    <input type="checkbox">
                </label>
                <label class="labeled-checkbox r2 c3">
                    <span>FACHVORTRAG</span>
                    <input type="checkbox">
                </label>
                <label class="labeled-checkbox r3 c1">
                    <span>WORKSHOP</span>
                    <input type="checkbox">
                </label>
                <label class="labeled-checkbox r3 c2">
                    <span>AUSSTELLUNG</span>
                    <input type="checkbox">
                </label>
            </div>
            <!-- PROJEKT LOOP -->
            <div class="pro-grid">
                <?php
                $args = array(
                    'post_type'      => 'projekte',  // Slug of the category
                    'posts_per_page' => -1,  // Number of posts to show (adjust as needed)
                );
                // Create a custom query
                $query = new WP_Query($args);
                // Check if posts are available
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $img = get_field("project-details-thumbnail")["sizes"]["large"];
                        if (empty($img)) {
                            $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
                        }
                        ?>
                        <a class="pro-item labeled col" href="<?= the_permalink() ?>">
                            <img src="<?= $img ?>"/>
                            <div class="item-label">
                                <div class="text-wrapper">
                                    <p><?= get_field("project-details-name")  ?></p>
                                </div>
                            </div>
                        </a>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php 
    include get_template_directory() ."/includes/footer.php";
    wp_footer();
    ?>
</body>
</html>