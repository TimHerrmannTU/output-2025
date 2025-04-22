<?php /* Template Name: projekte */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body id="projekte" <?php body_class(); ?>>
    <?php 
    $main_headline = "PROJEKTE";
    $sub_headline = "SCHAU REIN UND LASS DICH INSPIRIEREN!";
    include get_template_directory() . "/includes/narrow-head.php";
    ?>

    <div class="light-bg">
        <div class="wrapper col gap-2">
            <div class="controls mb-6">
                <?php include get_template_directory() . "/includes/year-dropdown.php";  ?>
                <p id="project-count" class="r1" style="grid-column:2/span 3"></p>
                <label class="labeled-checkbox r3 c1">
                    <span>PROJEKTDEMO</span>
                    <input type="checkbox" name="Demo">
                </label>
                <label class="labeled-checkbox r3 c2">
                    <span>PROJEKTPOSTER</span>
                    <input type="checkbox" name="Poster">
                </label>
                <label class="labeled-checkbox r3 c3">
                    <span>FACHVORTRAG</span>
                    <input type="checkbox" name="Vortrag">
                </label>
                <label class="labeled-checkbox r4 c1">
                    <span>WORKSHOP</span>
                    <input type="checkbox">
                </label>
                <label class="labeled-checkbox r4 c2">
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
                        // retrieve taxonomies of posts (needed for filtering)
                        $pro_terms = get_the_terms(get_the_ID(), 'output-year');
                        $pro_years = "";
                        if (!is_wp_error($pro_terms) && !empty($pro_terms)) {
                            $pro_years = implode(', ', array_map(fn($term) => $term->name, $pro_terms));
                        }
                        $pro_terms = get_the_terms(get_the_ID(), 'project-type');
                        $pro_types = "";
                        if (!is_wp_error($pro_terms) && !empty($pro_terms)) {
                            $pro_types = implode(', ', array_map(fn($term) => $term->name, $pro_terms));
                        }
                        // get project image
                        $img = get_field("project-details-thumbnail")["sizes"]["large"];
                        if (empty($img)) {
                            $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
                        }
                        ?>
                        <a class="pro-item labeled col" href="<?= the_permalink() ?>" dd-year="<?= $pro_years ?>" dd-type="<?= $pro_types ?>">
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
    wp_enqueue_script('project_filters.js', get_template_directory_uri().'/static/js/project_filter.js', false ,'1.0', 'all' );
    wp_footer();
    ?>
</body>
</html>