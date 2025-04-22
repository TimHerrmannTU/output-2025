<?php    
/*
EXAMPLE ARRAY (dont remove the comment tags!!!)
$car_settings = array(
    "post_type" => "sponsoren", // doubles as ID for the HTML element
    "max_posts_loaded" => -1, // -1 means all posts avaliable
    "title" => "Sponsoren", // the headline for the HTML snippet
    "items_per_slide" => 5, // duhhh
    "acf_img_field_name" => "sponsor-details-logo" // different posts unfortunally have different acf descriptors for saving images
);
*/
?>
<?php
$post_cap = $car_settings["max_posts_loaded"];
$args = array(
    'post_type' => $car_settings["post_type"],  // Slug of the category
    'posts_per_page' => $post_cap,  // Number of posts to show (adjust as needed)
);
// Create a custom query
$query = new WP_Query($args);
$items_per_slide = $car_settings["items_per_slide"];

$slide_items = $query->found_posts;
if ( ($post_cap > 0) && ($slide_items > $post_cap) ) {
    $slide_items = $post_cap;
}

$slide_count = ceil($slide_items / $items_per_slide);

// Check if posts are available
if ($query->have_posts()) { ?>

    <div id="<?= $car_settings["post_type"] ?>-canvas" class="light-bg">
        <div class="wrapper col gap-3 pt-5 pb-9">
            <h1 class="pb-2"><?= $car_settings["title"] ?></h1>
            <div class="carousel-wrapper col gap-2 <?= $car_settings["color"] ?>">
                <div class="carousel" slide_index="0" slide_count="<?= $slide_count ?>">

                    <div class="slide" style="grid-template-columns: repeat(<?= $items_per_slide ?>, 1fr)"> <!-- SLIDE START -->
                        <?php
                        $items_index = 0;
                        while ($query->have_posts()) {
                            
                            if ( ($items_index % $items_per_slide == 0) && ($items_index != 0) ) { // starts a new slide if the last one is full
                                ?></div><div class="slide" style="grid-template-columns: repeat(<?= $items_per_slide ?>, 1fr)"><?php
                            }
                            $items_index++;

                            $query->the_post();
                            $img = get_field($car_settings["acf_img_field_name"]);
                            if ($img) { // check if a image is present
                                $img = $img["url"];
                            }
                            else { // otherwise replace with a placeholder
                                $img = get_template_directory_uri() . "/static/img/placeholder.jpg";
                            }
                            if ($car_settings["labeled"]) {
                                ?>
                                <a class="pro-item canvas-item labeled col" href="<?= the_permalink() ?>">
                                    <img src="<?= $img ?>"/>
                                    <div class="item-label">
                                        <div class="text-wrapper">
                                            <p><?= get_field($car_settings["acf_label_field_name"])  ?></p>
                                        </div>
                                    </div>
                                </a>
                                <?php
                            }
                            else {
                                ?><a class="item canvas-item col" href="<?= the_permalink() ?>"><img src="<?= $img ?>"/></a><?php
                            }
                        }
                        ?>
                    </div> <!-- SLIDE END -->

                </div>
                <div class="carousel-controls">
                    <div class="slide-dots c1">
                        <?php 
                        for ($i = 0; $i < $slide_count; $i++) {
                            ?><a class="dot <?= ($i == 0) ? 'active': '' ?>" index="<?= $i ?>"><div class="<?= $car_settings["color"] ?>"></div></a><?php
                        }  
                        ?>
                    </div>
                    <a class="more c2 color-<?= $car_settings["color"] ?>" href="/<?= $car_settings["post_type"] ?>">
                        <?= $car_settings["button_text"] ?>
                    </a>
                </div>
            </div>
        </div>
    </div>

<?php } ?>