<?php    
/*
$car_settings = array(
    "post_type" => "sponsoren", // doubles as ID for the HTML element
    "max_posts_loaded" => -1, // -1 means all posts avaliable
    "title" => "Sponsoren", // the headline for the HTML snippet
    "items_per_slide" => 5, // duhhh
    "acf_img_field_name" => "sponsor-details-logo" // different posts unfortunally have different acf descriptors for saving images
);
*/
?>
<div id="<?= $car_settings["post_type"] ?>-canvas">
    <div class="wrapper col gap-3 pt-5 pb-9">
        <h1 class="pb-2"><?= $car_settings["title"] ?></h1>
        <div class="carousel col gap-3 <?= $car_settings["color"] ?>" items-per-slide="<?= $car_settings["items_per_slide"] ?>">
            <div class="canvas">
                <?php
                $args = array(
                    'post_type' => $car_settings["post_type"],  // Slug of the category
                    'posts_per_page' => $car_settings["max_posts_loaded"],  // Number of posts to show (adjust as needed)
                );
                // Create a custom query
                $query = new WP_Query($args);

                // Check if posts are available
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $img = get_field($car_settings["acf_img_field_name"]);
                        if ($img) {
                            $img = $img["url"];
                        }
                        else {
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
                }
                ?>
            </div>
            <div class="controls pt-2 row gap-2">
                <a class="dot active" index="0"><div></div></a>
            </div>
            <button class="more color-white"><?= $car_settings["button_text"] ?></button>
        </div>
    </div>
</div>