<div id="sponsoren-tierlist" class="col gap-3">
    <h1>Sponsoren</h1>
    <?php 
    $sponsor_types = array(
        "Gold Sponsor" => "sponsor-sponsorklasse-gold",
        "Preisponsor" => "sponsor-preissponsor",
        "Silber Sponsor" => "sponsor-sponsorklasse-silber",
        "Bronze Sponsor" => "sponsor-sponsorklasse-bronze",
    );
    foreach ($sponsor_types as $key => $value) {
        $args = array(
            'post_type' => 'sponsoren',  // Slug of the category
            'posts_per_page' => -1,  // Number of posts to load    
            'tax_query' => [
                [
                    'taxonomy' => 'sponsor-type',
                    'field'    => 'slug', // or 'term_id' or 'name'
                    'terms'    => $value,  // your term slug here
                ],
            ],

        );
        // Create a custom query
        $query = new WP_Query($args);
        if ($query->have_posts()) { ?> 
            <h3 class="sponsor-tier"><?= $key ?></h3>
            <div class="row gap-3">
                <?php while ($query->have_posts()) {
                    $query->the_post();
                    $img = get_field("sponsor-details-logo");
                    if ($img) { // check if a image is present
                        $img = $img["url"];
                    }
                    ?>
                    <a class="sponsor" href="<?= the_permalink() ?>">
                        <img src="<?= $img ?>"/>
                    </a>
                <?php } ?>
            </div>        
        <?php } ?>
    <?php } ?>
</div>