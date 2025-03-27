<div id="projekte">
    <div class="wrapper col gap-3 pt-5 pb-9">
        <h1 class="pb-2">Neuigkeiten</h1>
        <div class="carousel col gap-3" items-per-slide="3">
            <div class="canvas">
                <?php
                $args = array(
                    'post_type' => 'news',  // Slug of the category
                    'posts_per_page' => -1,  // Number of posts to show (adjust as needed)
                );
                // Create a custom query
                $query = new WP_Query($args);

                // Check if posts are available
                if ($query->have_posts()) {
                    while ($query->have_posts()) {
                        $query->the_post();
                        $sponsor_logo = get_field("sponsor-details-logo");
                        if ($sponsor_logo) {
                            ?><a class="item col" href="<?= the_permalink() ?>"><img src="<?= $sponsor_logo ?>"/></a><?php
                        }
                    }
                }
                ?>
            </div>
            <div class="controls pt-2 row gap-2" slides="3">
                <a class="dot active" index="0"><div></div></a>
            </div>
            <button class="more bg-purple color-white">Alle Neuigkeiten ansehen ...</button>
        </div>
    </div>
</div>